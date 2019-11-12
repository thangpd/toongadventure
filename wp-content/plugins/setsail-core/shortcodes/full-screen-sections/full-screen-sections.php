<?php
namespace SetSailCore\CPT\Shortcodes\FullScreenSections;

use SetSailCore\Lib;

class FullScreenSections implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'qodef_full_screen_sections';
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'      => esc_html__( 'Full Screen Sections', 'setsail-core' ),
					'base'      => $this->base,
					'icon'      => 'icon-wpb-full-screen-sections extended-custom-icon',
					'category'  => esc_html__( 'by SETSAIL', 'setsail-core' ),
					'as_parent' => array( 'only' => 'qodef_full_screen_sections_item' ),
					'js_view'   => 'VcColumnView',
					'params'    => array(
						array(
							'type'        => 'dropdown',
							'param_name'  => 'enable_continuous_vertical',
							'heading'     => esc_html__( 'Enable Continuous Scrolling', 'setsail-core' ),
							'description' => esc_html__( 'Defines whether scrolling down in the last section or should scroll down to the first one and if scrolling up in the first section should scroll up to the last one', 'setsail-core' ),
							'value'       => array_flip( setsail_select_get_yes_no_select_array( false ) ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'enable_navigation',
							'heading'     => esc_html__( 'Enable Navigation Arrows', 'setsail-core' ),
							'value'       => array_flip( setsail_select_get_yes_no_select_array( false, true ) ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'enable_pagination',
							'heading'     => esc_html__( 'Enable Pagination Dots', 'setsail-core' ),
							'value'       => array_flip( setsail_select_get_yes_no_select_array( false, true ) ),
							'save_always' => true
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'enable_continuous_vertical' => 'no',
			'enable_navigation'          => 'yes',
			'enable_pagination'          => 'yes'
		);
		$params = shortcode_atts( $args, $atts );
		
		$params['holder_classes'] = $this->getHolderClasses( $params );
		$params['holder_data']    = $this->getHolderData( $params );
		$params['content']        = $content;
		
		$html = setsail_core_get_shortcode_module_template_part( 'templates/full-screen-sections', 'full-screen-sections', '', $params );
		
		return $html;
	}
	
	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = $params['enable_navigation'] === 'yes' ? 'qodef-fss-has-nav' : '';
		
		return implode( ' ', $holderClasses );
	}
	
	private function getHolderData( $params ) {
		$data = array();
		
		if ( ! empty( $params['enable_continuous_vertical'] ) ) {
			$data['data-enable-continuous-vertical'] = $params['enable_continuous_vertical'];
		}
		
		if ( ! empty( $params['enable_navigation'] ) ) {
			$data['data-enable-navigation'] = $params['enable_navigation'];
		}
		
		if ( ! empty( $params['enable_pagination'] ) ) {
			$data['data-enable-pagination'] = $params['enable_pagination'];
		}
		
		return $data;
	}
}
