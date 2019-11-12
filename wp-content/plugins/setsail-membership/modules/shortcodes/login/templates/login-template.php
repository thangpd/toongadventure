<div class="qodef-social-login-holder">
    <div class="qodef-social-login-holder-inner">
        <form method="post" class="qodef-login-form">
            <?php
            $redirect = '';
            if ( isset( $_GET['redirect_uri'] ) ) {
                $redirect = $_GET['redirect_uri'];
            } ?>
	        <h4 class="qodef-login-title"><?php esc_html_e('Sign In Here!', 'setsail-membership'); ?></h4>
	        <p class="qodef-login-description"><?php esc_html_e('Log into your account in just a few simple steps.', 'setsail-membership'); ?></p>
            <fieldset>
                <div>
	                <span class="qodef-login-icon icon_profile"></span>
                    <input type="text" name="user_login_name" id="user_login_name" placeholder="<?php esc_attr_e( 'User Name', 'setsail-membership' ) ?>" value="" required pattern=".{3,}" title="<?php esc_attr_e( 'Three or more characters', 'setsail-membership' ); ?>"/>
                </div>
                <div>
	                <span class="qodef-login-icon icon_lock_alt"></span>
                    <input type="password" name="user_login_password" id="user_login_password" placeholder="<?php esc_attr_e( 'Password', 'setsail-membership' ) ?>" value="" required/>
                </div>
                <div class="qodef-lost-pass-remember-holder clearfix">
                    <span class="qodef-login-remember">
                        <input name="rememberme" value="forever" id="rememberme" type="checkbox"/>
                        <label for="rememberme" class="qodef-checbox-label"><?php esc_html_e( 'Remember me', 'setsail-membership' ) ?></label>
                    </span>
                </div>
                <input type="hidden" name="redirect" id="redirect" value="<?php echo esc_url( $redirect ); ?>">
                <div class="qodef-login-button-holder">
                    <a href="<?php echo wp_lostpassword_url(); ?>" class="qodef-login-action-btn" data-el="#qodef-reset-pass-content" data-title="<?php esc_attr_e( 'Lost Password?', 'setsail-membership' ); ?>"><?php esc_html_e( 'Lost Your password?', 'setsail-membership' ); ?></a>
                    <?php
                    if ( setsail_membership_theme_installed() ) {
                        echo setsail_select_get_button_html( array(
                            'html_type' => 'button',
                            'text'      => esc_html__( 'Sign in', 'setsail-membership' ),
                            'type'      => 'solid',
                            'size'      => 'medium'
                        ) );
                    } else {
                        echo '<button type="submit">' . esc_html__( 'Login', 'setsail-membership' ) . '</button>';
                    }
                    ?>
                    <?php wp_nonce_field( 'qodef-ajax-login-nonce', 'qodef-login-security' ); ?>
                </div>
            </fieldset>
        </form>
    </div>
    <?php
    if(setsail_membership_theme_installed()) {
        //if social login enabled add social networks login
        $social_login_enabled = setsail_select_options()->getOptionValue('enable_social_login') == 'yes' ? true : false;
        if($social_login_enabled) { ?>
            <div class="qodef-login-form-social-login">
                <div class="qodef-login-social-title">
                    <?php esc_html_e('Sign in with Facebook or Google+', 'setsail-membership'); ?>
                </div>
            </div>
	        <div class="qodef-login-social-networks">
		        <?php do_action('setsail_membership_social_network_login'); ?>
	        </div>
        <?php }
    }
    do_action( 'setsail_membership_action_login_ajax_response' );
    ?>
</div>