<?php

namespace SetSailCore\CPT\Shortcodes\Customheader;

use SetSailCore\Lib;

class Customheader implements Lib\ShortcodeInterface {
	private $base;

	function __construct() {
		$this->base = 'qodef_customheader';
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'     => esc_html__( 'Toong Header', 'setsail-core' ),
					'base'     => $this->base,
					'category' => esc_html__( 'by SETSAIL', 'setsail-core' ),
					'icon'     => 'icon-wpb-customheader extended-custom-icon',
					'params'   => array(

						array(
							'type'        => 'textfield',
							'param_name'  => 'text',
							'heading'     => esc_html__( 'Text', 'setsail-core' ),
							'description' => esc_html__( '', 'setsail-core' ),
						),

						array(
							'type'       => 'dropdown',
							'param_name' => 'tag',
							'heading'    => esc_html__( 'Tag', 'setsail-core' ),
							'value'      => array(
								esc_html__( 'h2', 'setsail-core' ) => 'h2',
								esc_html__( 'h1', 'setsail-core' ) => 'h1',
								esc_html__( 'h3', 'setsail-core' ) => 'h3',
								esc_html__( 'h4', 'setsail-core' ) => 'h4',
								esc_html__( 'h5', 'setsail-core' ) => 'h5',
								esc_html__( 'h6', 'setsail-core' ) => 'h6',
							)
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'text_align',
							'heading'    => esc_html__( 'Text Align', 'setsail-core' ),
							'value'      => array(
								esc_html__( 'left', 'setsail-core' )   => 'left',
								esc_html__( 'center', 'setsail-core' ) => 'center',
								esc_html__( 'right', 'setsail-core' )  => 'right',
							)
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'font_size',
							'heading'     => esc_html__( 'Font Size', 'setsail-core' ),
							'description' => esc_html__( 'Font size', 'setsail-core' ),
							'value'       => '',
						),

						/*array(
							'type'        => 'textfield',
							'param_name'  => 'bg-size',
							'heading'     => esc_html__( 'Background Size', 'setsail-core' ),
							'description' => esc_html__( 'Width-Height', 'setsail-core' ),
							'value'       => '500px 60px',

						),*/
						array(
							'type'        => 'textfield',
							'param_name'  => 'custom_class',
							'heading'     => esc_html__( 'Custom CSS Class', 'setsail-core' ),
							'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'setsail-core' )
						),

					)
				)
			);
		}
	}

	public function enqueue_scripts() {
		wp_enqueue_script( 'customheader_js' );
		wp_enqueue_style( 'customheader_css' );
	}

	public function render( $atts, $content = null ) {
		$this->enqueue_scripts();
		$default_atts = array(
			'custom_class' => '',
			'bg-size'      => '500px 60px',
			'padding'      => '12px 111px 12px 111px',
			'text'         => '',
			'tag'          => 'h2',
			'text_align'   => 'left',
			'font-size'    => '37px',
//            'style' => 'customheader',
//            'layout' => 'boxed',
//            'background_skin' => ''
		);
		$params       = shortcode_atts( $default_atts, $atts );

		$params['holder_classes'] = $this->getHolderClasses( $params );
		$params['content']        = $content;

		$output = setsail_core_get_shortcode_module_template_part( 'templates/customheader-holder-template', 'customheader', '', $params );

		return $output;
	}

	private function getHolderClasses( $params ) {
		$holder_classes = array( 'qodef-ac-default' );

		$holder_classes[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holder_classes[] = ! empty( $params['style'] ) && $params['style'] == 'toggle' ? 'qodef-toggle' : 'qodef-customheader';
		$holder_classes[] = ! empty( $params['layout'] ) ? 'qodef-ac-' . esc_attr( $params['layout'] ) : '';
		$holder_classes[] = ! empty( $params['background_skin'] ) ? 'qodef-' . esc_attr( $params['background_skin'] ) . '-skin' : '';

		return implode( ' ', $holder_classes );
	}
}
