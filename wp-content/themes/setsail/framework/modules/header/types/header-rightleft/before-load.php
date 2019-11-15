<?php

if ( ! function_exists('setsail_select_set_header_rightleft_type_global_option')) {
    /**
     * This function set header type value for global header option map
     */
    function setsail_select_set_header_rightleft_type_global_option($header_types)
    {
        $header_types['header-rightleft'] = array(
            'image' => SELECT_FRAMEWORK_HEADER_TYPES_ROOT . '/header-rightleft/assets/img/header-rightleft.png',
            'label' => esc_html__('Right Left', 'setsail')
        );

        return $header_types;
    }

    add_filter('setsail_select_filter_header_type_global_option',
        'setsail_select_set_header_rightleft_type_global_option');
}

if ( ! function_exists('setsail_select_set_header_rightleft_type_as_global_option')) {
    /**
     * This function set default header type value for global header option map
     */
    function setsail_select_set_header_rightleft_type_as_global_option($header_type)
    {
        $header_type = 'header-rightleft';

        return $header_type;
    }

    add_filter('setsail_select_filter_default_header_type_global_option',
        'setsail_select_set_header_rightleft_type_as_global_option');
}

if ( ! function_exists('setsail_select_set_header_rightleft_type_meta_boxes_option')) {
    /**
     * This function set header type value for header meta boxes map
     */
    function setsail_select_set_header_rightleft_type_meta_boxes_option($header_type_options)
    {
        $header_type_options['header-rightleft'] = esc_html__('rightleft', 'setsail');

        return $header_type_options;
    }

    add_filter('setsail_select_filter_header_type_meta_boxes',
        'setsail_select_set_header_rightleft_type_meta_boxes_option');
}

if ( ! function_exists('setsail_select_set_hide_dep_options_header_rightleft')) {
    /**
     * This function is used to hide all containers/panels for admin options when this header type is selected
     */
    function setsail_select_set_hide_dep_options_header_rightleft($hide_dep_options)
    {
        $hide_dep_options[] = 'header-right-left';

        return $hide_dep_options;
    }

    // header global panel options
    add_filter('setsail_select_filter_header_logo_area_hide_global_option',
        'setsail_select_set_hide_dep_options_header_rightleft');

    // header global panel meta boxes
    add_filter('setsail_select_filter_header_logo_area_hide_meta_boxes',
        'setsail_select_set_hide_dep_options_header_rightleft');

    // header types panel options
    add_filter('setsail_select_filter_header_centered_hide_global_option',
        'setsail_select_set_hide_dep_options_header_rightleft');
    add_filter('setsail_select_filter_full_screen_menu_hide_global_option',
        'setsail_select_set_hide_dep_options_header_rightleft');
    add_filter('setsail_select_filter_header_vertical_hide_global_option',
        'setsail_select_set_hide_dep_options_header_rightleft');
    add_filter('setsail_select_filter_header_vertical_menu_hide_global_option',
        'setsail_select_set_hide_dep_options_header_rightleft');
    add_filter('setsail_select_filter_header_vertical_closed_hide_global_option',
        'setsail_select_set_hide_dep_options_header_rightleft');
    add_filter('setsail_select_filter_header_vertical_sliding_hide_global_option',
        'setsail_select_set_hide_dep_options_header_rightleft');

    // header types panel meta boxes
    add_filter('setsail_select_filter_header_centered_hide_meta_boxes',
        'setsail_select_set_hide_dep_options_header_rightleft');
    add_filter('setsail_select_filter_header_vertical_hide_meta_boxes',
        'setsail_select_set_hide_dep_options_header_rightleft');

    // header widget area meta boxes
    add_filter('setsail_select_filter_header_widget_area_two_hide_meta_boxes',
        'setsail_select_set_hide_dep_options_header_rightleft');
}