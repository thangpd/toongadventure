<?php

if ( class_exists('SetSailSelectClassWidget') ) {
	class SetSailSelectClassButtonWidget extends SetSailSelectClassWidget {
		public function __construct() {
			parent::__construct(
				'qodef_button_widget',
				esc_html__('SetSail Button Widget', 'setsail'),
				array('description' => esc_html__('Add button element to widget areas', 'setsail'))
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
						'solid'   => esc_html__('Solid', 'setsail'),
						'outline' => esc_html__('Outline', 'setsail'),
						'simple'  => esc_html__('Simple', 'setsail')
					)
				),
				array(
					'type'        => 'dropdown',
					'name'        => 'size',
					'title'       => esc_html__('Size', 'setsail'),
					'options'     => array(
						'small'  => esc_html__('Small', 'setsail'),
						'medium' => esc_html__('Medium', 'setsail'),
						'large'  => esc_html__('Large', 'setsail'),
						'huge'   => esc_html__('Huge', 'setsail')
					),
					'description' => esc_html__('This option is only available for solid and outline button type', 'setsail')
				),
				array(
					'type'    => 'textfield',
					'name'    => 'text',
					'title'   => esc_html__('Text', 'setsail'),
					'default' => esc_html__('Button Text', 'setsail')
				),
				array(
					'type'  => 'textfield',
					'name'  => 'link',
					'title' => esc_html__('Link', 'setsail')
				),
				array(
					'type'    => 'dropdown',
					'name'    => 'target',
					'title'   => esc_html__('Link Target', 'setsail'),
					'options' => setsail_select_get_link_target_array()
				),
				array(
					'type'  => 'colorpicker',
					'name'  => 'color',
					'title' => esc_html__('Color', 'setsail')
				),
				array(
					'type'  => 'colorpicker',
					'name'  => 'hover_color',
					'title' => esc_html__('Hover Color', 'setsail')
				),
				array(
					'type'        => 'colorpicker',
					'name'        => 'background_color',
					'title'       => esc_html__('Background Color', 'setsail'),
					'description' => esc_html__('This option is only available for solid button type', 'setsail')
				),
				array(
					'type'        => 'colorpicker',
					'name'        => 'hover_background_color',
					'title'       => esc_html__('Hover Background Color', 'setsail'),
					'description' => esc_html__('This option is only available for solid button type', 'setsail')
				),
				array(
					'type'        => 'colorpicker',
					'name'        => 'border_color',
					'title'       => esc_html__('Border Color', 'setsail'),
					'description' => esc_html__('This option is only available for solid and outline button type', 'setsail')
				),
				array(
					'type'        => 'colorpicker',
					'name'        => 'hover_border_color',
					'title'       => esc_html__('Hover Border Color', 'setsail'),
					'description' => esc_html__('This option is only available for solid and outline button type', 'setsail')
				),
				array(
					'type'        => 'textfield',
					'name'        => 'margin',
					'title'       => esc_html__('Margin', 'setsail'),
					'description' => esc_html__('Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'setsail')
				)
			);
		}
		
		public function widget($args, $instance) {
			$params = '';
			
			if ( !is_array($instance) ) {
				$instance = array();
			}
			
			// Filter out all empty params
			$instance = array_filter($instance, function($array_value) {
				return trim($array_value) != '';
			});
			
			// Default values
			if ( !isset($instance['text']) ) {
				$instance['text'] = 'Button Text';
			}
			
			// Generate shortcode params
			foreach ( $instance as $key => $value ) {
				$params .= " $key='$value' ";
			}
			
			echo '<div class="widget qodef-button-widget">';
			echo do_shortcode("[qodef_button $params]"); // XSS OK
			echo '</div>';
		}
	}
}