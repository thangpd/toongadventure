<style>
    .qodef-slicksyncing-title {
        margin: 0;
        padding: 12px 60px;
        display: inline-block;
        background: url("./wp-content/plugins/setsail-core/assets/img/adventure-level-title-bg.png") left/contain no-repeat;
        color: #013f3a;
    }

    div[class*=qodef-grid-col-] {
        position: relative;
        float: left;
        min-height: 1px;
        padding-left: 15px;
        padding-right: 15px;
        box-sizing: border-box;
    }
    .qodef-grid-col-20per {
        width: 20%;
    }
    .adventure-level {
        background-position: center top!important;
        top: -62px;
        padding-top: 65px;
        padding-bottom: 140px;
    }
    .adventure-level .single-box {
        color: #de6527;
        font-weight: 600;
        padding: 20px 0;
        text-align: center;
        text-transform: uppercase;
    }
    .adventure-level .qodef-grid-col-20per:nth-child(even) .single-box {
        color: #013f3a;
    }
    .adventure-level .single-box .col-title {
        position: relative;
        font-weight: 600;
        padding-bottom: 10px;
        margin-bottom: 10px;
    }
    .adventure-level .single-box .col-title:after {
        content:"";
        position: absolute;
        top: auto;
        left: 50%;
        bottom: 0;
        width: 40px;
        height: 3px;
        background-color: #de6527;
        -webkit-transform: translateX(-50%);
        -moz-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        -o-transform: translateX(-50%);
        transform: translateX(-50%);
    }
    .adventure-level .qodef-grid-col-20per:nth-child(even) .single-box .col-title:after {
        background-color: #013f3a;
    }

    .adventure-level .single-box .col-content p {
        margin-bottom: 0;
        font-size: .8rem;
    }
    @media only screen and (max-width: 575px) {
        .qodef-grid-col-phone-33per {
            width: 33.33%;
        }

        .adventure-level {
            padding-left: 0px !important;
            padding-right: 0px !important;
        }

        .adventure-level .vc_column-inner {
            padding-top: 0!important;
        }

        .adventure-level .qodef-grid-row .qodef-grid-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .adventure-level .single-box {
            padding: 10px 0;
        }

        .adventure-level .single-box .col-title,
        .adventure-level .single-box .col-content p{
            font-size: .7rem;
        }
    }
</style>
<div class="qodef-slicksyncing-holder <?php echo esc_attr($holder_classes); ?> clearfix">
    <h2 class="qodef-slicksyncing-title">
        Cấp độ mạo hiểm
    </h2>
    <div class="qodef-grid-row">
        <div class="qodef-grid-col-8" style="padding-top: 1rem">
            <img src="./wp-content/plugins/setsail-core/assets/img/5-level-bg.png" alt="5-level">

            <div class="qodef-grid-row">
                <?php for ($i = 1; $i <= 5; $i++) { ?>
                <div class="qodef-grid-col-20per qodef-grid-col-phone-33per">
                    <div class="single-box">
                        <div class="col-title">level <?php echo $i ?></div>
                        <div class="col-content">
                            <p>8 nang tien</p>
                            <p>lao than</p>
                            <p>fansipan</p>
                            <p>ta nang - phan dung</p>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="qodef-grid-col-4"></div>
    </div>
</div>