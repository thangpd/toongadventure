<ul class="qodef-membership-dashboard-nav clearfix">
	<?php
	$nav_items = setsail_membership_get_dashboard_navigation_items();
	$user_action = isset($_GET['user-action']) ? $_GET['user-action'] : 'profile';
	foreach ( $nav_items as $nav_item ) { ?>
		<li <?php if($user_action == $nav_item['user_action']){ echo 'class="qodef-active-dash"'; } ?>>
			<a href="<?php echo setsail_select_get_module_part($nav_item['url']); ?>">
                <?php if(isset($nav_item['icon'])){ ?>
                    <span class="qodef-dash-icon">
						<?php echo setsail_select_get_module_part($nav_item['icon']); ?>
					</span>
                <?php } ?>
                <span class="qodef-dash-label">
				    <?php echo setsail_select_get_module_part($nav_item['text']); ?>
                </span>
			</a>
		</li>
	<?php } ?>
	<li>
		<a href="<?php echo wp_logout_url( home_url( '/' ) ); ?>">
             <span class="qodef-dash-icon">
                <i class="icon_upload" aria-hidden="true"></i>
            </span>
			<?php esc_html_e( 'Log out', 'setsail-membership' ); ?>
		</a>
	</li>
</ul>