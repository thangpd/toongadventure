<?php
$gallery_excerpt   = get_post_meta(get_the_ID(), 'tour_gallery_excerpt', true);
$image_gallery_val = get_post_meta(get_the_ID(), 'tour_gallery_images', true);

if($image_gallery_val !== '') : ?>

    <div class="qodef-tour-gallery-item-holder">

        <h4 class="qodef-gallery-title">
            <?php esc_html_e('From our gallery', 'setsail-tours'); ?>
        </h4>

        <p class="qodef-tour-gallery-item-excerpt">
            <?php echo wp_kses_post($gallery_excerpt); ?>
        </p>

        <div class="qodef-tour-gallery clearfix">
            <?php
            $image_gallery_array = explode(',', $image_gallery_val);
            if(isset($image_gallery_array) && count($image_gallery_array)) : ?>

                <?php for($i = 0; $i < 3; $i++) : ?>
                    <?php if(isset($image_gallery_array[$i])) : ?>
                        <div class="qodef-tour-gallery-item">
                            <a href="<?php echo wp_get_attachment_url($image_gallery_array[$i]) ?>" data-rel="prettyPhoto[gallery_excerpt_pretty_photo]">
                                <?php echo wp_get_attachment_image($image_gallery_array[$i], 'setsail_select_image_square'); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                <?php endfor; ?>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>