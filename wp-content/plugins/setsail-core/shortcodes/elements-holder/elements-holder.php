<?php
namespace SetSailCore\CPT\Shortcodes\ElementsHolder;

use SetSailCore\Lib;

class ElementsHolder implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'qodef_elements_holder';
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'      => esc_html__( 'Elements Holder', 'setsail-core' ),
					'base'      => $this->base,
					'icon'      => 'icon-wpb-elements-holder extended-custom-icon',
					'category'  => esc_html__( 'by SETSAIL', 'setsail-core' ),
					'as_parent' => array( 'only' => 'qodef_elements_holder_item' ),
					'js_view'   => 'VcColumnView',
					'params'    => array(
						array(
							'type'        => 'textfield',
							'param_name'  => 'custom_class',
							'heading'     => esc_html__( 'Custom CSS Class', 'setsail-core' ),
							'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'setsail-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'holder_full_height',
							'heading'     => esc_html__( 'Enable Holder Full Height', 'setsail-core' ),
							'value'       => array_flip( setsail_select_get_yes_no_select_array( false ) ),
							'save_always' => true
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'background_color',
							'heading'    => esc_html__( 'Background Color', 'setsail-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'number_of_columns',
							'heading'     => esc_html__( 'Columns', 'setsail-core' ),
							'value'       => array(
								esc_html__( '1 Column', 'setsail-core' )  => 'one-column',
								esc_html__( '2 Columns', 'setsail-core' ) => 'two-columns',
								esc_html__( '3 Columns', 'setsail-core' ) => 'three-columns',
								esc_html__( '4 Columns', 'setsail-core' ) => 'four-columns',
								esc_html__( '5 Columns', 'setsail-core' ) => 'five-columns',
								esc_html__( '6 Columns', 'setsail-core' ) => 'six-columns'
							),
							'save_always' => true
						),
						array(
							'type'       => 'checkbox',
							'param_name' => 'items_float_left',
							'heading'    => esc_html__( 'Items Float Left', 'setsail-core' ),
							'value'      => array( 'Make Items Float Left?' => 'yes' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'switch_to_one_column',
							'heading'     => esc_html__( 'Switch to One Column', 'setsail-core' ),
							'value'       => array(
								esc_html__( 'Default', 'setsail-core' )      => '',
								esc_html__( 'Below 1366px', 'setsail-core' ) => '1366',
								esc_html__( 'Below 1024px', 'setsail-core' ) => '1024',
								esc_html__( 'Below 768px', 'setsail-core' )  => '768',
								esc_html__( 'Below 680px', 'setsail-core' )  => '680',
								esc_html__( 'Below 480px', 'setsail-core' )  => '480',
								esc_html__( 'Never', 'setsail-core' )        => 'never'
							),
							'description' => esc_html__( 'Choose on which stage item will be in one column', 'setsail-core' ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'alignment_one_column',
							'heading'     => esc_html__( 'Choose Alignment In Responsive Mode', 'setsail-core' ),
							'value'       => array(
								esc_html__( 'Default', 'setsail-core' ) => '',
								esc_html__( 'Left', 'setsail-core' )    => 'left',
								esc_html__( 'Center', 'setsail-core' )  => 'center',
								esc_html__( 'Right', 'setsail-core' )   => 'right'
							),
							'description' => esc_html__( 'Alignment When Items are in One Column', 'setsail-core' ),
							'save_always' => true
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'custom_class'         => '',
			'holder_full_height'   => 'no',
			'background_color'     => '',
			'number_of_columns'    => 'one-column',
			'items_float_left'     => '',
			'switch_to_one_column' => '',
			'alignment_one_column' => ''
		);
		$params = shortcode_atts( $args, $atts );
		
		$holder_classes = $this->getHolderClasses( $params );
		$holder_styles  = $this->getHolderStyles( $params );
		
		$html = '<div ' . setsail_select_get_class_attribute( $holder_classes ) . ' ' . setsail_select_get_inline_attr( $holder_styles, 'style' ) . '>';
			$html .= do_shortcode( $content );
		$html .= '</div>';
		
		return $html;
	}
	
	private function getHolderClasses( $params ) {
		$holderClasses = array( 'qodef-elements-holder' );
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] = $params['holder_full_height'] === 'yes' ? 'qodef-eh-full-height' : '';
		$holderClasses[] = ! empty( $params['number_of_columns'] ) ? 'qodef-' . $params['number_of_columns'] : '';
		$holderClasses[] = $params['items_float_left'] !== '' ? 'qodef-ehi-float' : '';
		$holderClasses[] = ! empty( $params['switch_to_one_column'] ) ? 'qodef-responsive-mode-' . $params['switch_to_one_column'] : 'qodef-responsive-mode-768';
		$holderClasses[] = ! empty( $params['alignment_one_column'] ) ? 'qodef-one-column-alignment-' . $params['alignment_one_column'] : '';
		
		return implode( ' ', $holderClasses );
	}
	
	private function getHolderStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['background_color'] ) ) {
			$styles[] = 'background-color: ' . $params['background_color'];
		}
		
		return implode( ';', $styles );
	}
}
