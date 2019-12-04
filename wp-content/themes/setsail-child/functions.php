<?php

/*** Child Theme Function  ***/

if ( ! function_exists('setsail_select_child_theme_enqueue_scripts')) {
    function setsail_select_child_theme_enqueue_scripts()
    {
        $parent_style = 'setsail-select-default-style';

        wp_enqueue_style('setsail-select-child-style', get_stylesheet_directory_uri() . '/style.css',
            array($parent_style));
    }

    add_action('wp_enqueue_scripts', 'setsail_select_child_theme_enqueue_scripts');
}

function my_styles_method()
{
    $background_image     = setsail_select_options()->getOptionValue('footer_background_container');
    $image_pattern_toong  = get_stylesheet_directory_uri() . '/assets/image/toong_pattern.png';
    $image_pattern_toong2 = get_stylesheet_directory_uri() . '/assets/image/pattern.png';
//    $image_toong          = get_stylesheet_directory_uri() . '/assets/image/background.png';
    $image_toong = setsail_select_options()->getOptionValue('tour_item_area_background_image');
    if (empty($image_toong)) {
        $image_toong = get_stylesheet_directory_uri() . '/assets/image/background.png';
    }
    $custom_css = "
    
    .qodef-tours-type-toong .qodef-tours-gim-holder-inner{
        background: url({$image_toong }) center/100% 100%;
    }
    .qodef-tours-type-toong-2 .qodef-tours-gim-image:after {
    content: \"\";
    top: 0;
    left: 0;
    width: 101%;
    height: 101%;
    background: url({$image_pattern_toong2 }) center/100% 100% no-repeat;
    opacity: 1;
}

    .qodef-tours-dwt-holder .qodef-td-items.destination .qodef-tdi-image:after {
        content: \"\";
        top: 0;
        left: 0;
        width: 101%;
        height: 101%;
        background: url({$image_pattern_toong }) center/100% 100% no-repeat;
        opacity: 1;
    }
    .qodef-footer-top-holder{
            background-image: url({$background_image });
            background-color:unset!important;
            background-repeat: no-repeat, repeat;
            padding-top:150px;
            padding-bottom:150px;
            background-position: top;
            background-size: cover;
    }";

    wp_add_inline_style('setsail-select-child-style', $custom_css);
}

add_action('wp_enqueue_scripts', 'my_styles_method');

//do_action('slz_add_inline_style', $custom_css);















