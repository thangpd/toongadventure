<?php

if ( ! function_exists( 'setsail_select_load_modules' ) ) {
	/**
	 * Loades all modules by going through all folders that are placed directly in modules folder
	 * and loads load.php file in each. Hooks to setsail_select_action_after_options_map action
	 *
	 * @see http://php.net/manual/en/function.glob.php
	 */
	function setsail_select_load_modules() {
		foreach ( glob( SELECT_FRAMEWORK_ROOT_DIR . '/modules/*/load.php' ) as $module_load ) {
			include_once $module_load;
		}
	}
	
	add_action( 'setsail_select_action_before_options_map', 'setsail_select_load_modules' );
}
