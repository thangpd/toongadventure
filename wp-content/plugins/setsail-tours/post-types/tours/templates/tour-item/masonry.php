<?php
if (!isset($title_tag) || $title_tag == ''){
	$title_tag = 'h4';
}

if (!isset($reviews) && $reviews == 'yes'){
	$reviews = 'yes';
}

$id = get_the_ID();
$image_size = get_post_meta($id, 'tour_masonry_dimensions', true);
$image_dimension = setsail_tours_get_image_size_param(array('image_size' => $image_size));
$item_classes = array(
    'qodef-tours-masonry-item',
    'qodef-tours-row-item',
    'qodef-item-space',
    setsail_tours_get_tour_rating_class(),
    setsail_tours_get_tour_masonry_class()
);

$item_is_featured = get_post_meta( get_the_ID(), 'qodef_tour_item_is_featured_meta', true);
?>
<div <?php post_class($item_classes); ?>>
    <div class="qodef-tours-gim-holder-inner">
	    <?php if ( $item_is_featured === 'yes' ) { ?>
		    <div class="qodef-tour-has-featured-mark">
			    <?php echo setsail_select_icon_collections()->renderIcon( 'icon_star', 'font_elegant' ); ?>
		    </div>
	    <?php } ?>
        <div class="qodef-tours-gim-image">
            <?php echo setsail_tours_get_tour_image_html($image_dimension, true); ?>
        </div>
        <div class="qodef-tours-gim-content-holder">
            <div class="qodef-tours-gim-content-outer">
                <div class="qodef-tours-gim-content-inner">
                    <div class="qodef-gim-title-and-price-holder">
                        <<?php echo esc_attr($title_tag);?> class="qodef-tour-title">
                            <?php the_title(); ?>
                        </<?php echo esc_attr($title_tag);?>>
	                     <?php echo setsail_tours_get_tour_price_html(); ?>
                    </div>
		            <?php if($reviews === 'yes') {
			            if(!empty(setsail_core_post_number_of_ratings())) : ?>
				            <div class="qodef-tours-gim-rating">
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
        <a class="qodef-tours-masonry-item-link" href="<?php the_permalink(); ?>"></a>
    </div>
</div>