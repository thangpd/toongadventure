<?php

if ( ! function_exists( 'setsail_select_map_post_link_meta' ) ) {
	function setsail_select_map_post_link_meta() {
		$link_post_format_meta_box = setsail_select_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Link Post Format', 'setsail' ),
				'name'  => 'post_format_link_meta'
			)
		);
		
		setsail_select_create_meta_box_field(
			array(
				'name'        => 'qodef_post_link_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Link', 'setsail' ),
				'description' => esc_html__( 'Enter link', 'setsail' ),
				'parent'      => $link_post_format_meta_box
			)
		);
	}
	
	add_action( 'setsail_select_action_meta_boxes_map', 'setsail_select_map_post_link_meta', 24 );
}