<?php

if ( ! function_exists( 'setsail_select_register_header_standard_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function setsail_select_register_header_standard_type( $header_types ) {
		$header_type = array(
			'header-standard' => 'SetSailSelectNamespace\Modules\Header\Types\HeaderStandard'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'setsail_select_init_register_header_standard_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function setsail_select_init_register_header_standard_type() {
		add_filter( 'setsail_select_filter_register_header_type_class', 'setsail_select_register_header_standard_type' );
	}
	
	add_action( 'setsail_select_action_before_header_function_init', 'setsail_select_init_register_header_standard_type' );
}