<?php
if(!function_exists('setsail_tours_register_tour_list_widget')) {
    /**
     * Function that register tour list widget
     */
    function setsail_tours_register_tour_list_widget($widgets) {
        $widgets[] = 'SetSailToursTourListWidget';

        return $widgets;
    }

    add_filter('setsail_select_filter_register_widgets', 'setsail_tours_register_tour_list_widget');
}

