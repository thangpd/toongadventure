<?php

if ( ! function_exists( 'setsail_select_register_widgets' ) ) {
	function setsail_select_register_widgets() {
		$widgets = apply_filters( 'setsail_select_filter_register_widgets', $widgets = array() );
		
		foreach ( $widgets as $widget ) {
			register_widget( $widget );
		}
	}
	
	add_action( 'widgets_init', 'setsail_select_register_widgets' );
}