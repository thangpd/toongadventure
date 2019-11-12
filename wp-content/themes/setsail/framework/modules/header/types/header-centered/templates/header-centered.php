<?php do_action('setsail_select_action_before_page_header'); ?>

<header class="qodef-page-header">
	<?php do_action('setsail_select_action_after_page_header_html_open'); ?>
	
    <div class="qodef-logo-area">
	    <?php do_action( 'setsail_select_action_after_header_logo_area_html_open' ); ?>
	    
        <?php if($logo_area_in_grid) : ?>
            <div class="qodef-grid">
        <?php endif; ?>
			
            <div class="qodef-vertical-align-containers">
	            <div class="qodef-position-left"><!--
                 --><div class="qodef-position-left-inner">
			            <div class="qodef-centered-widget-holder">
				            <?php setsail_select_get_header_widget_area_one(); ?>
			            </div>
		            </div>
	            </div>
                <div class="qodef-position-center"><!--
                 --><div class="qodef-position-center-inner">
                        <?php if(!$hide_logo) {
                            setsail_select_get_logo();
                        } ?>
                    </div>
                </div>
	            <div class="qodef-position-right"><!--
                 --><div class="qodef-position-right-inner">
			            <div class="qodef-centered-widget-holder">
				            <?php setsail_select_get_header_widget_area_two(); ?>
			            </div>
		            </div>
	            </div>
            </div>
	            
        <?php if($logo_area_in_grid) : ?>
            </div>
        <?php endif; ?>
    </div>
	
    <?php if($show_fixed_wrapper) : ?>
        <div class="qodef-fixed-wrapper">
    <?php endif; ?>
	        
    <div class="qodef-menu-area">
	    <?php do_action( 'setsail_select_action_after_header_menu_area_html_open' ); ?>
	    
        <?php if($menu_area_in_grid) : ?>
            <div class="qodef-grid">
        <?php endif; ?>
	            
            <div class="qodef-vertical-align-containers">
                <div class="qodef-position-center"><!--
                 --><div class="qodef-position-center-inner">
                        <?php setsail_select_get_main_menu(); ?>
                    </div>
                </div>
            </div>
	            
        <?php if($menu_area_in_grid) : ?>
            </div>
        <?php endif; ?>
    </div>
	
    <?php if($show_fixed_wrapper) { ?>
        </div>
	<?php } ?>
	
	<?php if($show_sticky) {
		setsail_select_get_sticky_header('centered', 'header/types/header-centered');
	} ?>
	
	<?php do_action('setsail_select_action_before_page_header_html_close'); ?>
</header>

<?php do_action('setsail_select_action_after_page_header'); ?>