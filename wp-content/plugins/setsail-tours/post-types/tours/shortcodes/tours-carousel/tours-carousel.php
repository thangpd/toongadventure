<?php
namespace SetSailTours\CPT\Tours\Shortcodes;

use SetSailTours\CPT\Tours\Lib\ToursQuery;
use SetSailTours\Lib\ShortcodeInterface;

class ToursCarousel implements ShortcodeInterface {
	private $base;

	/**
	 * ToursCarousel constructor.
	 */
	public function __construct() {
		$this->base = 'setsail_tours_carousel';

		add_action('vc_before_init', array($this, 'vcMap'));
	}


	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		vc_map(array(
			'name'                      => esc_html__('Tours Carousel', 'setsail-tours'),
			'base'                      => $this->base,
			'category'       			=> esc_html__('by SETSAIL TOURS', 'setsail-tours'),
			'icon'                      => 'icon-wpb-tours-carousel extended-custom-tours-icon',
			'allowed_container_element' => 'vc_row',
			'params'                    => array_merge(
				array(
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__('Image Proportions', 'setsail-tours'),
						'param_name'  => 'image_size',
						'value'       => array(
							esc_html__('Original', 'setsail-tours')  => 'full',
							esc_html__('Square', 'setsail-tours')    => 'square',
							esc_html__('Landscape', 'setsail-tours') => 'landscape',
							esc_html__('Portrait', 'setsail-tours')  => 'portrait',
							esc_html__('Custom', 'setsail-tours')    => 'custom'
						)
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__('Image Dimensions', 'setsail-tours'),
						'param_name'  => 'custom_image_dimensions',
						'description' => esc_html__('Enter custom image dimensions. Enter image size in pixels: 200x100 (Width x Height)', 'setsail-tours'),
						'dependency'  => array('element' => 'image_size', 'value' => 'custom')
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
						'param_name'  => 'title_tag',
						'heading'     => esc_html__( 'Title Tag', 'setsail-tours' ),
						'value'       => array_flip( setsail_select_get_title_tag( true ) ),
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__('Text Length', 'setsail-tours'),
						'param_name'  => 'text_length',
						'description' => esc_html__('Number of words', 'setsail-tours')
					),
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__('Enable Reviews', 'setsail-tours'),
						'param_name'  => 'reviews',
						'value'       => array(
							esc_html__('No', 'setsail-tours')  => 'no',
							esc_html__('Yes', 'setsail-tours') => 'yes'
						),
						'save_always' => true
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'carousel_pagination',
						'heading'     => esc_html__( 'Enable Pagination', 'setsail-core' ),
						'value'       => array_flip( setsail_select_get_yes_no_select_array( false, true ) ),
						'save_always' => true
					)
				),
				setsail_tours_query()->queryVCParams()
			) //close array_merge
		));
	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @param $content string shortcode content
	 *
	 * @return string
	 */
	public function render($atts, $content = null) {
		$args = array(
			'tour_type'               => 'standard',
			'image_size'              => 'full',
			'custom_image_dimensions' => '',
			'number_of_visible_items' => '5',
			'space_between_items'     => 'normal',
			'title_tag'               => 'h4',
			'text_length'             => '14',
			'reviews'                 => 'no',
			'carousel_pagination'     => 'yes'
		);

		$args   = array_merge($args, setsail_tours_query()->getShortcodeAtts());
		$params = shortcode_atts($args, $atts);
		
		if(!empty($params['destination'])) {
			$destination_query = new \WP_Query(array('post_status' => 'published', 'post_type' => 'destinations', 'name' => esc_attr(strtolower($params['destination']))));
			wp_reset_postdata();
			$destination_id = $destination_query->posts[0]->ID;
			
			$query = setsail_tours_query()->buildQueryObject($params, array(
				'meta_key' => 'tour_destination',
				'meta_value' => esc_attr($destination_id)
			));
		} else {
			$query  = setsail_tours_query()->buildQueryObject($params);
		}

		$params['query']  = $query;
		$params['caller'] = $this;

		$params['thumb_size'] = setsail_tours_get_image_size_param($params);
		$params['carousel_data'] = $this->getSliderData($params);
		$params['list_classes'] = $this->getListClasses($params);

		return setsail_tours_get_tour_module_template_part('tours-carousel/templates/tours-carousel-holder', 'tours', 'shortcodes', '', $params);
	}

	public function getItemTemplate($tour_type = 'standard', $params = array()) {
		echo setsail_tours_get_tour_module_template_part('templates/tour-item/'.$tour_type, 'tours', '', '', $params);
	}

	private function getSliderData( $params ) {
		$slider_data = array();
		
		$slider_data['data-number-of-items']   = ! empty( $params['number_of_visible_items'] ) ? $params['number_of_visible_items'] : '1';
		$slider_data['data-slider-margin']     = ! empty( $params['space_between_items'] ) ? $params['space_between_items'] : '40';
		$slider_data['data-enable-loop']       = 'yes';
		$slider_data['data-enable-navigation'] = 'no';
		$slider_data['data-enable-pagination'] = ! empty( $params['carousel_pagination'] ) ? $params['carousel_pagination'] : '';
		
		return $slider_data;
	}

	private function getListClasses( $params ) {
		$list_classes = array();
		$list_classes[] = 'qodef-tours-row';

		if ($params['space_between_items'] !== ''){
			$list_classes[] = 'qodef-tr-'.$params['space_between_items'].'-space';
		}

		return implode(' ', $list_classes);
	}
}