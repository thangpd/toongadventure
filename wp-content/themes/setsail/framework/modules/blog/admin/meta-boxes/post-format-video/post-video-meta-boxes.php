<?php

if ( ! function_exists( 'setsail_select_map_post_video_meta' ) ) {
	function setsail_select_map_post_video_meta() {
		$video_post_format_meta_box = setsail_select_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Video Post Format', 'setsail' ),
				'name'  => 'post_format_video_meta'
			)
		);
		
		setsail_select_create_meta_box_field(
			array(
				'name'          => 'qodef_video_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Video Type', 'setsail' ),
				'description'   => esc_html__( 'Choose video type', 'setsail' ),
				'parent'        => $video_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Video Service', 'setsail' ),
					'self'            => esc_html__( 'Self Hosted', 'setsail' )
				)
			)
		);
		
		$qodef_video_embedded_container = setsail_select_add_admin_container(
			array(
				'parent' => $video_post_format_meta_box,
				'name'   => 'qodef_video_embedded_container'
			)
		);
		
		setsail_select_create_meta_box_field(
			array(
				'name'        => 'qodef_post_video_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video URL', 'setsail' ),
				'description' => esc_html__( 'Enter Video URL', 'setsail' ),
				'parent'      => $qodef_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'qodef_video_type_meta' => 'social_networks'
					)
				)
			)
		);
		
		setsail_select_create_meta_box_field(
			array(
				'name'        => 'qodef_post_video_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video MP4', 'setsail' ),
				'description' => esc_html__( 'Enter video URL for MP4 format', 'setsail' ),
				'parent'      => $qodef_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'qodef_video_type_meta' => 'self'
					)
				)
			)
		);
		
		setsail_select_create_meta_box_field(
			array(
				'name'        => 'qodef_post_video_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Video Image', 'setsail' ),
				'description' => esc_html__( 'Enter video image', 'setsail' ),
				'parent'      => $qodef_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'qodef_video_type_meta' => 'self'
					)
				)
			)
		);
	}
	
	add_action( 'setsail_select_action_meta_boxes_map', 'setsail_select_map_post_video_meta', 22 );
}