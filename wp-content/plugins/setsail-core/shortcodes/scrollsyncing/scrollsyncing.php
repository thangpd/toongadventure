<?php

namespace SetSailCore\CPT\Shortcodes\Scrollsyncing;

use SetSailCore\Lib;

class Scrollsyncing implements Lib\ShortcodeInterface {
	private $base;

	function __construct() {
		$this->base = 'qodef_scrollsyncing';
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'            => esc_html__( 'Scrollsyncing', 'setsail-core' ),
					'base'            => $this->base,
					'content_element' => true,
					'category'        => esc_html__( 'by SETSAIL', 'setsail-core' ),
					'icon'            => 'icon-wpb-scrollsyncing extended-custom-icon',
					'params'          => array(

						array(
							'type'        => 'textfield',
							'param_name'  => 'main_header',
							'heading'     => esc_html__( 'Xuất Phát', 'setsail-core' ),
							'description' => esc_html__( '', 'setsail-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'sub_header',
							'heading'     => esc_html__( 'Tiêu đề thông tin chung', 'setsail-core' ),
							'description' => esc_html__( '', 'setsail-core' )
						),
						array(
							'type'        => 'textarea_html',
							'param_name'  => 'header_textfield',
							'heading'     => esc_html__( 'Nội dung thông tin chung', 'setsail-core' ),
							'description' => esc_html__( '', 'setsail-core' )
						),
						array(
							'type'       => 'param_group',
							'value'      => '',
							'param_name' => 'day_list',
							'heading'    => 'List ngày',
							// Note params is mapped inside param-group:
							'params'     => array(
								array(
									'type'       => 'textfield',
									'param_name' => 'diadiem',
									'heading'    => 'Địa điểm',
									'value'      => '',
								),
								array(
									'type'       => 'textfield',
									'value'      => '',
									'heading'    => 'Type your title here.',
									'param_name' => 'title',
								),
								array(
									'type'       => 'param_group',
									'value'      => '',
									'heading'    => 'List detail.',
									'param_name' => 'detail_list',
									'params'     => array(
										array(
											'type'       => 'textfield',
											'value'      => '',
											'heading'    => 'Chi tiết trong ngày',
											'param_name' => 'detail',
										),
									)
								),
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
									esc_html__( 'Scrollsyncing', 'setsail-core' ) => 'scrollsyncing',
									esc_html__( 'Toggle', 'setsail-core' )        => 'toggle'
								)
							),
						)

					)
				)
			);
		}
	}

	public function enqueue_scripts() {
		wp_enqueue_script( 'scrollsyncing_js' );
		wp_enqueue_style( 'scrollsyncing_css' );
	}

	public function render( $atts, $content = null ) {
		$this->enqueue_scripts();
		$default_atts = array(
			'main_header'      => '',
			'sub_header'       => '',
			'header_textfield' => '',
			'day_list'         => '',
			'custom_class'     => '',
			'style'            => 'scrollsyncing',

		);
		$params       = shortcode_atts( $default_atts, $atts );

		$params['holder_classes'] = $this->getHolderClasses( $params );
		$params['content']        = $content;

		$output = setsail_core_get_shortcode_module_template_part( 'templates/scrollsyncing-holder-template', 'scrollsyncing', '', $params );

		return $output;
	}

	private function getHolderClasses( $params ) {
		$holder_classes = array( 'qodef-ac-default' );

		$holder_classes[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holder_classes[] = $params['style'] == 'toggle' ? 'qodef-toggle' : 'qodef-scrollsyncing';
		$holder_classes[] = ! empty( $params['layout'] ) ? 'qodef-ac-' . esc_attr( $params['layout'] ) : '';
		$holder_classes[] = ! empty( $params['background_skin'] ) ? 'qodef-' . esc_attr( $params['background_skin'] ) . '-skin' : '';

		return implode( ' ', $holder_classes );
	}
}
