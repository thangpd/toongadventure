<?php

if ( ! function_exists( 'setsail_tours_tour_options_map' ) ) {
	function setsail_tours_tour_options_map() {
		
		setsail_select_add_admin_page(
			array(
				'slug'  => '_tours_page',
				'title' => esc_html__( 'Tours', 'setsail-tours' ),
				'icon'  => 'fa fa-camera-retro'
			)
		);
		
		$panel_payment = setsail_select_add_admin_panel(
			array(
				'title' => esc_html__( 'Payment', 'setsail-tours' ),
				'name'  => 'panel_payment',
				'page'  => '_tours_page'
			)
		);
		
		setsail_select_add_admin_section_title(
			array(
				'parent' => $panel_payment,
				'name'   => 'paypal_section_title',
				'title'  => esc_html__( 'PayPal', 'setsail-tours' )
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'name'          => 'tours_enable_paypal',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Enable Paypal', 'setsail-tours' ),
				'description'   => esc_html__( 'This option will enable/disable Paypal payment', 'setsail-tours' ),
				'parent'        => $panel_payment
			)
		);
		
		$show_paypal_container = setsail_select_add_admin_container(
			array(
				'parent'     => $panel_payment,
				'name'       => 'show_paypal_container',
				'dependency' => array(
					'show' => array(
						'tours_enable_paypal' => 'yes'
					)
				)
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'name'          => 'paypal_facilitator_id',
				'type'          => 'text',
				'default_value' => '',
				'label'         => esc_html__( 'Account ID', 'setsail-tours' ),
				'description'   => esc_html__( 'Insert Business Account ID (Email)', 'setsail-tours' ),
				'parent'        => $show_paypal_container
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'name'          => 'paypal_currency',
				'type'          => 'select',
				'default_value' => 'USD',
				'label'         => esc_html__( 'Currency', 'setsail-tours' ),
				'description'   => esc_html__( 'Payment Currency', 'setsail-tours' ),
				'parent'        => $show_paypal_container,
				'options'       => array(
					'USD' => esc_html__( 'U.S. Dollar', 'setsail-tours' ),
					'EUR' => esc_html__( 'Euro', 'setsail-tours' ),
					'GBP' => esc_html__( 'Pound Sterling', 'setsail-tours' ),
					'AUD' => esc_html__( 'Australian Dollar', 'setsail-tours' ),
					'CHF' => esc_html__( 'Swiss Franc', 'setsail-tours' ),
					'BRL' => esc_html__( 'Brazilian Real', 'setsail-tours' ),
					'CAD' => esc_html__( 'Canadian Dollar', 'setsail-tours' ),
					'CZK' => esc_html__( 'Czech Koruna', 'setsail-tours' ),
					'DKK' => esc_html__( 'Danish Krone', 'setsail-tours' ),
					'HKD' => esc_html__( 'Hong Kong Dollar', 'setsail-tours' ),
					'HUF' => esc_html__( 'Hungarian Forint', 'setsail-tours' ),
					'ILS' => esc_html__( 'Israeli New Sheqel', 'setsail-tours' ),
					'JPY' => esc_html__( 'Japanese Yen', 'setsail-tours' ),
					'MYR' => esc_html__( 'Malaysian Ringgit', 'setsail-tours' ),
					'MXN' => esc_html__( 'Mexican Peso', 'setsail-tours' ),
					'NOK' => esc_html__( 'Norwegian Krone', 'setsail-tours' ),
					'NZD' => esc_html__( 'New Zealand Dollar', 'setsail-tours' ),
					'PHP' => esc_html__( 'Philippine Peso', 'setsail-tours' ),
					'PLN' => esc_html__( 'Polish Zloty', 'setsail-tours' ),
					'SGD' => esc_html__( 'Singapore Dollar', 'setsail-tours' ),
					'SEK' => esc_html__( 'Swedish Krona', 'setsail-tours' ),
					'TWD' => esc_html__( 'Taiwan New Dollar', 'setsail-tours' ),
					'THB' => esc_html__( 'Thai Baht', 'setsail-tours' ),
					'TRY' => esc_html__( 'Turkish Lira', 'setsail-tours' )
				)
			)
		);
		
		$settings_panel = setsail_select_add_admin_panel(
			array(
				'title' => esc_html__( 'Settings', 'setsail-tours' ),
				'name'  => 'panel_settings',
				'page'  => '_tours_page'
			)
		);
		
		$checkout_pages = setsail_tours_get_checkout_pages( true );
		
		setsail_select_add_admin_field(
			array(
				'name'          => 'tours_checkout_page',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Checkout Page', 'setsail-tours' ),
				'description'   => esc_html__( 'Choose checkout page', 'setsail-tours' ),
				'parent'        => $settings_panel,
				'options'       => $checkout_pages,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'name'          => 'tours_currency_symbol',
				'type'          => 'text',
				'default_value' => '',
				'label'         => esc_html__( 'Price Currency', 'setsail-tours' ),
				'description'   => esc_html__( 'Insert currency for tour prices', 'setsail-tours' ),
				'parent'        => $settings_panel,
				'args'          => array(
					'col_width' => '3'
				)
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'name'          => 'tours_currency_symbol_position',
				'type'          => 'select',
				'default_value' => 'left',
				'label'         => esc_html__( 'Price Currency Position', 'setsail-tours' ),
				'description'   => esc_html__( 'Choose position for your currency symbol', 'setsail-tours' ),
				'parent'        => $settings_panel,
				'options'       => array(
					'left'  => esc_html__( 'Left', 'setsail-tours' ),
					'right' => esc_html__( 'Right', 'setsail-tours' )
				),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		$search_pages = setsail_tours_get_search_pages( true );
		
		$search_panel = setsail_select_add_admin_panel(
			array(
				'title' => esc_html__( 'Search Page', 'setsail-tours' ),
				'name'  => 'panel_search',
				'page'  => '_tours_page'
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'select',
				'name'          => 'tours_search_main_page',
				'default_value' => '',
				'label'         => esc_html__( 'Main Search Page', 'setsail-tours' ),
				'description'   => esc_html__( 'Choose main search page. Defaults to tour item archive page', 'setsail-tours' ),
				'options'       => $search_pages,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'text',
				'name'          => 'tours_per_page',
				'default_value' => 12,
				'label'         => esc_html__( 'Items per Page', 'setsail-tours' ),
				'description'   => esc_html__( 'Choose number of tour items per page', 'setsail-tours' ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'select',
				'name'          => 'tours_search_default_view_type',
				'default_value' => 'list',
				'label'         => esc_html__( 'Default Tour View Type', 'setsail-tours' ),
				'description'   => esc_html__( 'Choose default tour view type', 'setsail-tours' ),
				'options'       => array(
					'list'     => esc_html__( 'List', 'setsail-tours' ),
					'standard' => esc_html__( 'Standard', 'setsail-tours' ),
					'gallery'  => esc_html__( 'Gallery', 'setsail-tours' )
				),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'select',
				'name'          => 'tours_search_default_ordering',
				'default_value' => 'date',
				'label'         => esc_html__( 'Default Tour Ordering', 'setsail-tours' ),
				'description'   => esc_html__( 'Choose default tour ordering', 'setsail-tours' ),
				'options'       => array(
					'date'       => esc_html__( 'Date', 'setsail-tours' ),
					'price_low'  => esc_html__( 'Price Low to High', 'setsail-tours' ),
					'price_high' => esc_html__( 'Price High to Low', 'setsail-tours' ),
					'name'       => esc_html__( 'Name', 'setsail-tours' )
				),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'text',
				'name'          => 'tours_list_text_length',
				'default_value' => 20,
				'label'         => esc_html__( 'List Item Text Length', 'setsail-tours' ),
				'description'   => esc_html__( 'Choose number of words for list tour item', 'setsail-tours' ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'text',
				'name'          => 'tours_standard_text_length',
				'default_value' => 20,
				'label'         => esc_html__( 'Standard Item Text Length', 'setsail-tours' ),
				'description'   => esc_html__( 'Choose number of words for standard tour item', 'setsail-tours' ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'select',
				'name'          => 'tours_standard_thumb_size',
				'default_value' => 'full',
				'label'         => esc_html__( 'Standard Thumbnail Size', 'setsail-tours' ),
				'description'   => esc_html__( 'Choose thumbnail size for standard tour item', 'setsail-tours' ),
				'options'       => array(
					'full'                           => esc_html__( 'Full', 'setsail-tours' ),
					'setsail_select_image_landscape' => esc_html__( 'Landscape', 'setsail-tours' ),
					'setsail_select_image_portrait'  => esc_html__( 'Portrait', 'setsail-tours' ),
					'setsail_select_image_square'    => esc_html__( 'Square', 'setsail-tours' )
				),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'select',
				'name'          => 'tours_gallery_thumb_size',
				'default_value' => 'full',
				'options'       => array(
					'full'                           => esc_html__( 'Full', 'setsail-tours' ),
					'setsail_select_image_landscape' => esc_html__( 'Landscape', 'setsail-tours' ),
					'setsail_select_image_portrait'  => esc_html__( 'Portrait', 'setsail-tours' ),
					'setsail_select_image_square'    => esc_html__( 'Square', 'setsail-tours' )
				),
				'label'         => esc_html__( 'Gallery Thumbnail Size', 'setsail-tours' ),
				'description'   => esc_html__( 'Choose thumbnail size for gallery tour item', 'setsail-tours' ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		$tour_single_panel = setsail_select_add_admin_panel(
			array(
				'title' => esc_html__( 'Tour Single', 'setsail-tours' ),
				'name'  => 'panel_tour_single',
				'page'  => '_tours_page'
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'tour_single_boxed_layout',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Boxed Layout', 'setsail-tours' ),
				'description'   => esc_html__( 'Enabling this option will set boxed layout around post content on single tour pages', 'setsail-tours' ),
				'parent'        => $tour_single_panel
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'tour_single_enable_boxed_layout_overlapping',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Content Boxed Layout Overlapping', 'setsail-tours' ),
				'description'   => esc_html__( 'Enabling this option will set boxed content layout to overlap title area on single tour pages', 'setsail-tours' ),
				'parent'        => $tour_single_panel,
				'dependency'    => array(
					'show' => array(
						'tour_single_boxed_layout' => 'yes'
					)
				)
			)
		);
		
		$reviews_panel = setsail_select_add_admin_panel(
			array(
				'title' => esc_html__( 'Reviews', 'setsail-tours' ),
				'name'  => 'panel_reviews',
				'page'  => '_tours_page'
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent'        => $reviews_panel,
				'type'          => 'text',
				'name'          => 'reviews_section_title',
				'default_value' => '',
				'label'         => esc_html__( 'Reviews Section Title', 'setsail-tours' ),
				'description'   => esc_html__( 'Enter title that you want to show before average rating for each tour', 'setsail-tours' ),
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent'        => $reviews_panel,
				'type'          => 'textarea',
				'name'          => 'reviews_section_subtitle',
				'default_value' => '',
				'label'         => esc_html__( 'Reviews Section Subtitle', 'setsail-tours' ),
				'description'   => esc_html__( 'Enter subtitle that you want to show before average rating for each tour', 'setsail-tours' ),
			)
		);
		
		$panel_admin_email = setsail_select_add_admin_panel(
			array(
				'title' => esc_html__( 'Admin Booking Email', 'setsail-tours' ),
				'name'  => 'admin_email',
				'page'  => '_tours_page'
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent'        => $panel_admin_email,
				'type'          => 'yesno',
				'name'          => 'enable_admin_booking_email',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Should Admin Receive Booking Emails?', 'setsail-tours' ),
				'description'   => esc_html__( 'Enabling this option will forward all booking emails to the site administrator’s inbox', 'setsail-tours' ),
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#qodef_show_admin_email_container"
				)
			)
		);
		
		$show_admin_email_container = setsail_select_add_admin_container(
			array(
				'parent'     => $panel_admin_email,
				'name'       => 'show_admin_email_container',
				'dependency' => array(
					'show' => array(
						'enable_admin_booking_email' => 'yes'
					)
				)
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'name'          => 'admin_email',
				'type'          => 'text',
				'default_value' => '',
				'label'         => esc_html__( 'Admin Email', 'setsail-tours' ),
				'description'   => esc_html__( 'Input the site administrator’s email address. If you leave this field empty, booking emails will be sent to the default admin’s email address', 'setsail-tours' ),
				'parent'        => $show_admin_email_container
			)
		);
	}
	
	add_action( 'setsail_select_action_options_map', 'setsail_tours_tour_options_map', 11 );
}