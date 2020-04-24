<style>
    .experience {
        background-position: center top;
        background-size: contain;
        background-repeat: repeat-x;
    }
    h2.experience-title {
        margin: 0;
        padding: 12px 60px;
        display: inline-block;
        background: url(/uploads/2020/04/experience-title-bg.png) left/contain no-repeat;
        color: #013f3a;
    }
    .hive-grid {
        padding: 60px 0 135px;
    }
    .grid {
        display: grid;
        width: auto;
        -webkit-box-pack: center;
        justify-content: center;
        grid-template-columns: repeat(auto-fit, 260px);
        grid-template-rows: repeat(auto-fit, minmax(325px, 325px));
        grid-auto-rows: 325px;
    }
    .grid .block {
        -webkit-clip-path: polygon(50% 0, 95% 25%, 95% 75%, 50% 100%, 5% 75%, 5% 25%);
        clip-path: polygon(50% 0, 95% 25%, 95% 75%, 50% 100%, 5% 75%, 5% 25%);
    }
    .block {
        position: relative;
        height: 260px;
        background-color: #0b4041;
        grid-column: 2 span;
        display: -webkit-box;
        display: flex;
        -webkit-box-align: center;
        align-items: center;
        -webkit-box-pack: center;
        justify-content: center;
        font-weight: bold;
        font-style: italic;
        font-size: 35px;
        -webkit-transition: background-color 300ms, -webkit-clip-path 300ms;
        transition: background-color 300ms, -webkit-clip-path 300ms;
        transition: clip-path 300ms, background-color 300ms;
        transition: clip-path 300ms, background-color 300ms, -webkit-clip-path 300ms;
    }
    .block img {
        max-width: unset;
    }
    .grid .title {
        text-align: center;
        margin-bottom: 60px;
        position: relative;
        font-weight: 900;
        font-size: 14px;
        text-transform: uppercase;
        max-width: 90%;
        margin-left: auto;
        margin-right: auto;
    }
    .grid-2 .title {
        margin-top: 60px;
        margin-bottom: 0;
    }
    .grid .title:before {
        content: "";
        position: absolute;
        left: 50%;
        bottom: -15px;
        width: 13px;
        height: 13px;
        background-color: #0b4041;
        border-radius: 10px;
        transform: translateX(-50%);
    }
    .grid .title:after {
        content: "";
        position: absolute;
        left: 50%;
        bottom: -55px;
        width: 2px;
        height: 50px;
        background-color: #0b4041;
        transform: translateX(-50%);
    }
    .grid-2 .title:before {
        bottom: auto;
        top: -15px
    }
    .grid-2 .title:after {
        bottom: auto;
        top: -55px
    }

    @media only screen and (max-width: 575px) {
        .grid-2 .title {
            order: 1
        }
        .grid-2 .block {
            order: 2
        }
    }
</style>
<div class="qodef-accordion-holder <?php echo esc_attr($holder_classes); ?> clearfix">
    <h2 class="experience-title">
        Trải nghiệm độc nhất
    </h2>
    <div class="experience-wrapper">
        <div class="hive-grid">
            <div class="grid grid-1">
                <div class="block-inner">
                    <div class="title">
                        Khám phá hồ Cô Đơn giữa rừng
                    </div>
                    <div class="block">
                        <img src="https://images.unsplash.com/photo-1507146426996-ef05306b995a?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ"
                             alt="">
                    </div>
                </div>
                <div class="block-inner">
                    <div class="title">
                        Check-in mũi Đá Vách được xem là Ba Li Việt Nam
                    </div>
                    <div class="block">
                        <img src="https://images.unsplash.com/photo-1544568100-847a948585b9?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ"
                             alt="">
                    </div>
                </div>
            </div>
            <div class="grid grid-2">
                <div class="block-inner">
                    <div class="block">
                        <img src="https://images.unsplash.com/photo-1548199973-03cce0bbc87b?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ"
                             alt="">
                    </div>
                    <div class="title">
                        Trải nghiệm xe mui trần băng qua những bãi biển đẹp nhất Ninh Thuận
                    </div>
                </div>
                <div class="block-inner">
                    <div class="block">
                        <img src="https://images.unsplash.com/photo-1530281700549-e82e7bf110d6?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ"
                             alt="">
                    </div>
                    <div class="title">
                        Bãi cắm trại riêng biệt, tiện nghi tại bãi Chà Là hoang sơ
                    </div>
                </div>
                <div class="block-inner">
                    <div class="block">
                        <img src="https://images.unsplash.com/photo-1552053831-71594a27632d?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ"
                             alt="">
                    </div>
                    <div class="title">
                        Lặn ngắm san hô và hệ sinh thái biển
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>