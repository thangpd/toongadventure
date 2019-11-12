<?php

if ( class_exists('SetSailSelectClassWidget') ) {
	class SetSailSelectClassSeparatorWidget extends SetSailSelectClassWidget {
		public function __construct() {
			parent::__construct(
				'qodef_separator_widget',
				esc_html__('SetSail Separator Widget', 'setsail'),
				array('description' => esc_html__('Add a separator element to your widget areas', 'setsail'))
			);
			
			$this->setParams();
		}
		
		protected function setParams() {
			$this->params = array(
				array(
					'type'    => 'dropdown',
					'name'    => 'type',
					'title'   => esc_html__('Type', 'setsail'),
					'options' => array(
						'normal'     => esc_html__('Normal', 'setsail'),
						'full-width' => esc_html__('Full Width', 'setsail')
					)
				),
				array(
					'type'    => 'dropdown',
					'name'    => 'position',
					'title'   => esc_html__('Position', 'setsail'),
					'options' => array(
						'center' => esc_html__('Center', 'setsail'),
						'left'   => esc_html__('Left', 'setsail'),
						'right'  => esc_html__('Right', 'setsail')
					)
				),
				array(
					'type'    => 'dropdown',
					'name'    => 'border_style',
					'title'   => esc_html__('Style', 'setsail'),
					'options' => array(
						'solid'  => esc_html__('Solid', 'setsail'),
						'dashed' => esc_html__('Dashed', 'setsail'),
						'dotted' => esc_html__('Dotted', 'setsail')
					)
				),
				array(
					'type'  => 'colorpicker',
					'name'  => 'color',
					'title' => esc_html__('Color', 'setsail')
				),
				array(
					'type'  => 'textfield',
					'name'  => 'width',
					'title' => esc_html__('Width (px or %)', 'setsail')
				),
				array(
					'type'  => 'textfield',
					'name'  => 'thickness',
					'title' => esc_html__('Thickness (px)', 'setsail')
				),
				array(
					'type'  => 'textfield',
					'name'  => 'top_margin',
					'title' => esc_html__('Top Margin (px or %)', 'setsail')
				),
				array(
					'type'  => 'textfield',
					'name'  => 'bottom_margin',
					'title' => esc_html__('Bottom Margin (px or %)', 'setsail')
				)
			);
		}
		
		public function widget($args, $instance) {
			if ( !is_array($instance) ) {
				$instance = array();
			}
			
			//prepare variables
			$params = '';
			
			//is instance empty?
			if ( is_array($instance) && count($instance) ) {
				//generate shortcode params
				foreach ( $instance as $key => $value ) {
					$params .= " $key='$value' ";
				}
			}
			
			echo '<div class="widget qodef-separator-widget">';
			echo do_shortcode("[qodef_separator $params]"); // XSS OK
			echo '</div>';
		}
	}
}