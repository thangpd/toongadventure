<?php

if ( ! function_exists( 'setsail_select_register_blog_masonry_template_file' ) ) {
	/**
	 * Function that register blog masonry template
	 */
	function setsail_select_register_blog_masonry_template_file( $templates ) {
		$templates['blog-masonry'] = esc_html__( 'Blog: Masonry', 'setsail' );
		
		return $templates;
	}
	
	add_filter( 'setsail_select_filter_register_blog_templates', 'setsail_select_register_blog_masonry_template_file' );
}

if ( ! function_exists( 'setsail_select_set_blog_masonry_type_global_option' ) ) {
	/**
	 * Function that set blog list type value for global blog option map
	 */
	function setsail_select_set_blog_masonry_type_global_option( $options ) {
		$options['masonry'] = esc_html__( 'Blog: Masonry', 'setsail' );
		
		return $options;
	}
	
	add_filter( 'setsail_select_filter_blog_list_type_global_option', 'setsail_select_set_blog_masonry_type_global_option' );
}