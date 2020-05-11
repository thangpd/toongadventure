(function($) {
    'use strict';
	
	var customheader = {};
	qodef.modules.customheader = customheader;

	customheader.qodefInitCustomheader = qodefInitCustomheader;


	customheader.qodefOnDocumentReady = qodefOnDocumentReady;
	
	$(document).ready(qodefOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function qodefOnDocumentReady() {
		qodefInitCustomheader();
	}
	
	/**
	 * Init accordions shortcode
	 */
	function qodefInitCustomheader(){

	}

})(jQuery);