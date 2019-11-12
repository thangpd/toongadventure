<div class="qodef-social-register-holder">
	<h4 class="qodef-register-title"><?php esc_html_e('Register Now!', 'setsail-membership'); ?></h4>
	<p class="qodef-register-description"><?php esc_html_e('Join the SetSail community today & set up a free account.', 'setsail-membership'); ?></p>
	<form method="post" class="qodef-register-form">
		<fieldset>
			<div>
				<span class="qodef-register-icon icon_profile"></span>
				<input type="text" name="user_register_name" id="user_register_name" placeholder="<?php esc_attr_e( 'User Name', 'setsail-membership' ) ?>" value="" required
				       pattern=".{3,}" title="<?php esc_attr_e( 'Three or more characters', 'setsail-membership' ); ?>"/>
			</div>
			<div>
				<span class="qodef-register-icon icon_mail_alt"></span>
				<input type="email" name="user_register_email" id="user_register_email" placeholder="<?php esc_attr_e( 'Email', 'setsail-membership' ) ?>" value="" required />
			</div>
            <div>
	            <span class="qodef-register-icon icon_lock_alt"></span>
                <input type="password" name="user_register_password" id="user_register_password" placeholder="<?php esc_attr_e('Password','setsail-membership') ?>" value="" required />
            </div>
            <div>
	            <span class="qodef-register-icon icon_lock_alt"></span>
                <input type="password" name="user_register_confirm_password" id="user_register_confirm_password" placeholder="<?php esc_attr_e('Repeat Password','setsail-membership') ?>" value="" required />
            </div>
            <?php do_action('setsail_membership_additional_registration_field'); ?>
			<div class="qodef-register-button-holder">
				<?php
				if ( setsail_membership_theme_installed() ) {
					echo setsail_select_get_button_html( array(
						'html_type' => 'button',
						'text'      => esc_html__( 'Register', 'setsail-membership' ),
						'type'      => 'solid',
						'size'      => 'medium'
					) );
				} else {
					echo '<button type="submit">' . esc_html__( 'Register', 'setsail-membership' ) . '</button>';
				}
				wp_nonce_field( 'qodef-ajax-register-nonce', 'qodef-register-security' ); ?>
			</div>
		</fieldset>
	</form>
	<?php do_action( 'setsail_membership_action_login_ajax_response' ); ?>
</div>