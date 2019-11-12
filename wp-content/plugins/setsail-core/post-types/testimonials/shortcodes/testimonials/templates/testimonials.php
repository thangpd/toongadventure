<div class="qodef-testimonials-holder clearfix <?php echo esc_attr( $holder_classes ); ?>">
	<div class="qodef-testimonials qodef-owl-slider" <?php echo setsail_select_get_inline_attrs( $data_attr ) ?>>
		<?php if ( $query_results->have_posts() ):
			while ( $query_results->have_posts() ) : $query_results->the_post();
				$current_id = get_the_ID();
				$text       = get_post_meta( $current_id, 'qodef_testimonial_text', true );
				$author     = get_post_meta( $current_id, 'qodef_testimonial_author', true );
				?>
				<div class="qodef-testimonial-content">
					<?php if ( has_post_thumbnail() ) { ?>
						<div class="qodef-testimonial-image">
							<?php echo get_the_post_thumbnail( $current_id, array( 144, 144 ) ); ?>
						</div>
					<?php } ?>
					<?php if ( ! empty( $text ) ) { ?>
						<span class="qodef-testimonial-text"><?php echo esc_html( $text ); ?></span>
					<?php } ?>
					<?php if ( ! empty( $author ) ) { ?>
						<span class="qodef-testimonial-author"><?php echo esc_html( $author ); ?></span>
					<?php } ?>
				</div>
			<?php endwhile;
		else:
			echo esc_html__( 'Sorry, no posts matched your criteria.', 'setsail-core' );
		endif;
		
		wp_reset_postdata();
		?>
	</div>
</div>