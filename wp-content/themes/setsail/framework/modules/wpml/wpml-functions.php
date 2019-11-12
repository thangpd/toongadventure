<?php

if ( ! function_exists( 'setsail_select_disable_wpml_css' ) ) {
	function setsail_select_disable_wpml_css() {
		define( 'ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true );
	}
	
	add_action( 'after_setup_theme', 'setsail_select_disable_wpml_css' );
}