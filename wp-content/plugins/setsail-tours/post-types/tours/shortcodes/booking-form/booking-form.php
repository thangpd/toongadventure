<?php

namespace SetSailTours\CPT\Tours\Shortcodes;

use SetSailTours\CPT\Tours\Lib\ToursQuery;
use SetSailTours\Lib\ShortcodeInterface;

class BookingForm implements ShortcodeInterface {
	private $base;

	/**
	 * ToursCarousel constructor.
	 */
	public function __construct() {
		$this->base = 'setsail_booking_form';

		add_action( 'vc_before_init', array( $this, 'vcMap' ) );

		add_action( 'wp_ajax_nopriv_setsail_booking_form_ajax_pagination', array( $this, 'handleLoadMore' ) );
		add_action( 'wp_ajax_setsail_booking_form_ajax_pagination', array( $this, 'handleLoadMore' ) );
	}


	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		try {

			vc_map( array(
				'name'     => esc_html__( 'Booking Form', 'setsail-tours' ),
				'base'     => $this->base,
				'category' => esc_html__( 'by SETSAIL TOURS', 'setsail-tours' ),
				'params'   =>
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__( 'Booking Form Type', 'setsail-tours' ),
						'param_name'  => 'tour_type',
						'value'       => array(
							esc_html__( 'Standard', 'setsail-tours' )                 => 'standard',
							esc_html__( 'To Ong', 'setsail-tours' )                   => 'toong',
							esc_html__( 'To Ong Layout 2', 'setsail-tours' )          => 'toong-2',
							esc_html__( 'Gallery', 'setsail-tours' )                  => 'gallery',
							esc_html__( 'Gallery Simple', 'setsail-tours' )           => 'gallery-simple',
							esc_html__( 'Gallery With Description', 'setsail-tours' ) => 'gallery-with-description',
							esc_html__( 'Masonry', 'setsail-tours' )                  => 'masonry',
						),
						'admin_label' => true,
						'save_always' => true,
						'description' => esc_html__( 'Default value is Standard', 'setsail-tours' ),
					),
			) );
		} catch ( \Exception $exception ) {
			throw( new \Exception( 'error booking form' ) );
		}
	}

	public function enqueue_scripts() {
		wp_enqueue_script( 'hivegallery_js' );
		wp_enqueue_style( 'hivegallery_css' );
	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @param $content string shortcode content
	 *
	 * @return string
	 */


	public function render( $atts, $content = null ) {
		$this->enqueue_scripts();
		$args = array(
			'load_more_text' => ''
		);

		$params = shortcode_atts( $args, $atts );
		return setsail_tours_get_tour_module_template_part( 'booking-form/templates/booking-form-holder', 'tours',
			'shortcodes', '', $params );
	}

}