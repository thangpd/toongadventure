<?php

if ( ! function_exists( 'setsail_select_register_image_gallery_widget' ) ) {
	/**
	 * Function that register image gallery widget
	 */
	function setsail_select_register_image_gallery_widget( $widgets ) {
		$widgets[] = 'SetSailSelectClassImageGalleryWidget';
		
		return $widgets;
	}
	
	add_filter( 'setsail_select_filter_register_widgets', 'setsail_select_register_image_gallery_widget' );
}