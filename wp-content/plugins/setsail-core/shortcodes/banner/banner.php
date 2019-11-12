<?php
namespace SetSailCore\CPT\Shortcodes\Banner;

use SetSailCore\Lib;

class Banner implements Lib\ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'qodef_banner';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Banner', 'setsail-core' ),
					'base'                      => $this->getBase(),
					'category'                  => esc_html__( 'by SETSAIL', 'setsail-core' ),
					'icon'                      => 'icon-wpb-banner extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'        => 'textfield',
							'param_name'  => 'custom_class',
							'heading'     => esc_html__( 'Custom CSS Class', 'setsail-core' ),
							'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'setsail-core' )
						),
						array(
							'type'        => 'attach_image',
							'param_name'  => 'image',
							'heading'     => esc_html__( 'Image', 'setsail-core' ),
							'description' => esc_html__( 'Select image from media library', 'setsail-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'overlay_color',
							'heading'    => esc_html__( 'Image Overlay Color', 'setsail-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'hover_behavior',
							'heading'     => esc_html__( 'Hover Behavior', 'setsail-core' ),
							'value'       => array(
								esc_html__( 'Visible on Hover', 'setsail-core' )   => 'qodef-visible-on-hover',
								esc_html__( 'Visible on Default', 'setsail-core' ) => 'qodef-visible-on-default',
								esc_html__( 'Disabled', 'setsail-core' )           => 'qodef-disabled'
							),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'info_position',
							'heading'     => esc_html__( 'Info Position', 'setsail-core' ),
							'value'       => array(
								esc_html__( 'Default', 'setsail-core' )  => 'default',
								esc_html__( 'Centered', 'setsail-core' ) => 'centered',
								esc_html__( 'Right', 'setsail-core' )    => 'right',
								esc_html__( 'Top', 'setsail-core' )      => 'top'
							),
							'save_always' => true
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'adjust_info_position_top',
							'heading'     => esc_html__( 'Adjust Top Info Position', 'setsail-core' ),
							'description' => esc_html__( 'Please insert value for info position top', 'setsail-core' ),
							'dependency'  => array( 'element' => 'info_position', 'value' => array( 'top' ) )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'adjust_info_position_right',
							'heading'     => esc_html__( 'Adjust Right Info Position', 'setsail-core' ),
							'description' => esc_html__( 'Please insert value for info position right', 'setsail-core' ),
							'dependency'  => array( 'element' => 'info_position', 'value' => array( 'right' ) )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'info_content_padding',
							'heading'     => esc_html__( 'Info Content Padding', 'setsail-core' ),
							'description' => esc_html__( 'Please insert padding in format top right bottom left', 'setsail-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'subtitle',
							'heading'    => esc_html__( 'Subtitle', 'setsail-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'subtitle_tag',
							'heading'     => esc_html__( 'Subtitle Tag', 'setsail-core' ),
							'value'       => array_flip( setsail_select_get_title_tag( true, array( 'p' => 'p' ) ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'info_position', 'value' => array( 'default', 'centered' ) )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'subtitle_color',
							'heading'    => esc_html__( 'Subtitle Color', 'setsail-core' ),
							'dependency' => array( 'element' => 'subtitle', 'not_empty' => true )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'title',
							'heading'    => esc_html__( 'Title', 'setsail-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'title_tag',
							'heading'     => esc_html__( 'Title Tag', 'setsail-core' ),
							'value'       => array_flip( setsail_select_get_title_tag( true, array( 'p' => 'p' ) ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'title', 'not_empty' => true )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'title_color',
							'heading'    => esc_html__( 'Title Color', 'setsail-core' ),
							'dependency' => array( 'element' => 'title', 'not_empty' => true )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'title_top_margin',
							'heading'    => esc_html__( 'Title Top Margin (px)', 'setsail-core' ),
							'dependency' => array( 'element' => 'title', 'not_empty' => true )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'link',
							'heading'    => esc_html__( 'Link', 'setsail-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'target',
							'heading'    => esc_html__( 'Target', 'setsail-core' ),
							'value'      => array_flip( setsail_select_get_link_target_array() ),
							'dependency' => array( 'element' => 'link', 'not_empty' => true )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'link_text',
							'heading'    => esc_html__( 'Link Text', 'setsail-core' ),
							'dependency' => array( 'element' => 'link', 'not_empty' => true )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'link_color',
							'heading'    => esc_html__( 'Link Text Color', 'setsail-core' ),
							'dependency' => array( 'element' => 'link', 'not_empty' => true )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'link_top_margin',
							'heading'    => esc_html__( 'Link Text Top Margin (px)', 'setsail-core' ),
							'dependency' => array( 'element' => 'link', 'not_empty' => true )
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'custom_class'                => '',
			'image'                       => '',
			'overlay_color'               => '',
			'hover_behavior'              => 'qodef-visible-on-hover',
			'info_position'               => 'default',
			'adjust_info_position_right'  => '',
			'adjust_info_position_top'    => '',
			'info_content_padding'         => '',
			'subtitle'                    => '',
			'subtitle_tag'                => 'h5',
			'subtitle_color'              => '',
			'title'                       => '',
			'title_tag'                   => 'h2',
			'title_color'                 => '',
			'title_top_margin'            => '',
			'link'                        => '',
			'target'                      => '_self',
			'link_text'                   => '',
			'link_color'                  => '',
			'link_top_margin'             => ''
		);
		$params = shortcode_atts( $args, $atts );
		
		$params['holder_classes']  = $this->getHolderClasses( $params, $args );
		$params['overlay_styles']  = $this->getOverlayStyles( $params );
		$params['subtitle_tag']    = ! empty( $params['subtitle_tag'] ) ? $params['subtitle_tag'] : $args['subtitle_tag'];
		$params['subtitle_styles'] = $this->getSubitleStyles( $params );
		$params['title_tag']       = ! empty( $params['title_tag'] ) ? $params['title_tag'] : $args['title_tag'];
		$params['title_styles']    = $this->getTitleStyles( $params );
		$params['link_styles']     = $this->getLinkStyles( $params );
		
		$html = setsail_core_get_shortcode_module_template_part( 'templates/banner', 'banner', '', $params );
		
		return $html;
	}
	
	private function getHolderClasses( $params, $args ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] = ! empty( $params['hover_behavior'] ) ? $params['hover_behavior'] : $args['hover_behavior'];
		$holderClasses[] = ! empty( $params['info_position'] ) ? 'qodef-banner-info-' . $params['info_position'] : 'qodef-banner-info-' . $args['info_position'];
		
		return implode( ' ', $holderClasses );
	}
	
	private function getOverlayStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['overlay_color'] ) ) {
			$styles[] = 'background-color: ' . $params['overlay_color'];
		}
		
		if ( ! empty( $params['info_content_padding'] ) ) {
			$styles[] = 'padding: ' . $params['info_content_padding'];
		}
		
		if ( ! empty( $params['adjust_info_position_top'] ) ) {
			$styles[] = 'top: ' . $params['adjust_info_position_top'];
		}
		
		if ( ! empty( $params['adjust_info_position_right'] ) ) {
			$styles[] = 'right: ' . $params['adjust_info_position_right'];
		}
		
		return implode( ';', $styles );
	}
	
	private function getSubitleStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['subtitle_color'] ) ) {
			$styles[] = 'color: ' . $params['subtitle_color'];
		}
		
		return implode( ';', $styles );
	}
	
	private function getTitleStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['title_color'] ) ) {
			$styles[] = 'color: ' . $params['title_color'];
		}
		
		if ( ! empty( $params['title_top_margin'] ) ) {
			$styles[] = 'margin-top: ' . setsail_select_filter_px( $params['title_top_margin'] ) . 'px';
		}
		
		return implode( ';', $styles );
	}
	
	private function getLinkStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['link_color'] ) ) {
			$styles[] = 'color: ' . $params['link_color'];
		}
		
		if ( ! empty( $params['link_top_margin'] ) ) {
			$styles[] = 'margin-top: ' . setsail_select_filter_px( $params['link_top_margin'] ) . 'px';
		}
		
		return implode( ';', $styles );
	}
}