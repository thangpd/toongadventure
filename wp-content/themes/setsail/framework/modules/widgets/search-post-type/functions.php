<?php

if ( ! function_exists( 'setsail_select_register_search_post_type_widget' ) ) {
	/**
	 * Function that register search opener widget
	 */
	function setsail_select_register_search_post_type_widget( $widgets ) {
		$widgets[] = 'SetSailSelectClassSearchPostType';
		
		return $widgets;
	}
	
	add_filter( 'setsail_select_filter_register_widgets', 'setsail_select_register_search_post_type_widget' );
}

if ( ! function_exists( 'setsail_select_search_post_types' ) ) {
	function setsail_select_search_post_types() {
		$user_id = get_current_user_id();
		
		if ( empty( $_POST ) || ! isset( $_POST ) ) {
			setsail_select_ajax_status( 'error', esc_html__( 'All fields are empty', 'setsail' ) );
		} else {
			check_ajax_referer( 'qodef_search_post_types_nonce', 'search_post_types_nonce' );
			
			$args = array(
				'post_type'      => sanitize_text_field(  $_POST['postType'] ),
				'post_status'    => 'publish',
				'order'          => 'DESC',
				'orderby'        => 'date',
				's'              => sanitize_text_field(  $_POST['term'] ),
				'posts_per_page' => 5
			);
			
			$html  = '';
			$query = new WP_Query( $args );
			
			if ( $query->have_posts() ) {
				$html .= '<ul>';
					while ( $query->have_posts() ) {
						$query->the_post();
						$html .= '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
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
	
	add_action( 'wp_ajax_setsail_select_search_post_types', 'setsail_select_search_post_types' );
    add_action( 'wp_ajax_nopriv_setsail_select_search_post_types', 'setsail_select_search_post_types' );
}