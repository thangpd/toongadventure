<?php

if ( ! function_exists( 'setsail_select_map_post_quote_meta' ) ) {
	function setsail_select_map_post_quote_meta() {
		$quote_post_format_meta_box = setsail_select_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Quote Post Format', 'setsail' ),
				'name'  => 'post_format_quote_meta'
			)
		);
		
		setsail_select_create_meta_box_field(
			array(
				'name'        => 'qodef_post_quote_text_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Text', 'setsail' ),
				'description' => esc_html__( 'Enter Quote text', 'setsail' ),
				'parent'      => $quote_post_format_meta_box
			)
		);
		
		setsail_select_create_meta_box_field(
			array(
				'name'        => 'qodef_post_quote_author_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Author', 'setsail' ),
				'description' => esc_html__( 'Enter Quote author', 'setsail' ),
				'parent'      => $quote_post_format_meta_box
			)
		);
	}
	
	add_action( 'setsail_select_action_meta_boxes_map', 'setsail_select_map_post_quote_meta', 25 );
}