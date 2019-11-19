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
    $background_image = setsail_select_options()->getOptionValue('footer_background_container');

    $custom_css = "
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















