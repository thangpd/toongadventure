<?php
if(!function_exists('setsail_tours_include_widgets_loaders')) {
    /**
     * Loads all custom post types by going through all folders that are placed directly in post types folder
     */
    function setsail_tours_include_widgets_loaders() {
        if(setsail_tours_theme_installed()) {
            foreach (glob(SETSAIL_TOURS_CPT_PATH . '/tours//widgets/*/load.php') as $widget_load) {
                include_once $widget_load;

            }
        }
    }

    add_action('setsail_select_action_before_options_map', 'setsail_tours_include_widgets_loaders', 20); //Priority needs to be bigger than 10 so abstract widget class is loaded first
}