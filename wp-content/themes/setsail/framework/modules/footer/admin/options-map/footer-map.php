<?php

if ( ! function_exists( 'setsail_select_footer_options_map' ) ) {
	function setsail_select_footer_options_map() {

		setsail_select_add_admin_page(
			array(
				'slug'  => '_footer_page',
				'title' => esc_html__( 'Footer', 'setsail' ),
				'icon'  => 'fa fa-sort-amount-asc'
			)
		);

		$footer_panel = setsail_select_add_admin_panel(
			array(
				'title' => esc_html__( 'Footer', 'setsail' ),
				'name'  => 'footer',
				'page'  => '_footer_page'
			)
		);

		setsail_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'footer_in_grid',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Footer in Grid', 'setsail' ),
				'description'   => esc_html__( 'Enabling this option will place Footer content in grid', 'setsail' ),
				'parent'        => $footer_panel
			)
		);

        setsail_select_add_admin_field(
            array(
                'type'          => 'yesno',
                'name'          => 'uncovering_footer',
                'default_value' => 'no',
                'label'         => esc_html__( 'Uncovering Footer', 'setsail' ),
                'description'   => esc_html__( 'Enabling this option will make Footer gradually appear on scroll', 'setsail' ),
                'parent'        => $footer_panel
            )
        );

		setsail_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_top',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Footer Top', 'setsail' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'setsail' ),
				'parent'        => $footer_panel
			)
		);
		
		$show_footer_top_container = setsail_select_add_admin_container(
			array(
				'name'       => 'show_footer_top_container',
				'parent'     => $footer_panel,
				'dependency' => array(
					'show' => array(
						'show_footer_top' => 'yes'
					)
				)
			)
		);

		setsail_select_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns',
				'parent'        => $show_footer_top_container,
				'default_value' => '3 3 3 3',
				'label'         => esc_html__( 'Footer Top Columns', 'setsail' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Top area', 'setsail' ),
				'options'       => array(
					'12' => '1',
					'6 6' => '2',
					'4 4 4' => '3',
                    '3 3 6' => '3 (25% + 25% + 50%)',
					'3 3 3 3' => '4'
				)
			)
		);

		setsail_select_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns_alignment',
				'default_value' => 'left',
				'label'         => esc_html__( 'Footer Top Columns Alignment', 'setsail' ),
				'description'   => esc_html__( 'Text Alignment in Footer Columns', 'setsail' ),
				'options'       => array(
					''       => esc_html__( 'Default', 'setsail' ),
					'left'   => esc_html__( 'Left', 'setsail' ),
					'center' => esc_html__( 'Center', 'setsail' ),
					'right'  => esc_html__( 'Right', 'setsail' )
				),
				'parent'        => $show_footer_top_container
			)
		);
		
		$footer_top_styles_group = setsail_select_add_admin_group(
			array(
				'name'        => 'footer_top_styles_group',
				'title'       => esc_html__( 'Footer Top Styles', 'setsail' ),
				'description' => esc_html__( 'Define style for footer top area', 'setsail' ),
				'parent'      => $show_footer_top_container
			)
		);
		
		$footer_top_styles_row_1 = setsail_select_add_admin_row(
			array(
				'name'   => 'footer_top_styles_row_1',
				'parent' => $footer_top_styles_group
			)
		);
		
			setsail_select_add_admin_field(
				array(
					'name'   => 'footer_top_background_color',
					'type'   => 'colorsimple',
					'label'  => esc_html__( 'Background Color', 'setsail' ),
					'parent' => $footer_top_styles_row_1
				)
			);
			
			setsail_select_add_admin_field(
				array(
					'name'   => 'footer_top_border_color',
					'type'   => 'colorsimple',
					'label'  => esc_html__( 'Border Color', 'setsail' ),
					'parent' => $footer_top_styles_row_1
				)
			);
			
			setsail_select_add_admin_field(
				array(
					'name'   => 'footer_top_border_width',
					'type'   => 'textsimple',
					'label'  => esc_html__( 'Border Width', 'setsail' ),
					'parent' => $footer_top_styles_row_1,
					'args'   => array(
						'suffix' => 'px'
					)
				)
			);

		setsail_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_bottom',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Footer Bottom', 'setsail' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'setsail' ),
				'parent'        => $footer_panel
			)
		);

		$show_footer_bottom_container = setsail_select_add_admin_container(
			array(
				'name'            => 'show_footer_bottom_container',
				'parent'          => $footer_panel,
				'dependency' => array(
					'show' => array(
						'show_footer_bottom'  => 'yes'
					)
				)
			)
		);

		setsail_select_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_bottom_columns',
				'default_value' => '6 6',
				'label'         => esc_html__( 'Footer Bottom Columns', 'setsail' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Bottom area', 'setsail' ),
				'options'       => array(
					'12' => '1',
					'6 6' => '2',
					'4 4 4' => '3'
				),
				'parent'        => $show_footer_bottom_container
			)
		);
		
		$footer_bottom_styles_group = setsail_select_add_admin_group(
			array(
				'name'        => 'footer_bottom_styles_group',
				'title'       => esc_html__( 'Footer Bottom Styles', 'setsail' ),
				'description' => esc_html__( 'Define style for footer bottom area', 'setsail' ),
				'parent'      => $show_footer_bottom_container
			)
		);
		
		$footer_bottom_styles_row_1 = setsail_select_add_admin_row(
			array(
				'name'   => 'footer_bottom_styles_row_1',
				'parent' => $footer_bottom_styles_group
			)
		);
		
			setsail_select_add_admin_field(
				array(
					'name'   => 'footer_bottom_background_color',
					'type'   => 'colorsimple',
					'label'  => esc_html__( 'Background Color', 'setsail' ),
					'parent' => $footer_bottom_styles_row_1
				)
			);
			
			setsail_select_add_admin_field(
				array(
					'name'   => 'footer_bottom_border_color',
					'type'   => 'colorsimple',
					'label'  => esc_html__( 'Border Color', 'setsail' ),
					'parent' => $footer_bottom_styles_row_1
				)
			);
			
			setsail_select_add_admin_field(
				array(
					'name'   => 'footer_bottom_border_width',
					'type'   => 'textsimple',
					'label'  => esc_html__( 'Border Width', 'setsail' ),
					'parent' => $footer_bottom_styles_row_1,
					'args'   => array(
						'suffix' => 'px'
					)
				)
			);
	}

	add_action( 'setsail_select_action_options_map', 'setsail_select_footer_options_map', setsail_select_set_options_map_position( 'footer' ) );
}