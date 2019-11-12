<?php

if ( ! function_exists( 'setsail_select_add_blog_slider_shortcode' ) ) {
	function setsail_select_add_blog_slider_shortcode( $shortcodes_class_name ) {
		$shortcodes = array(
			'SetSailCore\CPT\Shortcodes\BlogSlider\BlogSlider'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'setsail_core_filter_add_vc_shortcode', 'setsail_select_add_blog_slider_shortcode' );
}

if ( ! function_exists( 'setsail_select_set_blog_slider_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for blog shortcodes to set our icon for Visual Composer shortcodes panel
	 */
	function setsail_select_set_blog_slider_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-blog-slider';
		
		return $shortcodes_icon_class_array;
	}
	
	add_filter( 'setsail_core_filter_add_vc_shortcodes_custom_icon_class', 'setsail_select_set_blog_slider_icon_class_name_for_vc_shortcodes' );
}