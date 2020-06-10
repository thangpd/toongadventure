<?php
/**
 * Options map file
 */

if ( ! function_exists( 'setsail_membership_options_map' ) ) {
	function setsail_membership_options_map( $page ) {
		
		if ( setsail_membership_theme_installed() ) {
			
			$panel_social_login = setsail_select_add_admin_panel(
				array(
					'page'  => $page,
					'name'  => 'panel_social_login',
					'title' => esc_html__( 'Enable Social Login', 'setsail-membership' )
				)
			);
			
			setsail_select_add_admin_field(
				array(
					'type'          => 'yesno',
					'name'          => 'enable_social_login',
					'default_value' => 'no',
					'label'         => esc_html__( 'Enable Social Login', 'setsail-membership' ),
					'description'   => esc_html__( 'Enabling this option will allow login from social networks of your choice', 'setsail-membership' ),
					'parent'        => $panel_social_login
				)
			);
			
			$panel_enable_social_login = setsail_select_add_admin_panel(
				array(
					'page'       => $page,
					'name'       => 'panel_enable_social_login',
					'title'      => esc_html__( 'Enable Login via', 'setsail-membership' ),
					'dependency' => array(
						'show' => array(
							'enable_social_login' => 'yes'
						)
					)
				)
			);
			
			setsail_select_add_admin_field(
				array(
					'type'          => 'yesno',
					'name'          => 'enable_facebook_social_login',
					'default_value' => 'no',
					'label'         => esc_html__( 'Facebook', 'setsail-membership' ),
					'description'   => esc_html__( 'Enabling this option will allow login via Facebook', 'setsail-membership' ),
					'parent'        => $panel_enable_social_login
				)
			);
			
			$enable_facebook_social_login_container = setsail_select_add_admin_container(
				array(
					'name'       => 'enable_facebook_social_login_container',
					'parent'     => $panel_enable_social_login,
					'dependency' => array(
						'show' => array(
							'enable_facebook_social_login' => 'yes'
						)
					)
				)
			);
			
			setsail_select_add_admin_field(
				array(
					'type'          => 'text',
					'name'          => 'enable_facebook_login_fbapp_id',
					'default_value' => '',
					'label'         => esc_html__( 'Facebook App ID', 'setsail-membership' ),
					'description'   => esc_html__( 'Copy your application ID form created Facebook Application', 'setsail-membership' ),
					'parent'        => $enable_facebook_social_login_container
				)
			);
			
			setsail_select_add_admin_field(
				array(
					'type'          => 'yesno',
					'name'          => 'enable_google_social_login',
					'default_value' => 'no',
					'label'         => esc_html__( 'Google+', 'setsail-membership' ),
					'description'   => esc_html__( 'Enabling this option will allow login via Google+', 'setsail-membership' ),
					'parent'        => $panel_enable_social_login
				)
			);
			
			$enable_google_social_login_container = setsail_select_add_admin_container(
				array(
					'name'       => 'enable_google_social_login_container',
					'parent'     => $panel_enable_social_login,
					'dependency' => array(
						'show' => array(
							'enable_google_social_login' => 'yes'
						)
					)
				)
			);
			
			setsail_select_add_admin_field(
				array(
					'type'          => 'text',
					'name'          => 'enable_google_login_client_id',
					'default_value' => '',
					'label'         => esc_html__( 'Client ID', 'setsail-membership' ),
					'description'   => esc_html__( 'Copy your Client ID form created Google Application', 'setsail-membership' ),
					'parent'        => $enable_google_social_login_container
				)
			);
		}
	}
	
	add_action( 'setsail_select_action_social_options', 'setsail_membership_options_map' );
}
