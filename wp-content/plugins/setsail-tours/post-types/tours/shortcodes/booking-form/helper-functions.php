<?php
if ( ! function_exists( 'setsail_tours_booking_form_shortcode_helper' ) ) {
	function setsail_tours_booking_form_shortcode_helper( $shortcodes_class_name ) {
		$shortcodes = array(
			'SetSailTours\CPT\Tours\Shortcodes\BookingForm'
		);

		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );

		return $shortcodes_class_name;
	}

	add_filter( 'setsail_tours_filter_add_vc_shortcode', 'setsail_tours_booking_form_shortcode_helper' );
}

if ( ! function_exists( 'setsail_tours_set_booking_form_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for property list shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function setsail_tours_set_booking_form_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-booking-form';

		return $shortcodes_icon_class_array;
	}

	add_filter( 'setsail_tours_filter_add_vc_shortcodes_custom_icon_class', 'setsail_tours_set_booking_form_icon_class_name_for_vc_shortcodes' );
}

if (!function_exists('setsail_core_set_hivegallery_assets')) {
	/**
	 * Function that set custom icon class name for hivegallery shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function setsail_core_set_hivegallery_assets()
	{
		wp_register_script('booking_form_js', plugins_url('/assets/js/booking-form.js', __FILE__), array('jquery'), '1.0', true);
		wp_register_style('booking_form_css', plugins_url('/assets/css/booking-form.css', __FILE__), ['bootstrap']);
	}

	add_filter('init', 'setsail_core_set_hivegallery_assets');
}