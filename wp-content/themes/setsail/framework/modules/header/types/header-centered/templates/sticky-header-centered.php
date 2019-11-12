<?php do_action('setsail_select_action_after_sticky_header'); ?>

    <div class="qodef-sticky-header">
        <?php do_action('setsail_select_action_after_sticky_menu_html_open'); ?>
        <div class="qodef-sticky-holder">
        <?php if ($sticky_header_in_grid) : ?>
            <div class="qodef-grid">
        <?php endif; ?>
                <div class=" qodef-vertical-align-containers">
                    <div class="qodef-position-left"><!--
                     --><div class="qodef-position-left-inner">
                            <?php if (!$hide_logo) {
                                setsail_select_get_logo('sticky');
                            } ?>
                        </div>
                    </div>
                    <div class="qodef-position-right"><!--
                     --><div class="qodef-position-right-inner">
                            <?php setsail_select_get_sticky_menu('qodef-sticky-nav'); ?>
                        </div>
                    </div>
                </div>
        <?php if ($sticky_header_in_grid) : ?>
            </div>
        <?php endif; ?>
        </div>
    </div>

<?php do_action('setsail_select_action_after_sticky_header'); ?>