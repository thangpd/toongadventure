<?php

if ( ! function_exists( 'setsail_select_set_title_standard_type_for_options' ) ) {
	/**
	 * This function set standard title type value for title options map and meta boxes
	 */
	function setsail_select_set_title_standard_type_for_options( $type ) {
		$type['standard'] = esc_html__( 'Standard', 'setsail' );
		
		return $type;
	}
	
	add_filter( 'setsail_select_filter_title_type_global_option', 'setsail_select_set_title_standard_type_for_options' );
	add_filter( 'setsail_select_filter_title_type_meta_boxes', 'setsail_select_set_title_standard_type_for_options' );
}

if ( ! function_exists( 'setsail_select_set_title_standard_type_as_default_options' ) ) {
	/**
	 * This function set default title type value for global title option map
	 */
	function setsail_select_set_title_standard_type_as_default_options( $type ) {
		$type = 'standard';
		
		return $type;
	}
	
	add_filter( 'setsail_select_filter_default_title_type_global_option', 'setsail_select_set_title_standard_type_as_default_options' );
}