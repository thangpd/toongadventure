<?php get_header();
setsail_select_get_title();
get_template_part( 'slider' );
do_action('setsail_select_action_before_main_content'); ?>
	<div class="qodef-tours-search-page-holder">
		<div class="qodef-container">
			<div class="qodef-container-inner">
				<div class="qodef-grid-row qodef-grid-large-gutter">
					<div class="qodef-tours-search-content-holder">
						<div class="qodef-tours-search-content-inner">
							<?php echo setsail_tours_get_search_ordering_html(); ?>
							<div class="qodef-tours-search-content-wrapper qodef-grid-large-gutter">
								<div class="qodef-grid-col-9">
									<?php echo setsail_tours_get_search_page_content_html(); ?>
									
									<?php echo setsail_tours_get_search_pagination(); ?>
								</div>
								<div class="qodef-grid-col-3">
									<aside class="qodef-sidebar">
										<div class="widget qodef-tours-main-search-filters">
											<?php echo setsail_tours_get_search_main_filters_html(); ?>
										</div>
										<?php dynamic_sidebar('tour-search-sidebar'); ?>
									</aside>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>
