<?php

if ( ! function_exists( 'setsail_select_get_hide_dep_for_header_standard_options' ) ) {
	function setsail_select_get_hide_dep_for_header_standard_options() {
		$hide_dep_options = apply_filters( 'setsail_select_filter_header_standard_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'setsail_select_header_standard_map' ) ) {
	function setsail_select_header_standard_map( $parent ) {
		$hide_dep_options = setsail_select_get_hide_dep_for_header_standard_options();
		
		setsail_select_add_admin_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'set_menu_area_position',
				'default_value'   => 'right',
				'label'           => esc_html__( 'Choose Menu Area Position', 'setsail' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'setsail' ),
				'options'         => array(
					'right'  => esc_html__( 'Right', 'setsail' ),
					'left'   => esc_html__( 'Left', 'setsail' ),
					'center' => esc_html__( 'Center', 'setsail' )
				),
				'dependency' => array(
					'hide' => array(
						'header_options'  => $hide_dep_options
					)
				)
			)
		);
	}
	
	add_action( 'setsail_select_action_additional_header_menu_area_options_map', 'setsail_select_header_standard_map' );
}