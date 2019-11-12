<?php

if ( ! function_exists( 'setsail_select_error_404_options_map' ) ) {
	function setsail_select_error_404_options_map() {
		
		setsail_select_add_admin_page(
			array(
				'slug'  => '__404_error_page',
				'title' => esc_html__( '404 Error Page', 'setsail' ),
				'icon'  => 'fa fa-exclamation-triangle'
			)
		);
		
		$panel_404_header = setsail_select_add_admin_panel(
			array(
				'page'  => '__404_error_page',
				'name'  => 'panel_404_header',
				'title' => esc_html__( 'Header', 'setsail' )
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent'      => $panel_404_header,
				'type'        => 'color',
				'name'        => '404_menu_area_background_color_header',
				'label'       => esc_html__( 'Background Color', 'setsail' ),
				'description' => esc_html__( 'Choose a background color for header area', 'setsail' )
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent'        => $panel_404_header,
				'type'          => 'text',
				'name'          => '404_menu_area_background_transparency_header',
				'default_value' => '',
				'label'         => esc_html__( 'Background Transparency', 'setsail' ),
				'description'   => esc_html__( 'Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'setsail' ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent'      => $panel_404_header,
				'type'        => 'color',
				'name'        => '404_menu_area_border_color_header',
				'label'       => esc_html__( 'Border Color', 'setsail' ),
				'description' => esc_html__( 'Choose a border bottom color for header area', 'setsail' )
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent'        => $panel_404_header,
				'type'          => 'select',
				'name'          => '404_header_style',
				'default_value' => '',
				'label'         => esc_html__( 'Header Skin', 'setsail' ),
				'description'   => esc_html__( 'Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'setsail' ),
				'options'       => array(
					''             => esc_html__( 'Default', 'setsail' ),
					'light-header' => esc_html__( 'Light', 'setsail' ),
					'dark-header'  => esc_html__( 'Dark', 'setsail' )
				)
			)
		);
		
		$panel_404_options = setsail_select_add_admin_panel(
			array(
				'page'  => '__404_error_page',
				'name'  => 'panel_404_options',
				'title' => esc_html__( '404 Page Options', 'setsail' )
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent' => $panel_404_options,
				'type'   => 'color',
				'name'   => '404_page_background_color',
				'label'  => esc_html__( 'Background Color', 'setsail' )
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent'      => $panel_404_options,
				'type'        => 'image',
				'name'        => '404_page_background_image',
				'label'       => esc_html__( 'Background Image', 'setsail' ),
				'description' => esc_html__( 'Choose a background image for 404 page', 'setsail' )
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent'      => $panel_404_options,
				'type'        => 'image',
				'name'        => '404_page_background_pattern_image',
				'label'       => esc_html__( 'Pattern Background Image', 'setsail' ),
				'description' => esc_html__( 'Choose a pattern image for 404 page', 'setsail' )
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent'      => $panel_404_options,
				'type'        => 'image',
				'name'        => '404_page_title_image',
				'label'       => esc_html__( 'Title Image', 'setsail' ),
				'description' => esc_html__( 'Choose a background image for displaying above 404 page Title', 'setsail' )
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent'        => $panel_404_options,
				'type'          => 'text',
				'name'          => '404_title',
				'default_value' => '',
				'label'         => esc_html__( 'Title', 'setsail' ),
				'description'   => esc_html__( 'Enter title for 404 page. Default label is "404".', 'setsail' )
			)
		);
		
		$first_level_group = setsail_select_add_admin_group(
			array(
				'parent'      => $panel_404_options,
				'name'        => 'first_level_group',
				'title'       => esc_html__( 'Title Style', 'setsail' ),
				'description' => esc_html__( 'Define styles for 404 page title', 'setsail' )
			)
		);
		
		$first_level_row1 = setsail_select_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row1'
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type'   => 'colorsimple',
				'name'   => '404_title_color',
				'label'  => esc_html__( 'Text Color', 'setsail' ),
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent'        => $first_level_row1,
				'type'          => 'fontsimple',
				'name'          => '404_title_google_fonts',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'setsail' ),
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent'        => $first_level_row1,
				'type'          => 'textsimple',
				'name'          => '404_title_font_size',
				'default_value' => '',
				'label'         => esc_html__( 'Font Size', 'setsail' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent'        => $first_level_row1,
				'type'          => 'textsimple',
				'name'          => '404_title_line_height',
				'default_value' => '',
				'label'         => esc_html__( 'Line Height', 'setsail' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$first_level_row2 = setsail_select_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row2',
				'next'   => true
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent'        => $first_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_title_font_style',
				'default_value' => '',
				'label'         => esc_html__( 'Font Style', 'setsail' ),
				'options'       => setsail_select_get_font_style_array()
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent'        => $first_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_title_font_weight',
				'default_value' => '',
				'label'         => esc_html__( 'Font Weight', 'setsail' ),
				'options'       => setsail_select_get_font_weight_array()
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent'        => $first_level_row2,
				'type'          => 'textsimple',
				'name'          => '404_title_letter_spacing',
				'default_value' => '',
				'label'         => esc_html__( 'Letter Spacing', 'setsail' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent'        => $first_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_title_text_transform',
				'default_value' => '',
				'label'         => esc_html__( 'Text Transform', 'setsail' ),
				'options'       => setsail_select_get_text_transform_array()
			)
		);

        $first_level_group_responsive = setsail_select_add_admin_group(
            array(
                'parent'      => $panel_404_options,
                'name'        => 'first_level_group_responsive',
                'title'       => esc_html__( 'Title Style Responsive', 'setsail' ),
                'description' => esc_html__( 'Define responsive styles for 404 page title (under 680px)', 'setsail' )
            )
        );

        $first_level_row3 = setsail_select_add_admin_row(
            array(
                'parent' => $first_level_group_responsive,
                'name'   => 'first_level_row3'
            )
        );

        setsail_select_add_admin_field(
            array(
                'parent'        => $first_level_row3,
                'type'          => 'textsimple',
                'name'          => '404_title_responsive_font_size',
                'default_value' => '',
                'label'         => esc_html__( 'Font Size', 'setsail' ),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        setsail_select_add_admin_field(
            array(
                'parent'        => $first_level_row3,
                'type'          => 'textsimple',
                'name'          => '404_title_responsive_line_height',
                'default_value' => '',
                'label'         => esc_html__( 'Line Height', 'setsail' ),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        setsail_select_add_admin_field(
            array(
                'parent'        => $first_level_row3,
                'type'          => 'textsimple',
                'name'          => '404_title_responsive_letter_spacing',
                'default_value' => '',
                'label'         => esc_html__( 'Letter Spacing', 'setsail' ),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );
		
		setsail_select_add_admin_field(
			array(
				'parent'        => $panel_404_options,
				'type'          => 'text',
				'name'          => '404_text',
				'default_value' => '',
				'label'         => esc_html__( 'Text', 'setsail' ),
				'description'   => esc_html__( 'Enter text for 404 page.', 'setsail' )
			)
		);
		
		$third_level_group = setsail_select_add_admin_group(
			array(
				'parent'      => $panel_404_options,
				'name'        => '$third_level_group',
				'title'       => esc_html__( 'Text Style', 'setsail' ),
				'description' => esc_html__( 'Define styles for 404 page text', 'setsail' )
			)
		);
		
		$third_level_row1 = setsail_select_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name'   => '$third_level_row1'
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type'   => 'colorsimple',
				'name'   => '404_text_color',
				'label'  => esc_html__( 'Text Color', 'setsail' ),
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent'        => $third_level_row1,
				'type'          => 'fontsimple',
				'name'          => '404_text_google_fonts',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'setsail' ),
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent'        => $third_level_row1,
				'type'          => 'textsimple',
				'name'          => '404_text_font_size',
				'default_value' => '',
				'label'         => esc_html__( 'Font Size', 'setsail' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent'        => $third_level_row1,
				'type'          => 'textsimple',
				'name'          => '404_text_line_height',
				'default_value' => '',
				'label'         => esc_html__( 'Line Height', 'setsail' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$third_level_row2 = setsail_select_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name'   => '$third_level_row2',
				'next'   => true
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent'        => $third_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_text_font_style',
				'default_value' => '',
				'label'         => esc_html__( 'Font Style', 'setsail' ),
				'options'       => setsail_select_get_font_style_array()
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent'        => $third_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_text_font_weight',
				'default_value' => '',
				'label'         => esc_html__( 'Font Weight', 'setsail' ),
				'options'       => setsail_select_get_font_weight_array()
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent'        => $third_level_row2,
				'type'          => 'textsimple',
				'name'          => '404_text_letter_spacing',
				'default_value' => '',
				'label'         => esc_html__( 'Letter Spacing', 'setsail' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent'        => $third_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_text_text_transform',
				'default_value' => '',
				'label'         => esc_html__( 'Text Transform', 'setsail' ),
				'options'       => setsail_select_get_text_transform_array()
			)
		);

        $third_level_group_responsive = setsail_select_add_admin_group(
            array(
                'parent'      => $panel_404_options,
                'name'        => 'third_level_group_responsive',
                'title'       => esc_html__( 'Text Style Responsive', 'setsail' ),
                'description' => esc_html__( 'Define responsive styles for 404 page text (under 680px)', 'setsail' )
            )
        );

        $third_level_row3 = setsail_select_add_admin_row(
            array(
                'parent' => $third_level_group_responsive,
                'name'   => 'third_level_row3'
            )
        );

        setsail_select_add_admin_field(
            array(
                'parent'        => $third_level_row3,
                'type'          => 'textsimple',
                'name'          => '404_text_responsive_font_size',
                'default_value' => '',
                'label'         => esc_html__( 'Font Size', 'setsail' ),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        setsail_select_add_admin_field(
            array(
                'parent'        => $third_level_row3,
                'type'          => 'textsimple',
                'name'          => '404_text_responsive_line_height',
                'default_value' => '',
                'label'         => esc_html__( 'Line Height', 'setsail' ),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        setsail_select_add_admin_field(
            array(
                'parent'        => $third_level_row3,
                'type'          => 'textsimple',
                'name'          => '404_text_responsive_letter_spacing',
                'default_value' => '',
                'label'         => esc_html__( 'Letter Spacing', 'setsail' ),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );
		
		setsail_select_add_admin_field(
			array(
				'parent'      => $panel_404_options,
				'type'        => 'text',
				'name'        => '404_back_to_home',
				'label'       => esc_html__( 'Back to Home Button Label', 'setsail' ),
				'description' => esc_html__( 'Enter label for "Back to home" button', 'setsail' )
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent'        => $panel_404_options,
				'type'          => 'select',
				'name'          => '404_button_style',
				'default_value' => '',
				'label'         => esc_html__( 'Button Skin', 'setsail' ),
				'description'   => esc_html__( 'Choose a style to make Back to Home button in that predefined style', 'setsail' ),
				'options'       => array(
					''            => esc_html__( 'Default', 'setsail' ),
					'light-style' => esc_html__( 'Light', 'setsail' )
				)
			)
		);
	}
	
	add_action( 'setsail_select_action_options_map', 'setsail_select_error_404_options_map', setsail_select_set_options_map_position( '404' ) );
}