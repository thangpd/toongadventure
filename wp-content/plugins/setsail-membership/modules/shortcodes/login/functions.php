<?php

if ( ! function_exists( 'setsail_membership_add_login_shortcodes' ) ) {
	function setsail_membership_add_login_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'SetSailMembership\Shortcodes\SetSailUserLogin\SetSailUserLogin'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'setsail_membership_filter_add_vc_shortcode', 'setsail_membership_add_login_shortcodes' );
}