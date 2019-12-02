<?php do_action('setsail_select_action_before_mobile_navigation'); ?>

<?php if (has_nav_menu('mobile-navigation') || has_nav_menu('main-navigation')) { ?>
    <nav class="qodef-mobile-nav" role="navigation" aria-label="<?php esc_attr_e('Mobile Menu', 'setsail'); ?>">
        <div class="qodef-grid">
            <?php
            // Set main navigation menu as mobile if mobile navigation is not set
            $theme_location = has_nav_menu('mobile-navigation') ? 'mobile-navigation' : 'main-navigation';
            $id             = setsail_select_get_page_id();
            $header_type    = setsail_select_get_meta_field_intersect('header_type', $id);
            if ($header_type == 'header-rightleft') {
                ?>
                <ul id="MyMenu">
                    <?php wp_nav_menu(array(
                        'items_wrap'     => '%3$s',
                        'theme_location' => 'left-nav',
                        'fallback_cb'    => 'top_navigation_fallback',
                        'link_before'    => '<span>',
                        'link_after'     => '</span>',
                        'walker'         => new SetSailSelectClassMobileNavigationWalker(),
                        'container'      => false
                    )); ?>
                    <?php wp_nav_menu(array(
                        'items_wrap'     => '%3$s',
                        'theme_location' => 'right-nav',
                        'fallback_cb'    => 'top_navigation_fallback',
                        'link_before'    => '<span>',
                        'link_after'     => '</span>',
                        'walker'         => new SetSailSelectClassMobileNavigationWalker(),
                        'container'      => false
                    )); ?>
                </ul>
                <?php
            } else {
                wp_nav_menu(array(
                    'theme_location'  => $theme_location,
                    'container'       => '',
                    'container_class' => '',
                    'menu_class'      => '',
                    'menu_id'         => '',
                    'fallback_cb'     => 'top_navigation_fallback',
                    'link_before'     => '<span>',
                    'link_after'      => '</span>',
                    'walker'          => new SetSailSelectClassMobileNavigationWalker()
                ));
            } ?>
        </div>
    </nav>
<?php } ?>

<?php do_action('setsail_select_action_after_mobile_navigation'); ?>