<?php get_header(); ?>
<?php setsail_select_get_title(); ?>
<?php do_action('setsail_select_action_before_main_content'); ?>
<div class="qodef-container">
	<div class="qodef-container-inner clearfix">
		<div class="qodef-tours-checkout-page-holder">
				<?php if(have_posts()) : while(have_posts()) :  the_post(); ?>
					<div class="qodef-tours-checkout-page-content">
						<?php the_content(); ?>
					</div>
					
					<?php echo setsail_tours_get_checkout_page_content(); ?>
				<?php endwhile; endif; ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
