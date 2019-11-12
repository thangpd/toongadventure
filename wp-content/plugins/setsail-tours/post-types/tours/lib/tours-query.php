<?php

namespace SetSailTours\CPT\Tours\Lib;

use SetSailTours\Admin\MetaBoxes\TourBooking\TourTimeStorage;

class ToursQuery {
	/**
	 * @var private instance of current class
	 */
	private static $instance;

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
	 * @return ToursQuery
	 */
	public static function getInstance() {
		if(self::$instance == null) {
			return new self;
		}

		return self::$instance;
	}

	public function queryVCParams() {
		return array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__('Number of Tours Per Page', 'setsail-tours'),
				'param_name'  => 'number',
				'value'       => '-1',
				'description' => esc_html__('Enter -1 to show all', 'setsail-tours'),
				'group'       => esc_html__('Query Options', 'setsail-tours')
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__('Order By', 'setsail-tours'),
				'param_name'  => 'order_by',
				'value'       => array(
					esc_html__('Title', 'setsail-tours')      => 'title',
					esc_html__('Date', 'setsail-tours')       => 'date',
					esc_html__('Menu Order', 'setsail-tours') => 'menu_order',
				),
				'save_always' => true,
				'group'       => esc_html__('Query Options', 'setsail-tours')
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__('Order', 'setsail-tours'),
				'param_name'  => 'order',
				'value'       => array(
					esc_html__('ASC', 'setsail-tours')  => 'ASC',
					esc_html__('DESC', 'setsail-tours') => 'DESC',
				),
				'save_always' => true,
				'group'       => esc_html__('Query Options', 'setsail-tours')
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'tour_category',
				'heading'     => esc_html__('Tour Category', 'setsail-tours'),
				'description' => esc_html__('Enter one tour category slug (leave empty for showing all categories)', 'setsail-tours'),
				'group'       => esc_html__('Query Options', 'setsail-tours')
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'selected_tours',
				'heading'     => esc_html__('Show Only Tours with Listed IDs', 'setsail-tours'),
				'description' => esc_html__('Delimit ID numbers by comma (leave empty for all)', 'setsail-tours'),
				'group'       => esc_html__('Query Options', 'setsail-tours')
			)
		);
	}

	public function getShortcodeAtts() {
		return array(
			'number'         => '-1',
			'order_by'       => 'date',
			'order'          => 'ASC',
			'tour_category'  => '',
			'selected_tours' => '',
			'paged'          => ''
		);
	}

	public function buildQueryObject($params, $meta_query_array = null) {
		$queryArray = array(
			'post_status'    => 'publish',
			'post_type'      => 'tour-item',
			'orderby'        => 'date',
			'order'          => 'DESC',
			'posts_per_page' => '-1'
		);

		if(!empty($params['order_by'])) {
			$queryArray['orderby'] = $params['order_by'];
		}

		if(!empty($params['order'])) {
			$queryArray['order'] = $params['order'];
		}

		if(!empty($params['number'])) {
			$queryArray['posts_per_page'] = $params['number'];
		}

		if(!empty($params['tour_category'])) {
			$queryArray['tour-category'] = $params['tour_category'];
		}

		$toursIds = null;
		if(!empty($params['selected_tours'])) {
			$toursIds             = explode(',', $params['selected_tours']);
			$queryArray['post__in'] = $toursIds;
		}

		if(!empty($params['next_page'])) {
			$queryArray['paged'] = $params['next_page'];

		} else {
			$queryArray['paged'] = 1;
		}

		if(is_array($meta_query_array) && count($meta_query_array)) {
			$queryArray = array_merge($queryArray, $meta_query_array);
		}

		return new \WP_Query($queryArray);
	}
}