<?php

if ( ! function_exists( 'setsail_select_map_woocommerce_meta' ) ) {
	function setsail_select_map_woocommerce_meta() {
		
		$woocommerce_meta_box = setsail_select_create_meta_box(
			array(
				'scope' => array( 'product' ),
				'title' => esc_html__( 'Product Meta', 'setsail' ),
				'name'  => 'woo_product_meta'
			)
		);
		
		setsail_select_create_meta_box_field(
			array(
				'name'        => 'qodef_product_featured_image_size',
				'type'        => 'select',
				'label'       => esc_html__( 'Dimensions for Product List Shortcode', 'setsail' ),
				'description' => esc_html__( 'Choose image layout when it appears in Select Product List - Masonry layout shortcode', 'setsail' ),
				'options'     => array(
					''                   => esc_html__( 'Default', 'setsail' ),
					'small'              => esc_html__( 'Small', 'setsail' ),
					'large-width'        => esc_html__( 'Large Width', 'setsail' ),
					'large-height'       => esc_html__( 'Large Height', 'setsail' ),
					'large-width-height' => esc_html__( 'Large Width Height', 'setsail' )
				),
				'parent'      => $woocommerce_meta_box
			)
		);
		
		setsail_select_create_meta_box_field(
			array(
				'name'          => 'qodef_show_title_area_woo_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'setsail' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'setsail' ),
				'options'       => setsail_select_get_yes_no_select_array(),
				'parent'        => $woocommerce_meta_box
			)
		);
		
		setsail_select_create_meta_box_field(
			array(
				'name'          => 'qodef_show_new_sign_woo_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Show New Sign', 'setsail' ),
				'description'   => esc_html__( 'Enabling this option will show new sign mark on product', 'setsail' ),
				'parent'        => $woocommerce_meta_box
			)
		);
		
		setsail_select_create_meta_box_field(
			array(
				'name'          => 'qodef_set_circle_featured_image_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Circle Featured Image', 'setsail' ),
				'description'   => esc_html__( 'Enabling this option will set featured image on list to be circle', 'setsail' ),
				'parent'        => $woocommerce_meta_box
			)
		);
	}
	
	add_action( 'setsail_select_action_meta_boxes_map', 'setsail_select_map_woocommerce_meta', 99 );
}