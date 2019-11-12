<?php

if ( ! function_exists( 'setsail_core_add_dropcaps_shortcodes' ) ) {
	function setsail_core_add_dropcaps_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'SetSailCore\CPT\Shortcodes\Dropcaps\Dropcaps'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'setsail_core_filter_add_vc_shortcode', 'setsail_core_add_dropcaps_shortcodes' );
}