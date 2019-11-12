<?php

if ( ! function_exists( 'setsail_select_map_sidebar_meta' ) ) {
	function setsail_select_map_sidebar_meta() {
		$qodef_sidebar_meta_box = setsail_select_create_meta_box(
			array(
				'scope' => apply_filters( 'setsail_select_filter_set_scope_for_meta_boxes', array( 'page' ), 'sidebar_meta' ),
				'title' => esc_html__( 'Sidebar', 'setsail' ),
				'name'  => 'sidebar_meta'
			)
		);
		
		setsail_select_create_meta_box_field(
			array(
				'name'        => 'qodef_sidebar_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Sidebar Layout', 'setsail' ),
				'description' => esc_html__( 'Choose the sidebar layout', 'setsail' ),
				'parent'      => $qodef_sidebar_meta_box,
                'options'       => setsail_select_get_custom_sidebars_options( true )
			)
		);
		
		$qodef_custom_sidebars = setsail_select_get_custom_sidebars();
		if ( count( $qodef_custom_sidebars ) > 0 ) {
			setsail_select_create_meta_box_field(
				array(
					'name'        => 'qodef_custom_sidebar_area_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Widget Area in Sidebar', 'setsail' ),
					'description' => esc_html__( 'Choose Custom Widget area to display in Sidebar"', 'setsail' ),
					'parent'      => $qodef_sidebar_meta_box,
					'options'     => $qodef_custom_sidebars,
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
	}
	
	add_action( 'setsail_select_action_meta_boxes_map', 'setsail_select_map_sidebar_meta', 31 );
}