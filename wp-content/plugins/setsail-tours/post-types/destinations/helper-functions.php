<?php

if ( ! function_exists( 'setsail_tours_destinations_meta_box_functions' ) ) {
	function setsail_tours_destinations_meta_box_functions( $post_types ) {
		$post_types[] = 'destinations';
		
		return $post_types;
	}
	
	add_filter( 'setsail_select_filter_meta_box_post_types_save', 'setsail_tours_destinations_meta_box_functions' );
	add_filter( 'setsail_select_filter_meta_box_post_types_remove', 'setsail_tours_destinations_meta_box_functions' );
}

if ( ! function_exists( 'setsail_tours_destinations_scope_meta_box_functions' ) ) {
	function setsail_tours_destinations_scope_meta_box_functions( $post_types ) {
		$post_types[] = 'destinations';
		
		return $post_types;
	}
	
	add_filter( 'setsail_select_filter_set_scope_for_meta_boxes', 'setsail_tours_destinations_scope_meta_box_functions' );
}

if ( ! function_exists( 'setsail_tours_destinations_enqueue_meta_box_styles' ) ) {
	function setsail_tours_destinations_enqueue_meta_box_styles() {
		global $post;
		
		if ( ! empty( $post ) && $post->post_type == 'destinations' ) {
			wp_enqueue_style( 'qodef-jquery-ui', get_template_directory_uri() . '/framework/admin/assets/css/jquery-ui/jquery-ui.css' );
		}
	}
	
	add_action( 'setsail_select_action_enqueue_meta_box_styles', 'setsail_tours_destinations_enqueue_meta_box_styles' );
}

if ( ! function_exists( 'setsail_tours_register_destinations_cpt' ) ) {
	function setsail_tours_register_destinations_cpt( $cpt_class_name ) {
		$cpt_class = array(
			'SetSailTours\CPT\Destination\DestinationsRegister'
		);
		
		$cpt_class_name = array_merge( $cpt_class_name, $cpt_class );
		
		return $cpt_class_name;
	}
	
	add_filter( 'setsail_tours_filter_register_custom_post_types', 'setsail_tours_register_destinations_cpt' );
}

if ( ! function_exists( 'setsail_tours_add_destinations_to_search_types' ) ) {
	function setsail_tours_add_destinations_to_search_types( $post_types ) {
		$post_types['destinations'] = esc_html__( 'Destinations', 'setsail-tours' );
		
		return $post_types;
	}
	
	add_filter( 'setsail_select_filter_search_post_type_widget_params_post_type', 'setsail_tours_add_destinations_to_search_types' );
}

// Load destination shortcodes
if ( ! function_exists( 'setsail_tours_include_destination_shortcodes_file' ) ) {
	/**
	 * Loades all shortcodes by going through all folders that are placed directly in shortcodes folder
	 */
	function setsail_tours_include_destination_shortcodes_file() {
		foreach ( glob( SETSAIL_TOURS_CPT_PATH . '/destinations/shortcodes/*/load.php' ) as $shortcode_load ) {
			include_once $shortcode_load;
		}
	}
	
	add_action( 'setsail_tours_action_include_shortcodes_file', 'setsail_tours_include_destination_shortcodes_file' );
}

if ( ! function_exists( 'setsail_tours_get_destinations' ) ) {
	/**
	 * @param bool $first_empty
	 *
	 * @return array
	 */
	function setsail_tours_get_destinations( $first_empty = false ) {
		$destinations = array();
		
		if ( $first_empty ) {
			$destinations[''] = esc_html__( 'Select Your Destination', 'setsail-tours' );
		}
		
		if ( setsail_tours_is_wpml_installed() ) {
			global $wpdb;
			
			$lang = ICL_LANGUAGE_CODE;
			
			$sql = "SELECT p.*
					FROM {$wpdb->prefix}posts p
					LEFT JOIN {$wpdb->prefix}icl_translations icl_t ON icl_t.element_id = p.ID 
					WHERE p.post_type = 'destinations'
					AND p.post_status = 'publish'
					AND icl_t.language_code='{$lang}'";
			
			$query_results = $wpdb->get_results( $sql );
			
			if ( $query_results ) {
				global $post;
				
				foreach ( $query_results as $post ) {
					setup_postdata( $post );
					$destinations[ get_the_ID() ] = get_the_title();
				}
			}
		} else {
			$args = array(
				'post_type'      => 'destinations',
				'post_status'    => 'publish',
				'posts_per_page' => - 1
			);
			
			$query_results = new WP_Query( $args );
			
			if ( $query_results->have_posts() ) {
				
				while ( $query_results->have_posts() ) {
					
					$query_results->the_post();
					
					$destinations[ get_the_ID() ] = get_the_title();
				}
			}
		}
		
		wp_reset_postdata();
		
		return $destinations;
	}
}