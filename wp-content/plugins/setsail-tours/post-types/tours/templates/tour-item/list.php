<?php

$item_is_featured = get_post_meta( get_the_ID(), 'qodef_tour_item_is_featured_meta', true);

?>

<div <?php post_class('qodef-tours-list-item qodef-tours-row-item qodef-item-space'); ?>>
	<div class="qodef-tours-list-item-table">
		<?php if(has_post_thumbnail()) : ?>
			<div class="qodef-tours-list-item-image-holder">
				<div class="qodef-tours-list-item-image-holder-inner">
					<?php if ( $item_is_featured === 'yes' ) { ?>
						<div class="qodef-tour-has-featured-mark">
							<?php echo setsail_select_icon_collections()->renderIcon( 'icon_star', 'font_elegant' ); ?>
						</div>
					<?php } ?>
					<a href="<?php the_permalink(); ?>" style="background-image: url(<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>);">
						<?php the_post_thumbnail($thumb_size); ?>
					</a>
				</div>
			</div>
		<?php endif; ?>
		
		<div class="qodef-tours-list-item-content-holder">
			<div class="qodef-tli-content-inner">
				<div class="qodef-tours-list-item-title-price-holder">
					<h4 class="qodef-tour-title">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h4>
				</div>
	
				<?php if(setsail_tours_get_tour_excerpt()) : ?>
					<div class="qodef-tours-list-item-excerpt">
						<p><?php echo setsail_tours_get_tour_excerpt($text_length); ?></p>
					</div>
				<?php endif; ?>
				
				<div class="qodef-tours-list-item-price-and-rating-holder">
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
					<?php endif; ?>
				</div>
				
				<div class="qodef-tours-list-item-bottom-info">
					<?php if(setsail_tours_get_tour_duration()) : ?>
						<div class="qodef-tours-list-item-bottom-item">
							<?php echo setsail_tours_get_tour_duration_html(); ?>
						</div>
					<?php endif; ?>
					
					<?php if(setsail_tours_get_tour_min_age()) : ?>
						<div class="qodef-tours-list-item-bottom-item">
							<?php echo setsail_tours_get_tour_min_age_html(); ?>
						</div>
					<?php endif; ?>
					<div class="qodef-tours-list-item-bottom-item">
						<?php echo setsail_tours_get_tour_categories_html(); ?>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>