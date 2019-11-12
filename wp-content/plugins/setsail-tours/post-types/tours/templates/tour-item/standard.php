<?php
if (!isset($title_tag) || $title_tag == ''){
	$title_tag = 'h4';
}

if (!isset($thumb_size) || $thumb_size == ''){
	$thumb_size = 'full';
}

$item_is_featured = get_post_meta( get_the_ID(), 'qodef_tour_item_is_featured_meta', true);
?>
<div <?php post_class('qodef-tours-standard-item qodef-tours-row-item qodef-item-space'); ?>>
	<div class="qodef-tour-standard-item-holder">
		<?php if ( $item_is_featured === 'yes' ) { ?>
			<div class="qodef-tour-has-featured-mark">
				<?php echo setsail_select_icon_collections()->renderIcon( 'icon_star', 'font_elegant' ); ?>
			</div>
		<?php } ?>
		<div class="qodef-tour-standard-item-holder-inner">
			<?php if(has_post_thumbnail()) : ?>
				<div class="qodef-tours-standard-item-image-holder">
					<a href="<?php the_permalink(); ?>">
						<?php echo setsail_tours_get_tour_image_html($thumb_size); ?>
					</a>
				</div>
			<?php endif; ?>
			<div class="qodef-tours-standard-item-content-holder">
				<div class="qodef-tours-standard-item-top-content">
					<?php if(setsail_tours_get_tour_duration()) : ?>
						<div class="qodef-tours-standard-item-top-item">
							<?php echo setsail_tours_get_tour_duration_html(); ?>
						</div>
					<?php endif; ?>
					
					<?php if(setsail_tours_get_tour_min_age()) : ?>
						<div class="qodef-tours-standard-item-top-item">
							<?php echo setsail_tours_get_tour_min_age_html(); ?>
						</div>
					<?php endif; ?>
					<div class="qodef-tours-list-item-top-item">
						<?php echo setsail_tours_get_tour_categories_html(); ?>
					</div>
				</div>
				<div class="qodef-tours-standard-item-content-inner">
					
					<div class="qodef-tours-standard-item-title-holder">
						<<?php echo esc_attr($title_tag);?> class="qodef-tour-title">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</<?php echo esc_attr($title_tag);?>>
				</div>
					
					<?php if(setsail_tours_get_tour_excerpt()) : ?>
						<div class="qodef-tours-standard-item-excerpt">
							<?php echo setsail_tours_get_tour_excerpt($text_length); ?>
						</div>
					<?php endif; ?>
					
					<div class="qodef-tours-standard-item-price-and-rating-holder">
						<span class="qodef-tours-item-price-holder">
							<?php echo setsail_tours_get_tour_price_html(); ?>
						</span>
						<?php if(!empty(setsail_core_post_number_of_ratings())) : ?>
								<div class="qodef-tours-item-rating">
									<?php if(setsail_select_core_plugin_installed()) {
										echo setsail_core_list_review_details('per-custom-criteria');
									}
									?>
								</div>
							<?php endif;?>
					</div>
				
				</div>
			</div>
		</div>
	</div>
</div>