<?php

if ( ! function_exists( 'setsail_select_register_social_icon_widget' ) ) {
	/**
	 * Function that register social icon widget
	 */
	function setsail_select_register_social_icon_widget( $widgets ) {
		$widgets[] = 'SetSailSelectClassSocialIconWidget';
		
		return $widgets;
	}
	
	add_filter( 'setsail_select_filter_register_widgets', 'setsail_select_register_social_icon_widget' );
}