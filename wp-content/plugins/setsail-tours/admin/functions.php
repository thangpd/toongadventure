<?php

use SetSailTours\Admin\BookingDashboard\BookingSubmenuPage;

if ( ! function_exists( 'setsail_tours_load_admin_assets' ) ) {
	function setsail_tours_load_admin_assets() {
		wp_enqueue_script( 'qodef-booking-dashboard', plugins_url( '/assets/js/booking-dashboard.js', __FILE__ ), array(), '', true );
		wp_enqueue_style( 'qodef-booking-dashboard', plugins_url( '/assets/css/booking-dashboard.css', __FILE__ ), array(), '', 'all' );
	}
	
	add_action( 'admin_enqueue_scripts', 'setsail_tours_load_admin_assets' );
}

if ( ! function_exists( 'setsail_tours_init_booking_dashboard' ) ) {
	function setsail_tours_init_booking_dashboard() {
		BookingSubmenuPage::getInstance();
	}
	
	add_action( 'plugins_loaded', 'setsail_tours_init_booking_dashboard' );
}

if ( ! function_exists( 'setsail_tours_add_ajax_url' ) ) {
	function setsail_tours_add_ajax_url() {
		wp_localize_script( 'qodef-booking-dashboard', 'SetSailToursAjaxUrl', array(
			'url' => admin_url( 'admin-ajax.php' )
		) );
	}
	
	add_action( 'admin_enqueue_scripts', 'setsail_tours_add_ajax_url' );
}