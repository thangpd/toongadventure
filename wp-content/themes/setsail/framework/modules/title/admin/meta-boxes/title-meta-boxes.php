<?php

if ( ! function_exists( 'setsail_select_get_title_types_meta_boxes' ) ) {
	function setsail_select_get_title_types_meta_boxes() {
		$title_type_options = apply_filters( 'setsail_select_filter_title_type_meta_boxes', $title_type_options = array( '' => esc_html__( 'Default', 'setsail' ) ) );
		
		return $title_type_options;
	}
}

foreach ( glob( SELECT_FRAMEWORK_MODULES_ROOT_DIR . '/title/types/*/admin/meta-boxes/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'setsail_select_map_title_meta' ) ) {
	function setsail_select_map_title_meta() {
		$title_type_meta_boxes = setsail_select_get_title_types_meta_boxes();
		
		$title_meta_box = setsail_select_create_meta_box(
			array(
				'scope' => apply_filters( 'setsail_select_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'title_meta' ),
				'title' => esc_html__( 'Title', 'setsail' ),
				'name'  => 'title_meta'
			)
		);
		
		setsail_select_create_meta_box_field(
			array(
				'name'          => 'qodef_show_title_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'setsail' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'setsail' ),
				'parent'        => $title_meta_box,
				'options'       => setsail_select_get_yes_no_select_array()
			)
		);
		
			$show_title_area_meta_container = setsail_select_add_admin_container(
				array(
					'parent'          => $title_meta_box,
					'name'            => 'qodef_show_title_area_meta_container',
					'dependency' => array(
						'hide' => array(
							'qodef_show_title_area_meta' => 'no'
						)
					)
				)
			);
		
				setsail_select_create_meta_box_field(
					array(
						'name'          => 'qodef_title_area_type_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area Type', 'setsail' ),
						'description'   => esc_html__( 'Choose title type', 'setsail' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => $title_type_meta_boxes
					)
				);
		
				setsail_select_create_meta_box_field(
					array(
						'name'          => 'qodef_title_area_in_grid_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area In Grid', 'setsail' ),
						'description'   => esc_html__( 'Set title area content to be in grid', 'setsail' ),
						'options'       => setsail_select_get_yes_no_select_array(),
						'parent'        => $show_title_area_meta_container
					)
				);
		
				setsail_select_create_meta_box_field(
					array(
						'name'        => 'qodef_title_area_height_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Height', 'setsail' ),
						'description' => esc_html__( 'Set a height for Title Area', 'setsail' ),
						'parent'      => $show_title_area_meta_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px'
						)
					)
				);
				
				setsail_select_create_meta_box_field(
					array(
						'name'        => 'qodef_title_area_background_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Background Color', 'setsail' ),
						'description' => esc_html__( 'Choose a background color for title area', 'setsail' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				setsail_select_create_meta_box_field(
					array(
						'name'        => 'qodef_title_area_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'setsail' ),
						'description' => esc_html__( 'Choose an Image for title area', 'setsail' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				setsail_select_create_meta_box_field(
					array(
						'name'          => 'qodef_title_area_background_image_behavior_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Behavior', 'setsail' ),
						'description'   => esc_html__( 'Choose title area background image behavior', 'setsail' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''                    => esc_html__( 'Default', 'setsail' ),
							'hide'                => esc_html__( 'Hide Image', 'setsail' ),
							'responsive'          => esc_html__( 'Enable Responsive Image', 'setsail' ),
							'responsive-disabled' => esc_html__( 'Disable Responsive Image', 'setsail' ),
							'parallax'            => esc_html__( 'Enable Parallax Image', 'setsail' ),
							'parallax-zoom-out'   => esc_html__( 'Enable Parallax With Zoom Out Image', 'setsail' ),
							'parallax-disabled'   => esc_html__( 'Disable Parallax Image', 'setsail' )
						)
					)
				);
				
				setsail_select_create_meta_box_field(
					array(
						'name'          => 'qodef_title_area_vertical_alignment_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Vertical Alignment', 'setsail' ),
						'description'   => esc_html__( 'Specify title area content vertical alignment', 'setsail' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''              => esc_html__( 'Default', 'setsail' ),
							'header-bottom' => esc_html__( 'From Bottom of Header', 'setsail' ),
							'window-top'    => esc_html__( 'From Window Top', 'setsail' )
						)
					)
				);
				
				setsail_select_create_meta_box_field(
					array(
						'name'          => 'qodef_title_area_title_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Tag', 'setsail' ),
						'options'       => setsail_select_get_title_tag( true ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				setsail_select_create_meta_box_field(
					array(
						'name'        => 'qodef_title_text_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Title Color', 'setsail' ),
						'description' => esc_html__( 'Choose a color for title text', 'setsail' ),
						'parent'      => $show_title_area_meta_container
					)
				);
				
				setsail_select_create_meta_box_field(
					array(
						'name'          => 'qodef_title_area_subtitle_meta',
						'type'          => 'text',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Text', 'setsail' ),
						'description'   => esc_html__( 'Enter your subtitle text', 'setsail' ),
						'parent'        => $show_title_area_meta_container,
						'args'          => array(
							'col_width' => 6
						)
					)
				);
		
				setsail_select_create_meta_box_field(
					array(
						'name'          => 'qodef_title_area_subtitle_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Tag', 'setsail' ),
						'options'       => setsail_select_get_title_tag( true, array( 'p' => 'p', 'span' => esc_html__( 'Custom Heading', 'setsail' ) ) ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				setsail_select_create_meta_box_field(
					array(
						'name'        => 'qodef_subtitle_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Subtitle Color', 'setsail' ),
						'description' => esc_html__( 'Choose a color for subtitle text', 'setsail' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
		/***************** Additional Title Area Layout - start *****************/
		
		do_action( 'setsail_select_action_additional_title_area_meta_boxes', $show_title_area_meta_container );
		
		/***************** Additional Title Area Layout - end *****************/
		
	}
	
	add_action( 'setsail_select_action_meta_boxes_map', 'setsail_select_map_title_meta', 60 );
}