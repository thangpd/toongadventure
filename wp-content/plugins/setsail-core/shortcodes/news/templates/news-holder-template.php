<style>

</style>


<?php
    $id_1 = esc_attr($port_id_1);
    $id_2 = esc_attr($port_id_2);

    $post_1 =  get_post($id_1);
    $post_2 =  get_post($id_2);
?>
<div class="qodef-news-holder <?php echo esc_attr($holder_classes); ?> clearfix">

<div class="row">
<div class="col d-flex">
    <?php if($post_1 !== null):?>
    <div class="qodef-bl-item qodef-item-space">
        <div class="qodef-bli-inner">
            <div class="qodef-news-image-port">
                <?php echo wp_get_attachment_image( get_post_thumbnail_id($id_1), 'large' ); ?>
            </div>
            <div class="qodef-bli-content">
                <a href="<?php echo get_permalink($post_1); ?>" style="text-decoration: none">
                    <p class="qodef-st-title qodef-title-post-news">
                        <?php  echo $post_1->post_title; ?>
                    </p>
                </a>
                    
                <p class="qodef-excerpt-post-news">
                    <?php echo wp_trim_words($post_1->post_content, 40); ?>
                </p>
            </div>
        </div>
    </div>
    <?php  endif; ?>
</div>
<div class="col d-flex">
    <?php if($post_2 !== null):?>
    <div class="qodef-bl-item qodef-item-space">
        <div class="qodef-bli-inner">
            <div class="qodef-news-image-port">
                <?php echo wp_get_attachment_image( get_post_thumbnail_id($id_2), 'large' ); ?>
            </div>
            <div class="qodef-bli-content">
                <a href="<?php echo get_permalink($post_2); ?>" style="text-decoration: none">
                    <p class="qodef-st-title qodef-title-post-news">
                        <?php  echo $post_2->post_title; ?>
                    </p>
                </a>
                <p class="qodef-excerpt-post-news">
                    <?php echo wp_trim_words($post_2->post_content, 40); ?>
                </p>
            </div>
        </div>
    </div>
    <?php  endif; ?>
</div>
</div>

</div>