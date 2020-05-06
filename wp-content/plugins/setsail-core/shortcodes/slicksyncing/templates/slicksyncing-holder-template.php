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
        <div class="qodef-grid-col-4">
            <div class="level-slide">
                <div class="slide-item">
                    <div class="slide-title">
                        <span>Level 1</span>
                        <span>Nhẹ nhàng</span>
                    </div>
                    <div class="slide-content">
                        <ul>
                            <li>
                                Dành cho những bạn mới trekking lần đầu
                            </li>
                            <li>
                                Dành cho những bạn mới trekking lần đầu
                            </li>
                            <li>
                                Dành cho những bạn mới trekking lần đầu
                            </li>
                            <li>
                                Dành cho những bạn mới trekking lần đầu
                            </li>
                            <li>
                                Dành cho những bạn mới trekking lần đầu
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="slide-item">
                    <div class="slide-title">
                        <span>Level 2</span>
                        <span>Nhẹ nhàng</span>
                    </div>
                    <div class="slide-content">
                        <ul>
                            <li>
                                Dành cho những bạn mới trekking lần đầu
                            </li>
                            <li>
                                Dành cho những bạn mới trekking lần đầu
                            </li>
                            <li>
                                Dành cho những bạn mới trekking lần đầu
                            </li>
                            <li>
                                Dành cho những bạn mới trekking lần đầu
                            </li>
                            <li>
                                Dành cho những bạn mới trekking lần đầu
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="slide-item">
                    <div class="slide-title">
                        <span>Level 3</span>
                        <span>Nhẹ nhàng</span>
                    </div>
                    <div class="slide-content">
                        <ul>
                            <li>
                                Dành cho những bạn mới trekking lần đầu
                            </li>
                            <li>
                                Dành cho những bạn mới trekking lần đầu
                            </li>
                            <li>
                                Dành cho những bạn mới trekking lần đầu
                            </li>
                            <li>
                                Dành cho những bạn mới trekking lần đầu
                            </li>
                            <li>
                                Dành cho những bạn mới trekking lần đầu
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.level-slide').slick({
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: false,
        pauseOnHover: true,
    });
</script>