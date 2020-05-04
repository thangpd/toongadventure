<?php
namespace SetSailCore\CPT\Shortcodes\News;

use SetSailCore\Lib;

class News implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'qodef_news';
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                    => esc_html__( 'News', 'setsail-core' ),
					'base'                    => $this->base,
					'content_element'         => true,
					'category'                => esc_html__( 'by SETSAIL', 'setsail-core' ),
					'icon'                    => 'icon-wpb-news extended-custom-icon',
					'show_settings_on_create' => true,
					'js_view'                 => 'VcColumnView',
					'params'                  => array(
						array(
							'type'        => 'textfield',
							'param_name'  => 'port_id_1',
							'heading'     => esc_html__( 'Post ID 1', 'setsail-core' ),
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'port_id_2',
							'heading'     => esc_html__( 'Post ID 2', 'setsail-core' ),
						),
						
					)
				)
			);
		}
	}

	public function enqueue_scripts()
    {
        wp_enqueue_script('news_js');
        wp_enqueue_style('news_css');
    }
	
	public function render( $atts, $content = null ) {
        $this->enqueue_scripts();
		$default_atts = array(
			'port_id_1'           => '',
			'port_id_2'           => '',
		);
		$params       = shortcode_atts( $default_atts, $atts );
		
		$params['port_id_1'] 	= ! empty( $params['port_id_1'] ) ? $params['port_id_1'] : '';
		$params['port_id_2'] 	= ! empty( $params['port_id_2'] ) ? $params['port_id_2'] : '';

		
		$output = setsail_core_get_shortcode_module_template_part( 'templates/news-holder-template', 'news', '', $params );
		
		return $output;
	}
	
	private function getHolderClasses( $params ) {
		$holder_classes = array( 'qodef-ac-default' );
		
		$holder_classes[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holder_classes[] = $params['style'] == 'toggle' ? 'qodef-toggle' : 'qodef-news';
		$holder_classes[] = ! empty( $params['layout'] ) ? 'qodef-ac-' . esc_attr( $params['layout'] ) : '';
		$holder_classes[] = ! empty( $params['background_skin'] ) ? 'qodef-' . esc_attr( $params['background_skin'] ) . '-skin' : '';
		
		return implode( ' ', $holder_classes );
	}
}
