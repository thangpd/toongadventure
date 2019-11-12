<?php
/**
 * Functions for Facebook login
 */

if ( ! function_exists( 'setsail_membership_get_facebook_social_login' ) ) {
	/**
	 * Render form for facebook login
	 */
	function setsail_membership_get_facebook_social_login() {
		$social_login_enabled   = setsail_select_options()->getOptionValue( 'enable_social_login' ) == 'yes' ? true : false;
		$facebook_login_enabled = setsail_select_options()->getOptionValue( 'enable_facebook_social_login' ) == 'yes' ? true : false;
		$enabled                = ( $social_login_enabled && $facebook_login_enabled ) ? true : false;
		
		if ( ! is_user_logged_in() && $enabled ) {
			
			$html = '<form class="qodef-facebook-login-holder">'
			        . wp_nonce_field( 'qodef_validate_facebook_login', 'qodef_nonce_facebook_login_' . rand(), true, false ) .
			        setsail_select_get_button_html( array(
				        'html_type'              => 'button',
				        'custom_class'           => 'qodef-facebook-login',
				        'size'                   => 'small',
				        'text'                   => 'FACEBOOK',
				        'background_color'       => '#3b5998',
				        'border_color'           => '#3b5998',
				        'hover_background_color' => '#4363A5',
				        'hover_border_color'     => '#4363A5'
			        ) ) .
			        '</form>';
			echo setsail_select_get_module_part($html);
		}
	}
	
	add_action( 'setsail_membership_social_network_login', 'setsail_membership_get_facebook_social_login' );
}

if ( ! function_exists( 'setsail_membership_check_facebook_user' ) ) {
	/**
	 * Function for getting facebook user data.
	 * Checks for user mail and register or log in user
	 */
	function setsail_membership_check_facebook_user() {
		
		if ( isset( $_POST['response'] ) ) {
			$response            = $_POST['response'];
			$user_email          = $response['email'];
			$network             = 'facebook';
			$response['network'] = $network;
			$nonce               = $response['nonce'];
			
			if ( email_exists( $user_email ) ) {
				//User already exist, log in user
				setsail_membership_login_user_from_social_network( $user_email, $nonce, $network );
			} else {
				//Register new user
				setsail_membership_register_user_from_social_network( $response );
			}
			$url = setsail_membership_get_dashboard_page_url();
			if ( $url == '' ) {
				$url = esc_url( home_url( '/' ) );
			}
			setsail_membership_ajax_response( 'success', esc_html__( 'Login successful, redirecting...', 'setsail-membership' ), $url );
		}
		
		wp_die();
	}
	
	add_action( 'wp_ajax_setsail_membership_check_facebook_user', 'setsail_membership_check_facebook_user' );
	add_action( 'wp_ajax_nopriv_setsail_membership_check_facebook_user', 'setsail_membership_check_facebook_user' );
}