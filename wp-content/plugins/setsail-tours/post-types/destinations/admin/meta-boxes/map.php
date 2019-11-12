<?php

if ( ! function_exists( 'setsail_tours_destionation_cpt_meta_boxes' ) ) {
	function setsail_tours_destionation_cpt_meta_boxes() {
		
		$destination_meta_box = setsail_select_create_meta_box(
			array(
				'scope' => array( 'destinations' ),
				'title' => esc_html__( 'General Settings', 'setsail-tours' ),
				'name'  => 'destination_meta_box'
			)
		);
		
		setsail_select_create_meta_box_field (
			array(
				'name'          => 'qodef_destination_item_subtitle_meta',
				'type'          => 'text',
				'default_value' => 'no',
				'label'         => esc_html__( 'Destination subtitle', 'setsail-tours' ),
				'parent'        => $destination_meta_box
			)
		);
		
		setsail_select_create_meta_box_field (
			array(
				'name'          => 'qodef_destination_item_is_featured_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Item Is Featured', 'setsail-tours' ),
				'parent'        => $destination_meta_box
			)
		);
	}
	
	add_action( 'setsail_select_action_meta_boxes_map', 'setsail_tours_destionation_cpt_meta_boxes' );
}