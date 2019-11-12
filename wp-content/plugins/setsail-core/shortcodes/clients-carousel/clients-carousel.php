<?php
namespace SetSailCore\CPT\Shortcodes\ClientsCarousel;

use SetSailCore\Lib;

class ClientsCarousel implements Lib\ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'qodef_clients_carousel';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'            => esc_html__( 'Clients Carousel', 'setsail-core' ),
					'base'            => $this->getBase(),
					'category'        => esc_html__( 'by SETSAIL', 'setsail-core' ),
					'icon'            => 'icon-wpb-clients-carousel extended-custom-icon',
					'as_parent'       => array( 'only' => 'qodef_clients_carousel_item' ),
					'content_element' => true,
					'js_view'         => 'VcColumnView',
					'params'          => array(
						array(
							'type'        => 'dropdown',
							'param_name'  => 'skin',
							'heading'     => esc_html__( 'Skin', 'setsail-core' ),
							'value'       => array(
								esc_html__( 'Default', 'setsail-core' ) => '',
								esc_html__( 'Light', 'setsail-core' )   => 'light',
							),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'number_of_visible_items',
							'heading'     => esc_html__( 'Number Of Visible Items', 'setsail-core' ),
							'value'       => array(
								esc_html__( 'One', 'setsail-core' )   => '2',
								esc_html__( 'Two', 'setsail-core' )   => '3',
								esc_html__( 'Three', 'setsail-core' ) => '4',
								esc_html__( 'Four', 'setsail-core' )  => '5',
								esc_html__( 'Five', 'setsail-core' )  => '6',
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
								esc_html__( 'Huge - 160', 'setsail-core' )   => '160'
							),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'enable_post_stamp_frame',
							'heading'     => esc_html__( 'Enable Item Frame', 'setsail-core' ),
							'value'       => array_flip( setsail_select_get_yes_no_select_array( false, true ) ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'slider_loop',
							'heading'     => esc_html__( 'Enable Slider Loop', 'setsail-core' ),
							'value'       => array_flip( setsail_select_get_yes_no_select_array( false, true ) ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'slider_autoplay',
							'heading'     => esc_html__( 'Enable Slider Autoplay', 'setsail-core' ),
							'value'       => array_flip( setsail_select_get_yes_no_select_array( false, true ) ),
							'save_always' => true
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'slider_speed',
							'heading'     => esc_html__( 'Slide Duration', 'setsail-core' ),
							'description' => esc_html__( 'Default value is 5000 (ms)', 'setsail-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'slider_speed_animation',
							'heading'     => esc_html__( 'Slide Animation Duration', 'setsail-core' ),
							'description' => esc_html__( 'Speed of slide animation in milliseconds. Default value is 600.', 'setsail-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'slider_navigation',
							'heading'     => esc_html__( 'Enable Slider Navigation Arrows', 'setsail-core' ),
							'value'       => array_flip( setsail_select_get_yes_no_select_array( false ) ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'slider_pagination',
							'heading'     => esc_html__( 'Enable Slider Pagination', 'setsail-core' ),
							'value'       => array_flip( setsail_select_get_yes_no_select_array( false ) ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'items_hover_animation',
							'heading'     => esc_html__( 'Items Hover Animation', 'setsail-core' ),
							'value'       => array(
								esc_html__( 'Switch Images', 'setsail-core' ) => 'switch-images',
								esc_html__( 'Roll Over', 'setsail-core' )     => 'roll-over',
								esc_html__( 'Info On Hover', 'setsail-core' ) => 'hover-info'
							),
							'save_always' => true
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args = array(
			'skin'                    => '',
			'number_of_visible_items' => '4',
			'space_between_items'     => 'normal',
			'slider_loop'             => 'yes',
			'slider_autoplay'         => 'yes',
			'slider_speed'            => '5000',
			'slider_speed_animation'  => '600',
			'slider_navigation'       => 'no',
			'slider_pagination'       => 'no',
			'items_hover_animation'   => 'hover-info',
			'enable_post_stamp_frame' => 'no'
		);
		
		$params = shortcode_atts( $args, $atts );
		
		$params['holder_classes'] = $this->getHolderClasses( $params );
		$params['carousel_data']  = $this->getSliderData( $params );
		$params['content']        = $content;
		
		$html = setsail_core_get_shortcode_module_template_part( 'templates/clients-carousel', 'clients-carousel', '', $params );
		
		return $html;
	}
	
	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['items_hover_animation'] ) ? 'qodef-cc-hover-' . $params['items_hover_animation'] : 'qodef-cc-hover-switch-images';
		$holderClasses[] = $params['enable_post_stamp_frame'] == 'yes' ? 'qodef-cc-post-stamp-frame' : '';
		$holderClasses[] = ! empty( $params['skin'] ) ? 'qodef-cc-' . $params['skin'] : '';
		
		return implode( ' ', $holderClasses );
	}
	
	private function getSliderData( $params ) {
		$slider_data = array();
		
		$slider_data['data-number-of-items']        = ! empty( $params['number_of_visible_items'] ) ? $params['number_of_visible_items'] : '4';
		$slider_data['data-slider-margin']          = ! empty( $params['space_between_items'] ) ? $params['space_between_items'] : '40';
		$slider_data['data-enable-loop']            = ! empty( $params['slider_loop'] ) ? $params['slider_loop'] : '';
		$slider_data['data-enable-autoplay']        = ! empty( $params['slider_autoplay'] ) ? $params['slider_autoplay'] : '';
		$slider_data['data-slider-speed']           = ! empty( $params['slider_speed'] ) ? $params['slider_speed'] : '5000';
		$slider_data['data-slider-speed-animation'] = ! empty( $params['slider_speed_animation'] ) ? $params['slider_speed_animation'] : '600';
		$slider_data['data-enable-navigation']      = ! empty( $params['slider_navigation'] ) ? $params['slider_navigation'] : '';
		$slider_data['data-enable-pagination']      = ! empty( $params['slider_pagination'] ) ? $params['slider_pagination'] : '';
		$slider_data['data-enable-center']      	= 'yes';
		
		return $slider_data;
	}
}