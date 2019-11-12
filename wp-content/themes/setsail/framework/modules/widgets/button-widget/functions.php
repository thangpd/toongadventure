<?php

if ( ! function_exists( 'setsail_select_register_button_widget' ) ) {
	/**
	 * Function that register button widget
	 */
	function setsail_select_register_button_widget( $widgets ) {
		$widgets[] = 'SetSailSelectClassButtonWidget';
		
		return $widgets;
	}
	
	add_filter( 'setsail_select_filter_register_widgets', 'setsail_select_register_button_widget' );
}