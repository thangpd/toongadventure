<?php

if ( ! function_exists( 'setsail_select_search_body_class' ) ) {
	/**
	 * Function that adds body classes for different search types
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function setsail_select_search_body_class( $classes ) {
		$classes[] = 'qodef-fullscreen-search';
		$classes[] = 'qodef-search-fade';
		
		return $classes;
	}
	
	add_filter( 'body_class', 'setsail_select_search_body_class' );
}

if ( ! function_exists( 'setsail_select_get_search' ) ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function setsail_select_get_search() {
		setsail_select_load_search_template();
	}
	
	add_action( 'setsail_select_action_before_page_header', 'setsail_select_get_search' );
}

if ( ! function_exists( 'setsail_select_load_search_template' ) ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function setsail_select_load_search_template() {
		$parameters = array(
			'search_close_icon_class' 	=> setsail_select_get_search_close_icon_class(),
			'search_submit_icon_class' 	=> setsail_select_get_search_submit_icon_class()
		);

        setsail_select_get_module_template_part( 'types/fullscreen/templates/fullscreen', 'search', '', $parameters );
	}
}

if ( ! function_exists( 'setsail_select_fullscreen_search_post_types' ) ) {
	function setsail_select_fullscreen_search_post_types() {
		
		if ( empty( $_POST ) || ! isset( $_POST ) ) {
			setsail_select_ajax_status( 'error', esc_html__( 'All fields are empty', 'setsail' ) );
		} else {
			check_ajax_referer( 'qodef_fullscreen_search_post_types_nonce', 'search_post_types_nonce' );
			
			$args = array(
				'post_type'      => $_POST['postType'],
				'post_status'    => 'publish',
				'order'          => 'DESC',
				'orderby'        => 'date',
				's'              => $_POST['term'],
				'posts_per_page' => 3
			);
			
			$html  = '';
			$query = new WP_Query( $args );
			
			if ( $query->have_posts() ) {
				$html .= '<ul>';
				while ( $query->have_posts() ) {
					$query->the_post();
					$html .= '<li>';
					if ( has_post_thumbnail() ) {
						$html .= '<div class="qodef-fslp-img"><a class="qodef-fslp-link" href="' . get_the_permalink() . '">' . get_the_post_thumbnail() . '</a></div>';
					}
					$html .= '<div class="qodef-fslp-content">';
					$html .= '<h6 class="qodef-fslp-title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h6>';
					
					$tour_price          = get_post_meta( get_the_ID(), 'qodef_tour_price', true );
					$tour_discount_price = get_post_meta( get_the_ID(), 'qodef_tour_discount_price', true );
					$price               = ! empty( $tour_discount_price ) ? $tour_discount_price : $tour_price;
					if ( ! empty( $price ) ) {
						$html .= '<h6 class="qodef-fslp-price">' . esc_htmL( $price ) . '</h6>';
					}
					$html .= '</div>';
					$html .= '</li>';
				}
				$html              .= '</ul>';
				$json_data['html'] = $html;
				setsail_select_ajax_status( 'success', '', $json_data );
			} else {
				$html              .= '<ul>';
				$html              .= '<li>' . esc_html__( 'No posts found.', 'setsail' ) . '</li>';
				$html              .= '</ul>';
				$json_data['html'] = $html;
				setsail_select_ajax_status( 'success', '', $json_data );
			}
		}
		
		wp_die();
	}
	
	add_action( 'wp_ajax_setsail_select_fullscreen_search_post_types', 'setsail_select_fullscreen_search_post_types' );
	add_action( 'wp_ajax_nopriv_setsail_select_fullscreen_search_post_types', 'setsail_select_fullscreen_search_post_types' );
}