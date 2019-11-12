<?php

if ( ! function_exists( 'setsail_select_register_search_opener_widget' ) ) {
	/**
	 * Function that register search opener widget
	 */
	function setsail_select_register_search_opener_widget( $widgets ) {
		$widgets[] = 'SetSailSelectClassSearchOpener';
		
		return $widgets;
	}
	
	add_filter( 'setsail_select_filter_register_widgets', 'setsail_select_register_search_opener_widget' );
}