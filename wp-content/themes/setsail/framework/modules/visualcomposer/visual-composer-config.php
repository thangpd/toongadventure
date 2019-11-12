<?php

/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
if ( function_exists( 'vc_set_as_theme' ) ) {
	vc_set_as_theme( true );
}

/**
 * Change path for overridden templates
 */
if ( function_exists( 'vc_set_shortcodes_templates_dir' ) ) {
	$dir = SELECT_ROOT_DIR . '/vc-templates';
	vc_set_shortcodes_templates_dir( $dir );
}

if ( ! function_exists( 'setsail_select_configure_visual_composer_frontend_editor' ) ) {
	/**
	 * Configuration for Visual Composer FrontEnd Editor
	 * Hooks on vc_after_init action
	 */
	function setsail_select_configure_visual_composer_frontend_editor() {
		/**
		 * Remove frontend editor
		 */
		if ( function_exists( 'vc_disable_frontend' ) ) {
			vc_disable_frontend();
		}
	}
	
	add_action( 'vc_after_init', 'setsail_select_configure_visual_composer_frontend_editor' );
}

if ( ! function_exists( 'setsail_select_vc_row_map' ) ) {
	/**
	 * Map VC Row shortcode
	 * Hooks on vc_after_init action
	 */
	function setsail_select_vc_row_map() {
		
		/******* VC Row shortcode - begin *******/
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_content_width',
				'heading'    => esc_html__( 'Select Row Content Width', 'setsail' ),
				'value'      => array(
					esc_html__( 'Full Width', 'setsail' ) => 'full-width',
					esc_html__( 'In Grid', 'setsail' )    => 'grid'
				),
				'group'      => esc_html__( 'Select Settings', 'setsail' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'anchor',
				'heading'     => esc_html__( 'Select Anchor ID', 'setsail' ),
				'description' => esc_html__( 'For example "home"', 'setsail' ),
				'group'       => esc_html__( 'Select Settings', 'setsail' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'colorpicker',
				'param_name' => 'simple_background_color',
				'heading'    => esc_html__( 'Select Background Color', 'setsail' ),
				'group'      => esc_html__( 'Select Settings', 'setsail' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'attach_image',
				'param_name' => 'simple_background_image',
				'heading'    => esc_html__( 'Select Background Image', 'setsail' ),
				'group'      => esc_html__( 'Select Settings', 'setsail' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'background_image_position',
				'heading'     => esc_html__( 'Select Background Position', 'setsail' ),
				'description' => esc_html__( 'Set the starting position of a background image, default value is top left', 'setsail' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Select Settings', 'setsail' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'dropdown',
				'param_name'  => 'disable_background_image',
				'heading'     => esc_html__( 'Select Disable Background Image', 'setsail' ),
				'value'       => array(
					esc_html__( 'Never', 'setsail' )        => '',
					esc_html__( 'Below 1280px', 'setsail' ) => '1280',
					esc_html__( 'Below 1024px', 'setsail' ) => '1024',
					esc_html__( 'Below 768px', 'setsail' )  => '768',
					esc_html__( 'Below 680px', 'setsail' )  => '680',
					esc_html__( 'Below 480px', 'setsail' )  => '480'
				),
				'save_always' => true,
				'description' => esc_html__( 'Choose on which stage you hide row background image', 'setsail' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Select Settings', 'setsail' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'attach_image',
				'param_name' => 'parallax_background_image',
				'heading'    => esc_html__( 'Select Parallax Background Image', 'setsail' ),
				'group'      => esc_html__( 'Select Settings', 'setsail' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'parallax_bg_speed',
				'heading'     => esc_html__( 'Select Parallax Speed', 'setsail' ),
				'description' => esc_html__( 'Set your parallax speed. Default value is 1.', 'setsail' ),
				'dependency'  => array( 'element' => 'parallax_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Select Settings', 'setsail' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'textfield',
				'param_name' => 'parallax_bg_height',
				'heading'    => esc_html__( 'Select Parallax Section Height (px)', 'setsail' ),
				'dependency' => array( 'element' => 'parallax_background_image', 'not_empty' => true ),
				'group'      => esc_html__( 'Select Settings', 'setsail' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'content_text_aligment',
				'heading'    => esc_html__( 'Select Content Aligment', 'setsail' ),
				'value'      => array(
					esc_html__( 'Default', 'setsail' ) => '',
					esc_html__( 'Left', 'setsail' )    => 'left',
					esc_html__( 'Center', 'setsail' )  => 'center',
					esc_html__( 'Right', 'setsail' )   => 'right'
				),
				'group'      => esc_html__( 'Select Settings', 'setsail' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_has_shadow',
				'heading'    => esc_html__( 'Select Set Row Shadow', 'setsail' ),
				'value'      => array_flip( setsail_select_get_yes_no_select_array( false ) ),
				'group'      => esc_html__( 'Select Settings', 'setsail' )
			)
		);

		do_action( 'setsail_select_action_additional_vc_row_params' );
		
		/******* VC Row shortcode - end *******/
		
		/******* VC Row Inner shortcode - begin *******/
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_content_width',
				'heading'    => esc_html__( 'Select Row Content Width', 'setsail' ),
				'value'      => array(
					esc_html__( 'Full Width', 'setsail' ) => 'full-width',
					esc_html__( 'In Grid', 'setsail' )    => 'grid'
				),
				'group'      => esc_html__( 'Select Settings', 'setsail' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'colorpicker',
				'param_name' => 'simple_background_color',
				'heading'    => esc_html__( 'Select Background Color', 'setsail' ),
				'group'      => esc_html__( 'Select Settings', 'setsail' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'attach_image',
				'param_name' => 'simple_background_image',
				'heading'    => esc_html__( 'Select Background Image', 'setsail' ),
				'group'      => esc_html__( 'Select Settings', 'setsail' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'        => 'textfield',
				'param_name'  => 'background_image_position',
				'heading'     => esc_html__( 'Select Background Position', 'setsail' ),
				'description' => esc_html__( 'Set the starting position of a background image, default value is top left', 'setsail' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Select Settings', 'setsail' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'        => 'dropdown',
				'param_name'  => 'disable_background_image',
				'heading'     => esc_html__( 'Select Disable Background Image', 'setsail' ),
				'value'       => array(
					esc_html__( 'Never', 'setsail' )        => '',
					esc_html__( 'Below 1280px', 'setsail' ) => '1280',
					esc_html__( 'Below 1024px', 'setsail' ) => '1024',
					esc_html__( 'Below 768px', 'setsail' )  => '768',
					esc_html__( 'Below 680px', 'setsail' )  => '680',
					esc_html__( 'Below 480px', 'setsail' )  => '480'
				),
				'save_always' => true,
				'description' => esc_html__( 'Choose on which stage you hide row background image', 'setsail' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Select Settings', 'setsail' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'dropdown',
				'param_name' => 'content_text_aligment',
				'heading'    => esc_html__( 'Select Content Aligment', 'setsail' ),
				'value'      => array(
					esc_html__( 'Default', 'setsail' ) => '',
					esc_html__( 'Left', 'setsail' )    => 'left',
					esc_html__( 'Center', 'setsail' )  => 'center',
					esc_html__( 'Right', 'setsail' )   => 'right'
				),
				'group'      => esc_html__( 'Select Settings', 'setsail' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_has_shadow',
				'heading'    => esc_html__( 'Select Set Row Shadow', 'setsail' ),
				'value'      => array_flip( setsail_select_get_yes_no_select_array( false ) ),
				'group'      => esc_html__( 'Select Settings', 'setsail' )
			)
		);
		
		/******* VC Row Inner shortcode - end *******/
		
		/******* VC Revolution Slider shortcode - begin *******/
		
		if ( setsail_select_revolution_slider_installed() ) {
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'enable_paspartu',
					'heading'     => esc_html__( 'Select Enable Passepartout', 'setsail' ),
					'value'       => array_flip( setsail_select_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'group'       => esc_html__( 'Select Settings', 'setsail' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'paspartu_size',
					'heading'     => esc_html__( 'Select Passepartout Size', 'setsail' ),
					'value'       => array(
						esc_html__( 'Tiny', 'setsail' )   => 'tiny',
						esc_html__( 'Small', 'setsail' )  => 'small',
						esc_html__( 'Normal', 'setsail' ) => 'normal',
						esc_html__( 'Large', 'setsail' )  => 'large'
					),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Select Settings', 'setsail' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'disable_side_paspartu',
					'heading'     => esc_html__( 'Select Disable Side Passepartout', 'setsail' ),
					'value'       => array_flip( setsail_select_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Select Settings', 'setsail' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'disable_top_paspartu',
					'heading'     => esc_html__( 'Select Disable Top Passepartout', 'setsail' ),
					'value'       => array_flip( setsail_select_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Select Settings', 'setsail' )
				)
			);
		}
		
		/******* VC Revolution Slider shortcode - end *******/
	}
	
	add_action( 'vc_after_init', 'setsail_select_vc_row_map' );
}