<?php
/**
 * Plugin Name: SetSail Membership
 * Description: Plugin that adds social login and user dashboard page
 * Author: Select Themes
 * Version: 1.0.1
 */

require_once 'load.php';

if ( ! function_exists( 'setsail_membership_text_domain' ) ) {
	/**
	 * Loads plugin text domain so it can be used in translation
	 */
	function setsail_membership_text_domain() {
		load_plugin_textdomain( 'setsail-membership', false, SETSAIL_MEMBERSHIP_REL_PATH . '/languages' );
	}
	
	add_action( 'plugins_loaded', 'setsail_membership_text_domain' );
}

if ( ! function_exists( 'setsail_membership_scripts' ) ) {
	/**
	 * Loads plugin scripts
	 */
	function setsail_membership_scripts() {
		wp_enqueue_style( 'setsail-membership-style', plugins_url( SETSAIL_MEMBERSHIP_REL_PATH . '/assets/css/membership.min.css' ) );
		if ( function_exists( 'setsail_select_is_responsive_on' ) && setsail_select_is_responsive_on() ) {
			wp_enqueue_style( 'setsail-membership-responsive-style', plugins_url( SETSAIL_MEMBERSHIP_REL_PATH . '/assets/css/membership-responsive.min.css' ) );
		}
		
		//include google+ api
		wp_enqueue_script( 'setsail-membership-google-plus-api', 'https://apis.google.com/js/platform.js', array(), null, false );
		
		//underscore for facebook and google login
		//tabs for login widget
		$array_deps = array(
			'underscore',
			'jquery-ui-tabs'
		);
		
		if ( setsail_membership_theme_installed() ) {
			$array_deps[] = 'setsail-select-modules';
		}
		
		wp_enqueue_script( 'setsail-membership-script', plugins_url( SETSAIL_MEMBERSHIP_REL_PATH . '/assets/js/membership.min.js' ), $array_deps, false, true );
	}
	
	add_action( 'wp_enqueue_scripts', 'setsail_membership_scripts' );
}

if ( ! function_exists( 'setsail_membership_style_dynamics_deps' ) ) {
	function setsail_membership_style_dynamics_deps( $deps ) {
		$style_dynamic_deps_array   = array();
		$style_dynamic_deps_array[] = 'setsail-membership-style';
		
		if ( function_exists( 'setsail_select_is_responsive_on' ) && setsail_select_is_responsive_on() ) {
			$style_dynamic_deps_array[] = 'setsail-membership-responsive-style';
		}
		
		return array_merge( $deps, $style_dynamic_deps_array );
	}
	
	add_filter( 'setsail_select_filter_style_dynamic_deps', 'setsail_membership_style_dynamics_deps' );
}

if ( ! function_exists( 'setsail_membership_render_login_form' ) ) {
	function setsail_membership_render_login_form() {
		
		if ( ! is_user_logged_in() ) {
			//Render modal with login and register forms
			echo setsail_membership_get_module_template_part( 'widgets', 'login-widget', 'login-modal-template' );
		}
	}
	
	add_action( 'wp_footer', 'setsail_membership_render_login_form' );
}
