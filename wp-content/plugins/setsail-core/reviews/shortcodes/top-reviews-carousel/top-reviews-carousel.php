<?php

namespace SetSailCore\CPT\Shortcodes\TopReviewsCarousel;

use SetSailCore\Lib\ShortcodeInterface;

class TopReviewsCarousel implements ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'setsail_core_top_reviews_carousel';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		$criteria_ratings = setsail_core_rating_criteria_for_vc();
		
		vc_map(
			array(
				'name'                      => esc_html__( 'Top Reviews Carousel', 'setsail-core' ),
				'base'                      => $this->base,
				'category'                  => esc_html__( 'by SETSAIL', 'setsail-core' ),
				'icon'                      => 'icon-wpb-top-reviews-carousel extended-custom-icon',
				'allowed_container_element' => 'vc_row',
				'params'                    => array(
					array(
						'type'        => 'textfield',
						'param_name'  => 'title',
						'heading'     => esc_html__( 'Title', 'setsail-core' ),
						'admin_label' => true
					),
					array(
						'type'        => 'textfield',
						'param_name'  => 'number_of_reviews',
						'heading'     => esc_html__( 'Number of Reviews', 'setsail-core' ),
						'description' => esc_html__( 'Leave empty for all', 'setsail-core' )
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'number_of_visible_items',
						'heading'     => esc_html__( 'Number Of Visible Reviews', 'setsail-core' ),
						'value'       => array(
							esc_html__( 'One', 'setsail-core' )   => '1',
							esc_html__( 'Two', 'setsail-core' )   => '2',
							esc_html__( 'Three', 'setsail-core' ) => '3',
							esc_html__( 'Four', 'setsail-core' )  => '4',
							esc_html__( 'Five', 'setsail-core' )  => '5',
							esc_html__( 'Six', 'setsail-core' )   => '6'
						),
						'save_always' => true
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'space_between_items',
						'heading'     => esc_html__( 'Space Between Items', 'setsail-core' ),
						'value'       => array(
							esc_html__( 'Tiny - 10', 'setsail-core' )   => '10',
							esc_html__( 'Small - 20', 'setsail-core' )  => '20',
							esc_html__( 'Normal - 30', 'setsail-core' ) => '30',
							esc_html__( 'Medium - 40', 'setsail-core' ) => '40',
							esc_html__( 'Large - 50', 'setsail-core' )  => '50',
							esc_html__( 'Huge - 60', 'setsail-core' )   => '60'
						),
						'save_always' => true
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'shadow',
						'heading'     => esc_html__( 'Enable Shadow', 'setsail-core' ),
						'value'       => array_flip( setsail_select_get_yes_no_select_array( false, true ) ),
						'save_always' => true
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'review_criteria',
						'heading'     => esc_html__( 'Order by Review Criteria', 'setsail-core' ),
						'value'       => $criteria_ratings,
						'save_always' => true
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'slider_pagination',
						'heading'     => esc_html__( 'Enable Pagination', 'setsail-core' ),
						'value'       => array_flip( setsail_select_get_yes_no_select_array( false, true ) ),
						'save_always' => true
					)
				)
			)
		);
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'title'                   => '',
			'number_of_reviews'       => '',
			'number_of_visible_items' => '3',
			'space_between_items'     => '40',
			'shadow'                  => 'yes',
			'review_criteria'         => '',
			'slider_pagination'       => 'yes'
		);
		$params = shortcode_atts( $args, $atts );
		
		$params['reviews']        = $this->getTopReviews( $params );
		$params['slider_data']    = $this->getSliderData( $params );
		$params['this_shortcode'] = $this;
		$params['holder_classes'] = $this->getHolderClasses( $params );
		
		return setsail_core_get_module_shortcode_template_part( 'reviews', 'top-reviews-carousel', 'top-reviews-carousel', '', $params );
	}
	
	private function getSliderData( $params ) {
		$slider_data = array();
		
		$slider_data['data-number-of-items']   = ! empty( $params['number_of_visible_items'] ) ? $params['number_of_visible_items'] : '1';
		$slider_data['data-slider-margin'] = ! empty( $params['space_between_items'] ) ? $params['space_between_items'] : '40';
		$slider_data['data-enable-navigation'] = 'no';
		$slider_data['data-enable-pagination'] = ! empty( $params['slider_pagination'] ) ? $params['slider_pagination'] : '';
		
		return $slider_data;
	}
	
	public function getTopReviews( $params ) {
		$number = isset( $params['number_of_reviews'] ) ? $params['number_of_reviews'] : '';
		
		$args = array(
			'status' => 'approve',
			'number' => $number
		);
		
		if ( isset( $params['review_criteria'] ) && ! empty( $params['review_criteria'] ) ) {
			$meta_query = array();
			
			$meta_query[]       = array(
				'key'     => $params['review_criteria'],
				'compare' => 'EXISTS'
			);
			$args['meta_query'] = $meta_query;
			$args['orderby']    = 'meta_value';
		}
		
		$comments = get_comments( $args );
		
		return $comments;
	}
	
	public function generateItemParams( $params ) {
		$comment                     = $params['comment'];
		$new_comment                 = array();
		$new_comment['comment_id']   = $comment->comment_ID;
		$new_comment['post_link']    = get_the_permalink( $comment->comment_post_ID );
		$new_comment['post_title']   = get_the_title( $comment->comment_post_ID );
		$new_comment['comment_text'] = get_comment_text( $comment->comment_ID );
		$new_comment['auhtor_email'] = $comment->comment_author_email;
		
		if ( isset( $params['review_criteria'] ) && ! empty( $params['review_criteria'] ) ) {
			$new_comment['review_value'] = get_comment_meta( $comment->comment_ID, $params['review_criteria'], true );
		}
		
		return $new_comment;
	}
	
	public function getHolderClasses( $params ) {
		$holderClasses = array();
		
		if($params['shadow'] == 'yes') {
			$holderClasses[] = 'qodef-has-shadow';
		}
		
		return implode( ' ', $holderClasses );
	}
}