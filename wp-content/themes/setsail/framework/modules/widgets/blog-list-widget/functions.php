<?php

if ( ! function_exists( 'setsail_select_register_blog_list_widget' ) ) {
	/**
	 * Function that register blog list widget
	 */
	function setsail_select_register_blog_list_widget( $widgets ) {
		$widgets[] = 'SetSailSelectClassBlogListWidget';
		
		return $widgets;
	}
	
	add_filter( 'setsail_select_filter_register_widgets', 'setsail_select_register_blog_list_widget' );
}