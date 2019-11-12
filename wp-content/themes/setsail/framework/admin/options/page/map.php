<?php

if ( ! function_exists( 'setsail_select_page_options_map' ) ) {
	function setsail_select_page_options_map() {
		
		setsail_select_add_admin_page(
			array(
				'slug'  => '_page_page',
				'title' => esc_html__( 'Page', 'setsail' ),
				'icon'  => 'fa fa-file-text-o'
			)
		);
		
		/***************** Page Layout - begin **********************/
		
		$panel_sidebar = setsail_select_add_admin_panel(
			array(
				'page'  => '_page_page',
				'name'  => 'panel_sidebar',
				'title' => esc_html__( 'Page Style', 'setsail' )
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'name'        => 'page_grid_space',
				'type'        => 'select',
				'label'       => esc_html__( 'Grid Layout Space', 'setsail' ),
				'description' => esc_html__( 'Choose a space between content layout and sidebar layout for your page. (Applies to pages set to "Default Template")', 'setsail' ),
				'options'     => setsail_select_get_space_between_items_array( true ),
				'parent'      => $panel_sidebar
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'name'          => 'page_show_comments',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Comments', 'setsail' ),
				'description'   => esc_html__( 'Enabling this option will show comments on your page', 'setsail' ),
				'default_value' => 'yes',
				'parent'        => $panel_sidebar
			)
		);
		
		/***************** Page Layout - end **********************/
		
		/***************** Content Layout - begin **********************/
		
		$panel_content = setsail_select_add_admin_panel(
			array(
				'page'  => '_page_page',
				'name'  => 'panel_content',
				'title' => esc_html__( 'Content Style', 'setsail' )
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'content_padding',
				'default_value' => '',
				'label'         => esc_html__( 'Content Padding for Template in Full Width', 'setsail' ),
				'description'   => esc_html__( 'Enter padding for content area for templates in full width. If you set this value then it\'s important to set also Content padding for mobile header value in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'setsail' ),
				'args'          => array(
					'col_width' => 3
				),
				'parent'        => $panel_content
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'content_padding_in_grid',
				'default_value' => '',
				'label'         => esc_html__( 'Content Padding for Templates in Grid', 'setsail' ),
				'description'   => esc_html__( 'Enter padding for content area for Templates in grid. If you set this value then it\'s important to set also Content padding for mobile header value in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'setsail' ),
				'args'          => array(
					'col_width' => 3
				),
				'parent'        => $panel_content
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'content_padding_mobile',
				'default_value' => '',
				'label'         => esc_html__( 'Content Padding for Mobile Header', 'setsail' ),
				'description'   => esc_html__( 'Enter padding for content area for Mobile Header in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'setsail' ),
				'args'          => array(
					'col_width' => 3
				),
				'parent'        => $panel_content
			)
		);
		
		/***************** Content Layout - end **********************/
		
		/***************** Additional Page Layout - start *****************/
		
		do_action( 'setsail_select_action_additional_page_options_map' );
		
		/***************** Additional Page Layout - end *****************/
	}
	
	add_action( 'setsail_select_action_options_map', 'setsail_select_page_options_map', setsail_select_set_options_map_position( 'page' ) );
}

if ( ! function_exists( 'setsail_select_content_padding' ) ) {
	/**
	 * Function that return padding for content
	 */
	function setsail_select_content_padding( $style ) {
		$page_id      = setsail_select_get_page_id();
		$class_prefix = setsail_select_get_unique_page_class( $page_id, true );
		
		$return_style = '';
		$current_style_string = '';
		$current_mobile_style_string = '';
		
		$content_selector = array(
			$class_prefix . ' .qodef-content .qodef-content-inner > .qodef-container > .qodef-container-inner',
			$class_prefix . ' .qodef-content .qodef-content-inner > .qodef-full-width > .qodef-full-width-inner',
		);
		
		// general padding
		$content_style = array();
		
		$page_padding = $page_id > 0 ? get_post_meta( $page_id, 'qodef_page_content_padding', true ) : '';
		
		if ( $page_padding !== '' ) {
			$content_style['padding'] = $page_padding;
			
			$current_style_string .= setsail_select_dynamic_css( $content_selector, $content_style );
		}
		
		// mobile padding
		$content_mobile_style = array();
		
		$page_mobile_padding = $page_id > 0 ? get_post_meta( $page_id, 'qodef_page_content_padding_mobile', true ) : '';
		
		if ( $page_mobile_padding !== '' ) {
			$content_mobile_style['padding'] = $page_mobile_padding;
			
			$current_mobile_style_string .= setsail_select_dynamic_css( $content_selector, $content_mobile_style );
		}
		
		// print
		
		if ( ! empty( $current_style_string ) ) {
			$return_style .= $current_style_string;
		}
		
		if ( ! empty( $current_mobile_style_string ) ) {
			$return_style .= '@media only screen and (max-width: 1024px) {' . $current_mobile_style_string . '}';
		}
		
		$return_style .= $return_style . $style;
		
		return $return_style;
	}
	
	add_filter( 'setsail_select_filter_add_page_custom_style', 'setsail_select_content_padding' );
}