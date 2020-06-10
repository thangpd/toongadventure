<div class="qodef-tours-destination-holder <?php echo esc_attr( $holder_classes ); ?>">
	<div class="qodef-td-inner qodef-outer-space">
		<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
			$item_id          = get_the_ID();
			$item_is_featured = get_post_meta( $item_id, 'qodef_destination_item_is_featured_meta', true );
			$min_max_price    = setsail_select_get_destination_items( $item_id );
			?>
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="qodef-td-item qodef-item-space">
					<div class="qodef-tdi-content">
							<div class="qodef-tdi-image">
								<?php the_post_thumbnail( $thumb_size ); ?>
							</div>
							<a class="qodef-tdi-content-link" href="<?php the_permalink() ?>"></a>
							<?php if ( $item_is_featured === 'yes' ) { ?>
								<div class="qodef-destination-has-featured-mark">
									<?php echo setsail_select_icon_collections()->renderIcon( 'icon_star', 'font_elegant' ); ?>
								</div>
							<?php } ?>
							<div class="qodef-tdi-text">
								<div class="qodef-tdi-text-inner">
									<?php if( $destination_type === 'with-desc' ) { ?>
									<<?php echo esc_attr( $title_tag ); ?> class="qodef-tdi-title"><?php the_title(); ?></<?php echo esc_attr( $title_tag ); ?>>
								
									<span class="qodef-tours-item-price-holder">
										<?php if ( ! empty( $min_max_price ) ) {?>
											<span class="qodef-ti-min-price"><?php echo esc_html__('from ', 'setsail-tours') . esc_html__('$', 'setsail-tours') . $min_max_price['min']; ?></span>
											<span class="qodef-ti-min-price"><?php echo esc_html__(' to ', 'setsail-tours') . esc_html__('$', 'setsail-tours') . $min_max_price['max']; ?></span>
										<?php } ?>
									</span>
								
									<?php if(setsail_tours_get_tour_excerpt()) { ?>
										<div class="qodef-tdi-excerpt">
											<?php echo setsail_tours_get_tour_excerpt($text_length); ?>
										</div>
									<?php } ?>
									<a class="qodef-btn-text" href="<?php the_permalink() ?>"> <?php echo esc_html__('read more', 'setsail-tours'); ?> </a>
									<?php } else { ?>
								<<?php echo esc_attr( $title_tag ); ?> class="qodef-tdi-title"><?php the_title(); ?></<?php echo esc_attr( $title_tag ); ?>>
								<?php } ?>
								</div>
							</div>
					</div>
				</div>
		<?php endif; endwhile;
		
		wp_reset_postdata();
		
		else: ?>
			<p><?php esc_html_e( 'No destinations matched your criteria.', 'setsail-tours' ); ?></p>
		<?php endif; ?>
	</div>
</div>