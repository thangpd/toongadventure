<?php
echo '<pre>';
echo '$main_header';
print_r( $main_header );
echo '</pre>';
echo '<pre>';
echo '$sub_header';
print_r( $sub_header );
echo '</pre>';
echo '<pre>';
echo '$header_textfield';
print_r( $header_textfield );
echo '</pre>';
$vc_param_group_parse_atts = vc_param_group_parse_atts( $day_list );
echo '<pre>';
echo '$vc_param_group_parse_atts';
print_r( $vc_param_group_parse_atts );
echo '</pre>';
echo '<pre>';
echo '$vc_param_group_parse_atts[0][\'detail_list\']';
print_r( vc_param_group_parse_atts( $vc_param_group_parse_atts[0]['detail_list'] ) );
echo '</pre>';
/*'main_header'      => '',
			'sub_header'       => '',
			'header_textfield' => '',
			'day_list'         => '',
			'custom_class'     => '',
			'style'            => 'scrollsyncing',*/


?>

<div class="qodef-scrollsyncing-holder <?php echo esc_attr( $holder_classes ); ?> clearfix">

    <div class="qodef-grid-row">
        <div class="qodef-grid-col qodef-grid-col-4">
            <div class="bg-white">
                <ul class="col-body ul-schedule" id="smoothscroll">
					<?php for ( $i = - 1; $i < count( $vc_param_group_parse_atts ); $i ++ ) { ?>
                        <li class="<?= $i == - 1 ? 'active' : '' ?>" data-id="schedule-<?= $i+1 ?>" id="alich-<?= $i+1 ?>">
							<?php if ( $i == - 1 ) { ?>
                                <span><?php echo $main_header ?></span>
                                <span>Địa điểm xuất phát</span>
							<?php } else { ?>
                                <span>Ngày <?= $i + 1 ?></span>
                                <span><?= $vc_param_group_parse_atts[ $i ]['diadiem'] ?></span>
							<?php } ?>
                        </li>
					<?php } ?>
                </ul>
            </div>
        </div>

        <div class="qodef-grid-col qodef-grid-col-8">
            <div class="bg-white">
                <div class="v-scrollbar" id="js-scrollbar">
					<?php for ( $i = - 1; $i <= count( $vc_param_group_parse_atts ); $i ++ ) { ?>
						<?php
						if ( $i == - 1 ) { ?>
                            <div class="item flex-container about" id="schedule-<?= $i + 1 ?>"
                                 data-id="alich-<?= $i + 1 ?>">
                                <div class="col-item">
                                    <h3 class="col-header h4 title-section p-bot-2"><?php echo $sub_header ?></h3>
                                    <div class="col-body">

										<?php echo $header_textfield ?>
                                    </div>
                                </div>
                            </div>
						<?php } else { ?>
                            <div class="item flex-container" id="schedule-<?= $i+1 ?>" data-id="alich-<?= $i+1 ?>">
                                <div class="col-item">
                                    <h3 class="col-header h4 title-section p-bot-2"><?= $vc_param_group_parse_atts[ $i ]['title'] ?></h3>
                                    <div class="col-body">
										<?php $detail_list = vc_param_group_parse_atts( $vc_param_group_parse_atts[ $i ]['detail_list'] );

										if ( is_array( $detail_list ) ) :
											for ( $y = 0; $y < count( $detail_list ); $y ++ ) :
												?>
                                                <p><?php echo $detail_list[ $y ]['detail'] ?></p>
											<?php endfor;
										endif; ?>
                                    </div>
                                </div>
                            </div>
						<?php } ?>
					<?php } ?>
                    <!--
                    <div class="item flex-container" id="schedule-1" data-id="alich-1">
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
                    <div class="item flex-container" id="schedule-2" data-id="alich-2">
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
                    <div class="item flex-container" id="schedule-3" data-id="alich-3">
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
                    <div class="item flex-container" id="schedule-4" data-id="alich-4">
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
                    <div class="item flex-container" id="schedule-5" data-id="alich-5">
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
                    </div>-->
                </div>
            </div>
        </div>
    </div>
</div>