<?php

if ( ! function_exists( 'setsail_select_register_sidearea_opener_widget' ) ) {
	/**
	 * Function that register sidearea opener widget
	 */
	function setsail_select_register_sidearea_opener_widget( $widgets ) {
		$widgets[] = 'SetSailSelectClassSideAreaOpener';
		
		return $widgets;
	}
	
	add_filter( 'setsail_select_filter_register_widgets', 'setsail_select_register_sidearea_opener_widget' );
}