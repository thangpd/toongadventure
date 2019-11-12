<?php

if ( ! function_exists( 'setsail_select_map_post_gallery_meta' ) ) {
	
	function setsail_select_map_post_gallery_meta() {
		$gallery_post_format_meta_box = setsail_select_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Gallery Post Format', 'setsail' ),
				'name'  => 'post_format_gallery_meta'
			)
		);
		
		setsail_select_add_multiple_images_field(
			array(
				'name'        => 'qodef_post_gallery_images_meta',
				'label'       => esc_html__( 'Gallery Images', 'setsail' ),
				'description' => esc_html__( 'Choose your gallery images', 'setsail' ),
				'parent'      => $gallery_post_format_meta_box,
			)
		);
	}
	
	add_action( 'setsail_select_action_meta_boxes_map', 'setsail_select_map_post_gallery_meta', 21 );
}
