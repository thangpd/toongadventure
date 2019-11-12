<?php

namespace SetSailTours\CPT\Tours\Shortcodes;

use SetSailTours\Lib\ShortcodeInterface;

class ToursFilter implements ShortcodeInterface {
	private $base;

	/**
	 * ToursFilter constructor.
	 */
	public function __construct() {
		$this->base = 'setsail_tours_filter';

		add_action('vc_before_init_vc', array($this, 'vcMap'));
	}

	public function vcMap() {
		vc_map(array(
			'name'                      => esc_html__('Tours Filters', 'setsail-tours'),
			'base'                      => $this->base,
			'category'       			=> esc_html__('by SETSAIL TOURS', 'setsail-tours'),
			'icon'                      => 'icon-wpb-tours-filters extended-custom-tours-icon',
			'allowed_container_element' => 'vc_row',
			'params'                    => array(
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__('Type', 'setsail-tours'),
					'param_name'  => 'filter_type',
					'value'       => array(
						esc_html__( 'Vertical', 'setsail-tours' )       => 'vertical',
						esc_html__( 'Vertical Small', 'setsail-tours' ) => 'vertical-small',
						esc_html__( 'Horizontal', 'setsail-tours' )     => 'horizontal'
					),
					'save_always' => true,
					'admin_label' => true
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Title', 'setsail-tours'),
					'param_name'  => 'title',
					'dependency'  => array('element' => 'filter_type', 'value' => 'vertical-small')
				),
				array(
					'type'        => 'dropdown',
					'param_name'  => 'title_tag',
					'heading'     => esc_html__( 'Title Tag', 'setsail-tours' ),
					'value'       => array_flip( setsail_select_get_title_tag( true ) ),
					'dependency'  => array( 'element' => 'title', 'not_empty' => true )
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Subtitle', 'setsail-tours'),
					'param_name'  => 'subtitle',
					'dependency'  => array('element' => 'filter_type', 'value' => 'vertical-small')
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__('Filter Full Width', 'setsail-tours'),
					'param_name'  => 'filter_full_width',
					'value'       => array(
						esc_html__('Yes', 'setsail-tours') => 'yes',
						esc_html__('No', 'setsail-tours')  => 'no'
					),
					'dependency'  => array('element' => 'filter_type', 'value' => 'horizontal')
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__('Show Tour Types Checkboxes', 'setsail-tours'),
					'param_name'  => 'show_tour_types',
					'value'       => array(
						esc_html__('Yes', 'setsail-tours') => 'yes',
						esc_html__('No', 'setsail-tours')  => 'no'
					),
					'dependency'  => array('element' => 'filter_type', 'value' => 'vertical')
				),
				array(
					'type'        => 'dropdown',
					'param_name'  => 'show_filter_by_price',
					'heading'     => esc_html__('Show Filter by Price', 'setsail-tours'),
					'value'       => array(
						esc_html__('Yes', 'setsail-tours') => 'yes',
						esc_html__('No', 'setsail-tours')  => 'no'
					),
					'dependency'  => array('element' => 'filter_type', 'value' => 'vertical')
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Number of Tour Types', 'setsail-tours'),
					'param_name'  => 'number_of_tour_types',
					'dependency'  => array('element' => 'filter_type', 'value' => 'vertical')
				)
			)
		));
	}

	public function getBase() {
		return $this->base;
	}

	public function render($atts, $content = null) {
		$args = array(
			'filter_type'            => 'vertical',
			'title'                  => '',
			'title_tag'              => 'h4',
			'subtitle'               => '',
			'show_tour_types'        => 'yes',
			'filter_full_width'      => 'yes',
			'number_of_tour_types'   => ''
		);

		$params = shortcode_atts($args, $atts);

		$filterClass = array(
			'qodef-tours-filter-holder',
			'qodef-tours-filter-'.$params['filter_type']
		);

		$params['show_tour_types'] = $params['show_tour_types'] === 'yes';

		$params['display_container_inner'] = $params['filter_full_width'] === 'yes' && $params['filter_type'] === 'horizontal';

		if($params['display_container_inner']) {
			$filterClass[] = 'qodef-tours-full-width-filter';
		}

		$params['filter_class'] = $filterClass;

		return setsail_tours_get_tour_module_template_part('tours-filter/templates/tours-filters-holder', 'tours', 'shortcodes', '', $params);
	}
}