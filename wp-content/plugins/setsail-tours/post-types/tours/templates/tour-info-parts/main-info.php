<?php $main_info_array = setsail_tours_get_tour_info_table_data(get_the_ID()); ?>
<div class="qodef-info-section-part qodef-tour-item-main-info">
    <ul class="qodef-tour-main-info-holder clearfix">
        <?php
        if(count($main_info_array)) {
            foreach($main_info_array as $item) { ?>
                <?php if($item['value']) { ?>

                    <li class="clearfix <?php if(!empty($item['html_class'])) {
                        echo esc_attr($item['html_class']);
                    } ?>">
                        <h6 class="qodef-info">
                            <?php echo esc_html($item['text']); ?>
                        </h6>
                        <div class="qodef-value">
                            <?php if($item['value']) {
                                if(is_array($item['value']) && count($item['value'])) {
                                    foreach($item['value'] as $item) { ?>
                                        <div class="qodef-tour-main-info-attr">
                                            <?php echo esc_html($item); ?>
                                        </div>
                                    <?php }
                                } else {
                                    echo wp_kses($item['value'], array(
	                                    'a' => array(
		                                    'href' => array(),
		                                    'target' => array(),
		                                    'title' => array()
	                                    )
                                    ));
                                }
                            }; ?>
                        </div>
                    </li>
                <?php }
            }
        }
        ?>
    </ul>
</div>
