<?php
if (!isset($title_tag) || $title_tag == ''){
	$title_tag = 'h4';
}

if (!isset($reviews) && $reviews == 'yes'){
	$reviews = 'yes';
}

$custom_label = get_post_meta( get_the_ID(), 'tour_custom_label', true);
?>
<div <?php post_class(array('qodef-tours-gallery-item qodef-tours-row-item qodef-item-space',setsail_tours_get_tour_rating_class())); ?>>
	<?php if(has_post_thumbnail()) : ?>
		<div class="qodef-tours-gallery-item-image-holder">
			<?php if ( $custom_label !== '' ) { ?>
				<span class="qodef-tours-gallery-item-label-holder">
					<?php echo setsail_tours_get_tour_label_html(); ?>
				</span>
			<?php } ?>
			<div class="qodef-tours-gallery-item-image">
				<?php echo setsail_tours_get_tour_image_html($thumb_size); ?>
				<div class="qodef-tours-gallery-item-content-holder">
					<div class="qodef-tours-gallery-item-content-inner">
						<div class="qodef-gi-title-and-price-holder">
							<<?php echo esc_attr($title_tag);?> class="qodef-tour-title">
							<?php the_title(); ?>
						</<?php echo esc_attr($title_tag);?>>
						<?php echo setsail_tours_get_tour_price_html(); ?>
					</div>
					<?php if($reviews === 'yes') {
						if(!empty(setsail_core_post_number_of_ratings())) : ?>
							<div class="qodef-tours-item-rating">
								<?php if(setsail_select_core_plugin_installed()) {
									echo setsail_core_list_review_details('per-custom-criteria');
								}
								?>
							</div>
						<?php endif;
					} ?>
					</div>
				</div>
			</div>
			<a class="qodef-tours-gallery-item-link" href="<?php the_permalink(); ?>"></a>
		</div>
	<?php endif; ?>
</div>