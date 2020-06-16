<?php

namespace SetSailCore\CPT\Shortcodes\Mansonrygallery;

use SetSailCore\Lib;

class Mansonrygallery implements Lib\ShortcodeInterface {
	private $base;

	function __construct() {
		$this->base = 'qodef_mansonrygallery';
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'     => esc_html__( 'Mansonrygallery', 'setsail-core' ),
					'base'     => $this->base,
					'category' => esc_html__( 'by SETSAIL', 'setsail-core' ),
					'icon'     => 'icon-wpb-mansonrygallery extended-custom-icon',
					'params'   => array(
						array(
							'type'       => 'textfield',
							'param_name' => 'title',
							'heading'    => esc_html__( 'Tiêu đề', 'setsail-core' ),
						),
						array(
							'type'       => 'attach_image',
							'param_name' => 'main_image',
							'heading'    => esc_html__( 'Hình Chính', 'setsail-core' )
						),
						array(
							'type'       => 'attach_image',
							'param_name' => 'sub_image1',
							'heading'    => esc_html__( 'Hình 1', 'setsail-core' )
						),
						array(
							'type'       => 'attach_image',
							'param_name' => 'sub_image2',
							'heading'    => esc_html__( 'Hình 2', 'setsail-core' )
						),
						array(
							'type'       => 'attach_image',
							'param_name' => 'sub_image3',
							'heading'    => esc_html__( 'Hình 3', 'setsail-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'custom_class',
							'heading'     => esc_html__( 'Custom CSS Class', 'setsail-core' ),
							'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'setsail-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'style',
							'heading'    => esc_html__( 'Style', 'setsail-core' ),
							'value'      => array(
								esc_html__( 'Mansonrygallery', 'setsail-core' ) => 'mansonrygallery',
								esc_html__( 'Toggle', 'setsail-core' )          => 'toggle'
							)
						),

					)
				)
			);
		}
	}

	public function enqueue_scripts() {
		wp_enqueue_style( 'mansonrygallery_css' );
	}

	public function render( $atts, $content = null ) {
		$this->enqueue_scripts();

		$default_atts = array(
			'custom_class' => '',
			'title'        => '',
			'style'        => 'mansonrygallery',
			'main_image'   => '',
			'sub_image1'   => '',
			'sub_image2'   => '',
			'sub_image3'   => '',
		);
		$params       = shortcode_atts( $default_atts, $atts );

		$params['holder_classes'] = $this->getHolderClasses( $params );
		$params['content']        = $content;

		$output = setsail_core_get_shortcode_module_template_part( 'templates/mansonrygallery-holder-template', 'mansonrygallery', '', $params );

		return $output;
	}

	private function getHolderClasses( $params ) {
		$holder_classes = array( 'qodef-ac-default' );

		$holder_classes[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holder_classes[] = $params['style'] == 'toggle' ? 'qodef-toggle' : 'qodef-mansonrygallery';
		$holder_classes[] = ! empty( $params['layout'] ) ? 'qodef-ac-' . esc_attr( $params['layout'] ) : '';
		$holder_classes[] = ! empty( $params['background_skin'] ) ? 'qodef-' . esc_attr( $params['background_skin'] ) . '-skin' : '';

		return implode( ' ', $holder_classes );
	}
}
