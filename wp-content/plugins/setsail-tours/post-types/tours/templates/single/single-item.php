<?php
extract($tour_sections);
?>

<article class="qodef-tour-item-wrapper qodef-tabs qodef-horizontal qodef-tab-text">

    <ul class="qodef-tabs-nav clearfix">
        <?php foreach($tour_sections as $section) {

            if($section['value'] === 'yes') { ?>

                <li class="qodef-tour-nav-item">

                    <a href="<?php echo esc_attr($section['id']) ?>">

                        <span class="qodef-tour-nav-section-icon <?php echo esc_attr($section['icon']) ?>"></span>

						<span class="qodef-tour-nav-section-title">
							<?php echo esc_html($section['title']) ?>
						</span>

                    </a>
                </li>

            <?php }

        }; ?>
    </ul>


    <?php if($show_info_section['value'] === 'yes') { ?>

        <div class="qodef-tour-item-section qodef-information-section qodef-tab-container" id="<?php echo esc_attr($show_info_section['id']) ?>">
	
	        <div class="qodef-grid-row qodef-grid-large-gutter">
		        <div class="qodef-grid-col-9">
			        <?php setsail_tours_get_tour_info_part('tour-info-parts/title'); ?>
			        <?php setsail_tours_get_tour_info_part('tour-info-parts/content'); ?>
			
			        <div class="qodef-tour-item-short-info">
				        <?php setsail_tours_get_tour_info_part('tour-info-parts/years'); ?>
				        <?php setsail_tours_get_tour_info_part('tour-info-parts/categories'); ?>
			        </div>
			
			        <?php setsail_tours_get_tour_info_part('tour-info-parts/main-info'); ?>
			        <?php setsail_tours_get_tour_info_part('tour-info-parts/gallery'); ?>
		        </div>
	        </div>
        </div>

    <?php } ?>

    <?php if($show_plan_section['value'] === 'yes') { ?>

        <div class="qodef-tour-item-section qodef-plan-section qodef-tab-container" id="<?php echo esc_attr($show_plan_section['id']) ?>">
	        
	        <div class="qodef-grid-row qodef-grid-large-gutter">
		        <div class="qodef-grid-col-9">
			        
			        <?php setsail_tours_get_tour_info_part('tour-plan-parts/plan'); ?>
			        
		        </div>
	        </div>
        </div>

    <?php } ?>

    <?php if($show_location_section['value'] === 'yes') { ?>

        <div class="qodef-tour-item-section qodef-location-section qodef-tab-container" id="<?php echo esc_attr($show_location_section['id']) ?>">
	        <div class="qodef-grid-row qodef-grid-large-gutter">
		        <div class="qodef-grid-col-9">
			        
			        <?php setsail_tours_get_tour_info_part('tour-location-parts/location'); ?>
			        
		        </div>
	        </div>
        </div>

    <?php } ?>

    <?php if($show_gallery_section['value'] === 'yes') { ?>

        <div class="qodef-tour-item-section qodef-gallery-section qodef-tab-container" id="<?php echo esc_attr($show_gallery_section['id']) ?>">
	        <div class="qodef-grid-row qodef-grid-large-gutter">
		        <div class="qodef-grid-col-9">
			
			        <?php setsail_tours_get_tour_info_part('tour-gallery-parts/gallery'); ?>
		
		        </div>
	        </div>
        </div>

    <?php } ?>

    <?php if($show_review_section['value'] === 'yes') { ?>

        <div class="qodef-tour-item-section qodef-reviews-section qodef-tab-container" id="<?php echo esc_attr($show_review_section['id']) ?>">
	        <div class="qodef-grid-row qodef-grid-large-gutter">
		        <div class="qodef-grid-col-9">
			        
			        <?php setsail_tours_get_tour_info_part('tour-review-parts/reviews'); ?>
		
		        </div>
	        </div>
        </div>

    <?php } ?>

    <?php if($show_custom_section_1['value'] === 'yes') { ?>

        <div class="qodef-tour-item-section qodef-custom-section qodef-tab-container" id="<?php echo esc_attr($show_custom_section_1['id']) ?>">
	        <div class="qodef-grid-row qodef-grid-large-gutter">
		        <div class="qodef-grid-col-9">
			
			        <?php setsail_tours_get_tour_info_part('tour-custom1-parts/custom'); ?>
		
		        </div>
	        </div>
        </div>

    <?php } ?>

    <?php if($show_custom_section_2['value'] === 'yes') { ?>

        <div class="qodef-tour-item-section qodef-custom-2-section qodef-tab-container" id="<?php echo esc_attr($show_custom_section_2['id']) ?>">
	        <div class="qodef-grid-row qodef-grid-large-gutter">
		        <div class="qodef-grid-col-9">
			
			        <?php setsail_tours_get_tour_info_part('tour-custom2-parts/custom'); ?>
		
		        </div>
	        </div>
        </div>

    <?php } ?>
	
	
	<div class="qodef-sidebar-holder">
		<aside class="qodef-sidebar">
			<div class="widget qodef-tours-booking-form-holder">
				<?php if(setsail_tours_is_tour_bookable()) : ?>
					<?php echo setsail_tours_get_tour_module_template_part('single/booking-form', 'tours', 'templates', '', $params); ?>
				<?php endif; ?>
			</div>
			
			<?php dynamic_sidebar('tour-single-sidebar'); ?>
		</aside>
	</div>

</article>
