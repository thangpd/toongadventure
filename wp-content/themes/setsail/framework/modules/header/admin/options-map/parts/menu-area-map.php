<?php

if ( ! function_exists( 'setsail_select_get_hide_dep_for_header_menu_area_options' ) ) {
	function setsail_select_get_hide_dep_for_header_menu_area_options() {
		$hide_dep_options = apply_filters( 'setsail_select_filter_header_menu_area_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'setsail_select_header_menu_area_options_map' ) ) {
	function setsail_select_header_menu_area_options_map( $panel_header ) {
		$hide_dep_options = setsail_select_get_hide_dep_for_header_menu_area_options();
		
		$menu_area_container = setsail_select_add_admin_container_no_style(
			array(
				'parent'          => $panel_header,
				'name'            => 'menu_area_container',
				'dependency' => array(
					'hide' => array(
						'header_options'  => $hide_dep_options
					)
				),
			)
		);
		
		setsail_select_add_admin_section_title(
			array(
				'parent' => $menu_area_container,
				'name'   => 'menu_area_style',
				'title'  => esc_html__( 'Menu Area Style', 'setsail' )
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent'        => $menu_area_container,
				'type'          => 'yesno',
				'name'          => 'menu_area_in_grid',
				'default_value' => 'no',
				'label'         => esc_html__( 'Menu Area In Grid', 'setsail' ),
				'description'   => esc_html__( 'Set menu area content to be in grid', 'setsail' ),
			)
		);
		
		$menu_area_in_grid_container = setsail_select_add_admin_container(
			array(
				'parent'          => $menu_area_container,
				'name'            => 'menu_area_in_grid_container',
				'dependency' => array(
					'hide' => array(
						'menu_area_in_grid'  => 'no'
					)
				)
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent'        => $menu_area_in_grid_container,
				'type'          => 'color',
				'name'          => 'menu_area_grid_background_color',
				'default_value' => '',
				'label'         => esc_html__( 'Grid Background Color', 'setsail' ),
				'description'   => esc_html__( 'Set grid background color for menu area', 'setsail' ),
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent'        => $menu_area_in_grid_container,
				'type'          => 'text',
				'name'          => 'menu_area_grid_background_transparency',
				'default_value' => '',
				'label'         => esc_html__( 'Grid Background Transparency', 'setsail' ),
				'description'   => esc_html__( 'Set grid background transparency for menu area', 'setsail' ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent'        => $menu_area_in_grid_container,
				'type'          => 'yesno',
				'name'          => 'menu_area_in_grid_shadow',
				'default_value' => 'no',
				'label'         => esc_html__( 'Grid Area Shadow', 'setsail' ),
				'description'   => esc_html__( 'Set shadow on grid area', 'setsail' )
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent'        => $menu_area_in_grid_container,
				'type'          => 'yesno',
				'name'          => 'menu_area_in_grid_border',
				'default_value' => 'no',
				'label'         => esc_html__( 'Grid Area Border', 'setsail' ),
				'description'   => esc_html__( 'Set border on grid area', 'setsail' )
			)
		);
		
		$menu_area_in_grid_border_container = setsail_select_add_admin_container(
			array(
				'parent'          => $menu_area_in_grid_container,
				'name'            => 'menu_area_in_grid_border_container',
				'dependency' => array(
					'hide' => array(
						'menu_area_in_grid_border'  => 'no'
					)
				)
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent'        => $menu_area_in_grid_border_container,
				'type'          => 'color',
				'name'          => 'menu_area_in_grid_border_color',
				'default_value' => '',
				'label'         => esc_html__( 'Border Color', 'setsail' ),
				'description'   => esc_html__( 'Set border color for menu area', 'setsail' ),
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent'        => $menu_area_container,
				'type'          => 'color',
				'name'          => 'menu_area_background_color',
				'default_value' => '',
				'label'         => esc_html__( 'Background Color', 'setsail' ),
				'description'   => esc_html__( 'Set background color for menu area', 'setsail' )
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent'        => $menu_area_container,
				'type'          => 'text',
				'name'          => 'menu_area_background_transparency',
				'default_value' => '',
				'label'         => esc_html__( 'Background Transparency', 'setsail' ),
				'description'   => esc_html__( 'Set background transparency for menu area', 'setsail' ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent'        => $menu_area_container,
				'type'          => 'yesno',
				'name'          => 'menu_area_shadow',
				'default_value' => 'no',
				'label'         => esc_html__( 'Menu Area Shadow', 'setsail' ),
				'description'   => esc_html__( 'Set shadow on menu area', 'setsail' ),
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'menu_area_border',
				'default_value' => 'no',
				'label'         => esc_html__( 'Menu Area Border', 'setsail' ),
				'description'   => esc_html__( 'Set border on menu area', 'setsail' ),
				'parent'        => $menu_area_container
			)
		);
		
		$menu_area_border_container = setsail_select_add_admin_container(
			array(
				'parent'          => $menu_area_container,
				'name'            => 'menu_area_border_container',
				'dependency' => array(
					'hide' => array(
						'menu_area_border'  => 'no'
					)
				)
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'type'        => 'color',
				'name'        => 'menu_area_border_color',
				'label'       => esc_html__( 'Border Color', 'setsail' ),
				'description' => esc_html__( 'Set border color for menu area', 'setsail' ),
				'parent'      => $menu_area_border_container
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'type'        => 'text',
				'name'        => 'menu_area_height',
				'label'       => esc_html__( 'Height', 'setsail' ),
				'description' => esc_html__( 'Enter header height', 'setsail' ),
				'parent'      => $menu_area_container,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'type'   => 'text',
				'name'   => 'menu_area_side_padding',
				'label'  => esc_html__( 'Menu Area Side Padding', 'setsail' ),
				'parent' => $menu_area_container,
				'args'   => array(
					'col_width' => 2,
					'suffix'    => esc_html__( 'px or %', 'setsail' )
				)
			)
		);
		
		do_action( 'setsail_select_header_menu_area_additional_options', $panel_header );
	}
	
	add_action( 'setsail_select_action_header_menu_area_options_map', 'setsail_select_header_menu_area_options_map', 10, 1 );
}