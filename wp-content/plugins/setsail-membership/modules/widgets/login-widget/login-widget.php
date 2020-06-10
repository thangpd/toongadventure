<?php

class SetSailMembershipLoginRegister extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'qodef_login_register_widget',
			esc_html__( 'SetSail Login Widget', 'setsail-membership' ),
			array( 'description' => esc_html__( 'Login and register membership widget', 'setsail-membership' ) )
		);
	}
	
	public function widget( $args, $instance ) {
		$additional_class = is_user_logged_in() ? 'qodef-user-logged-in' : 'qodef-user-not-logged-in';
		
		echo '<div class="widget qodef-login-register-widget ' . esc_attr( $additional_class ) . '">';
        if ( ! is_user_logged_in() ) {
            echo setsail_membership_get_module_template_part( 'widgets', 'login-widget', 'login-widget-template', 'logged-out' );
        } else {
            echo setsail_membership_get_module_template_part( 'widgets', 'login-widget', 'login-widget-template', 'logged-in' );
        }
		echo '</div>';
	}
}

if ( ! function_exists( 'setsail_membership_login_widget_load' ) ) {
	function setsail_membership_login_widget_load() {
		register_widget( 'SetSailMembershipLoginRegister' );
	}
	
	add_action( 'widgets_init', 'setsail_membership_login_widget_load' );
}

