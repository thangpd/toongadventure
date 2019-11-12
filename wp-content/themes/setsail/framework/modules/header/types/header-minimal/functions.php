<?php

if ( ! function_exists( 'setsail_select_register_header_minimal_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function setsail_select_register_header_minimal_type( $header_types ) {
		$header_type = array(
			'header-minimal' => 'SetSailSelectNamespace\Modules\Header\Types\HeaderMinimal'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'setsail_select_init_register_header_minimal_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function setsail_select_init_register_header_minimal_type() {
		add_filter( 'setsail_select_filter_register_header_type_class', 'setsail_select_register_header_minimal_type' );
	}
	
	add_action( 'setsail_select_action_before_header_function_init', 'setsail_select_init_register_header_minimal_type' );
}

if ( ! function_exists( 'setsail_select_include_header_minimal_full_screen_menu' ) ) {
	/**
	 * Registers additional menu navigation for theme
	 */
	function setsail_select_include_header_minimal_full_screen_menu( $menus ) {
		$menus['popup-navigation'] = esc_html__( 'Full Screen Navigation', 'setsail' );
		
		return $menus;
	}
	
	if ( setsail_select_check_is_header_type_enabled( 'header-minimal' ) ) {
		add_filter( 'setsail_select_filter_register_headers_menu', 'setsail_select_include_header_minimal_full_screen_menu' );
	}
}

if ( ! function_exists( 'setsail_select_get_fullscreen_menu_icon_class' ) ) {
	/**
	 * Loads full screen menu icon class
	 */
	function setsail_select_get_fullscreen_menu_icon_class() {
		$classes = array(
			'qodef-fullscreen-menu-opener'
		);
		
		$classes[] = setsail_select_get_icon_sources_class( 'fullscreen_menu', 'qodef-fullscreen-menu-opener' );
		
		return $classes;
	}
}