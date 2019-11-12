<?php

if ( ! function_exists( 'setsail_select_logo_meta_box_map' ) ) {
	function setsail_select_logo_meta_box_map() {
		
		$logo_meta_box = setsail_select_create_meta_box(
			array(
				'scope' => apply_filters( 'setsail_select_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'logo_meta' ),
				'title' => esc_html__( 'Logo', 'setsail' ),
				'name'  => 'logo_meta'
			)
		);
		
		setsail_select_create_meta_box_field(
			array(
				'name'        => 'qodef_logo_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Default', 'setsail' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'setsail' ),
				'parent'      => $logo_meta_box
			)
		);
		
		setsail_select_create_meta_box_field(
			array(
				'name'        => 'qodef_logo_image_dark_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Dark', 'setsail' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'setsail' ),
				'parent'      => $logo_meta_box
			)
		);
		
		setsail_select_create_meta_box_field(
			array(
				'name'        => 'qodef_logo_image_light_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Light', 'setsail' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'setsail' ),
				'parent'      => $logo_meta_box
			)
		);
		
		setsail_select_create_meta_box_field(
			array(
				'name'        => 'qodef_logo_image_sticky_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Sticky', 'setsail' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'setsail' ),
				'parent'      => $logo_meta_box
			)
		);
		
		setsail_select_create_meta_box_field(
			array(
				'name'        => 'qodef_logo_image_mobile_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Mobile', 'setsail' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'setsail' ),
				'parent'      => $logo_meta_box
			)
		);
	}
	
	add_action( 'setsail_select_action_meta_boxes_map', 'setsail_select_logo_meta_box_map', 47 );
}