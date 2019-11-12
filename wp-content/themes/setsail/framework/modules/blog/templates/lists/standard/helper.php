<?php

if ( ! function_exists( 'setsail_select_get_blog_holder_params' ) ) {
	/**
	 * Function that generates params for holders on blog templates
	 */
	function setsail_select_get_blog_holder_params( $params ) {
		$params_list = array();
		
		$params_list['holder'] = 'qodef-container';
		$params_list['inner']  = 'qodef-container-inner clearfix';
		
		return $params_list;
	}
	
	add_filter( 'setsail_select_filter_blog_holder_params', 'setsail_select_get_blog_holder_params' );
}

if ( ! function_exists( 'setsail_select_blog_part_params' ) ) {
	function setsail_select_blog_part_params( $params ) {
		
		$part_params              = array();
		$part_params['title_tag'] = 'h2';
		$part_params['link_tag']  = 'span';
		$part_params['quote_tag'] = 'span';
		
		return array_merge( $params, $part_params );
	}
	
	add_filter( 'setsail_select_filter_blog_part_params', 'setsail_select_blog_part_params' );
}