<?php

use SetSailTours\CPT\Tours\Lib\BookingHandler;

if(!function_exists('setsail_tours_add_my_bookings_nav_item')) {
	/**
	 * @param $items
	 * @param $dashboard_url
	 *
	 * @return array
	 */
	function setsail_tours_add_my_bookings_nav_item($items, $dashboard_url) {
		$items['my-bookings'] = array(
			'url' 			=> esc_url(add_query_arg(array('user-action' => 'my-bookings'), $dashboard_url)),
			'text' 			=> esc_html__('My Bookings', 'setsail-tours'),
			'user_action'   => 'my-bookings',
            'icon'          => '<i class="icon_book_alt" aria-hidden="true"></i>'
		);

		return $items;
    }

	add_filter('setsail_membership_dashboard_navigation_pages', 'setsail_tours_add_my_bookings_nav_item', 10, 2);
}

if(!function_exists('setsail_tours_add_my_bookings_page_content')) {
    function setsail_tours_add_my_bookings_page_content($page, $action) {
	    $user = wp_get_current_user();

        if( $action == 'my-bookings' && $user ) {
            $user_bookings = BookingHandler::getInstance()->getUserBookings($user->user_email);
            $page = setsail_tours_get_tour_module_template_part('profile/templates/my-bookings', 'tours', '', '', compact('user_bookings'));
        }

		return $page;
    }

	add_filter('setsail_membership_dashboard_pages', 'setsail_tours_add_my_bookings_page_content', 10, 2);
}