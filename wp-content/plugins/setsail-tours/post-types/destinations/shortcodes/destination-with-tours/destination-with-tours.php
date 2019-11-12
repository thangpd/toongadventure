<?php
namespace SetSailTours\CPT\Destination\Shortcodes;

use SetSailTours\Lib\ShortcodeInterface;

class DestinationWithTours implements ShortcodeInterface {
	private $base;
	
	/**
	 * DestinationWithTours constructor.
	 */
	public function __construct() {
		$this->base = 'qodef_destination_with_tours';
		
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map( array(
			'name'     => esc_html__( 'Destination With Tours', 'setsail-tours' ),
			'base'     => $this->base,
			'category' => esc_html__( 'by SETSAIL TOURS', 'setsail-tours' ),
			'icon'     => 'icon-wpb-destinations-with-tours extended-custom-tours-icon',
			'params'   => array(
				array(
					'type'        => 'textfield',
					'param_name'  => 'number',
					'heading'     => esc_html__('Number of Destinations Per Page', 'setsail-tours'),
					'value'       => '-1',
					'description' => esc_html__('Enter -1 to show all', 'setsail-tours')
				),
				array(
					'type'        => 'textfield',
					'param_name'  => 'selected_destinations',
					'heading'     => esc_html__('Show Only Destinations with Listed IDs', 'setsail-tours'),
					'description' => esc_html__('Delimit ID numbers by comma (leave empty for all)', 'setsail-tours')
				),
				array(
					'type'       => 'dropdown',
					'param_name' => 'image_size',
					'heading'    => esc_html__( 'Image Proportions', 'setsail-tours' ),
					'value'      => array(
						esc_html__( 'Default', 'setsail-tours' )   => '',
						esc_html__( 'Original', 'setsail-tours' )  => 'full',
						esc_html__( 'Square', 'setsail-tours' )    => 'square',
						esc_html__( 'Landscape', 'setsail-tours' ) => 'landscape',
						esc_html__( 'Portrait', 'setsail-tours' )  => 'portrait',
						esc_html__( 'Custom', 'setsail-tours' )    => 'custom'
					)
				),
				array(
					'type'        => 'textfield',
					'param_name'  => 'custom_image_dimensions',
					'heading'     => esc_html__( 'Image Dimensions', 'setsail-tours' ),
					'description' => esc_html__( 'Enter custom image dimensions. Enter image size in pixels: 200x100 (Width x Height)', 'setsail-tours' ),
					'dependency'  => array( 'element' => 'image_size', 'value' => 'custom' )
				),
				array(
					'type'        => 'dropdown',
					'param_name'  => 'orderby',
					'heading'     => esc_html__( 'Order By', 'setsail-tours' ),
					'value'       => array(
						esc_html__( 'Menu Order', 'setsail-tours' ) => 'menu_order',
						esc_html__( 'Title', 'setsail-tours' )      => 'title',
						esc_html__( 'Date', 'setsail-tours' )       => 'date'
					),
					'save_always' => true,
					'group'       => esc_html__( 'Query Options', 'setsail-tours' )
				),
				array(
					'type'        => 'dropdown',
					'param_name'  => 'order',
					'heading'     => esc_html__('Order', 'setsail-tours'),
					'value'       => array(
						esc_html__('ASC', 'setsail-tours')  => 'ASC',
						esc_html__('DESC', 'setsail-tours') => 'DESC',
					),
					'save_always' => true,
					'group'       => esc_html__('Query Options', 'setsail-tours')
				),
			)
		));
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'number'                  => '-1',
			'selected_destinations'   => '',
			'image_size'              => 'full',
			'custom_image_dimensions' => '',
			'orderby'                 => 'date',
			'order'                   => 'DESC'
		);
		$params = shortcode_atts( $args, $atts );
		
		$query = $this->buildQueryObject( $params );
		
		$params['query']  = $query;
		$params['caller'] = $this;
		
		$params['holder_classes'] = $this->gridClasses( $params );
		$params['thumb_size']     = setsail_tours_get_image_size_param( $params );
		$params['tour_items_id']  = setsail_select_get_cpt_items( 'tour-item' );
		
		return setsail_tours_get_tour_module_template_part( 'destination-with-tours/templates/destination-with-tours-template', 'destinations', 'shortcodes', '', $params );
	}
	
	private function buildQueryObject( $params ) {
		$queryArray['post_status'] = 'publish';
		$queryArray['post_type']   = 'destinations';
		
		if ( ! empty( $params['orderby'] ) ) {
			$queryArray['orderby'] = $params['orderby'];
		}
		
		if ( ! empty( $params['order'] ) ) {
			$queryArray['order'] = $params['order'];
		}
	
		if ( ! empty( $params['number'] ) ) {
			$queryArray['posts_per_page'] = intval( $params['number'] );
		}
		
		$toursIds = null;
		if ( ! empty( $params['selected_destinations'] ) ) {
			$toursIds               = explode( ',', $params['selected_destinations'] );
			$queryArray['post__in'] = $toursIds;
		}
		
		return new \WP_Query( $queryArray );
	}
	
	private function gridClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = 'qodef-grid-list qodef-disable-bottom-space';
		$holderClasses[] = 'qodef-one-columns';
		$holderClasses[] = 'qodef-normal-space';
		
		return implode( ' ', $holderClasses );
	}
}