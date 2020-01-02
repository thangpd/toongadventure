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
div[class*=vc_col-lg-] {
    float: left;
    position: relative;
    min-height: 1px;
    padding-left: 15px;
    padding-right: 15px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.vc_col-lg-3 {
    width: 25%;
}
.vc_col-lg-4 {
    width: 33.333333%;
}
.vc_col-lg-5 {
    width: 41.666667%;
}
.vc_col-lg-6 {
    width: 50%;
}
.vc_col-lg-7 {
    width: 58.333333%;
}
.vc_col-lg-8 {
    width: 66.666667%;
}
.vc_column_container {
    padding-left: 0 !important;
    padding-right: 0 !important;
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
.vc_row {
    margin-left: -15px;
    margin-right: -15px;
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
    float: right;
}
.wpb_video_widget .wpb_video_wrapper {
    /*padding-top: 56.25%;*/
    position: relative;
    width: 100%;
}
.wpb_video_widget.vc_video-aspect-ratio-169 .wpb_video_wrapper {
    /*padding-top: 56.25%;*/
}
.wpb_video_widget .wpb_wrapper iframe {
    width: 100%;
    height: 100%;
    display: block;
    position: absolute;
    margin: 0;
    top: 0;
    left: 0;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.vc_custom_15752721750165 {
    padding-top: 200px !important;
    padding-bottom: 280px !important;
    background-image: url(https://toongadventure.com/wp-content/uploads/2018/09/bg-video-reason.png) !important;
    background-position: center !important;
    background-repeat: no-repeat !important;
    background-size: cover !important;
}
.vc_custom_1575265746388 {
    margin-left: -8px !important;
}
.vc_reason-item {
    background-color: #fff;
    box-shadow: 0 0 5px #eee;
    padding: 40px 20px;
    margin-bottom: 60px;
}
.vc_col-inner .vc_col-title {
    color: #03413b;
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 5px;
}
span.icon {
    position: absolute;
    width: 70px;
    height: 70px;
    right: 20px;
    top: -35px;
    background-color: #faa342;
}
span.icon.icon-pro {
    background: url(https://toongadventure.com/wp-content/uploads/2018/09/icon-pro.jpg) center no-repeat;
}
span.icon.icon-unique {
    background: url(https://toongadventure.com/wp-content/uploads/2018/09/icon-unique.jpg) center no-repeat;
}
span.icon.icon-sustain {
    background: url(https://toongadventure.com/wp-content/uploads/2018/09/icon-sustain.jpg) center no-repeat;
}
span.icon.icon-community {
    background: url(https://toongadventure.com/wp-content/uploads/2018/09/icon-community.jpg) center no-repeat;
}
span.icon.icon-safe {
    background: url(https://toongadventure.com/wp-content/uploads/2018/09/icon-safe.jpg) center no-repeat;
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
                                <div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-5 vc_col-md-12 vc_col-xs-12 vc_col-has-fill">
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
                                <div class="vc_column_container vc_col-sm-12 vc_col-lg-7 vc_col-md-12 vc_col-xs-12">
                                    <div class="vc_row" style="display: flex; flex-wrap: wrap; justify-content: center">
                                        <div class="vc_col-lg-4">
                                            <div class="vc_col-inner vc_reason-item">
                                                <span class="icon icon-pro"></span>
                                                <div class="vc_col-title">
                                                    Chuyên nghiệp/ Professional
                                                </div>
                                                <div class="vc_col-content">
                                                    - Đào tạo sơ cấp cứu sinh tồn tại bởi Survival Skill Vietnam.
                                                    - Đào tạo kỹ năng thể thao mạo hiểm bởi chuyên gia leo núi Phan Thanh Nhiên.
                                                    - Có kinh nghiệm 5 năm về kỹ năng sinh tồn.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="vc_col-lg-4">
                                            <div class="vc_col-inner vc_reason-item">
                                                <span class="icon icon-unique"></span>
                                                <div class="vc_col-title">
                                                    Trải nghiệm độc nhất/ Unique Experience
                                                </div>
                                                <div class="vc_col-content">
                                                    - Đào tạo sơ cấp cứu sinh tồn tại bởi Survival Skill Vietnam.
                                                    - Đào tạo kỹ năng thể thao mạo hiểm bởi chuyên gia leo núi Phan Thanh Nhiên.
                                                    - Có kinh nghiệm 5 năm về kỹ năng sinh tồn.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="vc_row" style="display: flex; flex-wrap: wrap; justify-content: center">
                                        <div class="vc_col-lg-4">
                                            <div class="vc_col-inner vc_reason-item">
                                                <span class="icon icon-sustain"></span>
                                                <div class="vc_col-title">
                                                    Bền vững/ Sustainability
                                                </div>
                                                <div class="vc_col-content">
                                                    - Đào tạo sơ cấp cứu sinh tồn tại bởi Survival Skill Vietnam.
                                                    - Đào tạo kỹ năng thể thao mạo hiểm bởi chuyên gia leo núi Phan Thanh Nhiên.
                                                    - Có kinh nghiệm 5 năm về kỹ năng sinh tồn.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="vc_col-lg-4">
                                            <div class="vc_col-inner vc_reason-item">
                                                <span class="icon icon-community"></span>
                                                <div class="vc_col-title">
                                                    Cộng đồng/ Community
                                                </div>
                                                <div class="vc_col-content">
                                                    - Đào tạo sơ cấp cứu sinh tồn tại bởi Survival Skill Vietnam.
                                                    - Đào tạo kỹ năng thể thao mạo hiểm bởi chuyên gia leo núi Phan Thanh Nhiên.
                                                    - Có kinh nghiệm 5 năm về kỹ năng sinh tồn.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="vc_col-lg-4">
                                            <div class="vc_col-inner vc_reason-item">
                                                <span class="icon icon-safe"></span>
                                                <div class="vc_col-title">
                                                    An toàn/ Safety
                                                </div>
                                                <div class="vc_col-content">
                                                    - Đào tạo sơ cấp cứu sinh tồn tại bởi Survival Skill Vietnam.
                                                    - Đào tạo kỹ năng thể thao mạo hiểm bởi chuyên gia leo núi Phan Thanh Nhiên.
                                                    - Có kinh nghiệm 5 năm về kỹ năng sinh tồn.
                                                </div>
                                            </div>
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
