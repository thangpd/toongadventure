<?php

if ( ! function_exists( 'setsail_core_map_testimonials_meta' ) ) {
	function setsail_core_map_testimonials_meta() {
		$testimonial_meta_box = setsail_select_create_meta_box(
			array(
				'scope' => array( 'testimonials' ),
				'title' => esc_html__( 'Testimonial', 'setsail-core' ),
				'name'  => 'testimonial_meta'
			)
		);
		
		setsail_select_create_meta_box_field(
			array(
				'name'        => 'qodef_testimonial_text',
				'type'        => 'text',
				'label'       => esc_html__( 'Text', 'setsail-core' ),
				'description' => esc_html__( 'Enter testimonial text', 'setsail-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
		
		setsail_select_create_meta_box_field(
			array(
				'name'        => 'qodef_testimonial_author',
				'type'        => 'text',
				'label'       => esc_html__( 'Author', 'setsail-core' ),
				'description' => esc_html__( 'Enter author name', 'setsail-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
	}
	
	add_action( 'setsail_select_action_meta_boxes_map', 'setsail_core_map_testimonials_meta', 95 );
}