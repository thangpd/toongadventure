<?php

if ( ! function_exists( 'setsail_select_add_product_list_shortcode' ) ) {
	function setsail_select_add_product_list_shortcode( $shortcodes_class_name ) {
		$shortcodes = array(
			'SetSailCore\CPT\Shortcodes\ProductList\ProductList',
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'setsail_core_filter_add_vc_shortcode', 'setsail_select_add_product_list_shortcode' );
}

if ( ! function_exists( 'setsail_select_set_product_list_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for product list shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function setsail_select_set_product_list_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-product-list';
		
		return $shortcodes_icon_class_array;
	}
	
	add_filter( 'setsail_core_filter_add_vc_shortcodes_custom_icon_class', 'setsail_select_set_product_list_icon_class_name_for_vc_shortcodes' );
}

if ( ! function_exists( 'setsail_select_add_product_list_into_shortcodes_list' ) ) {
	function setsail_select_add_product_list_into_shortcodes_list( $woocommerce_shortcodes ) {
		$woocommerce_shortcodes[] = 'qodef_product_list';
		
		return $woocommerce_shortcodes;
	}
	
	add_filter( 'setsail_select_filter_woocommerce_shortcodes_list', 'setsail_select_add_product_list_into_shortcodes_list' );
}