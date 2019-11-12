<?php
get_header();
if ( setsail_membership_theme_installed() ) {
	setsail_select_get_title();
} else { ?>
	<div class="qodef-membership-title">
		<?php the_title( '<h1>', '</h1>' ); ?>
	</div>
<?php }
do_action('setsail_select_action_before_main_content');
?>
	<div class="qodef-container">
		<?php do_action( 'setsail_select_after_container_open' ); ?>
		<div class="qodef-container-inner clearfix">
            <div class="qodef-membership-main-wrapper clearfix">
                <?php if ( is_user_logged_in() ) { ?>
                    <div class="qodef-membership-dashboard-nav-holder clearfix">
                        <?php
                        //Include dashboard navigation
                        echo setsail_membership_get_dashboard_template_part( 'navigation' );
                        ?>
                    </div>
                    <div class="qodef-membership-dashboard-content-holder">
                        <?php echo setsail_membership_get_dashboard_pages(); ?>
                    </div>
                <?php } else { ?>
                    <div class="qodef-login-register-content qodef-user-not-logged-in">
                        <ul>
                            <li>
                                <a href="#qodef-login-content"><?php esc_html_e( 'Login', 'setsail-membership' ); ?></a>
                            </li>
                            <li>
                                <a href="#qodef-register-content"><?php esc_html_e( 'Register', 'setsail-membership' ); ?></a>
                            </li>
                            <li>
                                <a href="#qodef-reset-pass-content"><?php esc_html_e( 'Reset', 'setsail-membership' ); ?></a>
                            </li>
                        </ul>
                        <div class="qodef-login-content-inner" id="qodef-login-content">
                            <div
                                class="qodef-wp-login-holder"><?php echo setsail_membership_execute_shortcode( 'qodef_user_login', array() ); ?>
                            </div>
                        </div>
                        <div class="qodef-register-content-inner" id="qodef-register-content">
                            <div
                                class="qodef-wp-register-holder"><?php echo setsail_membership_execute_shortcode( 'qodef_user_register', array() ) ?>
                            </div>
                        </div>
                        <div class="qodef-reset-pass-content-inner" id="qodef-reset-pass-content">
                            <div
                                class="qodef-wp-reset-pass-holder"><?php echo setsail_membership_execute_shortcode( 'qodef_user_reset_password', array() ) ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
		</div>
		<?php do_action( 'setsail_select_before_container_close' ); ?>
	</div>
<?php get_footer(); ?>