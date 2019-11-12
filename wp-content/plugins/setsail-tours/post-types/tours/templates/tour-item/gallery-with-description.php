<?php
if (!isset($title_tag) || $title_tag == ''){
	$title_tag = 'h4';
}

if (!isset($reviews) && $reviews == 'yes'){
	$reviews = 'yes';
}

$item_is_featured = get_post_meta( get_the_ID(), 'qodef_tour_item_is_featured_meta', true);
?>
<div <?php post_class(array('qodef-tours-gallery-item qodef-tours-row-item qodef-item-space',setsail_tours_get_tour_rating_class())); ?>>
	<?php if(has_post_thumbnail()) : ?>
		<div class="qodef-tours-gallery-item-image-holder">
			<?php if ( $item_is_featured === 'yes' ) { ?>
				<div class="qodef-tour-has-featured-mark">
					<?php echo setsail_select_icon_collections()->renderIcon( 'icon_star', 'font_elegant' ); ?>
				</div>
			<?php } ?>
			
			<div class="qodef-tours-gallery-item-image">
				<?php echo setsail_tours_get_tour_image_html($thumb_size); ?>
			</div>
			<div class="qodef-tours-gallery-item-content-holder">
				<div class="qodef-tours-gallery-item-content-inner">
					<div class="qodef-tours-gallery-title-holder">
						<<?php echo esc_attr($title_tag);?> class="qodef-tour-title">
						<?php the_title(); ?>
					</<?php echo esc_attr($title_tag);?>>
				</div>
				<?php if(!empty(setsail_tours_get_tour_excerpt()) && $text_length !== '' ) : ?>
					<div class="qodef-tours-gi-excerpt">
						<div class="qodef-tours-gi-excerpt-inner">
							<?php echo setsail_tours_get_tour_excerpt($text_length); ?>
						</div>
					</div>
				<?php endif; ?>
				<div class="qodef-tours-gi-price-holder">
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
			<a class="qodef-tours-gallery-item-link" href="<?php the_permalink(); ?>"></a>
		</div>
	<?php endif; ?>
</div>