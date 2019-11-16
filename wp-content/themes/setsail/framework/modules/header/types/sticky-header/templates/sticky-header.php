<?php do_action('setsail_select_action_before_sticky_header'); ?>

<div class="qodef-sticky-header">
    <?php do_action( 'setsail_select_action_after_sticky_menu_html_open' ); ?>
    <div class="qodef-sticky-holder <?php echo esc_attr($menu_area_class); ?>">
        <?php if($sticky_header_in_grid) : ?>
        <div class="qodef-grid">
            <?php endif; ?>
            <div class="qodef-vertical-align-containers">
                <div class="qodef-position-left">
                    <div class="qodef-position-left-inner">
                        <nav class="qodef-main-menu qodef-drop-down <?php echo esc_attr('qodef-default-nav'); ?>">
                            <?php setsail_theme_nav_menu('left-nav'); ?>
                        </nav>
                    </div>
                </div>
                <div class="qodef-position-center">
                    <div class="qodef-position-center-inner">
                        <?php if ( ! $hide_logo) {
                            setsail_select_get_logo();
                        } ?>
                    </div>
                </div>
                <div class="qodef-position-right">
                    <div class="qodef-position-right-inner">
                        <nav class="qodef-main-menu qodef-drop-down <?php echo esc_attr('qodef-default-nav'); ?>">
                            <?php setsail_theme_nav_menu('right-nav'); ?>
<!--                            --><?php //setsail_select_get_sticky_header_widget_menu_area(); ?>

                        </nav>
                    </div>
                </div>
            </div>

            <?php if($sticky_header_in_grid) : ?>
        </div>
        <?php endif; ?>
    </div>
	<?php do_action( 'setsail_select_action_before_sticky_menu_html_close' ); ?>
</div>

<?php do_action('setsail_select_action_after_sticky_header'); ?>