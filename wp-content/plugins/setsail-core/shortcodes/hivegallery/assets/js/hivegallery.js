(function($) {
    'use strict';
	
	var hivegallery = {};
	qodef.modules.hivegallery = hivegallery;

	hivegallery.qodefInitHivegallery = qodefInitHivegallery;


	hivegallery.qodefOnDocumentReady = qodefOnDocumentReady;
	
	$(document).ready(qodefOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function qodefOnDocumentReady() {
		qodefInitHivegallery();
	}
	
	/**
	 * Init accordions shortcode
	 */
	function qodefInitHivegallery(){

	}

})(jQuery);