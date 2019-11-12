<?php

if ( ! function_exists( 'setsail_core_add_google_map_shortcodes' ) ) {
	function setsail_core_add_google_map_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'SetSailCore\CPT\Shortcodes\GoogleMap\GoogleMap'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'setsail_core_filter_add_vc_shortcode', 'setsail_core_add_google_map_shortcodes' );
}

if ( ! function_exists( 'setsail_core_set_google_map_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for google map shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function setsail_core_set_google_map_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-google-map';
		
		return $shortcodes_icon_class_array;
	}
	
	add_filter( 'setsail_core_filter_add_vc_shortcodes_custom_icon_class', 'setsail_core_set_google_map_icon_class_name_for_vc_shortcodes' );
}