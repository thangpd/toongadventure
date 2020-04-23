<style>

.qodef-title-post-news {
    font-family: "HelveticaNeue-CondensedBlack", sans-serif;
    font-size: 30px;
    line-height: 1.15em;
    font-weight: 600;
    letter-spacing: 1px;
    text-transform: uppercase;
    color: #0b403b;
    margin-top: 10px;
    text-align: center;
}
.qodef-excerpt-post-news{
    color: #0b403b;
    font-size: 14px;
    font-weight: 500;
}
.qodef-news-image-port{

}
</style>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">



<div class="qodef-news-holder <?php echo esc_attr($holder_classes); ?> clearfix">
    
    <?php
    $id_1 = esc_attr($port_id_1);
    $id_2 = esc_attr($port_id_2);

    $post_1 =  get_post($id_1);
    $post_2 =  get_post($id_2);
    
?>
<div class="row">
<div class="col-6 col-ms-12 d-flex">
    <?php if($post_1 !== null):?>
    <div class="qodef-bl-item qodef-item-space">
        <div class="qodef-bli-inner">
            <div class="qodef-news-image-port">
                <?php echo wp_get_attachment_image( get_post_thumbnail_id($id_1), 'large' ); ?>
            </div>
            <div class="qodef-bli-content">
                <p class="qodef-st-title qodef-title-post-news">
                    <?php echo $post_1->post_title; ?>
                </p>
                <p class="qodef-excerpt-post-news">
                    <?php echo wp_trim_words($post_1->post_content, 40); ?>
                </p>
            </div>
        </div>
    </div>
    <?php  endif; ?>
</div>
<div class="col-6 d-flex">
    <?php if($post_2 !== null):?>
    <div class="qodef-bl-item qodef-item-space">
        <div class="qodef-bli-inner">
            <div class="qodef-news-image-port">
                <?php echo wp_get_attachment_image( get_post_thumbnail_id($id_2), 'large' ); ?>
            </div>
            <div class="qodef-bli-content">
                <p class="qodef-st-title qodef-title-post-news">
                    <?php echo $post_2->post_title; ?>
                </p>
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