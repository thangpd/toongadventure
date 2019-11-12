<?php

if ( ! function_exists( 'setsail_select_sidearea_options_map' ) ) {
	function setsail_select_sidearea_options_map() {

        setsail_select_add_admin_page(
            array(
                'slug'  => '_side_area_page',
                'title' => esc_html__('Side Area', 'setsail'),
                'icon'  => 'fa fa-indent'
            )
        );

        $side_area_panel = setsail_select_add_admin_panel(
            array(
                'title' => esc_html__('Side Area', 'setsail'),
                'name'  => 'side_area',
                'page'  => '_side_area_page'
            )
        );

        setsail_select_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'select',
                'name'          => 'side_area_type',
                'default_value' => 'side-menu-slide-from-right',
                'label'         => esc_html__('Side Area Type', 'setsail'),
                'description'   => esc_html__('Choose a type of Side Area', 'setsail'),
                'options'       => array(
                    'side-menu-slide-from-right' => esc_html__('Slide from Right Over Content', 'setsail')
                ),
            )
        );

        setsail_select_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'text',
                'name'          => 'side_area_width',
                'default_value' => '',
                'label'         => esc_html__('Side Area Width', 'setsail'),
                'description'   => esc_html__('Enter a width for Side Area (px or %). Default width: 405px.', 'setsail'),
                'args'          => array(
                    'col_width' => 3,
                )
            )
        );

        $side_area_width_container = setsail_select_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_width_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_type' => 'side-menu-slide-from-right',
                    )
                )
            )
        );

        setsail_select_add_admin_field(
            array(
                'parent'        => $side_area_width_container,
                'type'          => 'color',
                'name'          => 'side_area_content_overlay_color',
                'default_value' => '',
                'label'         => esc_html__('Content Overlay Background Color', 'setsail'),
                'description'   => esc_html__('Choose a background color for a content overlay', 'setsail'),
            )
        );

        setsail_select_add_admin_field(
            array(
                'parent'        => $side_area_width_container,
                'type'          => 'text',
                'name'          => 'side_area_content_overlay_opacity',
                'default_value' => '',
                'label'         => esc_html__('Content Overlay Background Transparency', 'setsail'),
                'description'   => esc_html__('Choose a transparency for the content overlay background color (0 = fully transparent, 1 = opaque)', 'setsail'),
                'args'          => array(
                    'col_width' => 3
                )
            )
        );

        setsail_select_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'select',
                'name'          => 'side_area_icon_source',
                'default_value' => 'icon_pack',
                'label'         => esc_html__('Select Side Area Icon Source', 'setsail'),
                'description'   => esc_html__('Choose whether you would like to use icons from an icon pack or SVG icons', 'setsail'),
                'options'       => setsail_select_get_icon_sources_array()
            )
        );

        $side_area_icon_pack_container = setsail_select_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_icon_pack_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_icon_source' => 'icon_pack'
                    )
                )
            )
        );

        setsail_select_add_admin_field(
            array(
                'parent'        => $side_area_icon_pack_container,
                'type'          => 'select',
                'name'          => 'side_area_icon_pack',
                'default_value' => 'font_elegant',
                'label'         => esc_html__('Side Area Icon Pack', 'setsail'),
                'description'   => esc_html__('Choose icon pack for Side Area icon', 'setsail'),
                'options'       => setsail_select_icon_collections()->getIconCollectionsExclude(array('linea_icons', 'dripicons', 'simple_line_icons'))
            )
        );

        $side_area_svg_icons_container = setsail_select_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_svg_icons_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_icon_source' => 'svg_path'
                    )
                )
            )
        );

        setsail_select_add_admin_field(
            array(
                'parent'      => $side_area_svg_icons_container,
                'type'        => 'textarea',
                'name'        => 'side_area_icon_svg_path',
                'label'       => esc_html__('Side Area Icon SVG Path', 'setsail'),
                'description' => esc_html__('Enter your Side Area icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'setsail'),
            )
        );

        setsail_select_add_admin_field(
            array(
                'parent'      => $side_area_svg_icons_container,
                'type'        => 'textarea',
                'name'        => 'side_area_close_icon_svg_path',
                'label'       => esc_html__('Side Area Close Icon SVG Path', 'setsail'),
                'description' => esc_html__('Enter your Side Area close icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'setsail'),
            )
        );

        $side_area_icon_style_group = setsail_select_add_admin_group(
            array(
                'parent'      => $side_area_panel,
                'name'        => 'side_area_icon_style_group',
                'title'       => esc_html__('Side Area Icon Style', 'setsail'),
                'description' => esc_html__('Define styles for Side Area icon', 'setsail')
            )
        );

        $side_area_icon_style_row1 = setsail_select_add_admin_row(
            array(
                'parent' => $side_area_icon_style_group,
                'name'   => 'side_area_icon_style_row1'
            )
        );

        setsail_select_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row1,
                'type'   => 'colorsimple',
                'name'   => 'side_area_icon_color',
                'label'  => esc_html__('Color', 'setsail')
            )
        );

        setsail_select_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row1,
                'type'   => 'colorsimple',
                'name'   => 'side_area_icon_hover_color',
                'label'  => esc_html__('Hover Color', 'setsail')
            )
        );

        $side_area_icon_style_row2 = setsail_select_add_admin_row(
            array(
                'parent' => $side_area_icon_style_group,
                'name'   => 'side_area_icon_style_row2',
                'next'   => true
            )
        );

        setsail_select_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row2,
                'type'   => 'colorsimple',
                'name'   => 'side_area_close_icon_color',
                'label'  => esc_html__('Close Icon Color', 'setsail')
            )
        );

        setsail_select_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row2,
                'type'   => 'colorsimple',
                'name'   => 'side_area_close_icon_hover_color',
                'label'  => esc_html__('Close Icon Hover Color', 'setsail')
            )
        );

        setsail_select_add_admin_field(
            array(
                'parent'      => $side_area_panel,
                'type'        => 'color',
                'name'        => 'side_area_background_color',
                'label'       => esc_html__('Background Color', 'setsail'),
                'description' => esc_html__('Choose a background color for Side Area', 'setsail')
            )
        );

        setsail_select_add_admin_field(
            array(
                'parent'      => $side_area_panel,
                'type'        => 'text',
                'name'        => 'side_area_padding',
                'label'       => esc_html__('Padding', 'setsail'),
                'description' => esc_html__('Define padding for Side Area in format top right bottom left', 'setsail'),
                'args'        => array(
                    'col_width' => 3
                )
            )
        );

        setsail_select_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'selectblank',
                'name'          => 'side_area_aligment',
                'default_value' => '',
                'label'         => esc_html__('Text Alignment', 'setsail'),
                'description'   => esc_html__('Choose text alignment for side area', 'setsail'),
                'options'       => array(
                    ''       => esc_html__('Default', 'setsail'),
                    'left'   => esc_html__('Left', 'setsail'),
                    'center' => esc_html__('Center', 'setsail'),
                    'right'  => esc_html__('Right', 'setsail')
                )
            )
        );
    }

    add_action('setsail_select_action_options_map', 'setsail_select_sidearea_options_map', setsail_select_set_options_map_position( 'sidearea' ) );
}