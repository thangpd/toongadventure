<?php

if ( ! function_exists( 'setsail_select_get_hide_dep_for_header_centered_meta_boxes' ) ) {
	function setsail_select_get_hide_dep_for_header_centered_meta_boxes() {
		$hide_dep_options = apply_filters( 'setsail_select_filter_header_centered_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'setsail_select_header_centered_meta_map' ) ) {
	function setsail_select_header_centered_meta_map( $parent ) {
		$hide_dep_options = setsail_select_get_hide_dep_for_header_centered_meta_boxes();
		
		setsail_select_create_meta_box_field(
			array(
				'parent'          => $parent,
				'type'            => 'text',
				'name'            => 'qodef_logo_wrapper_padding_header_centered_meta',
				'default_value'   => '',
				'label'           => esc_html__( 'Logo Padding', 'setsail' ),
				'description'     => esc_html__( 'Insert padding in format: 0px 0px 1px 0px', 'setsail' ),
				'args'            => array(
					'col_width' => 3
				),
				'dependency' => array(
					'hide' => array(
						'qodef_header_type_meta'  => $hide_dep_options
					)
				)
			)
		);
	}
	
	add_action( 'setsail_select_action_header_logo_area_additional_meta_boxes_map', 'setsail_select_header_centered_meta_map', 10, 1 );
}