<div class="qodef-fullscreen-search-holder">
	<a <?php setsail_select_class_attribute( $search_close_icon_class ); ?> href="javascript:void(0)">
		<?php echo setsail_select_get_icon_sources_html( 'search', true, array( 'search' => 'yes' ) ); ?>
	</a>
	<div class="qodef-fullscreen-search-table">
		<div class="qodef-fullscreen-search-cell">
			<div class="qodef-fullscreen-search-inner">
				<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="qodef-fullscreen-search-form" method="get">
					<div class="qodef-form-holder">
						<div class="qodef-form-holder-inner">
							<div class="qodef-field-holder qodef-flp-search-field-holder" data-post-type="tour-item">
								<input type="text" class="qodef-search-field" placeholder="<?php esc_attr_e( 'Search...', 'setsail' ); ?>" name="s" autocomplete="off"/>
								<button type="submit" class="qodef-search-submit"><?php esc_html_e( 'Find Now', 'setsail' ); ?></button>
							</div>
							<div class="qodef-flp-search-results"></div>
							<?php wp_nonce_field( 'qodef_fullscreen_search_post_types_nonce', 'qodef_fullscreen_search_post_types_nonce' ); ?>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>