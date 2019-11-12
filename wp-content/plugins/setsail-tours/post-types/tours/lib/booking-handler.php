<?php

namespace SetSailTours\CPT\Tours\Lib;

use SetSailTours\Admin\MetaBoxes\TourBooking\TourTimeStorage;

/**
 * Class BookingHandler
 * @package SetSailTours\CPT\Tours\Lib
 */
class BookingHandler {
	/**
	 * @var private instance of current class
	 */
	private static $instance;

	/**
	 * @var
	 */
	private $labels;

	/**
	 * Private constuct because of Singletone
	 */
	private function __construct() {
	}

	/**
	 * Private sleep because of Singletone
	 */
	private function __wakeup() {
	}

	/**
	 * Private clone because of Singletone
	 */
	private function __clone() {
	}

	/**
	 * Returns current instance of class
	 * @return BookingHandler
	 */
	public static function getInstance() {
		if(self::$instance == null) {
			return new self;
		}

		return self::$instance;
	}

	/**
	 * Initializes all functinality of booking handling.
	 * Calls methods that enqueue necessary assets,
	 * initialize labels, hooks method to ajax call
	 */
	public function initialize() {
		$this->enqueueScripts();
		$this->setLabels();

		add_action('wp_ajax_check_tour_booking', array($this, 'handleBooking'));
		add_action('wp_ajax_nopriv_check_tour_booking', array($this, 'handleBooking'));

		add_action('wp_ajax_setsail_tours_check_availability', array($this, 'handleAvailability'));
		add_action('wp_ajax_nopriv_setsail_tours_check_availability', array($this, 'handleAvailability'));

		add_action('after_setup_theme', array($this, 'startSession'));
	}

	/**
	 *
	 */
	public function startSession() {
		session_start();
	}

	/**
	 * Hooks to ajax call, calls methos that validate data and store new booking
	 * @return mixed
	 */
	public function handleBooking() {
		$returnObject = new \stdClass();

		parse_str($_POST['fields'], $fields);

		$validation = $this->validate($fields);

		if(!$validation->status) {
			$returnObject->status   = $validation->status;
			$returnObject->messages = $validation->messages;

			echo json_encode($returnObject);
			exit;
		}

		$canBeBooked = $this->checkAvailability($fields);

		if(!$canBeBooked || !$canBeBooked->available) {
			$returnObject->status     = false;
			$returnObject->messages[] = $canBeBooked->message;

			echo json_encode($returnObject);
			exit;
		}

		//store booking here
		$bookingResult = $this->storeBooking($fields);

		$returnObject->status = is_array($bookingResult) && count($bookingResult);

		if(!$returnObject->status) {
			$returnObject->messages[] = esc_html__('There was some booking error. Please try again later', 'setsail-tours');
		} else {
			$returnObject->messages[] = esc_html__('Booking successful', 'setsail-tours');

			if(setsail_tours_theme_installed()) {
				$redirectOptionValue = setsail_select_options()->getOptionValue('tours_checkout_page');
				$redirectOption = add_query_arg(array('booking' => $bookingResult['booking_hash']), get_permalink($redirectOptionValue));
			}

			$this->storeBookingToSession($bookingResult['booking_hash'], $fields['user_email']);
			$this->sendUserConfirmationEmail($fields['tour_id'], $fields['user_email'], $bookingResult['booking_hash']);
			
			$this->sendAdminConfirmationEmail($fields['tour_id'], $fields['user_email'], $bookingResult['booking_hash']);
			
			$redirectUrl               = empty($redirectOptionValue) ? add_query_arg(array('qodef-tours-checkout' => 'true'), get_home_url()) : $redirectOption;
			$returnObject->redirectURI = $redirectUrl;
		}

		echo json_encode($returnObject);
		exit;
	}

	/**
	 *
	 */
	public function handleAvailability() {
		$returnObject = new \stdClass();

		parse_str($_POST['fields'], $fields);

		$validation = $this->validate($fields, false);

		if(!$validation->status) {
			$returnObject->status   = $validation->status;
			$returnObject->messages = $validation->messages;

			echo json_encode($returnObject);
			exit;
		}

		$canBeBooked = $this->checkAvailability($fields);

		if(!$canBeBooked || !$canBeBooked->available) {
			$returnObject->status     = false;
			$returnObject->messages[] = $canBeBooked->message;

			echo json_encode($returnObject);
			exit;
		}

		//get tour price and return that to client
		$price = setsail_tours_price_helper()->getPeriodPrice($fields['tour_id'], $fields['date']);

		if(!$price) {
			$returnObject->status     = false;
			$returnObject->messages[] = esc_html__('Tour doesn\'t have price defined', 'setsail-tours');

			echo json_encode($returnObject);
			exit;
		}

		$formattedUnitPrice = setsail_tours_price_helper()->formatPrice($price);

		$amountPrice          = $fields['number_of_tickets'] * $price;
		$formattedAmountPrice = setsail_tours_price_helper()->formatPrice($amountPrice);

		$returnObject->status     = true;
		$returnObject->messages[] = $fields['number_of_tickets'].' x '.$formattedUnitPrice.' = '.$formattedAmountPrice;

		echo json_encode($returnObject);
		exit;
	}

	/**
	 * @param $fields
	 *
	 * @return bool|\stdClass
	 */
	private function checkAvailability($fields) {
		global $wpdb;

		$returnObject = new \stdClass();

		$requestedNumberOfTickets = $fields['number_of_tickets'];
		$requestedDate            = date('Y-m-d', strtotime($fields['date']));
		$requestedTime            = empty($fields['time']) ? false : $fields['time'];
		$tourId                   = $fields['tour_id'];

		$sql = "SELECT SUM({$wpdb->prefix}tour_bookings.amount) AS number_of_bookings, {$wpdb->prefix}tour_dates.number_of_tickets AS number_of_tickets
				FROM {$wpdb->prefix}tour_bookings
				RIGHT JOIN {$wpdb->prefix}tour_dates ON {$wpdb->prefix}tour_dates.tour_id = {$wpdb->prefix}tour_bookings.tour_id 
				WHERE {$wpdb->prefix}tour_bookings.tour_id = '%d' 
				AND {$wpdb->prefix}tour_bookings.booking_date = DATE('%s')
				AND DATE('%s') >= {$wpdb->prefix}tour_dates.start_date 
				AND DATE('%s') <= {$wpdb->prefix}tour_dates.end_date";

		$prepareArray = array(
			$tourId,
			$requestedDate,
			$requestedDate,
			$requestedDate
		);

		if($requestedTime) {
			$sql .= " AND {$wpdb->prefix}tour_bookings.booking_time = '%s'";
			$prepareArray[] = $requestedTime;
		}

		$result = $wpdb->get_results(
			$wpdb->prepare($sql, $prepareArray)
		);

		if(!$result) {
			return false;
		}

		$resultInstance = array_shift($result);

		$numberOfBookings = empty($resultInstance->number_of_bookings) ? 0 : $resultInstance->number_of_bookings;
		$numberOfTickets  = empty($resultInstance->number_of_tickets) ? 0 : $resultInstance->number_of_tickets;

		if(!$numberOfBookings) {
			$numberOfTickets = TourTimeStorage::getInstance()->getNumberOfTicketsForDate($tourId, $requestedDate);
		}

		$numberOfAvailableBookings = (int) $numberOfTickets - (int) $numberOfBookings;
		$returnObject->available   = ($numberOfAvailableBookings - (int) $requestedNumberOfTickets) >= 0;

		if(!$returnObject->available) {
			$ticketsLabel          = $numberOfAvailableBookings === 1 ? esc_html__('ticket', 'setsail-tours') : esc_html__('tickets', 'setsail-tours');
			$returnObject->message = esc_html__('We have', 'setsail-tours').' '.$numberOfAvailableBookings.' '.$ticketsLabel.' '.esc_html__('left', 'setsail-tours');
		} else {
			$returnObject->message = esc_html__('Booking available', 'setsail-tours');
		}

		return $returnObject;
	}

	/**
	 * Validates current request. Returns object that has status and messages properties
	 *
	 * @param $request
	 *
	 * @param bool $validateUserInfo
	 *
	 * @return \stdClass
	 */
	private function validate($request, $validateUserInfo = true) {
		$validation = new \stdClass();

		$validation->status   = false;
		$validation->messages = array();

		$tourId            = $request['tour_id'];
		$tourDates         = TourTimeStorage::getInstance()->getTourDates($tourId, true);
		$tourAvailableDays = TourTimeStorage::getInstance()->getAvaiableDays($tourDates);

		if(empty($request['setsail_tours_booking_form']) || !wp_verify_nonce($request['setsail_tours_booking_form'], 'setsail_tours_booking_form')) {
			$validation->messages[] = 'Don\'t try to hack me!';
			$validation->status     = false;

			return $validation;
		}

		if($validateUserInfo) {
			if(empty($request['user_name'])) {
				$validation->messages[] = $this->labels['name'];
			}

			if(empty($request['user_email']) || !filter_var($request['user_email'], FILTER_VALIDATE_EMAIL)) {
				$validation->messages[] = $this->labels['email'];
			}

			if(empty($request['user_confirm_email']) || $request['user_confirm_email'] !== $request['user_email']) {
				$validation->messages[] = $this->labels['confirmEmail'];
			}
		}

		$dateInt = strtotime($request['date']);

		if(empty($request['date']) || !(checkdate(date('m', $dateInt), date('d', $dateInt), date('Y', $dateInt)))) {
			$validation->messages[] = $this->labels['date'];
		}

		//check if given date is available for tour periods
		if(!in_array(date('Y-m-d', strtotime($request['date'])), $tourAvailableDays)) {
			$validation->messages[] = $this->labels['dateNotAvailable'];
		}

		if(isset($request['time']) && !preg_match("/(2[0-4]|[01][1-9]|10):([0-5][0-9])/", $request['time'])) {
			$validation->messages[] = $this->labels['time'];
		}

		if(empty($request['number_of_tickets']) && !filter_var($request['number_of_tickets'], FILTER_VALIDATE_INT)) {
			$validation->messages[] = $this->labels['numberOfTickets'];
		}

		$validation->status = count($validation->messages) === 0;

		return $validation;
	}

	/**
	 * @param $fields
	 *
	 * @return false|int
	 */
	private function storeBooking($fields) {
		global $wpdb;

		$tourId          = $fields['tour_id'];
		$name            = $fields['user_name'];
		$email           = $fields['user_email'];
		$phone           = empty($fields['user_phone']) ? '' : $fields['user_phone'];
		$numberOfTickets = $fields['number_of_tickets'];
		$date            = $fields['date'];
		$time            = empty($fields['time']) ? '' : $fields['time'];
		$message         = empty($fields['message']) ? '' : $fields['message'];

		$dataToStore = array(
			'tour_id'      => $tourId,
			'user_name'    => $name,
			'user_email'   => $email,
			'amount'       => $numberOfTickets,
			'booking_date' => date('Y-m-d', strtotime($date)),
			'booking_time' => $time,
			'created_at'   => date('Y-m-d H:i:s'),
			'status'       => 'pending',
			'user_phone'   => $phone,
			'user_message' => $message,
			'unique_hash'  => $this->generateHash($fields)
		);

		$user = get_user_by('email', $email);

		if($user instanceof \WP_User) {
			$dataToStore['user_id'] = $user->ID;
		}

		$price = setsail_tours_price_helper()->getPeriodPrice($tourId, $date);

		if(!$price) {
			return false;
		}

		$amountPrice          = $numberOfTickets * $price;
		$formattedAmountPrice = setsail_tours_price_helper()->formatPrice($amountPrice);

		$dataToStore['price']     = $formattedAmountPrice;
		$dataToStore['raw_price'] = $amountPrice;

		$result = $wpdb->insert($wpdb->prefix.'tour_bookings', $dataToStore);

		$return = array(
			'booking_id'   => $result,
			'booking_hash' => $dataToStore['unique_hash']
		);

		return $return;
	}

	/**
	 * Loads all necessary assets
	 */
	public function loadAssets() {
		if(is_singular('tour-item')) {
			$deps = array('jquery', 'underscore');

			wp_enqueue_script('qodef-tour-booking', plugins_url(SETSAIL_TOURS_REL_PATH.'/assets/js/tour-booking.js'), $deps, false, true);
		}
	}

	/**
	 * Outputs global JS variable that holds all necessary information for current tour
	 * Tour data is outputter before booking JS file
	 */
	public function localizeTourData() {
		if(is_singular('tour-item')) {
			$id = get_the_ID();

			$tourDates          = TourTimeStorage::getInstance()->getTourDates($id, true);
			$availableTourDates = TourTimeStorage::getInstance()->getAvaiableDays($tourDates);
			$datesWithTime      = TourTimeStorage::getInstance()->getStartDateWithTimes($tourDates);

			wp_localize_script('qodef-tour-booking', 'qodefTourData', array(
				'data'    => array(
					'id'             => $id,
					'availableDays'  => $availableTourDates,
					'datesWithTimes' => $datesWithTime
				),
				'labels'  => $this->labels,
				'ajaxUrl' => admin_url('admin-ajax.php')
			));
		}
	}

	/**
	 * Enqueues all necessary scripts
	 */
	public function enqueueScripts() {
		add_action('wp_enqueue_scripts', array($this, 'loadAssets'));
		add_action('wp_enqueue_scripts', array($this, 'localizeTourData'));
	}

	/**
	 * Sets validation labels
	 */
	private function setLabels() {
		$this->labels = array(
			'name'             => esc_html__('Please enter your name', 'setsail-tours'),
			'email'            => esc_html__('Please enter valid email', 'setsail-tours'),
			'confirmEmail'     => esc_html__('Email and confirmation email field aren\'t the same', 'setsail-tours'),
			'date'             => esc_html__('Please choose date', 'setsail-tours'),
			'dateNotAvailable' => esc_html__('Chosen date is not available', 'setsail-tours'),
			'time'             => esc_html__('Please choose time', 'setsail-tours'),
			'numberOfTickets'  => esc_html__('Please choose number of tickets', 'setsail-tours')
		);
	}

	/**
	 * @param $hash
	 *
	 * @return bool
	 */
	public function getBookingByHash($hash) {
		global $wpdb;

		if(!$hash) {
			return false;
		}

		$sql = "SELECT {$wpdb->prefix}tour_bookings.*, {$wpdb->prefix}posts.* FROM {$wpdb->prefix}tour_bookings
				LEFT JOIN {$wpdb->prefix}posts ON {$wpdb->prefix}tour_bookings.tour_id = {$wpdb->prefix}posts.ID
				WHERE {$wpdb->prefix}tour_bookings.unique_hash = '%s'";

		$result = $wpdb->get_results($wpdb->prepare($sql, $hash));

		if(!(is_array($result) && count($result))) {
			return false;
		}

		$resultInstance = array_shift($result);

		return $resultInstance;
	}

	/**
	 * @param $bookingHash
	 * @param $bookingEmail
	 */
	private function storeBookingToSession($bookingHash, $bookingEmail) {
		session_start();

		$_SESSION[$bookingHash] = array(
			'booking_hash' => $bookingHash,
			'booking_email' => $bookingEmail
		);
	}

	/**
	 * @param $bookingEmail
	 */
	private function sendUserConfirmationEmail($id, $bookingEmail, $bookingHash) {


		//Get email address
		$mail_to = $bookingEmail;
		$tour_id = $id;
		$tour_title = get_the_title($tour_id);
		$name = get_bloginfo('name');
		$email = get_bloginfo('admin_email');
		$booking = $this->getBookingByHash($bookingHash);
		$booking_time_html = '';
		if(!empty($booking->booking_time)) {
			$booking_time_html = $booking->booking_time . 'h';
		}
		$message = esc_html__('We have received your reservation for','setsail-tours') .  ' '. $tour_title . ' '. esc_html__('Your booking will be complete upon payment.', 'setsail-tours');

		$subject  = esc_html__('Booking Information For', 'setsail-tours') . ' '. $tour_title . ' '. esc_html__('on', 'setsail-tours') . ' ' . $name;

		$headers = array(
			'From: ' . $name . ' <' . $email . '>',
			'Reply-To: ' . $name . ' <' . $email . '>',
		);

		$messageTemplate = esc_html__('From', 'setsail-tours'). ': ' . $name . "\r\n";
		$messageTemplate .= esc_html__('Message', 'setsail-tours') . ': ' . $message . "\r\n\n";
		$messageTemplate .= esc_html__('Number of Tickets', 'setsail-tours') . ': ' . $booking->amount . "\r\n\n";
		$messageTemplate .= esc_html__('Price', 'setsail-tours') . ': ' . $booking->price . "\r\n\n";
		$messageTemplate .= esc_html__('Departure Date', 'setsail-tours') . ': ' . date(get_option('date_format'), strtotime($booking->booking_date)) . ' ' . $booking_time_html . "\r\n\n";

		wp_mail(
			$mail_to, //Mail To
			$subject, //Subject
			$messageTemplate, //Message
			$headers //Additional Headers
		);
	}
	
	private function sendAdminConfirmationEmail($id, $bookingEmail, $bookingHash) {
		
		if(setsail_select_options()->getOptionValue('enable_admin_booking_email') == 'yes'){
			//Get email address
			if(setsail_select_options() -> getOptionValue('admin_email') != '') {
				$mail_to = setsail_select_options() -> getOptionValue('admin_email');
			} else {
				$mail_to = get_bloginfo('admin_email');
			}
			
			$tour_id = $id;
			$tour_title = get_the_title($tour_id);
			$name = get_bloginfo('name');
			$email = get_bloginfo('admin_email');
			$booking = $this->getBookingByHash($bookingHash);
			$booking_time_html = '';
			if(!empty($booking->booking_time)) {
				$booking_time_html = $booking->booking_time . 'h';
			}
			$message = esc_html__('You have received the reservation for','setsail-tours') .  ' '. $tour_title . ' .';
			
			$subject  = esc_html__('Booking Information For', 'setsail-tours') . ' '. $tour_title . ' '. esc_html__('on', 'setsail-tours') . ' ' . $name;
			
			$headers = array(
				'From: ' . $name . ' <' . $email . '>',
				'Reply-To: ' . $name . ' <' . $email . '>',
			);
			
			$messageTemplate = esc_html__('From', 'setsail-tours'). ': ' . $name . "\r\n";
			$messageTemplate .= esc_html__('Message', 'setsail-tours') . ': ' . $message . "\r\n\n";
			$messageTemplate .= esc_html__('Number of Tickets', 'setsail-tours') . ': ' . $booking->amount . "\r\n\n";
			$messageTemplate .= esc_html__('Price', 'setsail-tours') . ': ' . $booking->price . "\r\n\n";
			$messageTemplate .= esc_html__('Departure Date', 'setsail-tours') . ': ' . date(get_option('date_format'), strtotime($booking->booking_date)) . ' ' . $booking_time_html . "\r\n\n";
			
			wp_mail(
				$mail_to, //Mail To
				$subject, //Subject
				$messageTemplate, //Message
				$headers //Additional Headers
			);
		}
	}

	/**
	 * @param $bookingObject
	 *
	 * @return bool
	 */
	public function canSeeBookingData($bookingObject) {
		if(!$bookingObject || empty($_SESSION[$bookingObject->unique_hash])) {
			return false;
		}

		$sessionArray = $_SESSION[$bookingObject->unique_hash];

		$session_hash  = empty($sessionArray['booking_hash']) ? false : $sessionArray['booking_hash'];
		$session_email = empty($sessionArray['booking_email']) ? false : $sessionArray['booking_email'];

		if(!$session_email || !$session_hash) {
			return false;
		}

		return $bookingObject->unique_hash === $session_hash && $bookingObject->user_email === $session_email;
	}

	/**
	 * @param $fields
	 *
	 * @return mixed
	 */
	private function generateHash($fields) {
		$secret = '9W2N3VkS&csJ';

		$tourId = $fields['tour_id'];
		$email = $fields['user_email'];

		return md5($secret.$tourId.$email.time());
	}

	/**
	 * @param $userEmail
	 *
	 * @return array|bool|null|object
	 */
	public function getUserBookings($userEmail) {
		global $wpdb;

		if(!$userEmail) {
			return false;
		}

		$sql = "SELECT {$wpdb->prefix}tour_bookings.*, {$wpdb->prefix}posts.* FROM {$wpdb->prefix}tour_bookings
				LEFT JOIN {$wpdb->prefix}posts ON {$wpdb->prefix}tour_bookings.tour_id = {$wpdb->prefix}posts.ID
				WHERE {$wpdb->prefix}tour_bookings.user_email = '%s'";

		$result = $wpdb->get_results($wpdb->prepare($sql, $userEmail));

		if(!(is_array($result) && count($result))) {
			return false;
		}

		return $result;
	}
}