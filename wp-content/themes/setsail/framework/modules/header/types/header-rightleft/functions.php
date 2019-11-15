<?php


if ( ! function_exists('setsail_select_include_header_rightleft_menu')) {
    function setsail_select_include_header_rightleft_menu($menus)
    {
        $menus['header-right'] = esc_html__('Right Menu', 'setsail');
        $menus['header-left']  = esc_html__('Left Menu', 'setsail');

        return $menus;
    }

    add_filter('setsail_select_filter_register_headers_menu', 'setsail_select_include_header_rightleft_menu');
}

if ( ! function_exists('setsail_select_register_header_rightleft_type')) {
    /**
     * This function is used to register header type class for header factory file
     */
    function setsail_select_register_header_rightleft_type($header_types)
    {
        $header_type = array(
            'header-rightleft' => 'SetSailSelectNamespace\Modules\Header\Types\HeaderRightleft'
        );

        $header_types = array_merge($header_types, $header_type);

        return $header_types;
    }
}

if ( ! function_exists('setsail_select_init_register_header_rightleft_type')) {
    /**
     * This function is used to wait header-function.php file to init header object and then to init hook registration function above
     */
    function setsail_select_init_register_header_rightleft_type()
    {
        add_filter('setsail_select_filter_register_header_type_class', 'setsail_select_register_header_rightleft_type');
    }

    add_action('setsail_select_action_before_header_function_init',
        'setsail_select_init_register_header_rightleft_type');
}