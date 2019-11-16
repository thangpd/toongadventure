<?php do_action('setsail_select_action_before_page_header'); ?>

    <header class="qodef-page-header">
        <?php do_action('setsail_select_action_after_page_header_html_open'); ?>

        <?php if ($show_fixed_wrapper) : ?>
        <div class="qodef-fixed-wrapper">
            <?php endif; ?>

            <div class="qodef-menu-area <?php echo esc_attr($menu_area_position_class); ?>">
                <?php do_action('setsail_select_action_after_header_menu_area_html_open') ?>

                <?php if ($menu_area_in_grid) : ?>
                <div class="qodef-grid">
                    <?php endif; ?>

                    <div class="qodef-vertical-align-containers header-rightleft">
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
<!--                                    --><?php //setsail_select_get_sticky_header_widget_menu_area(); ?>

                                </nav>
                            </div>
                        </div>
                    </div>

                    <?php if ($menu_area_in_grid) : ?>
                </div>
            <?php endif; ?>
            </div>

            <?php if ($show_fixed_wrapper) { ?>
        </div>
    <?php } ?>

        <?php if ($show_sticky) {
            setsail_select_get_sticky_header();
        } ?>

        <?php do_action('setsail_select_action_before_page_header_html_close'); ?>
    </header>

<?php do_action('setsail_select_action_after_page_header'); ?>