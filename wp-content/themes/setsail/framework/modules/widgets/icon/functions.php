<?php

if ( ! function_exists( 'setsail_select_register_icon_widget' ) ) {
	/**
	 * Function that register icon widget
	 */
	function setsail_select_register_icon_widget( $widgets ) {
		$widgets[] = 'SetSailSelectClassIconWidget';
		
		return $widgets;
	}
	
	add_filter( 'setsail_select_filter_register_widgets', 'setsail_select_register_icon_widget' );
}