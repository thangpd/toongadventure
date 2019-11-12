<?php

if ( ! function_exists( 'setsail_select_include_mobile_header_menu' ) ) {
	function setsail_select_include_mobile_header_menu( $menus ) {
		$menus['mobile-navigation'] = esc_html__( 'Mobile Navigation', 'setsail' );
		
		return $menus;
	}
	
	add_filter( 'setsail_select_filter_register_headers_menu', 'setsail_select_include_mobile_header_menu' );
}

if ( ! function_exists( 'setsail_select_register_mobile_header_areas' ) ) {
	/**
	 * Registers widget areas for mobile header
	 */
	function setsail_select_register_mobile_header_areas() {
		if ( setsail_select_is_responsive_on() && setsail_select_core_plugin_installed() ) {
			register_sidebar(
				array(
					'id'            => 'qodef-right-from-mobile-logo',
					'name'          => esc_html__( 'Mobile Header Widget Area', 'setsail' ),
					'description'   => esc_html__( 'Widgets added here will appear on the right hand side on mobile header', 'setsail' ),
					'before_widget' => '<div id="%1$s" class="widget %2$s qodef-right-from-mobile-logo">',
					'after_widget'  => '</div>'
				)
			);
		}
	}
	
	add_action( 'widgets_init', 'setsail_select_register_mobile_header_areas' );
}

if ( ! function_exists( 'setsail_select_mobile_header_class' ) ) {
	function setsail_select_mobile_header_class( $classes ) {
		$classes[] = 'qodef-default-mobile-header qodef-sticky-up-mobile-header';
		
		return $classes;
	}
	
	add_filter( 'body_class', 'setsail_select_mobile_header_class' );
}

if ( ! function_exists( 'setsail_select_get_mobile_header' ) ) {
	/**
	 * Loads mobile header HTML only if responsiveness is enabled
	 */
	function setsail_select_get_mobile_header( $slug = '', $module = '' ) {
		if ( setsail_select_is_responsive_on() ) {
			$mobile_menu_title = setsail_select_options()->getOptionValue( 'mobile_menu_title' );
			$has_navigation    = has_nav_menu( 'main-navigation' ) || has_nav_menu( 'mobile-navigation' );
			
			$parameters = array(
				'show_navigation_opener' => $has_navigation,
				'mobile_menu_title'      => $mobile_menu_title,
				'mobile_icon_class'		 => setsail_select_get_mobile_navigation_icon_class()
			);

            $module = apply_filters('setsail_select_filter_mobile_menu_module', 'header/types/mobile-header');
            $slug = apply_filters('setsail_select_filter_mobile_menu_slug', '');
            $parameters = apply_filters('setsail_select_filter_mobile_menu_parameters', $parameters);

            setsail_select_get_module_template_part( 'templates/mobile-header', $module, $slug, $parameters );
		}
	}
	
	add_action( 'setsail_select_action_after_wrapper_inner', 'setsail_select_get_mobile_header', 20 );
}

if ( ! function_exists( 'setsail_select_get_mobile_logo' ) ) {
	/**
	 * Loads mobile logo HTML. It checks if mobile logo image is set and uses that, else takes normal logo image
	 */
	function setsail_select_get_mobile_logo() {
		$show_logo_image = setsail_select_options()->getOptionValue( 'hide_logo' ) === 'yes' ? false : true;
		
		if ( $show_logo_image ) {
			$page_id       = setsail_select_get_page_id();
			$header_height = setsail_select_set_default_mobile_menu_height_for_header_types();
			
			$mobile_logo_image = setsail_select_get_meta_field_intersect( 'logo_image_mobile', $page_id );
			
			//check if mobile logo has been set and use that, else use normal logo
			$logo_image = ! empty( $mobile_logo_image ) ? $mobile_logo_image : setsail_select_get_meta_field_intersect( 'logo_image', $page_id );
			
			//get logo image dimensions and set style attribute for image link.
			$logo_dimensions = setsail_select_get_image_dimensions( $logo_image );
			
			$logo_styles = '';
			if ( is_array( $logo_dimensions ) && array_key_exists( 'height', $logo_dimensions ) ) {
				$logo_height = $logo_dimensions['height'];
				$logo_styles = 'height: ' . intval( $logo_height / 2 ) . 'px'; //divided with 2 because of retina screens
			} else if ( ! empty( $header_height ) && empty( $logo_dimensions ) ) {
				$logo_styles = 'height: ' . intval( $header_height / 2 ) . 'px;'; //divided with 2 because of retina screens
			}
			
			//set parameters for logo
			$parameters = array(
				'logo_image'      => $logo_image,
				'logo_dimensions' => $logo_dimensions,
				'logo_styles'     => $logo_styles
			);
			
			setsail_select_get_module_template_part( 'templates/mobile-logo', 'header/types/mobile-header', '', $parameters );
		}
	}
}

if ( ! function_exists( 'setsail_select_get_mobile_nav' ) ) {
	/**
	 * Loads mobile navigation HTML
	 */
	function setsail_select_get_mobile_nav() {
		setsail_select_get_module_template_part( 'templates/mobile-navigation', 'header/types/mobile-header' );
	}
}

if ( ! function_exists( 'setsail_select_mobile_header_per_page_js_var' ) ) {
    function setsail_select_mobile_header_per_page_js_var( $perPageVars ) {
        $perPageVars['qodefMobileHeaderHeight'] = setsail_select_set_default_mobile_menu_height_for_header_types();

        return $perPageVars;
    }

    add_filter( 'setsail_select_filter_per_page_js_vars', 'setsail_select_mobile_header_per_page_js_var' );
}

if ( ! function_exists( 'setsail_select_get_mobile_navigation_icon_class' ) ) {
	/**
	 * Loads mobile navigation icon class
	 */
	function setsail_select_get_mobile_navigation_icon_class() {
		$classes = array(
			'qodef-mobile-menu-opener'
		);
		
		$classes[] = setsail_select_get_icon_sources_class( 'mobile', 'qodef-mobile-menu-opener' );

		return $classes;
	}
}