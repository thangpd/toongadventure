<?php
$custom_1_excerpt = get_post_meta(get_the_ID(), 'setsail_tours_custom_section1_excerpt', true);
$custom_1_content = get_post_meta(get_the_ID(), 'tour_custom_section1_content', true);
?>
<div class="qodef-info-section-part">
    <?php if(!empty($custom_1_excerpt)) { ?>
        <?php echo esc_html($custom_1_excerpt); ?>
    <?php }

    if(!empty($custom_1_content)) { ?>
        <?php echo do_shortcode($custom_1_content); ?>
    <?php } ?>
</div>
