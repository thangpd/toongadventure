<div class="<?php echo esc_attr( $blog_classes ) ?>" <?php echo esc_attr( $blog_data_params ) ?>>
	<div class="qodef-blog-holder-inner qodef-outer-space qodef-masonry-list-wrapper">
		<div class="qodef-masonry-grid-sizer"></div>
		<div class="qodef-masonry-grid-gutter"></div>
		<?php
		if ( $blog_query->have_posts() ) : while ( $blog_query->have_posts() ) : $blog_query->the_post();
			setsail_select_get_post_format_html( $blog_type );
		endwhile;
		else:
			setsail_select_get_module_template_part( 'templates/parts/no-posts', 'blog' );
		endif;
		
		wp_reset_postdata();
		?>
	</div>
	<?php setsail_select_get_module_template_part( 'templates/parts/pagination/pagination', 'blog', '', $params ); ?>
</div>