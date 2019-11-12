<?php
namespace SetSailTours\CPT\Destination\Shortcodes;

use SetSailTours\Lib\ShortcodeInterface;

class DestinationsSliderFullScreen implements ShortcodeInterface {
	private $base;

	/**
	 * DestinationGrid constructor.
	 */
	public function __construct() {
		$this->base = 'qodef_destinations_slider_full_screen';

		add_action('vc_before_init', array($this, 'vcMap'));
	}


	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		vc_map( array(
			'name'     => esc_html__( 'Destinations Full Screen Slider', 'setsail-tours' ),
			'base'     => $this->base,
			'category' => esc_html__( 'by SETSAIL TOURS', 'setsail-tours' ),
			'icon'     => 'icon-wpb-destinations-slider-full-screen extended-custom-tours-icon',
			'params'   => array(
				array(
					'type'        => 'textfield',
					'param_name'  => 'number_of_items',
					'heading'     => esc_html__( 'Number of Items', 'setsail-tours' ),
					'admin_label' => true,
					'description' => esc_html__( 'Set number of items for your destinations slider. Default value is -1 (all items)', 'setsail-tours' )
				),
				array(
					'type'        => 'dropdown',
					'param_name'  => 'number_of_visible_items',
					'heading'     => esc_html__( 'Number Of Visible Items', 'setsail-tours' ),
					'value'       => array(
						esc_html__( 'One', 'setsail-tours' )   => '1',
						esc_html__( 'Two', 'setsail-tours' )   => '2',
						esc_html__( 'Three', 'setsail-tours' ) => '3',
						esc_html__( 'Four', 'setsail-tours' )  => '4',
						esc_html__( 'Five', 'setsail-tours' )  => '5',
						esc_html__( 'Six', 'setsail-tours' )   => '6'
					),
					'save_always' => true,
					'group'       => esc_html__( 'Slider Settings', 'setsail-tours' )
				),
				array(
					'type'       => 'dropdown',
					'param_name' => 'space_between_items',
					'heading'    => esc_html__( 'Space Between Items', 'setsail-tours' ),
					'value'      => array_flip( setsail_select_get_space_between_items_array() ),
					'group'       => esc_html__( 'Slider Settings', 'setsail-tours' )
				),
				array(
					'type'       => 'dropdown',
					'param_name' => 'title_tag',
					'heading'    => esc_html__( 'Title Tag', 'setsail-tours' ),
					'value'      => array_flip( setsail_select_get_title_tag( true ) ),
				),
				array(
					'type'        => 'dropdown',
					'param_name'  => 'orderby',
					'heading'     => esc_html__( 'Order By', 'setsail-tours' ),
					'value'       => array(
						esc_html__( 'Menu Order', 'setsail-tours' ) => 'menu_order',
						esc_html__( 'Title', 'setsail-tours' )      => 'title',
						esc_html__( 'Date', 'setsail-tours' )       => 'date'
					),
					'save_always' => true,
					'group'       => esc_html__( 'Query Options', 'setsail-tours' )
				),
				array(
					'type'        => 'dropdown',
					'param_name'  => 'order',
					'heading'     => esc_html__('Order', 'setsail-tours'),
					'value'       => array(
						esc_html__('ASC', 'setsail-tours')  => 'ASC',
						esc_html__('DESC', 'setsail-tours') => 'DESC',
					),
					'save_always' => true,
					'group'       => esc_html__('Query Options', 'setsail-tours')
				),
				array(
					'type'        => 'textfield',
					'param_name'  => 'selected_destinations',
					'heading'     => esc_html__('Show Only Destinations with Listed IDs', 'setsail-tours'),
					'description' => esc_html__('Delimit ID numbers by comma (leave empty for all)', 'setsail-tours'),
					'group'       => esc_html__('Query Options', 'setsail-tours')
				),
				array(
					'type'        => 'dropdown',
					'param_name'  => 'enable_loop',
					'heading'     => esc_html__( 'Enable Slider Loop', 'setsail-tours' ),
					'value'       => array_flip( setsail_select_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'group'       => esc_html__( 'Slider Settings', 'setsail-tours' )
				),
				array(
					'type'        => 'dropdown',
					'param_name'  => 'enable_autoplay',
					'heading'     => esc_html__( 'Enable Slider Autoplay', 'setsail-tours' ),
					'value'       => array_flip( setsail_select_get_yes_no_select_array( false, true ) ),
					'save_always' => true,
					'group'       => esc_html__( 'Slider Settings', 'setsail-tours' )
				),
				array(
					'type'        => 'textfield',
					'param_name'  => 'slider_speed',
					'heading'     => esc_html__( 'Slide Duration', 'setsail-tours' ),
					'description' => esc_html__( 'Default value is 5000 (ms)', 'setsail-tours' ),
					'group'       => esc_html__( 'Slider Settings', 'setsail-tours' )
				),
				array(
					'type'        => 'textfield',
					'param_name'  => 'slider_speed_animation',
					'heading'     => esc_html__( 'Slide Animation Duration', 'setsail-tours' ),
					'description' => esc_html__( 'Speed of slide animation in milliseconds. Default value is 600.', 'setsail-tours' ),
					'group'       => esc_html__( 'Slider Settings', 'setsail-tours' )
				),
				array(
					'type'        => 'dropdown',
					'param_name'  => 'enable_navigation',
					'heading'     => esc_html__( 'Enable Slider Navigation', 'setsail-tours' ),
					'value'       => array_flip( setsail_select_get_yes_no_select_array( false, false ) ),
					'group'       => esc_html__( 'Slider Settings', 'setsail-tours' )
				),
				array(
					'type'       => 'dropdown',
					'param_name' => 'navigation_skin',
					'heading'    => esc_html__( 'Navigation Skin', 'setsail-tours' ),
					'value'      => array(
						esc_html__( 'Default', 'setsail-tours' ) => '',
						esc_html__( 'Light', 'setsail-tours' )   => 'light'
					),
					'dependency' => array( 'element' => 'enable_navigation', 'value' => array( 'yes' ) ),
					'group'      => esc_html__( 'Slider Settings', 'setsail-tours' )
				)
			)
		));
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'number_of_items'         => '-1',
			'number_of_visible_items' => '',
			'space_between_items'     => 'normal',
			'image_size'              => 'full',
			'custom_image_dimensions' => '',
			'title_tag'               => 'h2',
			'orderby'                 => 'date',
			'order'                   => 'DESC',
			'selected_destinations'   => '',
			'enable_loop'             => 'no',
			'enable_autoplay'         => 'yes',
			'slider_speed'            => '5000',
			'slider_speed_animation'  => '600',
			'enable_navigation'       => 'no',
			'navigation_skin'         => ''
		);
		
		$params = shortcode_atts( $args, $atts );
		
		$query = $this->buildQueryObject( $params );
		
		$params['query']  = $query;
		$params['caller'] = $this;
		
		$params['holder_classes']         = $this->sliderClasses( $params, $args );
		$params['slider_data'] = $this->sliderData( $params, $args );
		
		return setsail_tours_get_tour_module_template_part( 'destinations-slider-full-screen/templates/destinations-slider-full-screen-template', 'destinations', 'shortcodes', '', $params );
	}
	
	private function buildQueryObject( $params ) {
		$queryArray['post_status'] = 'publish';
		$queryArray['post_type']   = 'destinations';
		
		if ( ! empty( $params['orderby'] ) ) {
			$queryArray['orderby'] = $params['orderby'];
		}
		
		if ( ! empty( $params['order'] ) ) {
			$queryArray['order'] = $params['order'];
		}
		
		if ( ! empty( $params['number_of_items'] ) ) {
			$queryArray['posts_per_page'] = $params['number_of_items'];
		}
		
		$toursIds = null;
		if ( ! empty( $params['selected_destinations'] ) ) {
			$toursIds               = explode( ',', $params['selected_destinations'] );
			$queryArray['post__in'] = $toursIds;
		}
		
		return new \WP_Query( $queryArray );
	}
	
	private function sliderClasses( $params, $args ) {
		$holderClasses = array();
		
		$holderClasses[] = 'qodef-grid-list qodef-disable-bottom-space';
		$holderClasses[] = ! empty( $params['space_between_items'] ) ? 'qodef-' . $params['space_between_items'] . '-space' : 'qodef-' . $args['space_between_items'] . '-space';
		
		return implode( ' ', $holderClasses );
	}
	
	public function SliderData( $params, $args ) {
		$slider_data = array();
		
		$slider_data['data-number-of-items']        = $params['number_of_visible_items'] !== '' ? $params['number_of_visible_items'] : '4';
		$slider_data['data-enable-loop']            = ! empty( $params['enable_loop'] ) ? $params['enable_loop'] : $args['enable_loop'];
		$slider_data['data-enable-autoplay']        = ! empty( $params['enable_autoplay'] ) ? $params['enable_autoplay'] : $args['enable_autoplay'];
		$slider_data['data-slider-speed']           = ! empty( $params['slider_speed'] ) ? $params['slider_speed'] : $args['slider_speed'];
		$slider_data['data-slider-speed-animation'] = ! empty( $params['slider_speed_animation'] ) ? $params['slider_speed_animation'] : $args['slider_speed_animation'];
		$slider_data['data-slider-animate-in']      = 'fadeIn';
		$slider_data['data-slider-animate-out']     = 'fadeOut';
		$slider_data['data-enable-navigation']      = ! empty( $params['enable_navigation'] ) ? $params['enable_navigation'] : $args['enable_navigation'];
		
		return $slider_data;
	}
}