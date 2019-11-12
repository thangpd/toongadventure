<?php

if ( ! function_exists( 'setsail_select_map_footer_meta' ) ) {
	function setsail_select_map_footer_meta() {
		
		$footer_meta_box = setsail_select_create_meta_box(
			array(
				'scope' => apply_filters( 'setsail_select_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'footer_meta' ),
				'title' => esc_html__( 'Footer', 'setsail' ),
				'name'  => 'footer_meta'
			)
		);
		
		setsail_select_create_meta_box_field(
			array(
				'name'          => 'qodef_disable_footer_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Disable Footer for this Page', 'setsail' ),
				'description'   => esc_html__( 'Enabling this option will hide footer on this page', 'setsail' ),
				'options'       => setsail_select_get_yes_no_select_array(),
				'parent'        => $footer_meta_box
			)
		);
		
		$show_footer_meta_container = setsail_select_add_admin_container(
			array(
				'name'       => 'qodef_show_footer_meta_container',
				'parent'     => $footer_meta_box,
				'dependency' => array(
					'hide' => array(
						'qodef_disable_footer_meta' => 'yes'
					)
				)
			)
		);
		
			setsail_select_create_meta_box_field(
				array(
					'name'          => 'qodef_footer_in_grid_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Footer in Grid', 'setsail' ),
					'description'   => esc_html__( 'Enabling this option will place Footer content in grid', 'setsail' ),
					'options'       => setsail_select_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);
			
			setsail_select_create_meta_box_field(
				array(
					'name'          => 'qodef_uncovering_footer_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Uncovering Footer', 'setsail' ),
					'description'   => esc_html__( 'Enabling this option will make Footer gradually appear on scroll', 'setsail' ),
					'options'       => setsail_select_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);
		
			setsail_select_create_meta_box_field(
				array(
					'name'          => 'qodef_show_footer_top_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Show Footer Top', 'setsail' ),
					'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'setsail' ),
					'options'       => setsail_select_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);
		
			$footer_top_styles_group = setsail_select_add_admin_group(
				array(
					'name'        => 'footer_top_styles_group',
					'title'       => esc_html__( 'Footer Top Styles', 'setsail' ),
					'description' => esc_html__( 'Define style for footer top area', 'setsail' ),
					'parent'      => $show_footer_meta_container,
					'dependency'  => array(
						'show' => array(
							'qodef_show_footer_top_meta' => array( '', 'yes' )
						)
					)
				)
			);
			
			$footer_top_styles_row_1 = setsail_select_add_admin_row(
				array(
					'name'   => 'footer_top_styles_row_1',
					'parent' => $footer_top_styles_group
				)
			);
		
				setsail_select_create_meta_box_field(
					array(
						'name'   => 'qodef_footer_top_background_color_meta',
						'type'   => 'colorsimple',
						'label'  => esc_html__( 'Background Color', 'setsail' ),
						'parent' => $footer_top_styles_row_1
					)
				);
		
				setsail_select_create_meta_box_field(
					array(
						'name'   => 'qodef_footer_top_border_color_meta',
						'type'   => 'colorsimple',
						'label'  => esc_html__( 'Border Color', 'setsail' ),
						'parent' => $footer_top_styles_row_1
					)
				);
		
				setsail_select_create_meta_box_field(
					array(
						'name'   => 'qodef_footer_top_border_width_meta',
						'type'   => 'textsimple',
						'label'  => esc_html__( 'Border Width', 'setsail' ),
						'parent' => $footer_top_styles_row_1,
						'args'   => array(
							'suffix' => 'px'
						)
					)
				);
			
			setsail_select_create_meta_box_field(
				array(
					'name'          => 'qodef_show_footer_bottom_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Show Footer Bottom', 'setsail' ),
					'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'setsail' ),
					'options'       => setsail_select_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);
		
			$footer_bottom_styles_group = setsail_select_add_admin_group(
				array(
					'name'        => 'footer_bottom_styles_group',
					'title'       => esc_html__( 'Footer Bottom Styles', 'setsail' ),
					'description' => esc_html__( 'Define style for footer bottom area', 'setsail' ),
					'parent'      => $show_footer_meta_container,
					'dependency'  => array(
						'show' => array(
							'qodef_show_footer_bottom_meta' => array( '', 'yes' )
						)
					)
				)
			);
			
			$footer_bottom_styles_row_1 = setsail_select_add_admin_row(
				array(
					'name'   => 'footer_bottom_styles_row_1',
					'parent' => $footer_bottom_styles_group
				)
			);
			
				setsail_select_create_meta_box_field(
					array(
						'name'   => 'qodef_footer_bottom_background_color_meta',
						'type'   => 'colorsimple',
						'label'  => esc_html__( 'Background Color', 'setsail' ),
						'parent' => $footer_bottom_styles_row_1
					)
				);
				
				setsail_select_create_meta_box_field(
					array(
						'name'   => 'qodef_footer_bottom_border_color_meta',
						'type'   => 'colorsimple',
						'label'  => esc_html__( 'Border Color', 'setsail' ),
						'parent' => $footer_bottom_styles_row_1
					)
				);
				
				setsail_select_create_meta_box_field(
					array(
						'name'   => 'qodef_footer_bottom_border_width_meta',
						'type'   => 'textsimple',
						'label'  => esc_html__( 'Border Width', 'setsail' ),
						'parent' => $footer_bottom_styles_row_1,
						'args'   => array(
							'suffix' => 'px'
						)
					)
				);
	}
	
	add_action( 'setsail_select_action_meta_boxes_map', 'setsail_select_map_footer_meta', 70 );
}