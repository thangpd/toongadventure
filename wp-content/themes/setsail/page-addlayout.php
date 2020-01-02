<?php
$qodef_sidebar_layout  = setsail_select_sidebar_layout();
$qodef_grid_space_meta = setsail_select_get_meta_field_intersect( 'page_grid_space' );
$qodef_holder_classes  = ! empty( $qodef_grid_space_meta ) ? 'qodef-grid-' . $qodef_grid_space_meta . '-gutter' : '';

get_header();

if ( ! empty($show_title_meta) && is_singular('page')) {
    $show_title = $show_title_meta === 'yes' ? true : false;
} else {
    $show_title = false;
}
setsail_select_get_title();
get_template_part( 'slider' );
do_action('setsail_select_action_before_main_content');

?>
<script src="https://toongadventure.com/wp-content/cache/autoptimize/js/autoptimize_353f46e79221bb355fc51859650923d7.js"></script>
<style>
.vc_col-lg-6 {
    width: 50%;
    float: left;
    position: relative;
    min-height: 1px;
    box-sizing: border-box;
}
.vc_column_container>.vc_column-inner {
    box-sizing: border-box;
    padding-left: 15px;
    padding-right: 15px;
    width: 100%;
}
.vc_column-inner::after, .vc_column-inner::before {
    content: " ";
    display: table;
}
.vc_clearfix:after, .vc_clearfix:before {
    content: " ";
    display: table;
}
.vc_clearfix:after {
    clear: both;
}
.vc_column-inner::after {
    clear: both;
}
.vc_row:after, .vc_row:before {
    content: " ";
    display: table;
}
.vc_row:after {
    clear: both;
}
.wpb_video_widget .wpb_wrapper {
    position: relative;
}
.wpb_video_widget.vc_video-el-width-80 .wpb_wrapper {
    width: 80%;
}
.wpb_video_widget.vc_video-align-left .wpb_wrapper {
    float: left;
}
.wpb_video_widget .wpb_video_wrapper {
    padding-top: 56.25%;
    position: relative;
    width: 100%;
}
.wpb_video_widget.vc_video-aspect-ratio-169 .wpb_video_wrapper {
    padding-top: 56.25%;
}
.vc_custom_15752721750165 {
    padding-top: 180px !important;
    padding-bottom: 100px !important;
    background-image: url(https://toongadventure.com/wp-content/uploads/2018/09/bg-video-reason.png) !important;
    background-position: center !important;
    background-repeat: no-repeat !important;
    background-size: cover !important;
}
.vc_custom_1575265746388 {
    margin-left: -8px !important;
}

</style>

    <div class="qodef-container qodef-default-page-template">
        <?php do_action( 'setsail_select_action_after_container_open' ); ?>

        <div class="qodef-container-inner clearfix">
            <?php do_action( 'setsail_select_action_after_container_inner_open' ); ?>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="qodef-grid-row <?php echo esc_attr( $qodef_holder_classes ); ?>">
                    <div <?php echo setsail_select_get_content_sidebar_class(); ?>>

                        <div class="vc_row wpb_row vc_row-fluid">
                            <div data-vc-full-width="true" data-vc-full-width-init="true" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid" style="position: relative; left: -166px; box-sizing: border-box; width: 1334px;">
                                <div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-6 vc_col-md-12 vc_col-xs-12 vc_col-has-fill">
                                    <div class="vc_column-inner vc_custom_15752721750165">
                                        <div class="wpb_wrapper">
                                            <div class="wpb_video_widget wpb_content_element vc_clearfix   vc_custom_1575265746388 vc_video-aspect-ratio-169 vc_video-el-width-80 vc_video-align-left">
                                                <div class="wpb_wrapper">
                                                    <div class="wpb_video_wrapper">
                                                        <iframe title="Tour trekking ven biển | Trekking 8 Nàng Tiên | Tổ Ong Trips | VPBank" width="1100" height="619" src="https://www.youtube.com/embed/Bf2rLqLzMg8?feature=oembed" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="introduction wpb_column vc_column_container vc_col-sm-12 vc_col-lg-6 vc_col-md-12 vc_col-xs-12">
                                    <div class="vc_column-inner vc_custom_1575272162489">
                                        <div class="wpb_wrapper">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                        do_action( 'setsail_select_action_page_after_content' );
                        ?>
                    </div>
                    <?php if ( $qodef_sidebar_layout !== 'no-sidebar' ) { ?>
                        <div <?php echo setsail_select_get_sidebar_holder_class(); ?>>
                            <?php get_sidebar(); ?>
                        </div>
                    <?php } ?>
                </div>
            <?php endwhile; endif; ?>
            <?php do_action( 'setsail_select_action_before_container_inner_close' ); ?>
        </div>

        <?php do_action( 'setsail_select_action_before_container_close' ); ?>
    </div>

<?php get_footer(); ?>
