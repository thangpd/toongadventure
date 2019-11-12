<?php
namespace SetSailCore\CPT\Shortcodes\ClientsGrid;

use SetSailCore\Lib;

class ClientsGrid implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'qodef_clients_grid';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')) {
			vc_map(
				array(
					'name'      => esc_html__( 'Clients Grid', 'setsail-core' ),
					'base'      => $this->base,
					'icon'      => 'icon-wpb-clients-grid extended-custom-icon',
					'category'  => esc_html__( 'by SETSAIL', 'setsail-core' ),
					'as_parent' => array( 'only' => 'qodef_clients_carousel_item' ),
					'js_view'   => 'VcColumnView',
					'params'    => array(
						array(
							'type'        => 'dropdown',
							'param_name'  => 'number_of_columns',
							'heading'     => esc_html__( 'Number of Columns', 'setsail-core' ),
							'value'       => array_flip( setsail_select_get_number_of_columns_array( true ) ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'space_between_items',
							'heading'     => esc_html__( 'Space Between Items', 'setsail-core' ),
							'value'       => array_flip( setsail_select_get_space_between_items_array() ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'image_alignment',
							'heading'     => esc_html__( 'Items Horizontal Alignment', 'setsail-core' ),
							'value'       => array(
								esc_html__( 'Default Center', 'setsail-core' ) => '',
								esc_html__( 'Left', 'setsail-core' )           => 'left',
								esc_html__( 'Right', 'setsail-core' )          => 'right'
							),
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
		$args   = array(
			'number_of_columns'     => 'three',
			'space_between_items'   => 'normal',
			'image_alignment'       => '',
			'items_hover_animation' => 'switch-images'
		);
		$params = shortcode_atts( $args, $atts );
		
		$params['holder_classes'] = $this->getHolderClasses( $params, $args );
		$params['content']        = $content;
		
		$html = setsail_core_get_shortcode_module_template_part( 'templates/clients-grid', 'clients-grid', '', $params );
		
		return $html;
	}

	private function getHolderClasses( $params, $args ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['number_of_columns'] ) ? 'qodef-' . $params['number_of_columns'] . '-columns' : 'qodef-' . $args['number_of_columns'] . '-columns';
		$holderClasses[] = ! empty( $params['space_between_items'] ) ? 'qodef-' . $params['space_between_items'] . '-space' : 'qodef-' . $args['space_between_items'] . '-space';
		$holderClasses[] = ! empty( $params['image_alignment'] ) ? 'qodef-cg-alignment-' . $params['image_alignment'] : '';
		$holderClasses[] = ! empty( $params['items_hover_animation'] ) ? 'qodef-cc-hover-' . $params['items_hover_animation'] : 'qodef-cc-hover-' . $args['items_hover_animation'];
		
		return implode( ' ', $holderClasses );
	}
}
