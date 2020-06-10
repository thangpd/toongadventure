<?php


if ( ! function_exists( 'setsail_core_add_slicksyncing_shortcodes' ) ) {
	function setsail_core_add_slicksyncing_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'SetSailCore\CPT\Shortcodes\Slicksyncing\Slicksyncing',
		);

		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );

		return $shortcodes_class_name;
	}

	add_filter( 'setsail_core_filter_add_vc_shortcode', 'setsail_core_add_slicksyncing_shortcodes' );
}

if ( ! function_exists( 'setsail_core_set_slicksyncing_custom_style_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom css style for slicksyncing shortcode
	 */
	function setsail_core_set_slicksyncing_custom_style_for_vc_shortcodes( $style ) {
		$current_style = '.vc_shortcodes_container.wpb_qodef_slicksyncing_tab { 
			background-color: #f4f4f4; 
		}';

		$style .= $current_style;

		return $style;
	}

	add_filter( 'setsail_core_filter_add_vc_shortcodes_custom_style', 'setsail_core_set_slicksyncing_custom_style_for_vc_shortcodes' );
}

if ( ! function_exists( 'setsail_core_set_slicksyncing_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for slicksyncing shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function setsail_core_set_slicksyncing_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-slicksyncing';

		return $shortcodes_icon_class_array;
	}

	add_filter( 'setsail_core_filter_add_vc_shortcodes_custom_icon_class', 'setsail_core_set_slicksyncing_icon_class_name_for_vc_shortcodes' );
}

if ( ! function_exists( 'setsail_core_set_slicksyncing_assets' ) ) {
	/**
	 * Function that set custom icon class name for hivegallery shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function setsail_core_set_slicksyncing_assets() {
		wp_register_script( 'slicksyncing_js', plugins_url( '/assets/js/slicksyncing.js', __FILE__ ), array(
			'jquery',
			'slick'
		), '1.0', true );
		wp_register_style( 'slicksyncing_css', plugins_url( '/assets/css/slicksyncing.css', __FILE__ ), [] );
	}

	add_filter( 'init', 'setsail_core_set_slicksyncing_assets' );
}

if ( ! function_exists( 'setsail_core_slicksyncing_get_grading_tour' ) && defined( 'SETSAIL_TOURS_MAIN_FILE_PATH' ) ) {
	function setsail_core_slicksyncing_get_grading_tour() {
		$res = [];
		if ( $_GET['data'] ) {
			$res['level'] = setsail_tours_get_grading_tour( $_GET['data'] );
			$res['level'] -= 1;
			$res['data']  = ( $_GET['data'] );
		}
		echo json_encode( $res );

		die;

	}

	add_action( 'wp_ajax_setsail_core_slicksyncing_get_grading_tour', 'setsail_core_slicksyncing_get_grading_tour' );
	add_action( 'wp_ajax_nopriv__setsail_core_slicksyncing_get_grading_tour', 'setsail_core_slicksyncing_get_grading_tour' );
}

