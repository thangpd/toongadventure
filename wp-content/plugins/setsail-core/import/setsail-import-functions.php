<?php

if ( ! function_exists( 'setsail_core_import_object' ) ) {
	function setsail_core_import_object() {
		$setsail_core_import_object = new SetSailCoreImport();
	}
	
	add_action( 'init', 'setsail_core_import_object' );
}

if ( ! function_exists( 'setsail_core_data_import' ) ) {
	function setsail_core_data_import() {
		$importObject = SetSailCoreImport::getInstance();
		
		if ( $_POST['import_attachments'] == 1 ) {
			$importObject->attachments = true;
		} else {
			$importObject->attachments = false;
		}
		
		$folder = "setsail/";
		if ( ! empty( $_POST['example'] ) ) {
			$folder = $_POST['example'] . "/";
		}
		
		$importObject->import_content( $folder . $_POST['xml'] );
		
		die();
	}
	
	add_action( 'wp_ajax_setsail_core_data_import', 'setsail_core_data_import' );
}

if ( ! function_exists( 'setsail_core_widgets_import' ) ) {
	function setsail_core_widgets_import() {
		$importObject = SetSailCoreImport::getInstance();
		
		$folder = "setsail/";
		if ( ! empty( $_POST['example'] ) ) {
			$folder = $_POST['example'] . "/";
		}
		
		$importObject->import_widgets( $folder . 'widgets.txt', $folder . 'custom_sidebars.txt' );
		
		die();
	}
	
	add_action( 'wp_ajax_setsail_core_widgets_import', 'setsail_core_widgets_import' );
}

if ( ! function_exists( 'setsail_core_options_import' ) ) {
	function setsail_core_options_import() {
		$importObject = SetSailCoreImport::getInstance();
		
		$folder = "setsail/";
		if ( ! empty( $_POST['example'] ) ) {
			$folder = $_POST['example'] . "/";
		}
		
		$importObject->import_options( $folder . 'options.txt' );
		
		die();
	}
	
	add_action( 'wp_ajax_setsail_core_options_import', 'setsail_core_options_import' );
}

if ( ! function_exists( 'setsail_core_other_import' ) ) {
	function setsail_core_other_import() {
		$importObject = SetSailCoreImport::getInstance();
		
		$folder = "setsail/";
		if ( ! empty( $_POST['example'] ) ) {
			$folder = $_POST['example'] . "/";
		}
		
		$importObject->import_options( $folder . 'options.txt' );
		$importObject->import_widgets( $folder . 'widgets.txt', $folder . 'custom_sidebars.txt' );
		$importObject->import_menus( $folder . 'menus.txt' );
		$importObject->import_settings_pages( $folder . 'settingpages.txt' );

		$importObject->qodef_update_meta_fields_after_import($folder);
		$importObject->qodef_update_options_after_import($folder);

		if ( setsail_core_is_revolution_slider_installed() ) {
			$importObject->rev_slider_import( $folder );
		}
		
		die();
	}
	
	add_action( 'wp_ajax_setsail_core_other_import', 'setsail_core_other_import' );
}