<div class="qodef-grid-row <?php echo esc_attr($holder_classes); ?>">
	<div <?php echo setsail_select_get_content_sidebar_class(); ?>>
		<?php setsail_select_get_blog_type($blog_type); ?>
	</div>
	<?php if($sidebar_layout !== 'no-sidebar') { ?>
		<div <?php echo setsail_select_get_sidebar_holder_class(); ?>>
			<?php get_sidebar(); ?>
		</div>
	<?php } ?>
</div>