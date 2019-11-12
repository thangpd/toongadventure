<div class="qodef-destinations-slider-full-screen <?php echo esc_attr( $holder_classes ); ?>">
	<div class="qodef-dsfs-inner qodef-owl-slider" <?php echo setsail_select_get_inline_attrs( $slider_data ); ?>>
		
		<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
			<?php
			$destionation_id  = get_the_ID();
			$image_styles = array();
			$destination_subtitle = get_post_meta( $destionation_id, 'qodef_destination_item_subtitle_meta', true);
			$background_image = get_the_post_thumbnail_url( $destionation_id, 'full' );
			?>
		
			<div class="qodef-td-item qodef-item-space">
				<div class="qodef-tdi-content">
					<div class="qodef-td-item">
						<a class="qodef-dsfs-link qodef-block-drag-link" href="<?php the_permalink() ?>">
						<?php if ( ! empty( $background_image ) ) {
						$image_styles[] = 'background-image: url(' . esc_url( $background_image ) . ')';
						} ?>
						<div class="qodef-dsfs-image" <?php setsail_select_inline_style( $image_styles ); ?>></div>
							<div class="qodef-tdi-text">
								<div class="qodef-tdi-text-outer">
									<div class="qodef-tdi-text-inner">
										<?php if ( $destination_subtitle != '') { ?>
											<span class="qodef-tdi-subtitle">
												<?php echo esc_attr( $destination_subtitle ); ?>
											</span>
										<?php } ?>
										<<?php echo esc_attr( $title_tag ); ?> class="qodef-tdi-title"><?php the_title(); ?></<?php echo esc_attr( $title_tag ); ?>>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		<?php endwhile;
		
		wp_reset_postdata();
		
		else: ?>
			<p><?php esc_html_e( 'No destinations matched your criteria.', 'setsail-tours' ); ?></p>
		<?php endif; ?>
	</div>
</div>