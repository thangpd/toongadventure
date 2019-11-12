(function($) {
    'use strict';

    var destinations = {};
    if(typeof qodef !== 'undefined'){
        qodef.modules.destinations = destinations;
    }
    
    destinations.qodefOnDocumentReady = qodefOnDocumentReady;
    destinations.qodefOnWindowLoad = qodefOnWindowLoad;
    destinations.qodefOnWindowResize = qodefOnWindowResize;
    destinations.qodefOnWindowScroll = qodefOnWindowScroll;

    $(document).ready(qodefOnDocumentReady);
    $(window).load(qodefOnWindowLoad);
    $(window).resize(qodefOnWindowResize);
    $(window).scroll(qodefOnWindowScroll);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function qodefOnDocumentReady() {
	    destinationShortcodeSearchFilters().fieldsHelper.init();
    }

    /*
     All functions to be called on $(window).load() should be in this function
     */
    function qodefOnWindowLoad() {
    }

    /*
     All functions to be called on $(window).resize() should be in this function
     */
    function qodefOnWindowResize() {
    }

    /*
     All functions to be called on $(window).scroll() should be in this function
     */
    function qodefOnWindowScroll() {
    }

    function themeInstalled() {
        return typeof qodef !== 'undefined';
    }
    
    function destinationShortcodeSearchFilters() {
        var $searchForms = $('.qodef-tours-filter-holder.qodef-tours-filter-horizontal form');
        var $searchFormsVerticalSmall = $('.qodef-tours-filter-holder.qodef-tours-filter-vertical-small form');
        
        var fieldsHelper = function() {
            
            var initDestinationSearch = function() {
                var destinations = typeof qodefToursSearchData !== 'undefined' ? qodefToursSearchData.destinations : [];
                
                var destinations = new Bloodhound({
                    datumTokenizer: Bloodhound.tokenizers.whitespace,
                    queryTokenizer: Bloodhound.tokenizers.whitespace,
                    local: destinations
                });
                
                $searchForms.find('.qodef-tours-destination-search').typeahead ({
                        hint: true,
                        highlight: true,
                        minLength: 1
                    },
                    {
                        name: 'destinations',
                        source: destinations
                    });
	
	            $searchFormsVerticalSmall.find('.qodef-tours-destination-search').typeahead ({
			            hint: true,
			            highlight: true,
			            minLength: 1
		            },
		            {
			            name: 'destinations',
			            source: destinations
		            });
            };
            
            return {
                init: function() {
                    initDestinationSearch();
                }
            }
        }();
        
        return {
            fieldsHelper: fieldsHelper
        }
    }
    
    return destinations;
})(jQuery);
