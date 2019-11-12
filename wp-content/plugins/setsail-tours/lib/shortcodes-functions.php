<?php

if ( ! function_exists( 'setsail_tours_include_shortcodes_file' ) ) {
	/**
	 * Loades all shortcodes by going through all folders that are placed directly in shortcodes folder
	 */
	function setsail_tours_include_shortcodes_file() {
		do_action( 'setsail_tours_action_include_shortcodes_file' );
	}
	
	add_action( 'init', 'setsail_tours_include_shortcodes_file', 6 ); // permission 6 is set to be before vc_before_init hook that has permission 9
}

if ( ! function_exists( 'setsail_tours_load_shortcodes' ) ) {
	function setsail_tours_load_shortcodes() {
		include_once SETSAIL_TOURS_ABS_PATH . '/lib/shortcode-loader.php';
		
		SetSailTours\Lib\ShortcodeLoader::getInstance()->load();
	}
	
	add_action( 'init', 'setsail_tours_load_shortcodes', 7 ); // permission 7 is set to be before vc_before_init hook that has permission 9 and after setsail_tours_include_shortcodes_file hook
}

if ( ! function_exists( 'setsail_tours_add_admin_shortcodes_styles' ) ) {
	/**
	 * Function that includes shortcodes core styles for admin
	 */
	function setsail_tours_add_admin_shortcodes_styles() {
		
		//include shortcode styles for Visual Composer
		wp_enqueue_style( 'setsail-tours-vc-shortcodes', SETSAIL_TOURS_ASSETS_URL_PATH . '/css/admin/setsail-vc-shortcodes.css' );
	}
	
	add_action( 'setsail_select_action_admin_scripts_init', 'setsail_tours_add_admin_shortcodes_styles' );
}

if ( ! function_exists( 'setsail_tours_add_admin_shortcodes_custom_styles' ) ) {
	/**
	 * Function that print custom vc shortcodes style
	 */
	function setsail_tours_add_admin_shortcodes_custom_styles() {
		$style                  = apply_filters( 'setsail_tours_filter_add_vc_shortcodes_custom_style', $style = '' );
		$shortcodes_icon_styles = array();
		$shortcode_icon_size    = 32;
		$shortcode_position     = 0;
		
		$shortcodes_icon_class_array = apply_filters( 'setsail_tours_filter_add_vc_shortcodes_custom_icon_class', $shortcodes_icon_class_array = array() );
		sort( $shortcodes_icon_class_array );
		
		if ( ! empty( $shortcodes_icon_class_array ) ) {
			foreach ( $shortcodes_icon_class_array as $shortcode_icon_class ) {
				$mark = $shortcode_position != 0 ? '-' : '';
				
				$shortcodes_icon_styles[] = '.vc_element-icon.extended-custom-tours-icon' . esc_attr( $shortcode_icon_class ) . ' {
					background-position: ' . $mark . esc_attr( $shortcode_position * $shortcode_icon_size ) . 'px 0;
				}';
				
				$shortcode_position ++;
			}
		}
		
		if ( ! empty( $shortcodes_icon_styles ) ) {
			$style .= implode( ' ', $shortcodes_icon_styles );
		}
		
		if ( ! empty( $style ) ) {
			wp_add_inline_style( 'setsail-tours-vc-shortcodes', $style );
		}
	}
	
	add_action( 'setsail_select_action_admin_scripts_init', 'setsail_tours_add_admin_shortcodes_custom_styles' );
}

if ( ! function_exists( 'setsail_select_get_cpt_items' ) ) {
	function setsail_select_get_cpt_items( $cpt_slug ) {
		$items      = array();
		$query_args = array(
			'post_status'    => 'publish',
			'post_type'      => $cpt_slug,
			'posts_per_page' => '-1',
			'order'          => 'DESC',
			'fields'         => 'ids',
			'post__not_in'   => get_option( 'sticky_posts' )
		);
		
		$cpt_items = new \WP_Query( $query_args );
		
		if ( $cpt_items->have_posts() ) {
			foreach ( $cpt_items->posts as $id ):
				$items[ $id ] = get_the_title( $id );
			endforeach;
		}
		
		wp_reset_postdata();
		
		return $items;
	}
}

if ( ! function_exists( 'setsail_select_get_destination_items' ) ) {
	function setsail_select_get_destination_items( $destination_id ) {
		$args = array(
			'post_status'    => 'publish',
			'post_type'      => 'tour-item',
			'posts_per_page' => '-1',
			'order'          => 'DESC',
			'fields'         => 'ids',
			'post__not_in'   => get_option( 'sticky_posts' )
		);
		
		$args['meta_query'] = array(
			'relation' => 'AND',
			array(
				'key'     => 'tour_destination',
				'value'   => $destination_id,
				'compare' => '=',
				'type'    => 'numeric'
			)
		);
		
		$return_values = array();
		$cpt_items = new \WP_Query( $args );
		if ( $cpt_items->have_posts() ) {
			$prices          = array();
			$discount_prices = array();
			
			foreach ( $cpt_items->posts as $id ):
				$price          = get_post_meta( $id, 'tour_price', true );
				$discount_price = get_post_meta( $id, 'tour_discount_price', true );
				
				if ( isset( $price ) && ! empty( $price ) ) {
					$prices[] = $price;
				}
				
				if ( isset( $discount_price ) && ! empty( $discount_price ) ) {
					$discount_prices[] = $discount_price;
				}
			endforeach;
			
			$max                 = ! empty( $prices ) ? intval( max( $prices ) ) : 0;
			$min_price           = ! empty( $prices ) ? intval( min( $prices ) ) : 0;
			$min_discount_prices = ! empty( $discount_prices ) ? intval( min( $discount_prices ) ) : 0;
			
			$min = $min_discount_prices < $min_price && $min_discount_prices > 0 ? $min_discount_prices : $min_price;
			
			$return_values['max'] = $max;
			$return_values['min'] = $min;
		}
		
		return $return_values;
	}
}