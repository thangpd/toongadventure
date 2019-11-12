<div class="qodef-tours-dwt-holder <?php echo esc_attr( $holder_classes ); ?>">
	<div class="qodef-td-inner qodef-outer-space">
		<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
			$destionation_id  = get_the_ID();
			$destination_item_is_featured = get_post_meta( $destionation_id, 'qodef_destination_item_is_featured_meta', true );
			?>
			<?php if ( has_post_thumbnail() ) { ?>
				<div class="qodef-td-item qodef-item-space">
					<div class="qodef-td-item-inner">
						<div class="qodef-td-items destination">
							<div class="qodef-tdi-content">
								<div class="qodef-tdi-image">
									<?php the_post_thumbnail( $thumb_size ); ?>
								</div>
								<?php if ( $destination_item_is_featured === 'yes' ) { ?>
									<div class="qodef-destination-has-featured-mark">
										<?php echo setsail_select_icon_collections()->renderIcon( 'icon_star', 'font_elegant' ); ?>
									</div>
								<?php } ?>
								<div class="qodef-tdi-text">
									<div class="qodef-tdi-text-inner">
										<div class="qodef-tdi-title"><?php the_title(); ?></div>
									</div>
								</div>
								<a class="qodef-tdi-link" href="<?php the_permalink() ?>"></a>
							</div>
						</div>
						<?php if ( ! empty( $tour_items_id ) ) {
							$i = 1;
							foreach ( $tour_items_id as $tour_id => $tour_title ) {
								$tour_destination_id = get_post_meta( $tour_id, 'tour_destination', true );
								
								if ( intval( $tour_destination_id ) === $destionation_id && $i < 4 ) {
									$tour_item_is_featured = get_post_meta( $tour_id, 'qodef_tour_item_is_featured_meta', true);
									?>
									<div class="qodef-td-items tour">
										<?php if ( $tour_item_is_featured === 'yes' ) { ?>
											<div class="qodef-tour-has-featured-mark">
												<?php echo setsail_select_icon_collections()->renderIcon( 'icon_star', 'font_elegant' ); ?>
											</div>
										<?php } ?>
										<div class="qodef-tdi-image">
											<?php echo get_the_post_thumbnail( $tour_id, $thumb_size ); ?>
											<a class="qodef-tdi-link" href="<?php the_permalink( $tour_id ); ?>"></a>
										</div>
										
										<div class="qodef-tdi-content-holder">
											<div class="qodef-tdi-content-holder-outer">
												<div class="qodef-tdi-content-holder-inner">
													<div class="qodef-tdi-title-holder">
														<div class="qodef-tdi-title"><?php echo get_the_title( $tour_id ); ?></div>
													</div>
													
													<div class="qodef-tdi-rating-and-price-holder">
														<?php if(!empty(setsail_core_post_number_of_ratings( $tour_id ))) { ?>
															<div class="qodef-tdi-rating">
																<?php if(setsail_select_core_plugin_installed()) {
																	echo setsail_core_list_review_details('per-custom-criteria', array(), 'h5', $tour_id);
																}
																?>
															</div>
														<?php } ?>
														<div class="qodef-tdi-price-holder">
															<?php echo setsail_tours_get_tour_price_html( $tour_id ); ?>
														</div>
													</div>
												</div>
											</div>
										</div>
										
									</div>
									<?php
									$i ++;
								}
							}
						} ?>
					</div>
				</div>
		<?php }
	endwhile;
	
	wp_reset_postdata();
	
	else: ?>
		<p><?php esc_html_e( 'No destinations matched your criteria.', 'setsail-tours' ); ?></p>
	<?php endif; ?>
</div>
</div>