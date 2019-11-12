<?php

if ( ! function_exists( 'setsail_select_general_options_map' ) ) {
	/**
	 * General options page
	 */
	function setsail_select_general_options_map() {
		
		setsail_select_add_admin_page(
			array(
				'slug'  => '',
				'title' => esc_html__( 'General', 'setsail' ),
				'icon'  => 'fa fa-institution'
			)
		);
		
		$panel_design_style = setsail_select_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_design_style',
				'title' => esc_html__( 'Design Style', 'setsail' )
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'name'          => 'google_fonts',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Google Font Family', 'setsail' ),
				'description'   => esc_html__( 'Choose a default Google font for your site', 'setsail' ),
				'parent'        => $panel_design_style
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'name'          => 'additional_google_fonts',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Additional Google Fonts', 'setsail' ),
				'parent'        => $panel_design_style
			)
		);
		
		$additional_google_fonts_container = setsail_select_add_admin_container(
			array(
				'parent'          => $panel_design_style,
				'name'            => 'additional_google_fonts_container',
				'dependency' => array(
					'show' => array(
						'additional_google_fonts'  => 'yes'
					)
				)
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'name'          => 'additional_google_font1',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'setsail' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'setsail' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'name'          => 'additional_google_font2',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'setsail' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'setsail' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'name'          => 'additional_google_font3',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'setsail' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'setsail' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'name'          => 'additional_google_font4',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'setsail' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'setsail' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'name'          => 'additional_google_font5',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'setsail' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'setsail' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'name'          => 'google_font_weight',
				'type'          => 'checkboxgroup',
				'default_value' => '',
				'label'         => esc_html__( 'Google Fonts Style & Weight', 'setsail' ),
				'description'   => esc_html__( 'Choose a default Google font weights for your site. Impact on page load time', 'setsail' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'100'  => esc_html__( '100 Thin', 'setsail' ),
					'100i' => esc_html__( '100 Thin Italic', 'setsail' ),
					'200'  => esc_html__( '200 Extra-Light', 'setsail' ),
					'200i' => esc_html__( '200 Extra-Light Italic', 'setsail' ),
					'300'  => esc_html__( '300 Light', 'setsail' ),
					'300i' => esc_html__( '300 Light Italic', 'setsail' ),
					'400'  => esc_html__( '400 Regular', 'setsail' ),
					'400i' => esc_html__( '400 Regular Italic', 'setsail' ),
					'500'  => esc_html__( '500 Medium', 'setsail' ),
					'500i' => esc_html__( '500 Medium Italic', 'setsail' ),
					'600'  => esc_html__( '600 Semi-Bold', 'setsail' ),
					'600i' => esc_html__( '600 Semi-Bold Italic', 'setsail' ),
					'700'  => esc_html__( '700 Bold', 'setsail' ),
					'700i' => esc_html__( '700 Bold Italic', 'setsail' ),
					'800'  => esc_html__( '800 Extra-Bold', 'setsail' ),
					'800i' => esc_html__( '800 Extra-Bold Italic', 'setsail' ),
					'900'  => esc_html__( '900 Ultra-Bold', 'setsail' ),
					'900i' => esc_html__( '900 Ultra-Bold Italic', 'setsail' )
				)
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'name'          => 'google_font_subset',
				'type'          => 'checkboxgroup',
				'default_value' => '',
				'label'         => esc_html__( 'Google Fonts Subset', 'setsail' ),
				'description'   => esc_html__( 'Choose a default Google font subsets for your site', 'setsail' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'latin'        => esc_html__( 'Latin', 'setsail' ),
					'latin-ext'    => esc_html__( 'Latin Extended', 'setsail' ),
					'cyrillic'     => esc_html__( 'Cyrillic', 'setsail' ),
					'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'setsail' ),
					'greek'        => esc_html__( 'Greek', 'setsail' ),
					'greek-ext'    => esc_html__( 'Greek Extended', 'setsail' ),
					'vietnamese'   => esc_html__( 'Vietnamese', 'setsail' )
				)
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'name'        => 'first_color',
				'type'        => 'color',
				'label'       => esc_html__( 'First Main Color', 'setsail' ),
				'description' => esc_html__( 'Choose the most dominant theme color. Default color is #00bbb3', 'setsail' ),
				'parent'      => $panel_design_style
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'name'        => 'page_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'setsail' ),
				'description' => esc_html__( 'Choose the background color for page content. Default color is #ffffff', 'setsail' ),
				'parent'      => $panel_design_style
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'name'        => 'page_background_image',
				'type'        => 'image',
				'label'       => esc_html__( 'Page Background Image', 'setsail' ),
				'description' => esc_html__( 'Choose the background image for page content', 'setsail' ),
				'parent'      => $panel_design_style
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'name'          => 'page_background_image_repeat',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Page Background Image Repeat', 'setsail' ),
				'description'   => esc_html__( 'Enabling this option will set the background image as a repeating pattern throughout the page, otherwise the image will appear as the cover background image', 'setsail' ),
				'parent'        => $panel_design_style
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'name'        => 'selection_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Text Selection Color', 'setsail' ),
				'description' => esc_html__( 'Choose the color users see when selecting text', 'setsail' ),
				'parent'      => $panel_design_style
			)
		);
		
		/***************** Passepartout Layout - begin **********************/
		
		setsail_select_add_admin_field(
			array(
				'name'          => 'boxed',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Boxed Layout', 'setsail' ),
				'parent'        => $panel_design_style
			)
		);
		
			$boxed_container = setsail_select_add_admin_container(
				array(
					'parent'          => $panel_design_style,
					'name'            => 'boxed_container',
					'dependency' => array(
						'show' => array(
							'boxed'  => 'yes'
						)
					)
				)
			);
		
				setsail_select_add_admin_field(
					array(
						'name'        => 'page_background_color_in_box',
						'type'        => 'color',
						'label'       => esc_html__( 'Page Background Color', 'setsail' ),
						'description' => esc_html__( 'Choose the page background color outside box', 'setsail' ),
						'parent'      => $boxed_container
					)
				);
				
				setsail_select_add_admin_field(
					array(
						'name'        => 'boxed_background_image',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'setsail' ),
						'description' => esc_html__( 'Choose an image to be displayed in background', 'setsail' ),
						'parent'      => $boxed_container
					)
				);
				
				setsail_select_add_admin_field(
					array(
						'name'        => 'boxed_pattern_background_image',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Pattern', 'setsail' ),
						'description' => esc_html__( 'Choose an image to be used as background pattern', 'setsail' ),
						'parent'      => $boxed_container
					)
				);
				
				setsail_select_add_admin_field(
					array(
						'name'          => 'boxed_background_image_attachment',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Attachment', 'setsail' ),
						'description'   => esc_html__( 'Choose background image attachment', 'setsail' ),
						'parent'        => $boxed_container,
						'options'       => array(
							''       => esc_html__( 'Default', 'setsail' ),
							'fixed'  => esc_html__( 'Fixed', 'setsail' ),
							'scroll' => esc_html__( 'Scroll', 'setsail' )
						)
					)
				);
		
		/***************** Boxed Layout - end **********************/
		
		/***************** Passepartout Layout - begin **********************/
		
		setsail_select_add_admin_field(
			array(
				'name'          => 'paspartu',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Passepartout', 'setsail' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'setsail' ),
				'parent'        => $panel_design_style
			)
		);
		
			$paspartu_container = setsail_select_add_admin_container(
				array(
					'parent'          => $panel_design_style,
					'name'            => 'paspartu_container',
					'dependency' => array(
						'show' => array(
							'paspartu'  => 'yes'
						)
					)
				)
			);
		
				setsail_select_add_admin_field(
					array(
						'name'        => 'paspartu_color',
						'type'        => 'color',
						'label'       => esc_html__( 'Passepartout Color', 'setsail' ),
						'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'setsail' ),
						'parent'      => $paspartu_container
					)
				);
				
				setsail_select_add_admin_field(
					array(
						'name'        => 'paspartu_width',
						'type'        => 'text',
						'label'       => esc_html__( 'Passepartout Size', 'setsail' ),
						'description' => esc_html__( 'Enter size amount for passepartout', 'setsail' ),
						'parent'      => $paspartu_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
		
				setsail_select_add_admin_field(
					array(
						'name'        => 'paspartu_responsive_width',
						'type'        => 'text',
						'label'       => esc_html__( 'Responsive Passepartout Size', 'setsail' ),
						'description' => esc_html__( 'Enter size amount for passepartout for smaller screens (tablets and mobiles view)', 'setsail' ),
						'parent'      => $paspartu_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
				
				setsail_select_add_admin_field(
					array(
						'parent'        => $paspartu_container,
						'type'          => 'yesno',
						'default_value' => 'no',
						'name'          => 'disable_top_paspartu',
						'label'         => esc_html__( 'Disable Top Passepartout', 'setsail' )
					)
				);
		
				setsail_select_add_admin_field(
					array(
						'parent'        => $paspartu_container,
						'type'          => 'yesno',
						'default_value' => 'no',
						'name'          => 'enable_fixed_paspartu',
						'label'         => esc_html__( 'Enable Fixed Passepartout', 'setsail' ),
						'description' => esc_html__( 'Enabling this option will set fixed passepartout for your screens', 'setsail' )
					)
				);
		
		/***************** Passepartout Layout - end **********************/
		
		/***************** Content Layout - begin **********************/
		
		setsail_select_add_admin_field(
			array(
				'name'          => 'initial_content_width',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Initial Width of Content', 'setsail' ),
				'description'   => esc_html__( 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'setsail' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'qodef-grid-1100' => esc_html__( '1100px - default', 'setsail' ),
					'qodef-grid-1300' => esc_html__( '1300px', 'setsail' ),
					'qodef-grid-1200' => esc_html__( '1200px', 'setsail' ),
					'qodef-grid-1000' => esc_html__( '1000px', 'setsail' ),
					'qodef-grid-800'  => esc_html__( '800px', 'setsail' )
				)
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'name'          => 'preload_pattern_image',
				'type'          => 'image',
				'label'         => esc_html__( 'Preload Pattern Image', 'setsail' ),
				'description'   => esc_html__( 'Choose preload pattern image to be displayed until images are loaded', 'setsail' ),
				'parent'        => $panel_design_style
			)
		);
		
		/***************** Content Layout - end **********************/
		
		$panel_settings = setsail_select_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_settings',
				'title' => esc_html__( 'Settings', 'setsail' )
			)
		);
		
		/***************** Smooth Scroll Layout - begin **********************/
		
		setsail_select_add_admin_field(
			array(
				'name'          => 'page_smooth_scroll',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Smooth Scroll', 'setsail' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth scrolling effect on every page (except on Mac and touch devices)', 'setsail' ),
				'parent'        => $panel_settings
			)
		);
		
		/***************** Smooth Scroll Layout - end **********************/
		
		/***************** Smooth Page Transitions Layout - begin **********************/
		
		setsail_select_add_admin_field(
			array(
				'name'          => 'smooth_page_transitions',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Smooth Page Transitions', 'setsail' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'setsail' ),
				'parent'        => $panel_settings
			)
		);
		
			$page_transitions_container = setsail_select_add_admin_container(
				array(
					'parent'          => $panel_settings,
					'name'            => 'page_transitions_container',
					'dependency' => array(
						'show' => array(
							'smooth_page_transitions'  => 'yes'
						)
					)
				)
			);
		
				setsail_select_add_admin_field(
					array(
						'name'          => 'page_transition_preloader',
						'type'          => 'yesno',
						'default_value' => 'no',
						'label'         => esc_html__( 'Enable Preloading Animation', 'setsail' ),
						'description'   => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'setsail' ),
						'parent'        => $page_transitions_container
					)
				);
				
				$page_transition_preloader_container = setsail_select_add_admin_container(
					array(
						'parent'          => $page_transitions_container,
						'name'            => 'page_transition_preloader_container',
						'dependency' => array(
							'show' => array(
								'page_transition_preloader'  => 'yes'
							)
						)
					)
				);
				
					setsail_select_add_admin_field(
						array(
							'name'   => 'smooth_pt_bgnd_color',
							'type'   => 'color',
							'label'  => esc_html__( 'Page Loader Background Color', 'setsail' ),
							'parent' => $page_transition_preloader_container
						)
					);
					
					$group_pt_spinner_animation = setsail_select_add_admin_group(
						array(
							'name'        => 'group_pt_spinner_animation',
							'title'       => esc_html__( 'Loader Style', 'setsail' ),
							'description' => esc_html__( 'Define styles for loader spinner animation', 'setsail' ),
							'parent'      => $page_transition_preloader_container
						)
					);
					
					$row_pt_spinner_animation = setsail_select_add_admin_row(
						array(
							'name'   => 'row_pt_spinner_animation',
							'parent' => $group_pt_spinner_animation
						)
					);
					
					setsail_select_add_admin_field(
						array(
							'type'          => 'selectsimple',
							'name'          => 'smooth_pt_spinner_type',
							'default_value' => '',
							'label'         => esc_html__( 'Spinner Type', 'setsail' ),
							'parent'        => $row_pt_spinner_animation,
							'options'       => array(
								'rotate_circles'        => esc_html__( 'Rotate Circles', 'setsail' ),
								'pulse'                 => esc_html__( 'Pulse', 'setsail' ),
								'double_pulse'          => esc_html__( 'Double Pulse', 'setsail' ),
								'cube'                  => esc_html__( 'Cube', 'setsail' ),
								'rotating_cubes'        => esc_html__( 'Rotating Cubes', 'setsail' ),
								'stripes'               => esc_html__( 'Stripes', 'setsail' ),
								'wave'                  => esc_html__( 'Wave', 'setsail' ),
								'two_rotating_circles'  => esc_html__( '2 Rotating Circles', 'setsail' ),
								'five_rotating_circles' => esc_html__( '5 Rotating Circles', 'setsail' ),
								'atom'                  => esc_html__( 'Atom', 'setsail' ),
								'clock'                 => esc_html__( 'Clock', 'setsail' ),
								'mitosis'               => esc_html__( 'Mitosis', 'setsail' ),
								'lines'                 => esc_html__( 'Lines', 'setsail' ),
								'fussion'               => esc_html__( 'Fussion', 'setsail' ),
								'wave_circles'          => esc_html__( 'Wave Circles', 'setsail' ),
								'pulse_circles'         => esc_html__( 'Pulse Circles', 'setsail' )
							)
						)
					);
					
					setsail_select_add_admin_field(
						array(
							'type'          => 'colorsimple',
							'name'          => 'smooth_pt_spinner_color',
							'default_value' => '',
							'label'         => esc_html__( 'Spinner Color', 'setsail' ),
							'parent'        => $row_pt_spinner_animation
						)
					);
					
					setsail_select_add_admin_field(
						array(
							'name'          => 'page_transition_fadeout',
							'type'          => 'yesno',
							'default_value' => 'no',
							'label'         => esc_html__( 'Enable Fade Out Animation', 'setsail' ),
							'description'   => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'setsail' ),
							'parent'        => $page_transitions_container
						)
					);
		
		/***************** Smooth Page Transitions Layout - end **********************/
		
		setsail_select_add_admin_field(
			array(
				'name'          => 'show_back_button',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show "Back To Top Button"', 'setsail' ),
				'description'   => esc_html__( 'Enabling this option will display a Back to Top button on every page', 'setsail' ),
				'parent'        => $panel_settings
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'name'          => 'responsiveness',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Responsiveness', 'setsail' ),
				'description'   => esc_html__( 'Enabling this option will make all pages responsive', 'setsail' ),
				'parent'        => $panel_settings
			)
		);
		
		$panel_custom_code = setsail_select_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_custom_code',
				'title' => esc_html__( 'Custom Code', 'setsail' )
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'name'        => 'custom_js',
				'type'        => 'textarea',
				'label'       => esc_html__( 'Custom JS', 'setsail' ),
				'description' => esc_html__( 'Enter your custom Javascript here', 'setsail' ),
				'parent'      => $panel_custom_code
			)
		);
		
		$panel_google_api = setsail_select_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_google_api',
				'title' => esc_html__( 'Google API', 'setsail' )
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'name'        => 'google_maps_api_key',
				'type'        => 'text',
				'label'       => esc_html__( 'Google Maps Api Key', 'setsail' ),
				'description' => esc_html__( 'Insert your Google Maps API key here. For instructions on how to create a Google Maps API key, please refer to our to our documentation.', 'setsail' ),
				'parent'      => $panel_google_api
			)
		);
	}
	
	add_action( 'setsail_select_action_options_map', 'setsail_select_general_options_map', setsail_select_set_options_map_position( 'general' ) );
}

if ( ! function_exists( 'setsail_select_page_general_style' ) ) {
	/**
	 * Function that prints page general inline styles
	 */
	function setsail_select_page_general_style( $style ) {
		$current_style = '';
		$page_id       = setsail_select_get_page_id();
		$class_prefix  = setsail_select_get_unique_page_class( $page_id );
		
		$boxed_background_style = array();
		
		$boxed_page_background_color = setsail_select_get_meta_field_intersect( 'page_background_color_in_box', $page_id );
		if ( ! empty( $boxed_page_background_color ) ) {
			$boxed_background_style['background-color'] = $boxed_page_background_color;
		}
		
		$boxed_page_background_image = setsail_select_get_meta_field_intersect( 'boxed_background_image', $page_id );
		if ( ! empty( $boxed_page_background_image ) ) {
			$boxed_background_style['background-image']    = 'url(' . esc_url( $boxed_page_background_image ) . ')';
			$boxed_background_style['background-position'] = 'center 0px';
			$boxed_background_style['background-repeat']   = 'no-repeat';
		}
		
		$boxed_page_background_pattern_image = setsail_select_get_meta_field_intersect( 'boxed_pattern_background_image', $page_id );
		if ( ! empty( $boxed_page_background_pattern_image ) ) {
			$boxed_background_style['background-image']    = 'url(' . esc_url( $boxed_page_background_pattern_image ) . ')';
			$boxed_background_style['background-position'] = '0px 0px';
			$boxed_background_style['background-repeat']   = 'repeat';
		}
		
		$boxed_page_background_attachment = setsail_select_get_meta_field_intersect( 'boxed_background_image_attachment', $page_id );
		if ( ! empty( $boxed_page_background_attachment ) ) {
			$boxed_background_style['background-attachment'] = $boxed_page_background_attachment;
		}
		
		$boxed_background_selector = $class_prefix . '.qodef-boxed .qodef-wrapper';
		
		if ( ! empty( $boxed_background_style ) ) {
			$current_style .= setsail_select_dynamic_css( $boxed_background_selector, $boxed_background_style );
		}
		
		$paspartu_style     = array();
		$paspartu_res_style = array();
		$paspartu_res_start = '@media only screen and (max-width: 1024px) {';
		$paspartu_res_end   = '}';
		
		$paspartu_header_selector                = array(
			'.qodef-paspartu-enabled .qodef-page-header .qodef-fixed-wrapper.fixed',
			'.qodef-paspartu-enabled .qodef-sticky-header',
			'.qodef-paspartu-enabled .qodef-mobile-header.mobile-header-appear .qodef-mobile-header-inner'
		);
		$paspartu_header_appear_selector         = array(
			'.qodef-paspartu-enabled.qodef-fixed-paspartu-enabled .qodef-page-header .qodef-fixed-wrapper.fixed',
			'.qodef-paspartu-enabled.qodef-fixed-paspartu-enabled .qodef-sticky-header.header-appear',
			'.qodef-paspartu-enabled.qodef-fixed-paspartu-enabled .qodef-mobile-header.mobile-header-appear .qodef-mobile-header-inner'
		);
		
		$paspartu_header_style                   = array();
		$paspartu_header_appear_style            = array();
		$paspartu_header_responsive_style        = array();
		$paspartu_header_appear_responsive_style = array();
		
		$paspartu_color = setsail_select_get_meta_field_intersect( 'paspartu_color', $page_id );
		if ( ! empty( $paspartu_color ) ) {
			$paspartu_style['background-color'] = $paspartu_color;
		}
		
		$paspartu_width = setsail_select_get_meta_field_intersect( 'paspartu_width', $page_id );
		if ( $paspartu_width !== '' ) {
			if ( setsail_select_string_ends_with( $paspartu_width, '%' ) || setsail_select_string_ends_with( $paspartu_width, 'px' ) ) {
				$paspartu_style['padding'] = $paspartu_width;
				
				$paspartu_clean_width      = setsail_select_string_ends_with( $paspartu_width, '%' ) ? setsail_select_filter_suffix( $paspartu_width, '%' ) : setsail_select_filter_suffix( $paspartu_width, 'px' );
				$paspartu_clean_width_mark = setsail_select_string_ends_with( $paspartu_width, '%' ) ? '%' : 'px';
				
				$paspartu_header_style['left']              = $paspartu_width;
				$paspartu_header_style['width']             = 'calc(100% - ' . ( 2 * $paspartu_clean_width ) . $paspartu_clean_width_mark . ')';
				$paspartu_header_appear_style['margin-top'] = $paspartu_width;
			} else {
				$paspartu_style['padding'] = $paspartu_width . 'px';
				
				$paspartu_header_style['left']              = $paspartu_width . 'px';
				$paspartu_header_style['width']             = 'calc(100% - ' . ( 2 * $paspartu_width ) . 'px)';
				$paspartu_header_appear_style['margin-top'] = $paspartu_width . 'px';
			}
		}
		
		$paspartu_selector = $class_prefix . '.qodef-paspartu-enabled .qodef-wrapper';
		
		if ( ! empty( $paspartu_style ) ) {
			$current_style .= setsail_select_dynamic_css( $paspartu_selector, $paspartu_style );
		}
		
		if ( ! empty( $paspartu_header_style ) ) {
			$current_style .= setsail_select_dynamic_css( $paspartu_header_selector, $paspartu_header_style );
			$current_style .= setsail_select_dynamic_css( $paspartu_header_appear_selector, $paspartu_header_appear_style );
		}
		
		$paspartu_responsive_width = setsail_select_get_meta_field_intersect( 'paspartu_responsive_width', $page_id );
		if ( $paspartu_responsive_width !== '' ) {
			if ( setsail_select_string_ends_with( $paspartu_responsive_width, '%' ) || setsail_select_string_ends_with( $paspartu_responsive_width, 'px' ) ) {
				$paspartu_res_style['padding'] = $paspartu_responsive_width;
				
				$paspartu_clean_width      = setsail_select_string_ends_with( $paspartu_responsive_width, '%' ) ? setsail_select_filter_suffix( $paspartu_responsive_width, '%' ) : setsail_select_filter_suffix( $paspartu_responsive_width, 'px' );
				$paspartu_clean_width_mark = setsail_select_string_ends_with( $paspartu_responsive_width, '%' ) ? '%' : 'px';
				
				$paspartu_header_responsive_style['left']              = $paspartu_responsive_width;
				$paspartu_header_responsive_style['width']             = 'calc(100% - ' . ( 2 * $paspartu_clean_width ) . $paspartu_clean_width_mark . ')';
				$paspartu_header_appear_responsive_style['margin-top'] = $paspartu_responsive_width;
			} else {
				$paspartu_res_style['padding'] = $paspartu_responsive_width . 'px';
				
				$paspartu_header_responsive_style['left']              = $paspartu_responsive_width . 'px';
				$paspartu_header_responsive_style['width']             = 'calc(100% - ' . ( 2 * $paspartu_responsive_width ) . 'px)';
				$paspartu_header_appear_responsive_style['margin-top'] = $paspartu_responsive_width . 'px';
			}
		}
		
		if ( ! empty( $paspartu_res_style ) ) {
			$current_style .= $paspartu_res_start . setsail_select_dynamic_css( $paspartu_selector, $paspartu_res_style ) . $paspartu_res_end;
		}
		
		if ( ! empty( $paspartu_header_responsive_style ) ) {
			$current_style .= $paspartu_res_start . setsail_select_dynamic_css( $paspartu_header_selector, $paspartu_header_responsive_style ) . $paspartu_res_end;
			$current_style .= $paspartu_res_start . setsail_select_dynamic_css( $paspartu_header_appear_selector, $paspartu_header_appear_responsive_style ) . $paspartu_res_end;
		}
		
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'setsail_select_filter_add_page_custom_style', 'setsail_select_page_general_style' );
}