<?php


if (!function_exists('setsail_core_add_customheader_shortcodes')) {
    function setsail_core_add_customheader_shortcodes($shortcodes_class_name)
    {
        $shortcodes = array(
            'SetSailCore\CPT\Shortcodes\Customheader\customheader',
        );

        $shortcodes_class_name = array_merge($shortcodes_class_name, $shortcodes);

        return $shortcodes_class_name;
    }

    add_filter('setsail_core_filter_add_vc_shortcode', 'setsail_core_add_customheader_shortcodes');
}
//[qodef_shortcode_team user_attach_image="7192" user_job="Job" user_name="Name" user_des="Nếu bạn đam mê du lịch nhất là du lịch mạo hiểm mà chưa từng trải nghiệm Trekking Tà Năng thì đó quả là một thiếu sót rất lớn.Nếu bạn đam mê du lịch nhất là du lịch mạo hiểm mà chưa từng trải nghiệm Trekking Tà Năng thì đó quả là một thiếu sót rất lớn.Nếu bạn đam mê du lịch nhất là du lịch mạo hiểm mà chưa từng trải nghiệm Trekking Tà Năng thì đó quả là một thiếu sót rất lớn.
//Nếu bạn đam mê du lịch nhất là du lịch mạo hiểm mà chưa từng trải nghiệm Trekking Tà Năng thì đó quả là một thiếu sót rất lớn."]
if (!function_exists('setsail_core_set_customheader_custom_style_for_vc_shortcodes')) {
    /**
     * Function that set custom css style for customheader shortcode
     */
    function setsail_core_set_customheader_custom_style_for_vc_shortcodes($style)
    {
        $current_style = '.vc_shortcodes_container.wpb_qodef_customheader_tab { 
			background-color: #f4f4f4; 
		}';

        $style .= $current_style;

        return $style;
    }

    add_filter('setsail_core_filter_add_vc_shortcodes_custom_style', 'setsail_core_set_customheader_custom_style_for_vc_shortcodes');
}

if (!function_exists('setsail_core_set_customheader_icon_class_name_for_vc_shortcodes')) {
    /**
     * Function that set custom icon class name for customheader shortcode to set our icon for Visual Composer shortcodes panel
     */
    function setsail_core_set_customheader_icon_class_name_for_vc_shortcodes($shortcodes_icon_class_array)
    {
        $shortcodes_icon_class_array[] = '.icon-wpb-customheader';

        return $shortcodes_icon_class_array;
    }

    add_filter('setsail_core_filter_add_vc_shortcodes_custom_icon_class', 'setsail_core_set_customheader_icon_class_name_for_vc_shortcodes');
}

if (!function_exists('setsail_core_set_customheader_assets')) {
    /**
     * Function that set custom icon class name for customheader shortcode to set our icon for Visual Composer shortcodes panel
     */
    function setsail_core_set_customheader_assets()
    {
        wp_register_script('customheader_js', plugins_url('/assets/js/customheader.js', __FILE__), array('jquery'), '1.0', true);
        wp_register_style('customheader_css', plugins_url('/assets/css/customheader.css', __FILE__), ['bootstrap']);
    }

    add_filter('init', 'setsail_core_set_customheader_assets');
}