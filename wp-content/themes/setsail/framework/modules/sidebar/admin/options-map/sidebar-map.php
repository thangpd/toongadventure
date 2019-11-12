<?php

if ( ! function_exists( 'setsail_select_sidebar_options_map' ) ) {
	function setsail_select_sidebar_options_map() {
		
		setsail_select_add_admin_page(
			array(
				'slug'  => '_sidebar_page',
				'title' => esc_html__( 'Sidebar Area', 'setsail' ),
				'icon'  => 'fa fa-indent'
			)
		);
		
		$sidebar_panel = setsail_select_add_admin_panel(
			array(
				'title' => esc_html__( 'Sidebar Area', 'setsail' ),
				'name'  => 'sidebar',
				'page'  => '_sidebar_page'
			)
		);
		
		setsail_select_add_admin_field( array(
			'name'          => 'sidebar_layout',
			'type'          => 'select',
			'label'         => esc_html__( 'Sidebar Layout', 'setsail' ),
			'description'   => esc_html__( 'Choose a sidebar layout for pages', 'setsail' ),
			'parent'        => $sidebar_panel,
			'default_value' => 'no-sidebar',
            'options'       => setsail_select_get_custom_sidebars_options()
		) );
		
		$setsail_custom_sidebars = setsail_select_get_custom_sidebars();
		if ( count( $setsail_custom_sidebars ) > 0 ) {
			setsail_select_add_admin_field( array(
				'name'        => 'custom_sidebar_area',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'setsail' ),
				'description' => esc_html__( 'Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'setsail' ),
				'parent'      => $sidebar_panel,
				'options'     => $setsail_custom_sidebars,
				'args'        => array(
					'select2' => true
				)
			) );
		}
	}
	
	add_action( 'setsail_select_action_options_map', 'setsail_select_sidebar_options_map', setsail_select_set_options_map_position( 'sidebar' ) );
}