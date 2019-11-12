<?php
$image_gallery_val = get_post_meta(get_the_ID(), 'tour_gallery_images', true);
$gallery_excerpt   = get_post_meta(get_the_ID(), 'tour_gallery_excerpt', true);
?>
	
	<h3 class="qodef-tour-gallery-title"> <?php esc_html_e( 'Gallery', 'setsail-tours' ); ?> </h3>
	<p class="qodef-tour-gallery-item-excerpt"> <?php echo wp_kses_post( $gallery_excerpt ); ?> </p>

<?php if($image_gallery_val !== "") { ?>
    <div class="qodef-tour-masonry-gallery-holder qodef-grid-list qodef-grid-masonry-list qodef-three-columns qodef-normal-space">
        <div class="qodef-tour-masonry-gallery qodef-outer-space qodef-masonry-list-wrapper">
	        <div class="qodef-masonry-grid-sizer"></div>
	        <div class="qodef-masonry-grid-gutter"></div>
            <?php
            if($image_gallery_val != '') {
                $image_gallery_array = explode(',', $image_gallery_val);
            }

            if(isset($image_gallery_array) && count($image_gallery_array) != 0) {
                foreach($image_gallery_array as $gimg_id) {
	                $image_size = get_post_meta($gimg_id, 'tours_gallery_masonry_image_size', true);
                    $image_classs = !empty($image_size) ? 'qodef-fixed-masonry-item ' . $image_size : 'qodef-default-masonry-item';
                    ?>
                    <div class="qodef-tour-gallery-item qodef-item-space <?php echo esc_attr($image_classs); ?>">
	                    <div class="qodef-tour-gallery-item-inner">
		                    <a href="<?php echo wp_get_attachment_url($gimg_id) ?>" data-rel="prettyPhoto[gallery_pretty_photo]">
			                    <?php echo wp_get_attachment_image($gimg_id, 'full'); ?>
		                    </a>
	                    </div>
                    </div>
                <?php }
            }
            ?>
        </div>
    </div>
<?php } ?>