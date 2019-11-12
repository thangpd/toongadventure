<?php

if ( ! function_exists( 'setsail_select_register_author_info_widget' ) ) {
	/**
	 * Function that register author info widget
	 */
	function setsail_select_register_author_info_widget( $widgets ) {
		$widgets[] = 'SetSailSelectClassAuthorInfoWidget';
		
		return $widgets;
	}
	
	add_filter( 'setsail_select_filter_register_widgets', 'setsail_select_register_author_info_widget' );
}