<?php

$tour_plan = get_post_meta(get_the_ID(), 'tour_plan_repeater', true);

if(is_array($tour_plan) && count($tour_plan)) { ?>
	
	<h3 class="qodef-tour-plan-title">
		<?php esc_html_e( 'Tour Plan', 'setsail-tours' ); ?>
	</h3>
	
    <?php foreach ($tour_plan as $i => $tour_plan_item) { ?>

        <div class="qodef-info-section-part qodef-tour-item-plan-part clearfix">
            <div class="qodef-route-top-holder">
            	<div class="qodef-route-id">
		            <div class="qodef-route-id-inner"><?php echo($i + 1); ?></div>
	            </div>
                <span class="qodef-line-between-icons">
                    <span class="qodef-line-between-icons-inner"></span>
                </span>
	            <h4 class="qodef-tour-item-plan-part-title">
	                <?php echo esc_attr($tour_plan_item['tour_plan_section_title']); ?>
	            </h4>
            </div>
            <div class="qodef-tour-item-plan-part-description">
                <?php
                    echo do_shortcode($tour_plan_item['tour_plan_section_description']);
                ?>
            </div>

        </div>

    <?php }

}