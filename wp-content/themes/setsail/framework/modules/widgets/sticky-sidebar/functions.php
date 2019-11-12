<?php

if ( ! function_exists( 'setsail_select_register_sticky_sidebar_widget' ) ) {
	/**
	 * Function that register sticky sidebar widget
	 */
	function setsail_select_register_sticky_sidebar_widget( $widgets ) {
		$widgets[] = 'SetSailSelectClassStickySidebar';
		
		return $widgets;
	}
	
	add_filter( 'setsail_select_filter_register_widgets', 'setsail_select_register_sticky_sidebar_widget' );
}