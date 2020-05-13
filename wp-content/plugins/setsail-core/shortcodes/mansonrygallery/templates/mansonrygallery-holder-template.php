<style>
    .qodef-grid-no-gutter > div {
        padding-left: 0 !important;
        padding-right: 0 !important;
    }

    .mansonry-gallery {
        margin-top: -130px;
        z-index: 1;
    }

    .mansonry-gallery:before {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 230px;
        background: url("./wp-content/plugins/setsail-core/assets/img/gallery-bg-top2.png") right top no-repeat;
        z-index: 1;
    }

    .mansonry-gallery:after {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 120px;
        background: url("./wp-content/plugins/setsail-core/assets/img/mansonry-gallery-bg-bottom.png") left bottom no-repeat;
        z-index: 1;
    }

    .mansonry-gallery .vc_column-inner {
        padding-top: 0 !important;
    }

    .mansonry-gallery .qodef-mansonrygallery-title {
        position: absolute;
        right: 0;
        text-align: right;
        z-index: 2;
        padding-top: 100px;
        padding-right: 150px;
        font-size: 2rem;
        font-weight: 900;
        color: #fbad48;
    }

    @media only screen and (max-width: 768px) {
        .mansonry-gallery .qodef-grid-col-4 img {
            width: 100%;
        }
    }

    @media only screen and (max-width: 575px) {
        .mansonry-gallery {
            padding-top: 180px;
        }
        .mansonry-gallery .qodef-mansonrygallery-title {
            left: 0;
            padding: 0;
            margin-top: -65px;
            text-align: center;
        }
    }
</style>
<div class="qodef-mansonrygallery-holder <?php echo esc_attr($holder_classes); ?> clearfix">
    <div class="qodef-mansonrygallery-title">
        Bộ sưu tập
    </div>
    <div class="vc_row wpb_row vc_inner vc_row-fluid qodef-grid-no-gutter">
        <div class="wpb_column vc_column_container vc_col-sm-12 banner-full">
            <a href="#"><img src="./wp-content/plugins/setsail-core/assets/img/gallery-img-full.png" alt="img"></a>
        </div>
        <div class="wpb_column vc_column_container vc_col-sm-4 banner-full">
            <a href="#"><img src="./wp-content/plugins/setsail-core/assets/img/gallery-img2.jpg" alt="img"></a>
        </div>
        <div class="wpb_column vc_column_container vc_col-sm-4 banner-full">
            <a href="#"><img src="./wp-content/plugins/setsail-core/assets/img/gallery-img3.jpg" alt="img"></a>
        </div>
        <div class="wpb_column vc_column_container vc_col-sm-4 banner-full">
            <a href="#"><img src="./wp-content/plugins/setsail-core/assets/img/gallery-img4.jpg" alt="img"></a>
        </div>
    </div>
</div>