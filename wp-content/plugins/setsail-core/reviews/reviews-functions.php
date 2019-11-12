<?php

define( 'SETSAIL_CORE_REVIEWS_MAX_RATING', 5 );
define( 'SETSAIL_CORE_REVIEWS_POINTS_SCALE', 2 );

/*
 * Function for defining post types that can be reviewed
 */
if ( ! function_exists( 'setsail_core_rating_posts_types' ) ) {
	function setsail_core_rating_posts_types() {
		$post_types = apply_filters( 'setsail_core_filter_rating_post_types', array() );
		
		return $post_types;
	}
}

/*
 * Function for defining post types that can be reviewed
 */
if ( ! function_exists( 'setsail_core_rating_criteria' ) ) {
	function setsail_core_rating_criteria() {
		$rating_criteria = array();
		$global_rating   = array(
			'key'   => 'qodef_global_rating',
			'label' => esc_html__( 'Rating', 'setsail-core' ),
			'show'  => true
		);
		
		$rating_criteria[] = $global_rating;
		
		$rating_criteria = apply_filters( 'setsail_core_filter_rating_criteria', $rating_criteria );
		
		return $rating_criteria;
	}
}

if ( ! function_exists( 'setsail_core_taxonomy_rating_array' ) ) {
	/*
	 * Function for generating taxonomy array
	 */
	function setsail_core_taxonomy_rating_array( $taxonomy_name ) {
		/*
		** Get the necessary data about user-defined review taxonomy
		*/
		global $wpdb;
		
		if ( setsail_core_is_wpml_installed() ) {
			$lang               = ICL_LANGUAGE_CODE;
			$wpml_taxonomy_name = 'tax_' . $taxonomy_name;
			$sql                = "SELECT t.term_id AS 'id',
	                       t.slug AS 'key',
	                       t.name AS 'label'
					    FROM {$wpdb->prefix}terms t
					    LEFT JOIN {$wpdb->prefix}term_taxonomy tt ON tt.term_id = t.term_id
					    LEFT JOIN {$wpdb->prefix}icl_translations icl_t ON icl_t.element_id = t.term_id
					    WHERE icl_t.element_type = '$wpml_taxonomy_name'
					    AND icl_t.language_code='$lang'
					    ORDER BY name ASC";
		} else {
			$sql = "SELECT t.term_id AS 'id',
	                       t.slug AS 'key',
	                       t.name AS 'label'
	                    FROM {$wpdb->prefix}terms t
	                    LEFT JOIN {$wpdb->prefix}term_taxonomy tt ON tt.term_id = t.term_id
	                    WHERE tt.taxonomy = '$taxonomy_name'
	                    ORDER BY name ASC";
		}
		
		$review_criteria = $wpdb->get_results( $sql, 'ARRAY_A' );
		
		$final_criteria = array();
		
		if ( ! empty( $review_criteria ) ) {
			$taxonomy_name_meta = str_replace( '-', '_', $taxonomy_name );
			foreach ( $review_criteria as $review_criterion ) {
				$temp_criterion          = (array) $review_criterion;
				$term_meta               = get_term_meta( $temp_criterion['id'] );
				$is_reviews_enabled      = ( isset( $term_meta[ $taxonomy_name_meta . '_show' ][0] ) && $term_meta[ $taxonomy_name_meta . '_show' ][0] != 'no' ) ? true : false;
				$temp_criterion['show']  = $is_reviews_enabled;
				$temp_criterion['order'] = isset( $term_meta[ $taxonomy_name_meta . '_order' ][0] ) ? (int) $term_meta[ $taxonomy_name_meta . '_order' ][0] : PHP_INT_MAX;
				
				if ( $is_reviews_enabled ) {
					$final_criteria[] = $temp_criterion;
				}
			}
			
			for ( $i = 0; $i < count( $final_criteria ) - 1; $i ++ ) {
				for ( $j = $i + 1; $j < count( $final_criteria ); $j ++ ) {
					if ( $final_criteria[ $i ]['order'] > $final_criteria[ $j ]['order'] ) {
						$temp                 = $final_criteria[ $i ];
						$final_criteria[ $i ] = $final_criteria[ $j ];
						$final_criteria[ $j ] = $temp;
					}
				}
			}
		}
		
		return $final_criteria;
	}
}

/*
 * Function for defining post types that can be reviewed
 */
if ( ! function_exists( 'setsail_core_rating_criteria_for_vc' ) ) {
	function setsail_core_rating_criteria_for_vc() {
		$criteria_array  = setsail_core_rating_criteria();
		$formatted_array = array();
		foreach ( $criteria_array as $criteria ) {
			$formatted_array[ $criteria['label'] ] = $criteria['key'];
		}
		
		return $formatted_array;
	}
}

/*
 * Function for adding comment meta boxes and its callback in admin
 */
if ( ! function_exists( 'setsail_core_extend_comment_meta_box' ) ) {
	function setsail_core_extend_comment_meta_box() {
		add_meta_box(
			'title',
			esc_html__( 'Comment - Reviews', 'setsail-core' ),
			'setsail_core_extend_comment_meta_box_callback',
			'comment',
			'normal',
			'high'
		);
	}
	
	add_action( 'add_meta_boxes_comment', 'setsail_core_extend_comment_meta_box' );
}

if ( ! function_exists( 'setsail_core_extend_comment_meta_box_callback' ) ) {
	function setsail_core_extend_comment_meta_box_callback( $comment ) {
		$post_types = setsail_core_rating_posts_types();
		
		if ( is_array( $post_types ) && count( $post_types ) > 0 ) {
			foreach ( $post_types as $post_type ) {
				if ( $comment->post_type == $post_type ) {
					wp_nonce_field( 'extend_comment_update', 'extend_comment_update', false );
					
					$title                 = get_comment_meta( $comment->comment_ID, 'qodef_comment_title', true );
					$title_params          = array();
					$title_params['title'] = $title;
					
					echo setsail_core_get_module_template_part( 'reviews', 'admin/title-field', '', $title_params );
					
					$rating_criteria = setsail_core_rating_criteria();
					foreach ( $rating_criteria as $criteria ) {
						$star_params           = array();
						$star_params['label']  = $criteria['label'];
						$star_params['key']    = $criteria['key'];
						$star_params['rating'] = get_comment_meta( $comment->comment_ID, $criteria['key'], true );;
						
						echo setsail_core_get_module_template_part( 'reviews', 'admin/stars-field', '', $star_params );
					}
				}
			}
		}
	}
}

/*
 * Function that is triggered when comment is edited
 */
if ( ! function_exists( 'setsail_core_extend_comment_edit_metafields' ) ) {
	function setsail_core_extend_comment_edit_metafields( $comment_id ) {
		if ( ( ! isset( $_POST['extend_comment_update'] ) || ! wp_verify_nonce( $_POST['extend_comment_update'], 'extend_comment_update' ) ) ) {
			return;
		}
		
		if ( ( isset( $_POST['qodef_comment_title'] ) ) && ( $_POST['qodef_comment_title'] != '' ) ):
			$title = wp_filter_nohtml_kses( $_POST['qodef_comment_title'] );
			update_comment_meta( $comment_id, 'qodef_comment_title', $title );
		else :
			delete_comment_meta( $comment_id, 'qodef_comment_title' );
		endif;
		
		$rating_criteria = setsail_core_rating_criteria();
		foreach ( $rating_criteria as $criteria ) {
			if ( ( isset( $_POST[ $criteria['key'] ] ) ) && ( $_POST[ $criteria['key'] ] != '' ) ):
				$rating = wp_filter_nohtml_kses( $_POST[ $criteria['key'] ] );
				update_comment_meta( $comment_id, $criteria['key'], $rating );
			else :
				delete_comment_meta( $comment_id, $criteria['key'] );
			endif;
		}
	}
	
	add_action( 'edit_comment', 'setsail_core_extend_comment_edit_metafields' );
}

/*
 * Function that is triggered when comment is saved
 */
if ( ! function_exists( 'setsail_core_extend_comment_save_metafields' ) ) {
	function setsail_core_extend_comment_save_metafields( $comment_id ) {
		
		if ( ( isset( $_POST['qodef_comment_title'] ) ) && ( $_POST['qodef_comment_title'] != '' ) ) {
			$title = wp_filter_nohtml_kses( $_POST['qodef_comment_title'] );
			add_comment_meta( $comment_id, 'qodef_comment_title', $title );
		}
		
		$rating_criteria = setsail_core_rating_criteria();
		foreach ( $rating_criteria as $criteria ) {
			if ( ( isset( $_POST[ $criteria['key'] ] ) ) && ( $_POST[ $criteria['key'] ] != '' ) ) {
				$rating = wp_filter_nohtml_kses( $_POST[ $criteria['key'] ] );
				add_comment_meta( $comment_id, $criteria['key'], $rating );
			}
		}
	}
	
	add_action( 'comment_post', 'setsail_core_extend_comment_save_metafields' );
}

/*
 * Function that is triggered before comment is saved
 */
if ( ! function_exists( 'setsail_core_extend_comment_preprocess_metafields' ) ) {
	function setsail_core_extend_comment_preprocess_metafields( $commentdata ) {
		$post_types = setsail_core_rating_posts_types();
		
		if ( is_array( $post_types ) && count( $post_types ) > 0 ) {
			foreach ( $post_types as $post_type ) {
				if ( is_singular( $post_type ) ) {
					$rating_criteria = setsail_core_rating_criteria();
					foreach ( $rating_criteria as $criteria ) {
						if ( ! isset( $_POST[ $criteria['key'] ] ) ) {
							wp_die( esc_html__( 'Error: You did not add a rating. Hit the Back button on your Web browser and resubmit your comment with a rating.', 'setsail-core' ) );
							break;
						}
					}
				}
			}
		}
		
		return $commentdata;
	}
	
	add_filter( 'preprocess_comment', 'setsail_core_extend_comment_preprocess_metafields' );
}

/*
 * Function that through theme filter renders required fields in comment form on single post
 */
if ( ! function_exists( 'setsail_core_comment_additional_fields' ) ) {
	function setsail_core_comment_additional_fields( $textarea ) {
		$post_types = setsail_core_rating_posts_types();
		
		if ( is_array( $post_types ) && count( $post_types ) > 0 ) {
			foreach ( $post_types as $post_type ) {
				if ( is_singular( $post_type ) ) {
					$textarea = '';
					
					$rating_criteria = setsail_core_rating_criteria();
					foreach ( $rating_criteria as $criteria ) {
						$star_params          = array();
						$star_params['label'] = $criteria['label'];
						$star_params['key']   = $criteria['key'];
						$textarea             .= setsail_core_get_module_template_part( 'reviews', 'front-input/stars-field', '', $star_params );
					}
					
					$textarea .= setsail_core_get_module_template_part( 'reviews', 'front-input/text-field' );
				}
			}
		}
		
		return $textarea;
	}
	
	add_filter( 'setsail_select_filter_comment_form_textarea_field', 'setsail_core_comment_additional_fields', 10, 1 );
}

/*
 * Function that through theme filter renders listed comments on single post and it's callback
 */
if ( ! function_exists( 'setsail_core_override_comments_list_callback' ) ) {
	function setsail_core_override_comments_list_callback( $args ) {
		$post_types = setsail_core_rating_posts_types();
		
		if ( is_array( $post_types ) && count( $post_types ) > 0 ) {
			foreach ( $post_types as $post_type ) {
				if ( is_singular( $post_type ) ) {
					$args['callback'] = 'setsail_core_list_reviews';
				}
			}
		}
		
		return $args;
	}
	
	add_filter( 'setsail_select_filter_comments_callback', 'setsail_core_override_comments_list_callback' );
}

if ( ! function_exists( 'setsail_core_list_reviews' ) ) {
	function setsail_core_list_reviews( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		global $post;
		
		$is_pingback_comment = $comment->comment_type == 'pingback';
		$is_author_comment   = $post->post_author == $comment->user_id;
		
		$comment_class = 'qodef-comment clearfix';
		
		if ( $is_author_comment ) {
			$comment_class .= ' qodef-post-author-comment';
		}
		
		$params                        = array();
		$params['comment']             = $comment;
		$params['comment_class']       = $comment_class;
		$params['is_pingback_comment'] = $is_pingback_comment;
		$params['review_title']        = get_comment_meta( $comment->comment_ID, 'qodef_comment_title', true );
		$params['rating_criteria']     = setsail_core_rating_criteria();
		
		echo setsail_core_get_module_template_part( 'reviews', 'front-list/item-holder', '', $params );
	}
}

/*
 * Functions for getting review details for rendering above comments list
 */
if ( ! function_exists( 'setsail_core_list_review_details' ) ) {
	function setsail_core_list_review_details( $template = 'simple', $unset_params = array(), $title_tag = 'h4', $item_id = '' ) {
		$title    = setsail_core_theme_installed() ? setsail_select_options()->getOptionValue( 'reviews_section_title' ) : '';
		$subtitle = setsail_core_theme_installed() ? setsail_select_options()->getOptionValue( 'reviews_section_subtitle' ) : '';
		
		$params                  = array();
		$params['title']         = $title;
		$params['title_tag']     = $title_tag;
		$params['subtitle']      = $subtitle;
		$params['rating_number'] = setsail_core_post_number_of_ratings($item_id);
		$params['rating_label']  = setsail_core_post_number_of_ratings($item_id) === 1 ? esc_html__( 'Review', 'setsail-core' ) : esc_html__( 'Reviews', 'setsail-core' );
		$params['post_ratings']  = setsail_core_post_ratings($item_id);
		
		if ( ! empty( $unset_params ) ) {
			foreach ( $unset_params as $key => $value ) {
				if ( is_array( $value ) ) {
					foreach ( $value  as $value_key => $new_value ) {
						unset( $params[ $key ][ $value_key ][ $new_value ] );
					}
				} else {
					unset( $params[ $value ] );
				}
			}
		}
		
		return setsail_core_get_module_template_part( 'reviews', 'front-list/details', $template, $params );
	}
}

/*
 * Functions for getting approved comments and their values for displaying info
 */
if ( ! function_exists( 'setsail_core_post_ratings' ) ) {
	function setsail_core_post_ratings( $id = '' ) {
		$id            = ! empty( $id ) ? $id : get_the_ID();
		$comment_array = get_approved_comments( $id );
		
		$rating_criteria = setsail_core_rating_criteria();
		foreach ( $rating_criteria as $key => $criteria ) {
			$marks = array(
				'5' => 0,
				'4' => 0,
				'3' => 0,
				'2' => 0,
				'1' => 0
			);
			
			$count = 0;
			foreach ( $comment_array as $comment ) {
				$rating = get_comment_meta( $comment->comment_ID, $criteria['key'], true );
				
				if ( $rating != '' && $rating != 0 ) {
					$marks[ $rating ] = $marks[ $rating ] + 1;
					$count ++;
				}
			}
			
			$criteria['marks'] = $marks;
			$criteria['count'] = $count;
			
			$rating_criteria[ $key ] = $criteria;
		}
		
		return $rating_criteria;
	}
}

/*
 * Calculation functions
 */
if ( ! function_exists( 'setsail_core_post_number_of_ratings' ) ) {
	function setsail_core_post_number_of_ratings( $id = '' ) {
		$id            = ! empty( $id ) ? $id : get_the_ID();
		$comment_array = get_approved_comments( $id );
		$count         = ! empty( $comment_array ) ? count( $comment_array ) : 0;
		
		return $count;
	}
}

if ( ! function_exists( 'setsail_core_post_average_rating' ) ) {
	function setsail_core_post_average_rating( $criteria ) {
		$sum     = 0;
		$ratings = $criteria['marks'];
		$count   = $criteria['count'];
		foreach ( $ratings as $rating => $value ) {
			$sum = $sum + $rating * $value;
		}
		
		$average = $count == 0 ? 0 : round( $sum / $count );
		
		return $average;
	}
}

if ( ! function_exists( 'setsail_core_post_average_rating_per_criteria' ) ) {
	function setsail_core_post_average_rating_per_criteria( $criteria ) {
		$average = setsail_core_post_average_rating( $criteria );
		$average = $average / SETSAIL_CORE_REVIEWS_MAX_RATING * 100;
		
		return $average;
	}
}

if ( ! function_exists( 'setsail_core_get_total_average_rating' ) ) {
	function setsail_core_get_total_average_rating( $criteria_array ) {
		$sum = 0;
		
		if ( is_array( $criteria_array ) && count( $criteria_array ) ) {
			foreach ( $criteria_array as $criteria ) {
				$sum += setsail_core_post_average_rating( $criteria );
			}
			
			return $sum / count( $criteria_array );
		}
		
		return $sum;
	}
}

/*
 * Formatting functions
 */
if ( ! function_exists( 'setsail_core_reviews_format_rating_output' ) ) {
	function setsail_core_reviews_format_rating_output( $rating ) {
		return floor( $rating * SETSAIL_CORE_REVIEWS_POINTS_SCALE ) . '.' . round( $rating * SETSAIL_CORE_REVIEWS_POINTS_SCALE * 10 ) % 10;
	}
}

if ( ! function_exists( 'setsail_core_reviews_get_icon_list' ) ) {
	function setsail_core_reviews_get_icon_list() {
		return array(
			'<span class="icon_star_alt"></span>',
			'<span class="icon_star-half_alt"></span>',
			'<span class="icon_star"></span>'
		);
	}
}

if ( ! function_exists( 'setsail_core_reviews_get_description_list' ) ) {
	function setsail_core_reviews_get_description_list() {
		return array(
			esc_html__( 'Poor', 'setsail-core' ),
			esc_html__( 'Good', 'setsail-core' ),
			esc_html__( 'Superb', 'setsail-core' )
		);
	}
}

if ( ! function_exists( 'setsail_core_reviews_get_icon_for_rating' ) ) {
	function setsail_core_reviews_get_icon_for_rating( $rating ) {
		if ( ! $rating ) {
			return '';
		}
		
		$icons = setsail_core_reviews_get_icon_list();
		$delta = SETSAIL_CORE_REVIEWS_MAX_RATING / count( $icons );
		
		return $icons[ ceil( $rating / $delta ) - 1 ];
	}
}

if ( ! function_exists( 'setsail_core_reviews_get_description_for_rating' ) ) {
	function setsail_core_reviews_get_description_for_rating( $rating ) {
		if ( ! $rating ) {
			return '';
		}
		
		$terms = setsail_core_reviews_get_description_list();
		$delta = SETSAIL_CORE_REVIEWS_MAX_RATING / count( $terms );
		
		return $terms[ ceil( $rating / $delta ) - 1 ];
	}
}