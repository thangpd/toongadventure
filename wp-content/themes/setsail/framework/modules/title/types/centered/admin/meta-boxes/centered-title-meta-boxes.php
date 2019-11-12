<?php

if ( ! function_exists( 'setsail_select_centered_title_type_options_meta_boxes' ) ) {
	function setsail_select_centered_title_type_options_meta_boxes( $show_title_area_meta_container ) {
		
		setsail_select_create_meta_box_field(
			array(
				'name'        => 'qodef_subtitle_side_padding_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Subtitle Side Padding', 'setsail' ),
				'description' => esc_html__( 'Set left/right padding for subtitle area', 'setsail' ),
				'parent'      => $show_title_area_meta_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px or %'
				)
			)
		);
	}
	
	add_action( 'setsail_select_action_additional_title_area_meta_boxes', 'setsail_select_centered_title_type_options_meta_boxes', 5 );
}