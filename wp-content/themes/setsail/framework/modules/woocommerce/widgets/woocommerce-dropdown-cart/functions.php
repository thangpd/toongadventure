<?php

if ( ! function_exists( 'setsail_select_register_woocommerce_dropdown_cart_widget' ) ) {
	/**
	 * Function that register dropdown cart widget
	 */
	function setsail_select_register_woocommerce_dropdown_cart_widget( $widgets ) {
		$widgets[] = 'SetSailSelectClassWoocommerceDropdownCart';
		
		return $widgets;
	}
	
	add_filter( 'setsail_select_filter_register_widgets', 'setsail_select_register_woocommerce_dropdown_cart_widget' );
}

if ( ! function_exists( 'setsail_select_get_dropdown_cart_icon_class' ) ) {
	/**
	 * Returns dropdow cart icon class
	 */
	function setsail_select_get_dropdown_cart_icon_class() {
		$classes = array(
			'qodef-header-cart'
		);
		
		$classes[] = setsail_select_get_icon_sources_class( 'dropdown_cart', 'qodef-header-cart' );
		
		return $classes;
	}
}