<div class="qodef-membership-dashboard-page">
	<div class="qodef-membership-dashboard-page-content">
		<div class="qodef-profile-image">
            <?php echo setsail_membership_kses_img( $profile_image ); ?>
        </div>
		<div class="qodef-profile-info">
			<h3 class="qodef-pi-title"><?php esc_html_e( 'Profile', 'setsail-membership' ); ?></h3>
			
			<p>
				<span class="qodef-pi-label"><?php esc_html_e( 'First Name', 'setsail-membership' ); ?>:</span>
				<span class="qodef-pi-content"><?php echo setsail_select_get_module_part($first_name); ?></span>
			</p>
			<p>
				<span class="qodef-pi-label"><?php esc_html_e( 'Last Name', 'setsail-membership' ); ?>:</span>
				<span class="qodef-pi-content"><?php echo setsail_select_get_module_part($last_name); ?></span>
			</p>
			<p>
				<span class="qodef-pi-label"><?php esc_html_e( 'Email', 'setsail-membership' ); ?>:</span>
				<span class="qodef-pi-content"><?php echo setsail_select_get_module_part($email); ?></span>
			</p>
			<p>
				<span class="qodef-pi-label"><?php esc_html_e( 'Website', 'setsail-membership' ); ?>:</span>
				<span class="qodef-pi-content"><a href="<?php echo esc_url( $website ); ?>" target="_blank"><?php echo setsail_select_get_module_part($website); ?></a></span>
			</p>
			<p>
				<span class="qodef-pi-label"><?php esc_html_e( 'Description', 'setsail-membership' ); ?>:</span>
				<span class="qodef-pi-content"><?php echo setsail_select_get_module_part($description); ?></span>
			</p>
			
	        <?php do_action('setsail_membership_action_dashboard_additional_user_fields');?>
		</div>
	</div>
</div>
