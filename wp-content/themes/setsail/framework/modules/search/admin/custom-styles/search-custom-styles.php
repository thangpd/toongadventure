<?php

if ( ! function_exists( 'setsail_select_search_opener_icon_size' ) ) {
	function setsail_select_search_opener_icon_size() {
		$icon_size = setsail_select_options()->getOptionValue( 'header_search_icon_size' );
		
		if ( ! empty( $icon_size ) ) {
			echo setsail_select_dynamic_css( '.qodef-search-opener', array(
				'font-size' => setsail_select_filter_px( $icon_size ) . 'px'
			) );
		}
	}
	
	add_action( 'setsail_select_action_style_dynamic', 'setsail_select_search_opener_icon_size' );
}

if ( ! function_exists( 'setsail_select_search_opener_icon_colors' ) ) {
	function setsail_select_search_opener_icon_colors() {
		$icon_color       = setsail_select_options()->getOptionValue( 'header_search_icon_color' );
		$icon_hover_color = setsail_select_options()->getOptionValue( 'header_search_icon_hover_color' );
		
		if ( ! empty( $icon_color ) ) {
			echo setsail_select_dynamic_css( '.qodef-search-opener', array(
				'color' => $icon_color
			) );
		}
		
		if ( ! empty( $icon_hover_color ) ) {
			echo setsail_select_dynamic_css( '.qodef-search-opener:hover', array(
				'color' => $icon_hover_color
			) );
		}
	}
	
	add_action( 'setsail_select_action_style_dynamic', 'setsail_select_search_opener_icon_colors' );
}

if ( ! function_exists( 'setsail_select_search_opener_text_styles' ) ) {
	function setsail_select_search_opener_text_styles() {
		$item_styles = setsail_select_get_typography_styles( 'search_icon_text' );
		
		$item_selector = array(
			'.qodef-search-icon-text'
		);
		
		echo setsail_select_dynamic_css( $item_selector, $item_styles );
		
		$text_hover_color = setsail_select_options()->getOptionValue( 'search_icon_text_color_hover' );
		
		if ( ! empty( $text_hover_color ) ) {
			echo setsail_select_dynamic_css( '.qodef-search-opener:hover .qodef-search-icon-text', array(
				'color' => $text_hover_color
			) );
		}
	}
	
	add_action( 'setsail_select_action_style_dynamic', 'setsail_select_search_opener_text_styles' );
}