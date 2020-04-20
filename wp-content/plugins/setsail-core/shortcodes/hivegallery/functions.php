<?php

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_Qodef_Hivegallery extends WPBakeryShortCodesContainer {}
}

if ( ! function_exists( 'setsail_core_add_hivegallery_shortcodes' ) ) {
	function setsail_core_add_hivegallery_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'SetSailCore\CPT\Shortcodes\Hivegallery\Hivegallery',
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'setsail_core_filter_add_vc_shortcode', 'setsail_core_add_hivegallery_shortcodes' );
}

if ( ! function_exists( 'setsail_core_set_hivegallery_custom_style_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom css style for hivegallery shortcode
	 */
	function setsail_core_set_hivegallery_custom_style_for_vc_shortcodes( $style ) {
		$current_style = '.vc_shortcodes_container.wpb_qodef_hivegallery_tab { 
			background-color: #f4f4f4; 
		}';
		
		$style .= $current_style;
		
		return $style;
	}
	
	add_filter( 'setsail_core_filter_add_vc_shortcodes_custom_style', 'setsail_core_set_hivegallery_custom_style_for_vc_shortcodes' );
}

if ( ! function_exists( 'setsail_core_set_hivegallery_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for hivegallery shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function setsail_core_set_hivegallery_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-hivegallery';

		return $shortcodes_icon_class_array;
	}
	
	add_filter( 'setsail_core_filter_add_vc_shortcodes_custom_icon_class', 'setsail_core_set_hivegallery_icon_class_name_for_vc_shortcodes' );
}