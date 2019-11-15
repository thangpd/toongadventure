<?php

/*** Child Theme Function  ***/

if ( ! function_exists( 'setsail_select_child_theme_enqueue_scripts' ) ) {
	function setsail_select_child_theme_enqueue_scripts() {
		$parent_style = 'setsail-select-default-style';
		
		wp_enqueue_style( 'setsail-select-child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ) );
	}
	
	add_action( 'wp_enqueue_scripts', 'setsail_select_child_theme_enqueue_scripts' );
}

register_nav_menus( array(
    'top-nav'     	=> esc_html__('Top menu', 'endlesslove' ),
    'main-nav'    	=> esc_html__('Main menu', 'endlesslove' ),
    'sub-nav'    	=> esc_html__('Sub menu', 'endlesslove' ),
    'left-nav'    	=> esc_html__('Left menu', 'endlesslove' ),
    'right-nav'    	=> esc_html__('Right menu', 'endlesslove' ),
    'bottom-nav'  	=> esc_html__('Bottom menu', 'endlesslove' ),
) );



