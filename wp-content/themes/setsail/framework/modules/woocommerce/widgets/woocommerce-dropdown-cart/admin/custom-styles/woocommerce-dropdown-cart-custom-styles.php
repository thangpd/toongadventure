<?php

if ( ! function_exists( 'setsail_select_dropdown_cart_icon_styles' ) ) {
	/**
	 * Generates styles for dropdown cart icon
	 */
	function setsail_select_dropdown_cart_icon_styles() {
		$icon_color       = setsail_select_options()->getOptionValue( 'dropdown_cart_icon_color' );
		$icon_hover_color = setsail_select_options()->getOptionValue( 'dropdown_cart_hover_color' );
		
		if ( ! empty( $icon_color ) ) {
			echo setsail_select_dynamic_css( '.qodef-shopping-cart-holder .qodef-header-cart a', array( 'color' => $icon_color ) );
		}
		
		if ( ! empty( $icon_hover_color ) ) {
			echo setsail_select_dynamic_css( '.qodef-shopping-cart-holder .qodef-header-cart a:hover', array( 'color' => $icon_hover_color ) );
		}
	}
	
	add_action( 'setsail_select_action_style_dynamic', 'setsail_select_dropdown_cart_icon_styles' );
}