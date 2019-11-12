<?php

if ( ! function_exists( 'setsail_tours_map_booking_meta' ) ) {
	function setsail_tours_map_booking_meta() {
		$tour_booking_meta_box = setsail_select_create_meta_box(
			array(
				'scope' => apply_filters( 'setsail_select_filter_set_scope_for_meta_boxes', array( 'tour-item' ), 'tour_booking_meta' ),
				'title' => esc_html__( 'Tour Booking', 'setsail-tours' ),
				'name'  => 'tour_booking_meta'
			)
		);
		
		setsail_select_add_repeater_field( array(
				'name'        => 'tour_booking',
				'parent'      => $tour_booking_meta_box,
				'button_text' => esc_html__( 'Add New Period', 'setsail-tours' ),
				'fields'      => array(
					array(
						'name'      => 'start_date',
						'type'      => 'date',
						'label'     => esc_html__( 'Start Date', 'setsail-tours' ),
						'col_width' => '6',
						'args'      => array(
							'col_width' => '12'
						)
					),
					array(
						'name'      => 'end_date',
						'type'      => 'date',
						'label'     => esc_html__( 'End Date', 'setsail-tours' ),
						'col_width' => '6',
						'args'      => array(
							'col_width' => '12'
						)
					),
					array(
						'name'      => 'days',
						'type'      => 'checkboxgroup',
						'label'     => esc_html__( 'Tour Days', 'setsail-tours' ),
						'options'   => array(
							'Mon' => esc_html__( 'Monday', 'setsail-tours' ),
							'Tue' => esc_html__( 'Tuesday', 'setsail-tours' ),
							'Wed' => esc_html__( 'Wednesday', 'setsail-tours' ),
							'Thu' => esc_html__( 'Thursday', 'setsail-tours' ),
							'Fri' => esc_html__( 'Friday', 'setsail-tours' ),
							'Sat' => esc_html__( 'Saturday', 'setsail-tours' ),
							'Sun' => esc_html__( 'Sunday', 'setsail-tours' )
						),
						'col_width' => '12'
					),
					array(
						'name'        => 'tour_time',
						'type'        => 'repeater',
						'label'       => esc_html__( 'Departure Time', 'setsail-tours' ),
						'button_text' => esc_html__( 'Add New Time', 'setsail-tours' ),
						'fields'      => array(
							array(
								'name' => 'time',
								'type' => 'text',
								'args' => array(
									'col_width' => '3'
								)
							)
						)
					),
					array(
						'name'      => 'number_of_tickets',
						'type'      => 'text',
						'label'     => esc_html__( 'Tickets', 'setsail-tours' ),
						'col_width' => '3'
					),
					array(
						'name'        => 'price_change',
						'type'        => 'text',
						'label'       => esc_html__( 'Price Changes', 'setsail-tours' ),
						'description' => esc_html__( 'Use this field for defining special price for this period. Use "%" in front of the number to change the price in percentage.', 'setsail-tours' ),
						'col_width'   => '9'
					),
				)
			)
		);
	}
	
	add_action( 'setsail_select_action_meta_boxes_map', 'setsail_tours_map_booking_meta', 10 );
}