<?php

if ( ! function_exists( 'setsail_core_add_shortcode_team_shortcodes' ) ) {
	function setsail_core_add_shortcode_team_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'SetSailCore\CPT\Shortcodes\ShortcodeTeam\ShortcodeTeam',
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'setsail_core_filter_add_vc_shortcode', 'setsail_core_add_shortcode_team_shortcodes' );
}

if ( ! function_exists( 'setsail_core_set_shortcode_team_custom_style_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom css style for shortcode_team shortcode
	 */
	function setsail_core_set_shortcode_team_custom_style_for_vc_shortcodes( $style ) {
		$current_style = '.vc_shortcodes_container.wpb_qodef_shortcode_team_tab { 
			background-color: #f4f4f4; 
		}';
		
		$style .= $current_style;
		
		return $style;
	}
	
	add_filter( 'setsail_core_filter_add_vc_shortcodes_custom_style', 'setsail_core_set_shortcode_team_custom_style_for_vc_shortcodes' );
}

if ( ! function_exists( 'setsail_core_set_shortcode_team_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for shortcode_team shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function setsail_core_set_shortcode_team_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-shortcode_team';

		return $shortcodes_icon_class_array;
	}
	
	add_filter( 'setsail_core_filter_add_vc_shortcodes_custom_icon_class', 'setsail_core_set_shortcode_team_icon_class_name_for_vc_shortcodes' );
}

if (!function_exists('setsail_core_set_shortcode_team_assets')) {
    /**
     * Function that set custom icon class name for hivegallery shortcode to set our icon for Visual Composer shortcodes panel
     */
    function setsail_core_set_shortcode_team_assets()
    {
        wp_register_script('shortcode_team_js', plugins_url('/assets/js/modules/shortcode_team.js', __FILE__), array('jquery'), '1.0', true);
        wp_register_style('shortcode_team_css', plugins_url('/assets/css/shortcode_team.css', __FILE__), ['bootstrap']);
    }

    add_filter('init', 'setsail_core_set_shortcode_team_assets');
}