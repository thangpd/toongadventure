<style>

</style>
<div class="qodef-scrollsyncing-holder <?php echo esc_attr($holder_classes); ?> clearfix">
    <h2 class="qodef-scrollsyncing-title">
        Lịch trình
    </h2>
    <div class="qodef-grid-row">
        <div class="qodef-grid-col-4">
            <div class="bg-white">
                <ul class="col-body ul-schedule" id="smoothscroll">
                    <?php for ($i = 0; $i <= 5; $i++) { ?>
                        <li class="" data-id="schedule-<?= $i ?>" id="alich-<?= $i ?>">
                            <?php if ($i == 0) { ?>
                                <span>Xuất phát</span>
                                <span>Địa điểm xuất phát</span>
                            <?php } else { ?>
                                <span>Ngày <?= $i ?></span>
                                <span>Địa điểm <?= $i ?></span>
                            <?php } ?>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>

        <div class="qodef-grid-col-8">

        </div>
    </div>
</div>