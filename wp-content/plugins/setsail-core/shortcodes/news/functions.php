<?php

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_Qodef_News extends WPBakeryShortCodesContainer {}
}


if ( ! function_exists( 'setsail_core_add_news_shortcodes' ) ) {
	function setsail_core_add_news_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'SetSailCore\CPT\Shortcodes\News\News',
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'setsail_core_filter_add_vc_shortcode', 'setsail_core_add_news_shortcodes' );
}

if ( ! function_exists( 'setsail_core_set_news_custom_style_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom css style for news shortcode
	 */
	function setsail_core_set_news_custom_style_for_vc_shortcodes( $style ) {
		$current_style = '.vc_shortcodes_container.wpb_qodef_news_tab { 
			background-color: #f4f4f4; 
		}';
		
		$style .= $current_style;
		
		return $style;
	}
	
	add_filter( 'setsail_core_filter_add_vc_shortcodes_custom_style', 'setsail_core_set_news_custom_style_for_vc_shortcodes' );
}

if ( ! function_exists( 'setsail_core_set_news_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for news shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function setsail_core_set_news_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-news';

		return $shortcodes_icon_class_array;
	}
	
	add_filter( 'setsail_core_filter_add_vc_shortcodes_custom_icon_class', 'setsail_core_set_news_icon_class_name_for_vc_shortcodes' );
}

if (!function_exists('setsail_core_set_news_assets')) {
    /**
     * Function that set custom icon class name for hivegallery shortcode to set our icon for Visual Composer shortcodes panel
     */
    function setsail_core_set_news_assets()
    {
        wp_register_script('news_js', plugins_url('/assets/js/modules/news.js', __FILE__), array('jquery'), '1.0', true);
        wp_register_style('news_css', plugins_url('/assets/css/news.css', __FILE__), ['bootstrap']);
    }

    add_filter('init', 'setsail_core_set_news_assets');
}