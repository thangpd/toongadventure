(function($) {
    'use strict';

    var toursListSC = {};
    if(typeof qodef !== 'undefined'){
        qodef.modules.toursListSC = toursListSC;
    }

    toursListSC.qodefOnWindowLoad = qodefOnWindowLoad;

    toursListSC.toursList = toursList;

    $(window).load(qodefOnWindowLoad);

    /*
     All functions to be called on $(window).load() should be in this function
     */
    function qodefOnWindowLoad() {
        toursList().init();
    }

    function themeInstalled() {
        return typeof qodef !== 'undefined';
    }

    function toursList() {
        var listItem = $('.qodef-tours-list-holder'),
            listObject;

        var initList = function(listHolder) {
            listHolder.animate({opacity: 1});

            resizeTourItems(listHolder);

            listObject = listHolder.isotope({
                percentPosition: true,
                itemSelector: '.qodef-tours-row-item',
                transitionDuration: '0.4s',
                isInitLayout: true,
                hiddenStyle: {
                    opacity: 0
                },
                visibleStyle: {
                    opacity: 1
                },
                masonry: {
                    columnWidth: '.qodef-tours-list-grid-sizer'
                }
            });

            if(themeInstalled()) {
                qodef.modules.common.qodefInitParallax();
            }

            $(window).resize(function() {
                resizeTourItems(listHolder);
            });

        };

        var initFilter = function(listFeed) {
            var filters = listFeed.find('.qodef-tour-list-filter-item');

            filters.on('click', function(e) {
                e.preventDefault();
                e.stopPropagation();

                var currentFilter = $(this);
                var type = currentFilter.data('type');

                filters.removeClass('qodef-tour-list-current-filter');
                currentFilter.addClass('qodef-tour-list-current-filter');

                type = typeof type === 'undefined' ? '*' : '.' + type;

                listFeed.find('.qodef-tours-list-holder-inner').isotope({
                    filter: type
                });
            });
        };

        var resetFilter = function(listFeed) {
            var filters = listFeed.find('.qodef-tour-list-filter-item');

            filters.removeClass('qodef-tour-list-current-filter');
            filters.eq(0).addClass('qodef-tour-list-current-filter');

            listFeed.find('.qodef-tours-list-holder-inner').isotope({
                filter: '*'
            });
        };

        var initPagination = function(listObject) {
            var paginationDataHolder = listObject.find('.qodef-tours-list-pagination-data');
            var itemsHolder = listObject.find('.qodef-tours-list-holder-inner');

            var fetchData = function(callback) {
                var data = {
                    action: 'setsail_tours_list_ajax_pagination',
                    fields: paginationDataHolder.find('input').serialize()
                };

                $.ajax({
                    url: qodefToursAjaxURL,
                    data: data,
                    dataType: 'json',
                    type: 'POST',
                    success: function(response) {
                        if(response.havePosts) {
                            paginationDataHolder.find('[name="next_page"]').val(response.nextPage);
                        }

                        if(themeInstalled()) {
                            qodef.modules.common.qodefInitParallax();
                        }

                        callback.call(this, response);
                    }
                });
            };
            
            var loadMorePagination = function() {
                var loadMoreButton = listObject.find('.qodef-tours-load-more-button');
                var paginationHolder = listObject.find('.qodef-tours-pagination-holder');
                var loadingInProgress = false;

                if(loadMoreButton.length) {
                    loadMoreButton.on('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        var loadingLabel = loadMoreButton.data('loading-label');
                        var originalText = loadMoreButton.text();
                        
                        loadMoreButton.text(loadingLabel);
                        resetFilter(listObject);

                        if(!loadingInProgress) {
                            loadingInProgress = true;

                            fetchData(function(response) {
                                if(response.havePosts === true) {
                                    loadMoreButton.text(originalText);

                                    var responseHTML = $(response.html);

                                    itemsHolder.append(responseHTML);

                                    itemsHolder.waitForImages(function() {
                                        resizeTourItems(itemsHolder);
                                        itemsHolder.isotope('appended', responseHTML).isotope('reloadItems');
                                        qodef.modules.tours.qodefToursGalleryAnimation();
                                    });
                                } else {
                                    loadMoreButton.remove();

                                    paginationHolder.html(response.message);
                                }

                                loadingInProgress = false;
                            });
                        }

                    });
                }
            };

            loadMorePagination();
        };

        var resizeTourItems = function resizeTourItems(container){
            var itemsMainHolder = container.parent();
            if(itemsMainHolder.hasClass('qodef-tours-type-masonry')) {
                var padding = parseInt(container.find('.qodef-tours-row-item').css('padding-left')),
                    defaultMasonryItem = container.find('.qodef-size-default'),
                    largeWidthMasonryItem = container.find('.qodef-size-large-width'),
                    largeHeightMasonryItem = container.find('.qodef-size-large-height'),
                    largeWidthHeightMasonryItem = container.find('.qodef-size-large-width-height'),
                    size = container.find('.qodef-tours-list-grid-sizer').width();
                
                    defaultMasonryItem.css('height', size - 2 * padding);
                    largeHeightMasonryItem.css('height', Math.round(2 * size) - 2 * padding);
                    largeWidthHeightMasonryItem.css('height', Math.round(2 * size) - 2 * padding);
                    largeWidthMasonryItem.css('height', size - 2 * padding);
            }
        };

        return {
            init: function() {
                if(listItem.length && typeof $.fn.isotope !== 'undefined') {
                    listItem.each(function() {
                        initList($(this).find('.qodef-tours-list-holder-inner'));
                        initFilter($(this));
                        initPagination($(this));
                    });
                }
            }
        }
    }
    
    return toursListSC;
})(jQuery);
