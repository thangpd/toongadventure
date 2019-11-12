<?php do_action('setsail_select_action_before_mobile_header'); ?>

<header class="qodef-mobile-header">
	<?php do_action('setsail_select_action_after_mobile_header_html_open'); ?>
	
	<div class="qodef-mobile-header-inner">
		<div class="qodef-mobile-header-holder">
			<div class="qodef-grid">
				<div class="qodef-vertical-align-containers">
					<div class="qodef-position-left"><!--
					 --><div class="qodef-position-left-inner">
							<a href="javascript:void(0)" <?php setsail_select_class_attribute( $fullscreen_menu_icon_class ); ?>>
								<?php if ( ! empty( $mobile_menu_title ) ) { ?>
									<h5 class="qodef-mobile-menu-text"><?php echo esc_attr( $mobile_menu_title ); ?></h5>
								<?php } ?>
								<span class="qodef-mobile-menu-icon">
									<?php echo setsail_select_get_icon_sources_html( 'mobile' ); ?>
								</span>
							</a>
						</div>
					</div>
					<div class="qodef-position-center"><!--
						 --><div class="qodef-position-center-inner">
							<?php setsail_select_get_mobile_logo(); ?>
						</div>
					</div>
					<div class="qodef-position-right"><!--
					 --><div class="qodef-position-right-inner">
								<?php if ( is_active_sidebar( 'qodef-right-from-mobile-logo' ) ) {
									dynamic_sidebar( 'qodef-right-from-mobile-logo' );
								} ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<?php do_action('setsail_select_action_before_mobile_header_html_close'); ?>
</header>

<?php do_action('setsail_select_action_after_mobile_header'); ?>