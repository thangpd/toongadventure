<style>
    .flex-container {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: horizontal;
        -webkit-box-direction: normal;
        -webkit-flex-direction: row;
        -ms-flex-direction: row;
        flex-direction: row;
        -webkit-flex-wrap: wrap;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        -webkit-box-orient: horizontal;
        -webkit-box-direction: normal;
        -webkit-flex-flow: row wrap;
        -ms-flex-flow: row wrap;
        flex-flow: row wrap;
        -ms-flex-pack: distribute;
    }

    .p-bot-2 {
        padding-bottom: 20px;
    }

    .v-scrollbar::-webkit-scrollbar {
        width: 3px;
        height: 3px
    }

    .v-scrollbar::-webkit-scrollbar-track {
        background: #fff
    }

    .v-scrollbar::-webkit-scrollbar-thumb {
        width: 15px;
        background: #6f6f6f
    }

    .scrollsyncing .qodef-grid-col:nth-child(1) .bg-white {
        padding: 20px 0 20px 20px;
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

    .scrollsyncing .qodef-grid-col:nth-child(1) .bg-white li:last-child:after {
        display: none;
    }

    .scrollsyncing .qodef-grid-col:nth-child(1) .bg-white li span {
        -webkit-transition: all .5s cubic-bezier(.215, .61, .355, 1);
        -moz-transition: all .5s cubic-bezier(.215, .61, .355, 1);
        -o-transition: all .5s cubic-bezier(.215, .61, .355, 1);
        transition: all .5s cubic-bezier(.215, .61, .355, 1);
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
        font-size: .8rem;
        text-align: center;
        border-radius: 100px;
        line-height: 55px;
        margin-right: 15px;
    }

    .scrollsyncing .qodef-grid-col:nth-child(1) .bg-white li:nth-child(1) span:nth-child(1) {
        display: flex;
        align-items: center;
        line-height: 1.4;
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

    .scrollsyncing .qodef-grid-col:nth-child(1) .bg-white li.active span:nth-child(2),
    .scrollsyncing .qodef-grid-col:nth-child(1) .bg-white li:hover span:nth-child(2) {
        background-color: #faac48;
        color: #0b4041;
    }

    .scrollsyncing .qodef-grid-col:nth-child(1) .bg-white li.active span:nth-child(1),
    .scrollsyncing .qodef-grid-col:nth-child(1) .bg-white li:hover span:nth-child(1) {
        border-color: #0b4041;
    }

    .scrollsyncing .qodef-grid-col:nth-child(2) .bg-white {
        background-color: #f7f7f7 !important;
    }

    .scrollsyncing .qodef-grid-col:nth-child(2) .bg-white .v-scrollbar {
        overflow-y: auto;
        height: 695px;
        scroll-behavior: smooth;
    }

    .scrollsyncing .qodef-grid-col:nth-child(2) .item {
        background-color: #fff;
        margin: 40px auto;
        width: 80%;
        padding: 30px;
    }

    /*.scrollsyncing .qodef-grid-col:nth-child(2) .item:first-child {
        margin-top: 150px;
    }*/

    /*.scrollsyncing .qodef-grid-col:nth-child(2) .item .col-item:nth-child(1) {
        width: 65%;
        padding-right: 15px;
    }*/

    /*.scrollsyncing .qodef-grid-col:nth-child(2) .item .col-item:nth-child(2) {
        width: 35%;
        padding-left: 15px;
    }*/
    .scrollsyncing .qodef-grid-col:nth-child(2) .item .col-item .title-section {
        font-weight: 900;
        color: #0b4041;
    }

    .scrollsyncing .qodef-grid-col:nth-child(2) .item .col-item:nth-child(1) .col-body {
        border-left: 1px solid #363636;
        padding-left: 20px;
    }

    .scrollsyncing .qodef-grid-col:nth-child(2) .item .col-item:nth-child(1) .col-body > * {
        position: relative;
        padding-bottom: 20px;
    }

    .scrollsyncing .qodef-grid-col:nth-child(2) .item .col-item:nth-child(1) .col-body > *:after {
        top: 5px;
        left: calc(-20px - 6px);
        font-size: 16px;
        line-height: 16px;
        position: absolute;
        content: "";
        width: 10px;
        height: 10px;
        border-radius: 100%;
        color: #0b4041;
        background-color: #0b4041;
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
            <div class="bg-white">
                <div class="v-scrollbar" id="js-scrollbar">
                    <div class="item flex-container" id="schedule-0" data-id="alich-0">
                        <div class="col-item">
                            <h3 class="col-header h4 title-section p-bot-2">Ng&#224;y 1: TPHCM -
                                BONDOWOSO</h3>
                            <div class="col-body">
                                <p>Khởi hành từ Sài Gòn từ đêm hôm trước. Trải nghiệm cảm giác "ngủ sân bay" tại trạm
                                    trung chuyển của châu Á.</p>
                                <p>Bắt đầu hành trình tại sân bay Surabaya. Di chuyển 240km về thị trấn dưới chân núi
                                    Ijen.</p>
                                <p>Nghỉ ngơi sớm chuẩn bị công cuộc trekking đêm.&nbsp;</p>
                                <p>Gear up bản thân với thử thách đầu tiên - <strong>núi lửa Ijen cao hơn
                                        2.700m.</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="item flex-container" id="schedule-1" data-id="alich-1">
                        <div class="col-item">
                            <h3 class="col-header h4 title-section p-bot-2">Ng&#224;y 2: RANU PANE</h3>
                            <div class="col-body">
                                <p><strong>Summit đỉnh trong đêm khuya</strong>. Nếu may mắn, bạn có thể chiêm ngưỡng
                                    ngọn lửa xanh trong lòng núi lửa.&nbsp;</p>
                                <p>Di chuyển thêm 300km đến&nbsp;Bromo.</p>
                                <p>Di chuyển sang <strong>khu vực vườn quốc gia Bromo - Semeru</strong>. Chuyển xe jeep,
                                    băng qua sa mạc cát rượt đuổi hoàng hôn dưới chân núi Bromo.</p>
                                <p>Nghỉ đêm trong <strong>ngôi làng địa phương khuất trên đỉnh Ranu Pani.</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="item flex-container" id="schedule-2" data-id="alich-2">
                        <div class="col-item">
                            <h3 class="col-header h4 title-section p-bot-2">Ng&#224;y 3: KALIMATI</h3>
                            <div class="col-body">
                                <p><strong>Kiểm tra sức khỏe </strong>và làm thủ tục trước khi chính thức chinh phục
                                    Semeru.</p>
                                <p>Bắt đầu hành trình, di chuyển qua 3 trạm nghỉ để đến khu vực thơ mộng nhất - <strong>hồ
                                        Kumbolo.</strong></p>
                                <p><strong>Trekking băng qua Loveland </strong>chiêm ngưỡng vẻ đẹp thiên nhiên thay đổi
                                    theo độ cao.&nbsp;</p>
                                <p><strong>Hạ trại ở Kalimati</strong>, ngắm milky way và nghỉ đêm chuẩn bị công cuộc
                                    chinh phục&nbsp;Semeru.</p>
                            </div>
                        </div>
                    </div>
                    <div class="item flex-container" id="schedule-3" data-id="alich-3">
                        <div class="col-item">
                            <h3 class="col-header h4 title-section p-bot-2">Ng&#224;y 4: HỒ KUMBOLO</h3>
                            <div class="col-body">
                                <p>Thức dậy lúc 12:00 đêm để bắt đầu hành trình chinh phục <strong>đỉnh Semeru cao
                                        3.675m</strong>.</p>
                                <p>Đặt chân lên đỉnh và <strong>chiêm ngưỡng bình minh</strong> tự hào nhất.</p>
                                <p>Ăn trưa và hạ trại. Di chuyển ngược về hồ Kumbolo.</p>
                                <p><strong>Cắm trại bên bờ hồ Kumbolo</strong>&nbsp;và tự thưởng cho sự kiên trì của bản
                                    thân.</p>
                            </div>
                        </div>
                    </div>
                    <div class="item flex-container" id="schedule-4" data-id="alich-4">
                        <div class="col-item">
                            <h3 class="col-header h4 title-section p-bot-2">Ng&#224;y 5: SURABAYA</h3>
                            <div class="col-body">
                                <p>Đón bình minh bên mặt hồ sương mù, chuẩn bị hành lý quay về Bromo.</p>
                                <p><strong>Ngồi nóc xe Jeep</strong>, cảm nhận vẻ đẹp thiên nhiên hoang sơ. <strong>Hành
                                        hương lên đỉnh Bromo </strong>- điểm kết cho hành trình chinh phục "bộ ba núi
                                    lửa".</p>
                                <p>Di chuyển về khách sạn gần sân bay Surabaya, tổng kết chuyến đi cùng IGo Lead.</p>
                            </div>
                        </div>
                    </div>
                    <div class="item flex-container" id="schedule-5" data-id="alich-5">
                        <div class="col-item">
                            <h3 class="col-header h4 title-section p-bot-2">Ng&#224;y 6: SURABAYA -
                                TPHCM</h3>
                            <div class="col-body">
                                <p>Di chuyển ra sân bay Surabaya, khởi hành về Việt Nam.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        $('#smoothscroll li').on('click', function () {
            var n = $(this).data('id'),
                t = $('#' + n)[0],
                i = t.offsetTop;
            $("#smoothscroll li").removeClass("active");
            $(this).addClass("active");
            scrollTo($('#js-scrollbar')[0], i - 30, 100)
        })
        $("#js-scrollbar .item").each(function () {
            var n = $(this).attr("id"),
                t = $(this).data("id"),
                i = document.getElementById(t),
                r = i.offsetTop,
                u = new Waypoint({
                    element: document.getElementById(n),
                    handler: function () {
                        $("#smoothscroll li").removeClass("active");
                        $("#smoothscroll").find("li[data-id='" + n + "']").addClass("active");
                        scrollTo(document.getElementById("smoothscroll"), r - 100, 100)
                    },
                    context: document.getElementById("js-scrollbar"),
                    offset: "20%"
                })
        });
    })
</script>