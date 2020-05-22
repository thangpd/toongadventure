<?php

namespace SetSailCore\CPT\Shortcodes\ShortcodeTeam;

use SetSailCore\Lib;

class ShortcodeTeam implements Lib\ShortcodeInterface {
	private $base;

	function __construct() {
		$this->base = 'qodef_shortcode_team';
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'     => esc_html__( 'Shortcode Team', 'setsail-core' ),
					'base'     => $this->base,
					'category' => esc_html__( 'by SETSAIL', 'setsail-core' ),
					'params'   => array(
						array(
							'type'       => 'dropdown',
							'param_name' => 'style',
							'heading'    => esc_html__( 'Style', 'setsail-core' ),
							'value'      => array(
								esc_html__( 'Style 1', 'setsail-core' ) => 'style-1',
								esc_html__( 'Style 2', 'setsail-core' ) => 'style-2',
								esc_html__( 'Style 3', 'setsail-core' ) => 'style-3',
							),
						),
						array(
							'type'       => 'attach_image',
							'param_name' => 'user_attach_image',
							'heading'    => esc_html__( 'Image', 'setsail-core' ),
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'user_job',
							'heading'    => esc_html__( 'Công việc', 'setsail-core' ),
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'user_name',
							'heading'    => esc_html__( 'Tên người', 'setsail-core' ),
						),
						array(
							'type'       => 'textarea',
							'param_name' => 'user_des',
							'heading'    => esc_html__( 'Giới thiệu', 'setsail-core' ),
						),


					)
				)
			);
		}
	}

	public function enqueue_scripts() {
		wp_enqueue_script( 'shortcode_team_js' );
		wp_enqueue_style( 'shortcode_team_css' );
	}

	public function render( $atts, $content = null ) {
		$this->enqueue_scripts();
		$default_atts = array(
			'user_attach_image' => '',
			'user_job'          => '',
			'user_name'         => '',
			'user_des'          => '',
			'style'             => 'style-1',
		);
		$params       = shortcode_atts( $default_atts, $atts );

		$params['user_attach_image'] = ! empty( $params['user_attach_image'] ) ? $params['user_attach_image'] : '';
		$params['user_job']          = ! empty( $params['user_job'] ) ? $params['user_job'] : '';
		$params['user_name']         = ! empty( $params['user_name'] ) ? $params['user_name'] : '';
		$params['user_des']          = ! empty( $params['user_des'] ) ? $params['user_des'] : '';
		$params['hoder_class']       = $this->getHolderClasses( $params );
		if ( $params['style'] == 'style-1' ) {
			$output = setsail_core_get_shortcode_module_template_part( 'templates/shortcode-team-holder-template', 'shortcode-team', '', $params );
		} else {
			$output = setsail_core_get_shortcode_module_template_part( 'templates/shortcode-team-holder-template-2', 'shortcode-team', '', $params );
		}

		return $output;
	}

	private function getHolderClasses( $params ) {
		$holder_classes = array( 'qodef-ac-default' );

		$holder_classes[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holder_classes[] = $params['style'] == 'toggle' ? 'qodef-toggle' : 'qodef-shortcode_team';
		$holder_classes[] = ! empty( $params['layout'] ) ? 'qodef-ac-' . esc_attr( $params['layout'] ) : '';
		$holder_classes[] = ! empty( $params['background_skin'] ) ? 'qodef-' . esc_attr( $params['background_skin'] ) . '-skin' : '';

		return implode( ' ', $holder_classes );
	}
}
