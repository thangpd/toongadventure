<?php

if ( ! function_exists( 'setsail_select_get_blog_holder_params' ) ) {
	/**
	 * Function that generates params for holders on blog templates
	 */
	function setsail_select_get_blog_holder_params( $params ) {
		$params_list = array();
		
		$masonry_layout = setsail_select_get_meta_field_intersect( 'blog_masonry_layout' );
		if ( $masonry_layout === 'in-grid' ) {
			$params_list['holder'] = 'qodef-container';
			$params_list['inner']  = 'qodef-container-inner clearfix';
		} else {
			$params_list['holder'] = 'qodef-full-width';
			$params_list['inner']  = 'qodef-full-width-inner';
		}
		
		return $params_list;
	}
	
	add_filter( 'setsail_select_filter_blog_holder_params', 'setsail_select_get_blog_holder_params' );
}

if ( ! function_exists( 'setsail_select_get_blog_list_classes' ) ) {
	/**
	 * Function that generates blog list holder classes for blog list templates
	 */
	function setsail_select_get_blog_list_classes( $classes ) {
		$list_classes   = array();
		$list_classes[] = 'qodef-grid-list qodef-grid-masonry-list';
		
		$number_of_columns = setsail_select_get_meta_field_intersect( 'blog_masonry_number_of_columns' );
		if ( ! empty( $number_of_columns ) ) {
			$list_classes[] = 'qodef-' . $number_of_columns . '-columns';
		}
		
		$space_between_items = setsail_select_get_meta_field_intersect( 'blog_masonry_space_between_items' );
		if ( ! empty( $space_between_items ) ) {
			$list_classes[] = 'qodef-' . $space_between_items . '-space';
		}
		
		$masonry_layout = setsail_select_get_meta_field_intersect( 'blog_masonry_layout' );
		$list_classes[] = 'qodef-blog-masonry-' . $masonry_layout;
		
		if ( $masonry_layout === 'full-width') {
			$list_classes[] = 'qodef-columns-has-side-space';
		}
		
		$classes = array_merge( $classes, $list_classes );
		
		return $classes;
	}
	
	add_filter( 'setsail_select_filter_blog_list_classes', 'setsail_select_get_blog_list_classes' );
}

if ( ! function_exists( 'setsail_select_blog_part_params' ) ) {
	function setsail_select_blog_part_params( $params ) {
		$part_params              = array();
		$part_params['title_tag'] = 'h4';
		$part_params['link_tag']  = 'span';
		$part_params['quote_tag'] = 'span';
		
		return array_merge( $params, $part_params );
	}
	
	add_filter( 'setsail_select_filter_blog_part_params', 'setsail_select_blog_part_params' );
}