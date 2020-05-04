<style>
    .scrollsyncing .qodef-grid-col:nth-child(1) .bg-white {
        padding: 20px 0 20px 40px;
    }
    .scrollsyncing .qodef-grid-col:nth-child(1) .bg-white ul {
        height: 600px;
        overflow-y: auto;
    }
    .scrollsyncing .qodef-grid-col:nth-child(1) .bg-white li {
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: start;
        -ms-flex-pack: start;
        justify-content: flex-start;
        list-style: none;
        margin-bottom: 30px;
        margin-right: 20px;
        position: relative;
    }
    .scrollsyncing .qodef-grid-col:nth-child(1) .bg-white li:after {
        border-left: 1px dashed #363636;
        position: absolute;
        content: "";
        width: 1px;
        height: 100%;
        left: calc(30px - .5px);
        z-index: 1;
        bottom: -100%;
    }
    .scrollsyncing .qodef-grid-col:nth-child(1) .bg-white li span {
        -webkit-transition: all .5s cubic-bezier(.215,.61,.355,1);
        -moz-transition: all .5s cubic-bezier(.215,.61,.355,1);
        -o-transition: all .5s cubic-bezier(.215,.61,.355,1);
        transition: all .5s cubic-bezier(.215,.61,.355,1);
        position: relative;
        z-index: 2;
        cursor: pointer;
        display: block;
        background-color: #fff;
    }
    .scrollsyncing .qodef-grid-col:nth-child(1) .bg-white li span:nth-child(1) {
        border: 1px solid #363636;
        width: 60px;
        height: 60px;
        text-align: center;
        border-radius: 100px;
        line-height: 55px;
        margin-right: 15px;
    }
    .scrollsyncing .qodef-grid-col:nth-child(1) .bg-white li span:nth-child(2) {
        font-weight: bold;
        padding: 6px 12px;
        width: calc(100% - 60px - 16px);
        border-radius: 4px;
    }
    .scrollsyncing .qodef-grid-col:nth-child(1) .bg-white li.active span,
    .scrollsyncing .qodef-grid-col:nth-child(1) .bg-white li:hover span {
        background-color: #0b4041;
        color: #fff;
    }
    .scrollsyncing .qodef-grid-col:nth-child(1) .bg-white li.active span:nth-child(1),
    .scrollsyncing .qodef-grid-col:nth-child(1) .bg-white li:hover span:nth-child(1) {
        border-color: #0b4041;
    }
</style>
<div class="qodef-scrollsyncing-holder <?php echo esc_attr($holder_classes); ?> clearfix">
    <h2 class="qodef-scrollsyncing-title">
        Lịch trình
    </h2>
    <div class="qodef-grid-row">
        <div class="qodef-grid-col qodef-grid-col-4">
            <div class="bg-white">
                <ul class="col-body ul-schedule" id="smoothscroll">
                    <?php for ($i = 0; $i <= 5; $i++) { ?>
                        <li class="<?= $i == 0 ? 'active' : '' ?>" data-id="schedule-<?= $i ?>" id="alich-<?= $i ?>">
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

        <div class="qodef-grid-col qodef-grid-col-8">

        </div>
    </div>
</div>