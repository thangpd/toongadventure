<?php

if ( ! function_exists( 'setsail_select_register_social_icons_widget' ) ) {
	/**
	 * Function that register social icon widget
	 */
	function setsail_select_register_social_icons_widget( $widgets ) {
		$widgets[] = 'SetSailSelectClassClassIconsGroupWidget';
		
		return $widgets;
	}
	
	add_filter( 'setsail_select_filter_register_widgets', 'setsail_select_register_social_icons_widget' );
}