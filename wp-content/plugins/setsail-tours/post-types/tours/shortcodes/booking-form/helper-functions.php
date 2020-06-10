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