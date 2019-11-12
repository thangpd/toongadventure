<?php
namespace SetSailTours\CPT\Destination\Shortcodes;

use SetSailTours\Lib\ShortcodeInterface;

class DestinationGrid implements ShortcodeInterface {
	private $base;

	/**
	 * DestinationGrid constructor.
	 */
	public function __construct() {
		$this->base = 'qodef_destination_grid';

		add_action('vc_before_init', array($this, 'vcMap'));
	}


	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		vc_map( array(
			'name'     => esc_html__( 'Destinations Grid', 'setsail-tours' ),
			'base'     => $this->base,
			'category' => esc_html__( 'by SETSAIL TOURS', 'setsail-tours' ),
			'icon'     => 'icon-wpb-destinations-grid extended-custom-tours-icon',
			'params'   => array(
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__('Destination Grid Type', 'setsail-tours'),
					'param_name'  => 'destination_type',
					'value'       => array(
						esc_html__( 'Standard', 'setsail-tours' )                 => 'standard',
						esc_html__( 'Gallery with description', 'setsail-tours' ) => 'with-desc'
					),
					'admin_label' => true,
					'save_always' => true,
					'description' => esc_html__('Default value is Standard', 'setsail-tours'),
				),
				array(
					'type'       => 'dropdown',
					'param_name' => 'number_of_columns',
					'heading'    => esc_html__( 'Number of Columns', 'setsail-tours' ),
					'value'      => array_flip( setsail_select_get_number_of_columns_array( true ) ),
				),
				array(
					'type'       => 'dropdown',
					'param_name' => 'space_between_items',
					'heading'    => esc_html__( 'Space Between Items', 'setsail-tours' ),
					'value'      => array_flip( setsail_select_get_space_between_items_array() ),
					'save_always' => true
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
					),
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
					'param_name'  => 'rounded_items',
					'heading'     => esc_html__( 'Enable rounded style', 'setsail-tours' ),
					'description' => esc_html__( 'This option will enable rounded style for items', 'setsail-tours' ),
					'value'       => array_flip( setsail_select_get_yes_no_select_array( false, false ) ),
					'save_always' => true,
					'dependency'  => array( 'element' => 'destination_type', 'value' => 'standard' )
				),
				array(
					'type'        => 'dropdown',
					'param_name'  => 'overlay',
					'heading'     => esc_html__( 'Enable overlay', 'setsail-tours' ),
					'description' => esc_html__( 'This option will enable overlay style for items', 'setsail-tours' ),
					'value'       => array_flip( setsail_select_get_yes_no_select_array( false, false ) ),
					'save_always' => true
				),
				array(
					'type'       => 'dropdown',
					'param_name' => 'title_tag',
					'heading'    => esc_html__( 'Title Tag', 'setsail-tours' ),
					'value'      => array_flip( setsail_select_get_title_tag( true ) ),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Text Length', 'setsail-tours'),
					'param_name'  => 'text_length',
					'description' => esc_html__('Number of words', 'setsail-tours'),
					'dependency'  => array('element' => 'destination_type', 'value' => array('with-desc'))
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
				array(
					'type'        => 'textfield',
					'param_name'  => 'number',
					'heading'     => esc_html__('Number of Destinations Per Page', 'setsail-tours'),
					'value'       => '-1',
					'description' => esc_html__('Enter -1 to show all', 'setsail-tours'),
					'group'       => esc_html__('Query Options', 'setsail-tours')
				),
				array(
					'type'        => 'textfield',
					'param_name'  => 'selected_destinations',
					'heading'     => esc_html__('Show Only Destinations with Listed IDs', 'setsail-tours'),
					'description' => esc_html__('Delimit ID numbers by comma (leave empty for all)', 'setsail-tours'),
					'group'       => esc_html__('Query Options', 'setsail-tours')
				)
			)
		));
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'destination_type'        => 'standard',
			'number_of_columns'       => 'three',
			'space_between_items'     => 'normal',
			'image_size'              => 'full',
			'custom_image_dimensions' => '',
			'rounded_items'           => '',
			'overlay'                 => '',
			'title_tag'               => 'h3',
			'text_length'             => '10',
			'orderby'                 => 'date',
			'order'                   => 'DESC',
			'number'                  => '-1',
			'selected_destinations'   => ''
		);
		$params = shortcode_atts( $args, $atts );
		
		$query = $this->buildQueryObject( $params );
		
		$params['query']  = $query;
		$params['caller'] = $this;
		
		$params['holder_classes'] = $this->gridClasses( $params, $args );
		$params['thumb_size']     = setsail_tours_get_image_size_param( $params );
		
		return setsail_tours_get_tour_module_template_part( 'destination-grid/templates/destination-grid-template', 'destinations', 'shortcodes', '', $params );
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
			$queryArray['posts_per_page'] = $params['number'];
		}
		
		$toursIds = null;
		if ( ! empty( $params['selected_destinations'] ) ) {
			$toursIds               = explode( ',', $params['selected_destinations'] );
			$queryArray['post__in'] = $toursIds;
		}
		
		return new \WP_Query( $queryArray );
	}
	
	private function gridClasses( $params, $args ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['destination_type']) ? 'qodef-destination-' . $params['destination_type'] : '';
		$holderClasses[] = 'qodef-grid-list qodef-disable-bottom-space';
		$holderClasses[] = ! empty( $params['number_of_columns'] ) ? 'qodef-' . $params['number_of_columns'] . '-columns' : 'qodef-' . $args['number_of_columns'] . '-columns';
		$holderClasses[] = ! empty( $params['space_between_items'] ) ? 'qodef-' . $params['space_between_items'] . '-space' : 'qodef-' . $args['space_between_items'] . '-space';
		$holderClasses[] = $params['rounded_items'] === 'yes' ? 'qodef-has-rounded-style' : '';
		$holderClasses[] = $params['overlay'] === 'yes' ? 'qodef-has-overlay-style' : '';
		
		return implode( ' ', $holderClasses );
	}
}