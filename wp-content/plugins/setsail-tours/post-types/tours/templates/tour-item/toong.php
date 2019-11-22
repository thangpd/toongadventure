<?php
if ( ! isset($title_tag) || $title_tag == '') {
    $title_tag = 'h4';
}

if ( ! isset($reviews) && $reviews == 'yes') {
    $reviews = 'yes';
}

$id              = get_the_ID();
$image_size      = get_post_meta($id, 'tour_masonry_dimensions', true);
$image_dimension = setsail_tours_get_image_size_param(array('image_size' => $image_size));
$item_classes    = array(
    'qodef-tours-masonry-item',
    'qodef-tours-row-item',
    'qodef-item-space',
    setsail_tours_get_tour_rating_class(),
    setsail_tours_get_tour_masonry_class()
);


$item_is_featured = get_post_meta(get_the_ID(), 'qodef_tour_item_is_featured_meta', true);
?>
<div <?php post_class($item_classes); ?>>
    <div class="qodef-tours-gim-holder-inner">
        <?php if ($item_is_featured === 'yes' && false) { ?>
            <div class="qodef-tour-has-featured-mark">
                <?php echo setsail_select_icon_collections()->renderIcon('icon_star', 'font_elegant'); ?>
            </div>
        <?php } ?>
        <a class="qodef-tours-toong-item-link" href="<?php the_permalink(); ?>">
            <div class="qodef-tours-gim-image">
                <?php echo setsail_tours_get_tour_image_html($image_dimension, true); ?>
            </div>
        </a>

        <div class="qodef-tours-gim-content-holder">
            <div class="qodef-tours-gim-content-outer">

                <div class="qodef-tours-gim-content-inner">
                    <div class="qodef-gim-title-and-price-holder">
                        <a class="qodef-tours-toong-item-link" href="<?php the_permalink(); ?>">
                            <<?php echo esc_attr($title_tag); ?> class="qodef-tour-title">
                            <?php the_title(); ?>
                        </<?php echo esc_attr($title_tag); ?>>
                        </a>
                        <div class="qodef-tours-list-item-attributes-item">
                            <?php
                            echo 'Activites:';
                            echo setsail_tours_get_tour_attributes_html();
                            ?>
                        </div>
                        <div class="qodef-ts-list-body">
                            <div class="qodef-tours-list-item-duration-item">
                                <?php
                                $tour_duration = setsail_tours_get_tour_duration();
                                ?>
                                <span class="duration-text">Duration</span>
                                <div class="duration-item">
                                    <?php echo $tour_duration . 'D<br>' . ($tour_duration - 1) . 'N'; ?>
                                </div>
                                <?php
                                ?>
                            </div>
                            <?php if ($reviews === 'yes') {
                                if ( ! empty(setsail_core_post_number_of_ratings())) :
                                    ?>
                                    <div class="qodef-tours-list-item-duration-grade-item">
                                        <div class="grade-text">
                                            <?php
                                            echo __('Grade', 'setsail-tours');
                                            ?>
                                        </div>
                                        <div class="qodef-tours-gim-rating">
                                            <?php if (setsail_select_core_plugin_installed()) {
                                                $custom_criteria = setsail_core_list_review_details('toong-custom-criteria');
                                                echo $custom_criteria;
                                            }
                                            ?>
                                        </div>
                                    </div>
                                <?php endif;
                            } ?></div>

                    </div>

                    <div class="qodef-tours-price">
                        <div class="from-price">
                            <?php echo __('From:', 'setsail-tours') ?>
                        </div>
                        <?php echo setsail_tours_get_tour_price_html(); ?>
                    </div>
                    <div class="qodef-tours-viewmore">
                        <a href="<?php the_permalink() ?>"><?php echo __('VIEWTRIP', 'setsail-tours') ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>