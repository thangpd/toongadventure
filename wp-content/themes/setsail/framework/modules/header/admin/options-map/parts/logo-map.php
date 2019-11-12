<?php

if ( ! function_exists( 'setsail_select_logo_options_map' ) ) {
	function setsail_select_logo_options_map() {
		
		setsail_select_add_admin_page(
			array(
				'slug'  => '_logo_page',
				'title' => esc_html__( 'Logo', 'setsail' ),
				'icon'  => 'fa fa-coffee'
			)
		);
		
		$panel_logo = setsail_select_add_admin_panel(
			array(
				'page'  => '_logo_page',
				'name'  => 'panel_logo',
				'title' => esc_html__( 'Logo', 'setsail' )
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'parent'        => $panel_logo,
				'type'          => 'yesno',
				'name'          => 'hide_logo',
				'default_value' => 'no',
				'label'         => esc_html__( 'Hide Logo', 'setsail' ),
				'description'   => esc_html__( 'Enabling this option will hide logo image', 'setsail' )
			)
		);
		
		$hide_logo_container = setsail_select_add_admin_container(
			array(
				'parent'          => $panel_logo,
				'name'            => 'hide_logo_container',
				'dependency' => array(
					'hide' => array(
						'hide_logo'  => 'yes'
					)
				)
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'name'          => 'logo_image',
				'type'          => 'image',
				'default_value' => SELECT_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Default', 'setsail' ),
				'parent'        => $hide_logo_container
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'name'          => 'logo_image_dark',
				'type'          => 'image',
				'default_value' => SELECT_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Dark', 'setsail' ),
				'parent'        => $hide_logo_container
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'name'          => 'logo_image_light',
				'type'          => 'image',
				'default_value' => SELECT_ASSETS_ROOT . "/img/logo_white.png",
				'label'         => esc_html__( 'Logo Image - Light', 'setsail' ),
				'parent'        => $hide_logo_container
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'name'          => 'logo_image_sticky',
				'type'          => 'image',
				'default_value' => SELECT_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Sticky', 'setsail' ),
				'parent'        => $hide_logo_container
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'name'          => 'logo_image_mobile',
				'type'          => 'image',
				'default_value' => SELECT_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Mobile', 'setsail' ),
				'parent'        => $hide_logo_container
			)
		);
	}
	
	add_action( 'setsail_select_action_options_map', 'setsail_select_logo_options_map', setsail_select_set_options_map_position( 'logo' ) );
}