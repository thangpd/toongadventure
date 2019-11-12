<?php

if ( ! function_exists( 'setsail_core_reviews_map' ) ) {
	function setsail_core_reviews_map() {
		
		$reviews_panel = setsail_select_add_admin_panel(
			array(
				'title' => esc_html__( 'Reviews', 'setsail-core' ),
				'name'  => 'panel_reviews',
				'page'  => '_page_page'
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent'      => $reviews_panel,
				'type'        => 'text',
				'name'        => 'reviews_section_title',
				'label'       => esc_html__( 'Reviews Section Title', 'setsail-core' ),
				'description' => esc_html__( 'Enter title that you want to show before average rating on your page', 'setsail-core' ),
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent'      => $reviews_panel,
				'type'        => 'textarea',
				'name'        => 'reviews_section_subtitle',
				'label'       => esc_html__( 'Reviews Section Subtitle', 'setsail-core' ),
				'description' => esc_html__( 'Enter subtitle that you want to show before average rating on your page', 'setsail-core' ),
			)
		);
	}
	
	add_action( 'setsail_select_action_additional_page_options_map', 'setsail_core_reviews_map', 75 ); //one after elements
}