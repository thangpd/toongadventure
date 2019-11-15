<?php

if ( ! function_exists( 'setsail_select_get_hide_dep_for_header_standard_meta_boxes' ) ) {
	function setsail_select_get_hide_dep_for_header_standard_meta_boxes() {
		$hide_dep_options = apply_filters( 'setsail_select_filter_header_standard_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'setsail_select_header_standard_meta_map' ) ) {
	function setsail_select_header_standard_meta_map( $parent ) {
		$hide_dep_options = setsail_select_get_hide_dep_for_header_standard_meta_boxes();
		
		setsail_select_create_meta_box_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'qodef_set_menu_area_position_meta',
				'default_value'   => '',
				'label'           => esc_html__( 'Choose Menu Area Position', 'setsail' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'setsail' ),
				'options'         => array(
					''       => esc_html__( 'Default', 'setsail' ),
					'left'   => esc_html__( 'Left', 'setsail' ),
					'right'  => esc_html__( 'Right', 'setsail' ),
					'center' => esc_html__( 'Center', 'setsail' )
				),
				'dependency' => array(
					'hide' => array(
						'qodef_header_type_meta'  => $hide_dep_options
					)
				)
			)
		);
	}
	
	add_action( 'setsail_select_action_additional_header_area_meta_boxes_map', 'setsail_select_header_standard_meta_map' );
}