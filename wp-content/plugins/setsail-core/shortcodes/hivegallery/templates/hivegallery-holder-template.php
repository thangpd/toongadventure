<?php
if (!empty($params['image_list'])) {
    $format = '<div class="grid grid-1">%1$s</div><div class="grid grid-2">%2$s</div>';
    $format_item_1 = '    <div class="block-inner">
                    <div class="title">
                        %1$s
                    </div>
                    <div class="block">
                        <img src="%2$s"
                             alt="">
                    </div>
                </div>
            ';
    $format_item_2 = '    <div class="block-inner">
                    <div class="block">
                        <img src="%2$s"
                             alt="">
                    </div>
                    <div class="title">
                        %1$s
                    </div>
                </div>
            ';
    $image_list = vc_param_group_parse_atts($params['image_list']);
    $count = 1;
    $str_item = [];
    foreach ($image_list as $item) {
        $image = wp_get_attachment_image_src($item['image'], 'large');
        if ($count <= count($image_list) / 2) {
            $str_item['grid1'] .= sprintf($format_item_1, $item['text'], $image[0]);
        } else {
            $str_item['grid2'] .= sprintf($format_item_2, $item['text'], $image[0]);
        }
        $count++;
    }
    $print = sprintf($format, $str_item['grid1'], $str_item['grid2']);
}

?>

<div class="qodef-accordion-holder <?php echo esc_attr($holder_classes); ?> clearfix">
    <div class="experience-wrapper">
        <div class="hive-grid">
            <?php echo $print; ?>
        </div>
    </div>
</div>