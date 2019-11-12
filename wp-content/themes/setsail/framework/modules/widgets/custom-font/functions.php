<?php

if ( ! function_exists( 'setsail_select_register_custom_font_widget' ) ) {
	/**
	 * Function that register custom font widget
	 */
	function setsail_select_register_custom_font_widget( $widgets ) {
		$widgets[] = 'SetSailSelectClassCustomFontWidget';
		
		return $widgets;
	}
	
	add_filter( 'setsail_select_filter_register_widgets', 'setsail_select_register_custom_font_widget' );
}