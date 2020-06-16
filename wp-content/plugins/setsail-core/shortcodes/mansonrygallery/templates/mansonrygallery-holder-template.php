<?php

/*$default_atts = array(
	'custom_class' => '',
	'title'        => '',
	'style'        => 'mansonrygallery',
	'main_image'   => '',
	'sub_image1'   => '',
	'sub_image2'   => '',
	'sub_image3'   => '',
);*/



?>


<div class="qodef-mansonrygallery-holder <?php echo esc_attr( $holder_classes ); ?> clearfix">
    <div class="qodef-mansonrygallery-title">
        Bộ sưu tập
    </div>
    <div class="vc_row wpb_row vc_inner vc_row-fluid qodef-grid-no-gutter">
        <div class="wpb_column vc_column_container vc_col-xs-12 banner-full">
            <a href="#">
				<?php echo wp_get_attachment_image( $main_image, 'full', false, [ 'class' => 'w-100' ] ) ?>
            </a>
        </div>
        <div class="wpb_column vc_column_container vc_col-xs-4 banner-full">
            <a href="#">
				<?php echo wp_get_attachment_image( $sub_image1, 'full', false, [ 'class' => 'w-100' ] ) ?>
            </a>
        </div>
        <div class="wpb_column vc_column_container vc_col-xs-4 banner-full">
            <a href="#">
				<?php echo wp_get_attachment_image( $sub_image2, 'full', false, [ 'class' => 'w-100' ] ) ?>
            </a>
        </div>
        <div class="wpb_column vc_column_container vc_col-xs-4 banner-full">
            <a href="#">
				<?php echo wp_get_attachment_image( $sub_image3, 'full', false, [ 'class' => 'w-100' ] ) ?>
            </a>
        </div>
    </div>
    <!--<div class="vc_row wpb_row vc_inner vc_row-fluid qodef-grid-no-gutter">
        <div class="wpb_column vc_column_container vc_col-xs-12 banner-full">
            <a href="#"><img class="w-100"
                             src="<?php /*echo plugin_dir_url( __DIR__ ); */ ?>/assets/img/gallery-img-full.png"
                             alt="img"></a>
        </div>
        <div class="wpb_column vc_column_container vc_col-xs-4 banner-full">
            <a href="#"><img class="w-100" src="<?php /*echo plugin_dir_url( __DIR__ ); */ ?>/assets/img/gallery-img2.jpg"
                             alt="img"></a>
        </div>
        <div class="wpb_column vc_column_container vc_col-xs-4 banner-full">
            <a href="#"><img class="w-100" src="<?php /*echo plugin_dir_url( __DIR__ ); */ ?>/assets/img/gallery-img3.jpg"
                             alt="img"></a>
        </div>
        <div class="wpb_column vc_column_container vc_col-xs-4 banner-full">
            <a href="#"><img class="w-100" src="<?php /*echo plugin_dir_url( __DIR__ ); */ ?>/assets/img/gallery-img4.jpg"
                             alt="img"></a>
        </div>
    </div>-->
</div>