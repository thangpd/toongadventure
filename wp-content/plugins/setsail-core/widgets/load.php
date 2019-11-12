<?php

if ( ! function_exists( 'setsail_select_load_widget_class' ) ) {
	/**
	 * Loades widget class file.
	 */
	function setsail_select_load_widget_class() {
		include_once 'widget-class.php';
	}
	
	add_action( 'setsail_select_action_before_options_map', 'setsail_select_load_widget_class' );
}


if ( ! function_exists( 'setsail_select_load_widgets' ) ) {
	/**
	 * Loades all widgets by going through all folders that are placed directly in widgets folder
	 * and loads load.php file in each. Hooks to setsail_select_action_after_options_map action
	 */
	function setsail_select_load_widgets() {
		
		foreach ( glob( SELECT_FRAMEWORK_ROOT_DIR . '/modules/widgets/*/load.php' ) as $widget_load ) {
			include_once $widget_load;
		}
		
		include_once 'widget-loader.php';
	}
	
	add_action( 'setsail_select_action_before_options_map', 'setsail_select_load_widgets' );
}