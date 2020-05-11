<?php

/*          'text_1' => '',
            'des_1' => '',
            'text_list_1' => [],
            'text_2' => '',
            'des_2' => '',
            'text_list_2' => [],
            'text_3' => '',
            'des_3' => '',
            'text_list_3' => [],
            'text_4' => '',
            'des_4' => '',
            'text_list_4' => [],
            'text_5' => '',
            'des_5' => '',
            'text_list_5' => [],
*/

?>
<h2 class="qodef-slicksyncing-title">
    Cấp độ mạo hiểm sdfgsd sdfgs dfg sdfg sdf
</h2>
<div class="qodef-slicksyncing-holder <?php echo esc_attr($holder_classes); ?> clearfix">

    <div class="qodef-grid-row">
        <div class="qodef-grid-col-8" style="padding-top: 1rem">
            <img src="<?php echo plugin_dir_url(__DIR__); ?>/assets/img/5-level-bg.png" alt="5-level">

            <div class="qodef-grid-row slider-single">
                <?php for ($i = 1; $i <= 5; $i++) { ?>
                    <div class="item qodef-grid-col-20per qodef-grid-col-phone-33per"
                         data-slick-index="<?php echo $i - 1 ?>">
                        <div class="single-box ">
                            <div class="col-title">level <?php echo $i ?></div>
                            <div class="col-content">
                                <?php echo ($params['text_' . $i]); ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="qodef-grid-col-4">
            <div class="level-slide slider-nav">
                <?php $format = '<div class="slide-item slick-slide" >
                    <div class="slide-title">
                        <span>Level %1$s</span>
                        <span>%2$s</span>
                    </div>
                    <div class="slide-content">
                        <ul>
                        %3$s                      
                        </ul>
                    </div>
                </div>'; ?>
                <?php
                for ($i = 1; $i <= 5; $i++) {
                    $item = '';
                    if (!empty($params['text_list_' . $i])) {
                        $parsed = vc_param_group_parse_atts($params['text_list_' . $i]);
                        foreach ($parsed as $val) {
                            $item .= sprintf('<li>%1$s</li>', $val['text']);
                        }
                    }
                    printf($format, $i, $params['des_' . $i], $item, $i - 1);
                }
                ?>
            </div>
        </div>
    </div>
</div>
