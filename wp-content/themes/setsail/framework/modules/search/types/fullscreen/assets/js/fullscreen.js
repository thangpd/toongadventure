(function($) {
	"use strict";
	
	var searchFullScreen = {};
	qodef.modules.searchFullScreen = searchFullScreen;
	
	searchFullScreen.qodefOnDocumentReady = qodefOnDocumentReady;
	
	$(document).ready(qodefOnDocumentReady);
	
	/* 
	* All functions to be called on $(document).ready() should be in this function
	*/
	function qodefOnDocumentReady() {
		qodefSearchFullScreen();
		qodefSearchFullScreenLoad();
	}
	
	/**
	 * Init Search Types
	 */
	function qodefSearchFullScreen() {
		if ( qodef.body.hasClass( 'qodef-fullscreen-search' ) ) {
			var searchOpener = $('a.qodef-search-opener');
			
			if (searchOpener.length > 0) {
				var searchHolder = $('.qodef-fullscreen-search-holder'),
					searchClose = $('.qodef-search-close');
				
				searchOpener.on('click', function (e) {
					e.preventDefault();
					
					if (searchHolder.hasClass('qodef-animate')) {
						qodef.body.removeClass('qodef-fullscreen-search-opened qodef-search-fade-out');
						qodef.body.removeClass('qodef-search-fade-in');
						searchHolder.removeClass('qodef-animate');
						
						setTimeout(function () {
							searchHolder.find('.qodef-search-field').val('');
							searchHolder.find('.qodef-search-field').blur();
						}, 300);
						
						qodef.modules.common.qodefEnableScroll();
					} else {
						qodef.body.addClass('qodef-fullscreen-search-opened qodef-search-fade-in');
						qodef.body.removeClass('qodef-search-fade-out');
						searchHolder.addClass('qodef-animate');
						
						setTimeout(function () {
							searchHolder.find('.qodef-search-field').focus();
						}, 900);
						
						qodef.modules.common.qodefDisableScroll();
					}
					
					searchClose.on('click', function (e) {
						e.preventDefault();
						qodef.body.removeClass('qodef-fullscreen-search-opened qodef-search-fade-in');
						qodef.body.addClass('qodef-search-fade-out');
						searchHolder.removeClass('qodef-animate');
						
						setTimeout(function () {
							searchHolder.find('.qodef-search-field').val('');
							searchHolder.find('.qodef-search-field').blur();
						}, 300);
						
						qodef.modules.common.qodefEnableScroll();
					});
					
					//Close on click away
					$(document).mouseup(function (e) {
						var container = $(".qodef-form-holder-inner");
						
						if (!container.is(e.target) && container.has(e.target).length === 0) {
							e.preventDefault();
							qodef.body.removeClass('qodef-fullscreen-search-opened qodef-search-fade-in');
							qodef.body.addClass('qodef-search-fade-out');
							searchHolder.removeClass('qodef-animate');
							
							setTimeout(function () {
								searchHolder.find('.qodef-search-field').val('');
								searchHolder.find('.qodef-search-field').blur();
							}, 300);
							
							qodef.modules.common.qodefEnableScroll();
						}
					});
					
					//Close on escape
					$(document).keyup(function (e) {
						if (e.keyCode === 27) { //KeyCode for ESC button is 27
							qodef.body.removeClass('qodef-fullscreen-search-opened qodef-search-fade-in');
							qodef.body.addClass('qodef-search-fade-out');
							searchHolder.removeClass('qodef-animate');
							
							setTimeout(function () {
								searchHolder.find('.qodef-search-field').val('');
								searchHolder.find('.qodef-search-field').blur();
							}, 300);
							
							qodef.modules.common.qodefEnableScroll();
						}
					});
				});
			}
		}
	}
	
	function qodefSearchFullScreenLoad() {
		var searchPostTypeHolder = $('.qodef-flp-search-field-holder');
		
		if (searchPostTypeHolder.length) {
			searchPostTypeHolder.each(function () {
				var thisSearch = $(this),
					searchField = thisSearch.find('.qodef-search-field'),
					resultsHolder = thisSearch.siblings('.qodef-flp-search-results'),
					searchLoading = thisSearch.find('.qodef-search-loading'),
					searchIcon = thisSearch.find('.qodef-search-icon');
				
				searchLoading.addClass('qodef-hidden');
				
				var postType = thisSearch.data('post-type'),
					keyPressTimeout;
				
				searchField.on('keyup paste', function() {
					var field = $(this);
					field.attr('autocomplete','off');
					searchLoading.removeClass('qodef-hidden');
					searchIcon.addClass('qodef-hidden');
					clearTimeout(keyPressTimeout);
					
					keyPressTimeout = setTimeout( function() {
						var searchTerm = field.val();
						
						if(searchTerm.length < 3) {
							resultsHolder.html('');
							resultsHolder.fadeOut();
							searchLoading.addClass('qodef-hidden');
							searchIcon.removeClass('qodef-hidden');
						} else {
							var ajaxData = {
								action: 'setsail_select_fullscreen_search_post_types',
								term: searchTerm,
								postType: postType,
								search_post_types_nonce: $('input[name="qodef_fullscreen_search_post_types_nonce"]').val()
							};
							
							$.ajax({
								type: 'POST',
								data: ajaxData,
								url: qodefGlobalVars.vars.qodefAjaxUrl,
								success: function (data) {
									var response = JSON.parse(data);
									if (response.status === 'success') {
										searchLoading.addClass('qodef-hidden');
										searchIcon.removeClass('qodef-hidden');
										resultsHolder.html(response.data.html);
										resultsHolder.fadeIn();
									}
								},
								error: function(XMLHttpRequest, textStatus, errorThrown) {
									console.log("Status: " + textStatus);
									console.log("Error: " + errorThrown);
									searchLoading.addClass('qodef-hidden');
									searchIcon.removeClass('qodef-hidden');
									resultsHolder.fadeOut();
								}
							});
						}
					}, 500);
				});
				
				searchField.on('focusout', function () {
					searchLoading.addClass('qodef-hidden');
					searchIcon.removeClass('qodef-hidden');
					resultsHolder.fadeOut();
				});
			});
		}
	}
	
})(jQuery);