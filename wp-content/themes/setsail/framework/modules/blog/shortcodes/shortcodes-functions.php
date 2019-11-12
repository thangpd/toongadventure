<?php

if ( ! function_exists( 'setsail_select_include_blog_shortcodes' ) ) {
	function setsail_select_include_blog_shortcodes() {
		foreach ( glob( SELECT_FRAMEWORK_MODULES_ROOT_DIR . '/blog/shortcodes/*/load.php' ) as $shortcode_load ) {
			include_once $shortcode_load;
		}
	}
	
	if ( setsail_select_core_plugin_installed() ) {
		add_action( 'setsail_core_action_include_shortcodes_file', 'setsail_select_include_blog_shortcodes' );
	}
}
