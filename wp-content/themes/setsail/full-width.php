<?php
/*
Template Name: Full Width Template
*/
?>
<?php
$qodef_sidebar_layout = setsail_select_sidebar_layout();

get_header();
setsail_select_get_title();
get_template_part( 'slider' );
do_action('setsail_select_action_before_main_content');
?>

<div class="qodef-full-width">
    <?php do_action( 'setsail_select_action_after_container_open' ); ?>
	<div class="qodef-full-width-inner">
        <?php do_action( 'setsail_select_action_after_container_inner_open' ); ?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="qodef-grid-row">
				<div <?php echo setsail_select_get_content_sidebar_class(); ?>>
					<?php
						the_content();
						do_action( 'setsail_select_action_page_after_content' );
					?>
				</div>
				<?php if ( $qodef_sidebar_layout !== 'no-sidebar' ) { ?>
					<div <?php echo setsail_select_get_sidebar_holder_class(); ?>>
						<?php get_sidebar(); ?>
					</div>
				<?php } ?>
			</div>
		<?php endwhile; endif; ?>
        <?php do_action( 'setsail_select_action_before_container_inner_close' ); ?>
	</div>

    <?php do_action( 'setsail_select_action_before_container_close' ); ?>
</div>

<?php get_footer(); ?>