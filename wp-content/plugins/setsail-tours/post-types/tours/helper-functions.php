<?php

if ( ! function_exists( 'setsail_tours_tour_item_meta_box_functions' ) ) {
	function setsail_tours_tour_item_meta_box_functions( $post_types ) {
		$post_types[] = 'tour-item';

		return $post_types;
	}

	add_filter( 'setsail_select_filter_meta_box_post_types_save', 'setsail_tours_tour_item_meta_box_functions' );
	add_filter( 'setsail_select_filter_meta_box_post_types_remove', 'setsail_tours_tour_item_meta_box_functions' );
}

if ( ! function_exists( 'setsail_tours_tour_item_scope_meta_box_functions' ) ) {
	function setsail_tours_tour_item_scope_meta_box_functions( $post_types, $meta_box ) {
		if ( $meta_box !== 'sidebar_meta' ) {
			$post_types[] = 'tour-item';
		}

		return $post_types;
	}

	add_filter( 'setsail_select_filter_set_scope_for_meta_boxes', 'setsail_tours_tour_item_scope_meta_box_functions', 10, 2 );
}

if ( ! function_exists( 'setsail_tours_tour_item_enqueue_meta_box_styles' ) ) {
	function setsail_tours_tour_item_enqueue_meta_box_styles() {
		global $post;

		if ( ! empty( $post ) && $post->post_type == 'tour-item' ) {
			wp_enqueue_style( 'qodef-jquery-ui', get_template_directory_uri() . '/framework/admin/assets/css/jquery-ui/jquery-ui.css' );
		}
	}

	add_action( 'setsail_select_action_enqueue_meta_box_styles', 'setsail_tours_tour_item_enqueue_meta_box_styles' );
}

if ( ! function_exists( 'setsail_tours_register_tour_item_cpt' ) ) {
	function setsail_tours_register_tour_item_cpt( $cpt_class_name ) {
		$cpt_class = array(
			'SetSailTours\CPT\Tours\ToursRegister'
		);

		$cpt_class_name = array_merge( $cpt_class_name, $cpt_class );

		return $cpt_class_name;
	}

	add_filter( 'setsail_tours_filter_register_custom_post_types', 'setsail_tours_register_tour_item_cpt' );
}

if ( ! function_exists( 'setsail_tours_add_tour_item_to_search_types' ) ) {
	function setsail_tours_add_tour_item_to_search_types( $post_types ) {
		$post_types['tour-item'] = esc_html__( 'Tour Item', 'setsail-tours' );

		return $post_types;
	}

	add_filter( 'setsail_select_filter_search_post_type_widget_params_post_type', 'setsail_tours_add_tour_item_to_search_types' );
}

//Add hotel room to list of post types with review
if ( ! function_exists( 'setsail_tours_extend_rating_posts_types' ) ) {
	function setsail_tours_extend_rating_posts_types( $post_types ) {
		$post_types[] = 'tour-item';

		return $post_types;
	}

	add_filter( 'setsail_core_filter_rating_post_types', 'setsail_tours_extend_rating_posts_types' );
}

// Load tours shortcodes
if ( ! function_exists( 'setsail_tours_include_tours_shortcodes_file' ) ) {
	/**
	 * Loades all shortcodes by going through all folders that are placed directly in shortcodes folder
	 */
	function setsail_tours_include_tours_shortcodes_file() {
		foreach ( glob( SETSAIL_TOURS_CPT_PATH . '/tours/shortcodes/*/load.php' ) as $shortcode_load ) {
			include_once $shortcode_load;
		}
	}

	add_action( 'setsail_tours_action_include_shortcodes_file', 'setsail_tours_include_tours_shortcodes_file' );
}

if ( ! function_exists( 'setsail_tours_get_tours_categories' ) ) {
	/**
	 * Get Tour Categories
	 * @return array
	 */
	function setsail_tours_get_tours_categories() {
		$tour_categories = array();

		$cats = get_terms( array(
			'taxonomy' => 'tour-category'
		) );

		foreach ( $cats as $cat ) {
			$tour_categories[ $cat->slug ] = $cat->name;
		}

		return $tour_categories;
	}
}

if ( ! function_exists( 'setsail_tours_get_tours_categories_vc' ) ) {
	/**
	 * Function that returns array of tours categories formatted for Visual Composer
	 *
	 * @return array array of tours categories where key is term title and value is term slug
	 *
	 * @see setsail_tours_get_tours_categories
	 */

	function setsail_tours_get_tours_categories_vc() {

		return array_flip( setsail_tours_get_tours_categories() );
	}
}

if ( ! function_exists( 'setsail_tours_get_tour_attributes' ) ) {
	/**
	 * Return Tour Attribute Custom Post Type associative array where key is post id and value is post title.
	 *
	 * return array
	 */
	function setsail_tours_get_tour_attributes() {
		$tour_attributes = array();

		$terms = get_terms( array(
				'taxonomy'   => 'tour-attribute',
				'hide_empty' => false,
			)
		);

		foreach ( $terms as $term ) {
			$tour_attributes[ $term->slug ] = $term->name;
		}

		return $tour_attributes;
	}
}

if ( ! function_exists( 'setsail_tours_get_single_tour_item' ) ) {
	/**
	 * Loads single tour-item template
	 *
	 */
	function setsail_tours_get_single_tour_item() {
		$params = array(
			'holder_class'  => 'qodef-tour-item-single-holder',
			'tour_sections' => setsail_tours_check_tour_sections()
		);

		echo setsail_tours_get_tour_module_template_part( 'single/holder', 'tours', 'templates', '', $params );
	}
}

if ( ! function_exists( 'setsail_tours_get_tour_info_part' ) ) {
	/**
	 * @param $part
	 *
	 * @return bool
	 */
	function setsail_tours_get_tour_info_part( $part ) {
		if ( empty( $part ) ) {
			return false;
		}

		echo setsail_tours_get_tour_module_template_part( $part, 'tours', 'templates', '', array() );
	}
}

if ( ! function_exists( 'setsail_tours_check_tour_sections' ) ) {
	/**
	 * check if tour item sections are enabled
	 *
	 */
	function setsail_tours_check_tour_sections() {

		$sections_array = array(
			'tour_show_info_section',
			'tour_show_plan_section',
			'tour_show_location_section',
			'tour_show_gallery_section',
			'tour_show_review_section',
			'tour_show_custom_section_1',
			'tour_show_custom_section_2',
		);
		$return_array   = array();

		foreach ( $sections_array as $section ) {
			$section_key                           = str_replace( 'tour_', '', $section );
			$return_array[ $section_key ]['value'] = get_post_meta( get_the_ID(), $section, true );

			switch ( $section_key ) {
				case 'show_info_section' :
					$return_array[ $section_key ]['icon']  = 'icon_documents_alt';
					$return_array[ $section_key ]['title'] = esc_html__( 'INFORMATION', 'setsail-tours' );
					$return_array[ $section_key ]['id']    = 'tour-item-info-id';
					break;
				case 'show_plan_section' :
					$return_array[ $section_key ]['icon']  = 'icon_calendar';
					$return_array[ $section_key ]['title'] = esc_html__( 'TOUR PLAN', 'setsail-tours' );
					$return_array[ $section_key ]['id']    = 'tour-item-plan-id';
					break;
				case 'show_location_section' :
					$return_array[ $section_key ]['icon']  = 'icon_pin_alt';
					$return_array[ $section_key ]['title'] = esc_html__( 'LOCATION', 'setsail-tours' );
					$return_array[ $section_key ]['id']    = 'tour-item-location-id';
					break;
				case 'show_gallery_section' :
					$return_array[ $section_key ]['icon']  = 'icon_camera_alt';
					$return_array[ $section_key ]['title'] = esc_html__( 'GALLERY', 'setsail-tours' );
					$return_array[ $section_key ]['id']    = 'tour-item-gallery-id';
					break;
				case 'show_review_section' :
					$return_array[ $section_key ]['icon']  = 'icon_chat_alt';
					$return_array[ $section_key ]['title'] = esc_html__( 'REVIEWS', 'setsail-tours' );
					$return_array[ $section_key ]['id']    = 'tour-item-review-id';
					break;
				case 'show_custom_section_1' :

					$custom_section1_title                 = ( get_post_meta( get_the_ID(), 'tour_custom_section1_title', true ) != '' ) ? get_post_meta( get_the_ID(), 'tour_custom_section1_title', true ) : esc_html__( 'Custom Section 1', 'setsail-tours' );
					$return_array[ $section_key ]['icon']  = 'icon_book';
					$return_array[ $section_key ]['title'] = $custom_section1_title;
					$return_array[ $section_key ]['id']    = 'tour-item-custom1-id';
					break;
				case 'show_custom_section_2' :
					$custom_section2_title                 = ( get_post_meta( get_the_ID(), 'tour_custom_section2_title', true ) != '' ) ? get_post_meta( get_the_ID(), 'tour_custom_section2_title', true ) : esc_html__( 'Custom Section 2', 'setsail-tours' );
					$return_array[ $section_key ]['icon']  = 'icon_book';
					$return_array[ $section_key ]['title'] = $custom_section2_title;
					$return_array[ $section_key ]['id']    = 'tour-item-custom2-id';
					break;
			}
		}

		return $return_array;
	}
}

if ( ! function_exists( 'setsail_tours_add_image_gallery_attachment_custom_field' ) ) {
	function setsail_tours_add_image_gallery_attachment_custom_field( $form_fields, $post = null ) {
		if ( wp_attachment_is_image( $post->ID ) ) {
			$field_value = get_post_meta( $post->ID, 'tours_gallery_masonry_image_size', true );

			$form_fields['tours_gallery_masonry_image_size'] = array(
				'input' => 'html',
				'label' => esc_html__( 'Image Size', 'setsail-tours' ),
				'helps' => esc_html__( 'Choose image size for Tours Single Gallery', 'setsail-tours' )
			);

			$form_fields['tours_gallery_masonry_image_size']['html'] = "<select name='attachments[{$post->ID}][tours_gallery_masonry_image_size]'>";
			$form_fields['tours_gallery_masonry_image_size']['html'] .= '<option ' . selected( $field_value, 'qodef-masonry-size-small', false ) . ' value="qodef-masonry-size-small">' . esc_html__( 'Default Size', 'setsail-tours' ) . '</option>';
			$form_fields['tours_gallery_masonry_image_size']['html'] .= '<option ' . selected( $field_value, 'qodef-masonry-size-large-width', false ) . ' value="qodef-masonry-size-large-width">' . esc_html__( 'Large Width Size', 'setsail-tours' ) . '</option>';
			$form_fields['tours_gallery_masonry_image_size']['html'] .= '<option ' . selected( $field_value, 'qodef-masonry-size-large-height', false ) . ' value="qodef-masonry-size-large-height">' . esc_html__( 'Large Height Size', 'setsail-tours' ) . '</option>';
			$form_fields['tours_gallery_masonry_image_size']['html'] .= '<option ' . selected( $field_value, 'qodef-masonry-size-large-width-height', false ) . ' value="qodef-masonry-size-large-width-height">' . esc_html__( 'Large Size', 'setsail-tours' ) . '</option>';

			$form_fields['tours_gallery_masonry_image_size']['html'] .= '</select>';
		}

		return $form_fields;
	}

	add_filter( 'attachment_fields_to_edit', 'setsail_tours_add_image_gallery_attachment_custom_field', 15, 2 );
}

if ( ! function_exists( 'setsail_core_save_image_gallery_attachment_fields' ) ) {
	/**
	 * @param array $post
	 * @param array $attachment
	 *
	 * @return array
	 */
	function setsail_tours_save_image_gallery_attachment_fields( $post, $attachment ) {

		if ( isset( $attachment['tours_gallery_masonry_image_size'] ) ) {
			update_post_meta( $post['ID'], 'tours_gallery_masonry_image_size', $attachment['tours_gallery_masonry_image_size'] );
		}

		return $post;
	}

	add_filter( 'attachment_fields_to_save', 'setsail_tours_save_image_gallery_attachment_fields', 15, 2 );
}

if ( ! function_exists( 'setsail_tours_set_boxed_layout_class_for_single_tours' ) ) {
	function setsail_tours_set_boxed_layout_class_for_single_tours( $classes ) {
		$boxed_layout_meta = setsail_select_options()->getOptionValue( 'tour_single_boxed_layout' );

		if ( is_singular( 'tour-item' ) && $boxed_layout_meta === 'yes' ) {
			$classes[] = 'qodef-page-content-is-boxed';

			$boxed_layout_overlapping_meta = setsail_select_options()->getOptionValue( 'tour_single_enable_boxed_layout_overlapping' );
			if ( $boxed_layout_overlapping_meta === 'yes' ) {
				$classes[] = 'qodef-content-overlapping';
			}
		}

		return $classes;
	}

	add_filter( 'body_class', 'setsail_tours_set_boxed_layout_class_for_single_tours' );
}

if ( ! function_exists( 'dep365_get_price_single_tour_ajax' ) ) {
	function dep365_get_price_single_tour_ajax() {
//		setsail_tours_get_tour_price
		$res = [];
		if ( isset( $_GET['id_tour'] ) ) {
			$res['price']                          = setsail_tours_get_tour_price( ! empty( $_GET['id_tour'] ) ? $_GET['id_tour'] : null, true );
			$setsail_tours_get_tour_discount_price = setsail_tours_get_tour_discount_price( ! empty( $_GET['id_tour'] ) ? $_GET['id_tour'] : null, true );
			$res['price_new']                      = $setsail_tours_get_tour_discount_price;
			$res['data']                           = $_GET['id_tour'];
		}

		echo json_encode( $res );
		wp_die();
	}

	add_action( 'wp_ajax_dep365_get_price_single_tour_ajax', 'dep365_get_price_single_tour_ajax' );
	add_action( 'wp_ajax_nopriv_dep365_get_price_single_tour_ajax', 'dep365_get_price_single_tour_ajax' );
}