<?php

/*** Child Theme Function  ***/

if ( ! function_exists( 'setsail_select_child_theme_enqueue_scripts' ) ) {
	function setsail_select_child_theme_enqueue_scripts() {
		$parent_style = 'setsail-select-default-style';
		
		wp_enqueue_style( 'setsail-select-child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ) );
	}
	
	add_action( 'wp_enqueue_scripts', 'setsail_select_child_theme_enqueue_scripts' );
}