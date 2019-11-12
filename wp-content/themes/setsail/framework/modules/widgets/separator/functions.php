<?php

if ( ! function_exists( 'setsail_select_register_separator_widget' ) ) {
	/**
	 * Function that register separator widget
	 */
	function setsail_select_register_separator_widget( $widgets ) {
		$widgets[] = 'SetSailSelectClassSeparatorWidget';
		
		return $widgets;
	}
	
	add_filter( 'setsail_select_filter_register_widgets', 'setsail_select_register_separator_widget' );
}