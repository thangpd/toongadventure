<?php

if ( ! function_exists( 'setsail_select_sticky_header_meta_boxes_options_map' ) ) {
	function setsail_select_sticky_header_meta_boxes_options_map( $header_meta_box ) {
		
		$sticky_amount_container = setsail_select_add_admin_container(
			array(
				'parent'          => $header_meta_box,
				'name'            => 'sticky_amount_container_meta_container',
				'dependency' => array(
					'hide' => array(
						'qodef_header_behaviour_meta'  => array( '', 'no-behavior','fixed-on-scroll','sticky-header-on-scroll-up' )
					)
				)
			)
		);
		
		setsail_select_create_meta_box_field(
			array(
				'name'        => 'qodef_scroll_amount_for_sticky_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Scroll Amount for Sticky Header Appearance', 'setsail' ),
				'description' => esc_html__( 'Define scroll amount for sticky header appearance', 'setsail' ),
				'parent'      => $sticky_amount_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px'
				)
			)
		);
		
		$setsail_custom_sidebars = setsail_select_get_custom_sidebars();
		if ( count( $setsail_custom_sidebars ) > 0 ) {
			setsail_select_create_meta_box_field(
				array(
					'name'        => 'qodef_custom_sticky_menu_area_sidebar_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Widget Area In Sticky Header Menu Area', 'setsail' ),
					'description' => esc_html__( 'Choose custom widget area to display in sticky header menu area"', 'setsail' ),
					'parent'      => $header_meta_box,
					'options'     => $setsail_custom_sidebars,
					'dependency' => array(
						'show' => array(
							'qodef_header_behaviour_meta' => array( 'sticky-header-on-scroll-up', 'sticky-header-on-scroll-down-up' )
						)
					)
				)
			);
		}
	}
	
	add_action( 'setsail_select_action_additional_header_area_meta_boxes_map', 'setsail_select_sticky_header_meta_boxes_options_map', 8 );
}