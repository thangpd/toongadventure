<?php

if ( ! function_exists( 'setsail_select_load_search' ) ) {
	function setsail_select_load_search() {
		$search_type = 'fullscreen';
		
		if ( setsail_select_active_widget( false, false, 'qodef_search_opener' ) ) {
			include_once SELECT_FRAMEWORK_MODULES_ROOT_DIR . '/search/types/' . $search_type . '/' . $search_type . '.php';
		}
	}
	
	add_action( 'init', 'setsail_select_load_search' );
}

if ( ! function_exists( 'setsail_select_get_holder_params_search' ) ) {
	/**
	 * Function which return holder class and holder inner class for blog pages
	 */
	function setsail_select_get_holder_params_search() {
		$params_list = array();
		
		$layout = setsail_select_options()->getOptionValue( 'search_page_layout' );
		if ( $layout == 'in-grid' ) {
			$params_list['holder'] = 'qodef-container';
			$params_list['inner']  = 'qodef-container-inner clearfix';
		} else {
			$params_list['holder'] = 'qodef-full-width';
			$params_list['inner']  = 'qodef-full-width-inner';
		}
		
		/**
		 * Available parameters for holder params
		 * -holder
		 * -inner
		 */
		return apply_filters( 'setsail_select_filter_search_holder_params', $params_list );
	}
}

if ( ! function_exists( 'setsail_select_get_search_page' ) ) {
	function setsail_select_get_search_page() {
		$sidebar_layout = setsail_select_sidebar_layout();
		
		$params = array(
			'sidebar_layout' => $sidebar_layout
		);
		
		setsail_select_get_module_template_part( 'templates/holder', 'search', '', $params );
	}
}

if ( ! function_exists( 'setsail_select_get_search_page_layout' ) ) {
	/**
	 * Function which create query for blog lists
	 */
	function setsail_select_get_search_page_layout() {
		global $wp_query;
		$path   = apply_filters( 'setsail_select_filter_search_page_path', 'templates/page' );
		$type   = apply_filters( 'setsail_select_filter_search_page_layout', 'default' );
		$module = apply_filters( 'setsail_select_filter_search_page_module', 'search' );
		$plugin = apply_filters( 'setsail_select_filter_search_page_plugin_override', false );
		
		if ( get_query_var( 'paged' ) ) {
			$paged = get_query_var( 'paged' );
		} elseif ( get_query_var( 'page' ) ) {
			$paged = get_query_var( 'page' );
		} else {
			$paged = 1;
		}
		
		$params = array(
			'type'          => $type,
			'query'         => $wp_query,
			'paged'         => $paged,
			'max_num_pages' => setsail_select_get_max_number_of_pages(),
		);
		
		$params = apply_filters( 'setsail_select_filter_search_page_params', $params );
		
		setsail_select_get_module_template_part( $path . '/' . $type, $module, '', $params, $plugin );
	}
}

if ( ! function_exists( 'setsail_select_get_search_submit_icon_class' ) ) {
	/**
	 * Loads search submit icon class
	 */
	function setsail_select_get_search_submit_icon_class() {
		$classes = array(
			'qodef-search-submit'
		);
		
		$classes[] = setsail_select_get_icon_sources_class( 'search', 'qodef-search-submit' );

		return $classes;
	}
}

if ( ! function_exists( 'setsail_select_get_search_close_icon_class' ) ) {
	/**
	 * Loads search close icon class
	 */
	function setsail_select_get_search_close_icon_class() {
		$classes = array(
			'qodef-search-close'
		);
		
		$classes[] = setsail_select_get_icon_sources_class( 'search', 'qodef-search-close' );

		return $classes;
	}
}