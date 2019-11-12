<?php
namespace SetSailCore\CPT\Shortcodes\SectionTitle;

use SetSailCore\Lib;

class SectionTitle implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'qodef_section_title';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Section Title', 'setsail-core' ),
					'base'                      => $this->base,
					'category'                  => esc_html__( 'by SETSAIL', 'setsail-core' ),
					'icon'                      => 'icon-wpb-section-title extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'        => 'textfield',
							'param_name'  => 'custom_class',
							'heading'     => esc_html__( 'Custom CSS Class', 'setsail-core' ),
							'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'setsail-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'position',
							'heading'     => esc_html__( 'Horizontal Position', 'setsail-core' ),
							'value'       => array(
								esc_html__( 'Default', 'setsail-core' ) => '',
								esc_html__( 'Left', 'setsail-core' )    => 'left',
								esc_html__( 'Center', 'setsail-core' )  => 'center',
								esc_html__( 'Right', 'setsail-core' )   => 'right'
							),
							'save_always' => true
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'holder_padding',
							'heading'    => esc_html__( 'Holder Side Padding (px or %)', 'setsail-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'title',
							'heading'     => esc_html__( 'Title', 'setsail-core' ),
							'admin_label' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'title_tag',
							'heading'     => esc_html__( 'Title Tag', 'setsail-core' ),
							'value'       => array_flip( setsail_select_get_title_tag( true ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'title', 'not_empty' => true ),
							'group'       => esc_html__( 'Title Style', 'setsail-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'title_color',
							'heading'    => esc_html__( 'Title Color', 'setsail-core' ),
							'dependency' => array( 'element' => 'title', 'not_empty' => true ),
							'group'      => esc_html__( 'Title Style', 'setsail-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'tagline',
							'heading'    => esc_html__( 'Tagline', 'setsail-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'tagline_tag',
							'heading'     => esc_html__( 'Tagline Tag', 'setsail-core' ),
							'value'       => array_flip( setsail_select_get_title_tag( true, array( 'p' => 'p', 'span' => esc_html__( 'Custom Heading', 'setsail-core' ) ) ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'tagline', 'not_empty' => true ),
							'group'       => esc_html__( 'Tagline Style', 'setsail-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'tagline_color',
							'heading'    => esc_html__( 'Tagline Color', 'setsail-core' ),
							'dependency' => array( 'element' => 'tagline', 'not_empty' => true ),
							'group'      => esc_html__( 'Tagline Style', 'setsail-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'tagline_margin',
							'heading'    => esc_html__( 'Tagline Bottom Margin (px)', 'setsail-core' ),
							'dependency' => array( 'element' => 'tagline', 'not_empty' => true ),
							'group'      => esc_html__( 'Tagline Style', 'setsail-core' )
						),
						array(
							'type'       => 'textarea',
							'param_name' => 'text',
							'heading'    => esc_html__( 'Text', 'setsail-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'text_tag',
							'heading'     => esc_html__( 'Text Tag', 'setsail-core' ),
							'value'       => array_flip( setsail_select_get_title_tag( true, array( 'p' => 'p' ) ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'text', 'not_empty' => true ),
							'group'       => esc_html__( 'Text Style', 'setsail-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'text_color',
							'heading'    => esc_html__( 'Text Color', 'setsail-core' ),
							'dependency' => array( 'element' => 'text', 'not_empty' => true ),
							'group'      => esc_html__( 'Text Style', 'setsail-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'text_font_size',
							'heading'    => esc_html__( 'Text Font Size (px)', 'setsail-core' ),
							'dependency' => array( 'element' => 'text', 'not_empty' => true ),
							'group'      => esc_html__( 'Text Style', 'setsail-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'text_line_height',
							'heading'    => esc_html__( 'Text Line Height (px)', 'setsail-core' ),
							'dependency' => array( 'element' => 'text', 'not_empty' => true ),
							'group'      => esc_html__( 'Text Style', 'setsail-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'text_font_weight',
							'heading'     => esc_html__( 'Text Font Weight', 'setsail-core' ),
							'value'       => array_flip( setsail_select_get_font_weight_array( true ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'text', 'not_empty' => true ),
							'group'       => esc_html__( 'Text Style', 'setsail-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'text_margin',
							'heading'    => esc_html__( 'Text Top Margin (px)', 'setsail-core' ),
							'dependency' => array( 'element' => 'text', 'not_empty' => true ),
							'group'      => esc_html__( 'Text Style', 'setsail-core' )
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'custom_class'     => '',
			'position'         => '',
			'holder_padding'   => '',
			'title'            => '',
			'title_tag'        => 'h1',
			'title_color'      => '',
			'tagline'          => '',
			'tagline_tag'      => 'span',
			'tagline_color'    => '',
			'tagline_margin'   => '',
			'text'             => '',
			'text_tag'         => 'p',
			'text_color'       => '',
			'text_font_size'   => '',
			'text_line_height' => '',
			'text_font_weight' => '',
			'text_margin'      => ''
		);
		$params = shortcode_atts( $args, $atts );
		
		$params['holder_classes'] = $this->getHolderClasses( $params, $args );
		$params['holder_styles']  = $this->getHolderStyles( $params );
		$params['title_tag']      = ! empty( $params['title_tag'] ) ? $params['title_tag'] : $args['title_tag'];
		$params['title_styles']   = $this->getTitleStyles( $params );
		$params['tagline_tag']    = ! empty( $params['tagline_tag'] ) ? $params['tagline_tag'] : $args['tagline_tag'];
		$params['tagline_styles'] = $this->getTaglineStyles( $params );
		$params['text_tag']       = ! empty( $params['text_tag'] ) ? $params['text_tag'] : $args['text_tag'];
		$params['text_styles']    = $this->getTextStyles( $params );
		
		$html = setsail_core_get_shortcode_module_template_part( 'templates/section-title', 'section-title', '', $params );
		
		return $html;
	}
	
	private function getHolderClasses( $params, $args ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		
		return implode( ' ', $holderClasses );
	}
	
	private function getHolderStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['holder_padding'] ) ) {
			$styles[] = 'padding: 0 ' . $params['holder_padding'];
		}
		
		if ( ! empty( $params['position'] ) ) {
			$styles[] = 'text-align: ' . $params['position'];
		}
		
		return implode( ';', $styles );
	}
	
	private function getTitleStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['title_color'] ) ) {
			$styles[] = 'color: ' . $params['title_color'];
		}
		
		return implode( ';', $styles );
	}
	
	private function getTaglineStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['tagline_color'] ) ) {
			$styles[] = 'color: ' . $params['tagline_color'];
		}
		
		if ( $params['tagline_margin'] !== '' ) {
			$styles[] = 'margin-bottom: ' . setsail_select_filter_px( $params['tagline_margin'] ) . 'px';
		}
		
		return implode( ';', $styles );
	}
	
	private function getTextStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['text_color'] ) ) {
			$styles[] = 'color: ' . $params['text_color'];
		}
		
		if ( ! empty( $params['text_font_size'] ) ) {
			$styles[] = 'font-size: ' . setsail_select_filter_px( $params['text_font_size'] ) . 'px';
		}
		
		if ( ! empty( $params['text_line_height'] ) ) {
			$styles[] = 'line-height: ' . setsail_select_filter_px( $params['text_line_height'] ) . 'px';
		}
		
		if ( ! empty( $params['text_font_weight'] ) ) {
			$styles[] = 'font-weight: ' . $params['text_font_weight'];
		}
		
		if ( $params['text_margin'] !== '' ) {
			$styles[] = 'margin-top: ' . setsail_select_filter_px( $params['text_margin'] ) . 'px';
		}
		
		return implode( ';', $styles );
	}
}