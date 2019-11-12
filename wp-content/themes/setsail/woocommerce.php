<?php
/*
Template Name: WooCommerce
*/
?>
<?php
$qodef_sidebar_layout  = setsail_select_sidebar_layout();
$qodef_grid_space_meta = setsail_select_options()->getOptionValue( 'woo_list_grid_space' );
$qodef_holder_classes  = ! empty( $qodef_grid_space_meta ) ? 'qodef-grid-' . $qodef_grid_space_meta . '-gutter' : '';

get_header();
setsail_select_get_title();
get_template_part( 'slider' );
do_action('setsail_select_action_before_main_content');

//Woocommerce content
if ( ! is_singular( 'product' ) ) { ?>
	<div class="qodef-container">
		<div class="qodef-container-inner clearfix">
			<div class="qodef-grid-row <?php echo esc_attr( $qodef_holder_classes ); ?>">
				<div <?php echo setsail_select_get_content_sidebar_class(); ?>>
					<?php setsail_select_woocommerce_content(); ?>
				</div>
				<?php if ( $qodef_sidebar_layout !== 'no-sidebar' ) { ?>
					<div <?php echo setsail_select_get_sidebar_holder_class(); ?>>
						<?php get_sidebar(); ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } else { ?>
	<div class="qodef-container">
		<div class="qodef-container-inner clearfix">
			<?php setsail_select_woocommerce_content(); ?>
		</div>
	</div>
<?php } ?>
<?php get_footer(); ?>