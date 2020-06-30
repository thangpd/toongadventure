<?php

namespace SetSailCore\CPT\Shortcodes\Hivegallery;

use SetSailCore\Lib;

class Hivegallery implements Lib\ShortcodeInterface {
	private $base;

	function __construct() {
		$this->base = 'qodef_hivegallery';
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'     => esc_html__( 'Hivegallery', 'setsail-core' ),
					'base'     => $this->base,
					'category' => esc_html__( 'by SETSAIL', 'setsail-core' ),
					'icon'     => 'icon-wpb-hivegallery extended-custom-icon',
					'params'   => array(
						array(
							'type'       => 'param_group',
							'value'      => '',
							'param_name' => 'image_list',
							// Note params is mapped inside param-group:
							'params'     => array(
								array(
									'type'       => 'attach_image',
									'value'      => '',
									'heading'    => 'Choose your image',
									'param_name' => 'image',
								),
								array(
									'type'       => 'textfield',
									'value'      => '',
									'heading'    => 'Type your text herer.',
									'param_name' => 'text',
								),
								array(
									'type'       => 'textfield',
									'value'      => '',
									'heading'    => 'Image size (percentage %)',
									'param_name' => 'image_size',
								),
							)
						),
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
		wp_enqueue_script( 'hivegallery_js' );
		wp_enqueue_style( 'hivegallery_css' );
	}

	public function render( $atts, $content = null ) {
		$this->enqueue_scripts();
		$default_atts = array(
			'custom_class' => '',
			'image_list'   => [],
//            'style' => 'hivegallery',
//            'layout' => 'boxed',
//            'background_skin' => ''
		);
		$params       = shortcode_atts( $default_atts, $atts );

		$params['holder_classes'] = $this->getHolderClasses( $params );
		$params['content']        = $content;

		$output = setsail_core_get_shortcode_module_template_part( 'templates/hivegallery-holder-template', 'hivegallery', '', $params );

		return $output;
	}

	private function getHolderClasses( $params ) {
		$holder_classes = array( 'qodef-ac-default' );

		$holder_classes[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holder_classes[] = ! empty( $params['style'] ) && $params['style'] == 'toggle' ? 'qodef-toggle' : 'qodef-hivegallery';
		$holder_classes[] = ! empty( $params['layout'] ) ? 'qodef-ac-' . esc_attr( $params['layout'] ) : '';
		$holder_classes[] = ! empty( $params['background_skin'] ) ? 'qodef-' . esc_attr( $params['background_skin'] ) . '-skin' : '';

		return implode( ' ', $holder_classes );
	}
}
