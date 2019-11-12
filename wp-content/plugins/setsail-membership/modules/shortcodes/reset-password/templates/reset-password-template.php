<div class="qodef-social-reset-password-holder">
	<form action="<?php echo site_url( 'wp-login.php?action=lostpassword' ); ?>" method="post" id="qodef-lost-password-form" class="qodef-reset-pass-form">
		<div>
			<input type="text" name="user_reset_password_login" class="qodef-input-field" id="user_reset_password_login" placeholder="<?php esc_attr_e( 'Enter username or email', 'setsail-membership' ) ?>" value="" size="20" required>
		</div>
		<?php do_action( 'lostpassword_form' ); ?>
		<div class="qodef-reset-password-button-holder">
			<?php
			if ( setsail_membership_theme_installed() ) {
				echo setsail_select_get_button_html( array(
					'html_type' => 'button',
					'text'      => esc_html__( 'NEW PASSWORD', 'setsail-membership' ),
					'type'      => 'solid',
					'size'      => 'medium'
				) );
			} else {
				echo '<button type="submit">' . esc_html__( 'NEW PASSWORD', 'setsail-membership' ) . '</button>';
			}
			?>
		</div>
	</form>
	<?php do_action( 'setsail_membership_action_login_ajax_response' ); ?>
</div>