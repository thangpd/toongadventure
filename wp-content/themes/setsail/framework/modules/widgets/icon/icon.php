<?php

if ( class_exists('SetSailSelectClassWidget') ) {
	class SetSailSelectClassIconWidget extends SetSailSelectClassWidget {
		public function __construct() {
			parent::__construct(
				'qodef_icon_widget',
				esc_html__('SetSail Icon Widget', 'setsail'),
				array('description' => esc_html__('Add icons to widget areas', 'setsail'))
			);
			
			$this->setParams();
		}
		
		protected function setParams() {
			$this->params = array_merge(
				setsail_select_icon_collections()->getIconWidgetParamsArray(),
				array(
					array(
						'type'  => 'textfield',
						'name'  => 'icon_text',
						'title' => esc_html__('Icon Text', 'setsail')
					),
					array(
						'type'  => 'textfield',
						'name'  => 'link',
						'title' => esc_html__('Link', 'setsail')
					),
					array(
						'type'    => 'dropdown',
						'name'    => 'target',
						'title'   => esc_html__('Target', 'setsail'),
						'options' => setsail_select_get_link_target_array()
					),
					array(
						'type'  => 'textfield',
						'name'  => 'icon_size',
						'title' => esc_html__('Icon Size (px)', 'setsail')
					),
					array(
						'type'  => 'colorpicker',
						'name'  => 'icon_color',
						'title' => esc_html__('Icon Color', 'setsail')
					),
					array(
						'type'  => 'colorpicker',
						'name'  => 'icon_hover_color',
						'title' => esc_html__('Icon Hover Color', 'setsail')
					),
					array(
						'type'  => 'textfield',
						'name'  => 'text_size',
						'title' => esc_html__('Text Size (px)', 'setsail')
					),
					array(
						'type'  => 'colorpicker',
						'name'  => 'text_color',
						'title' => esc_html__('Text Color', 'setsail')
					),
					array(
						'type'        => 'textfield',
						'name'        => 'margin',
						'title'       => esc_html__('Margin', 'setsail'),
						'description' => esc_html__('Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'setsail')
					)
				)
			);
		}
		
		public function widget($args, $instance) {
			$holder_classes = array('qodef-icon-widget-holder');
			if ( !empty($instance['icon_hover_color']) ) {
				$holder_classes[] = 'qodef-icon-has-hover';
			}
			
			$data = array();
			$data[] = !empty($instance['icon_hover_color']) ? setsail_select_get_inline_attr($instance['icon_hover_color'], 'data-hover-color') : '';
			$data = implode(' ', $data);
			
			$holder_styles = array();
			if ( isset($instance['margin']) && $instance['margin'] !== '' ) {
				$holder_styles[] = 'margin: ' . $instance['margin'];
			}
			
			$icon_styles = array();
			if ( !empty($instance['icon_color']) ) {
				$icon_styles[] = 'color: ' . $instance['icon_color'];
			}
			if ( !empty($instance['icon_size']) ) {
				$icon_styles[] = 'font-size: ' . setsail_select_filter_px($instance['icon_size']) . 'px';
			}
			
			$text_styles = array();
			if ( !empty($instance['text_size']) ) {
				$text_styles[] = 'font-size: ' . setsail_select_filter_px($instance['text_size']) . 'px';
			}
			if ( !empty($instance['text_color']) ) {
				$text_styles[] = 'color: ' . $instance['text_color'];
			}
			
			$link = !empty($instance['link']) ? $instance['link'] : '#';
			$target = !empty($instance['target']) ? $instance['target'] : '_self';
			
			$icon_holder_html = '';
			if ( !empty($instance['icon_pack']) ) {
				$icon_class = array();
				$icon_class[] = !empty($instance['fa_icon']) && $instance['icon_pack'] === 'font_awesome' ? $instance['fa_icon'] : '';
				$icon_class[] = !empty($instance['fe_icon']) && $instance['icon_pack'] === 'font_elegant' ? $instance['fe_icon'] : '';
				$icon_class[] = !empty($instance['ion_icon']) && $instance['icon_pack'] === 'ion_icons' ? $instance['ion_icon'] : '';
				$icon_class[] = !empty($instance['linea_icon']) && $instance['icon_pack'] === 'linea_icons' ? $instance['linea_icon'] : '';
				$icon_class[] = !empty($instance['linear_icon']) && $instance['icon_pack'] === 'linear_icons' ? 'lnr ' . $instance['linear_icon'] : '';
				$icon_class[] = !empty($instance['simple_line_icon']) && $instance['icon_pack'] === 'simple_line_icons' ? $instance['simple_line_icon'] : '';
				$icon_class[] = !empty($instance['dripicon']) && $instance['icon_pack'] === 'dripicons' ? $instance['dripicon'] : '';
				
				$icon_class = array_filter($icon_class, function($value) {
					return $value !== '';
				});
				
				if ( !empty($icon_class) ) {
					$icon_class = implode(' ', $icon_class);
					
					$icon_holder_html = '<span class="qodef-icon-element ' . esc_attr($icon_class) . '" ' . setsail_select_get_inline_style($icon_styles) . '></span>';
				}
			}
			
			$icon_text_html = '';
			$icon_text_class = !empty($icon_holder_html) ? '' : 'qodef-no-icon';
			if ( !empty($instance['icon_text']) ) {
				$icon_text_html = '<span class="qodef-icon-text ' . esc_attr($icon_text_class) . '" ' . setsail_select_get_inline_style($text_styles) . '>' . esc_html($instance['icon_text']) . '</span>';
			}
			?>

            <a <?php setsail_select_class_attribute($holder_classes); ?> <?php echo wp_kses_post($data); ?>
                    href="<?php echo esc_url($link); ?>"
                    target="<?php echo esc_attr($target); ?>" <?php echo setsail_select_get_inline_style($holder_styles); ?>>
				<?php echo wp_kses($icon_holder_html, array(
					'span' => array(
						'class' => true,
						'style' => true
					)
				)); ?>
				<?php echo wp_kses($icon_text_html, array(
					'span' => array(
						'class' => true,
						'style' => true
					)
				)); ?>
            </a>
			<?php
		}
	}
}