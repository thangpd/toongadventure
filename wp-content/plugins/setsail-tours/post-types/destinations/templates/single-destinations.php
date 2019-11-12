<?php
$setsail_sidebar_layout = setsail_select_sidebar_layout();
$qodef_grid_space_meta = setsail_select_get_meta_field_intersect( 'page_grid_space' );
$qodef_holder_classes  = ! empty( $qodef_grid_space_meta ) ? 'qodef-grid-' . $qodef_grid_space_meta . '-gutter' : '';

get_header();
setsail_select_get_title();
get_template_part( 'slider' );
do_action('setsail_select_action_before_main_content');
?>

<div class="qodef-container qodef-default-page-template">
	<?php do_action( 'setsail_select_action_after_container_open' ); ?>
	
	<div class="qodef-container-inner clearfix">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="qodef-grid-row <?php echo esc_attr( $qodef_holder_classes ); ?>">
				<div <?php echo setsail_select_get_content_sidebar_class(); ?>>
					<?php
						the_content();
						do_action( 'setsail_select_action_page_after_content' );
					?>
				</div>
				<?php if ( $setsail_sidebar_layout !== 'no-sidebar' ) { ?>
					<div <?php echo setsail_select_get_sidebar_holder_class(); ?>>
						<?php get_sidebar(); ?>
					</div>
				<?php } ?>
			</div>
		<?php endwhile; endif; ?>
	</div>
	
	<?php do_action( 'setsail_select_action_before_container_close' ); ?>
</div>

<?php get_footer(); ?>