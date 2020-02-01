(function ($) {
    'use strict';

    var destinations = {};
    if (typeof qodef !== 'undefined') {
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

        var fieldsHelper = function () {

            var initDestinationSearch = function () {
                var destinations = typeof qodefToursSearchData !== 'undefined' ? qodefToursSearchData.destinations : [];

                var destinations = new Bloodhound({
                    datumTokenizer: Bloodhound.tokenizers.whitespace,
                    queryTokenizer: Bloodhound.tokenizers.whitespace,
                    local: destinations
                });

                $searchForms.find('.qodef-tours-destination-search').typeahead({
                        hint: true,
                        highlight: true,
                        minLength: 1
                    },
                    {
                        name: 'destinations',
                        source: destinations
                    });

                $searchFormsVerticalSmall.find('.qodef-tours-destination-search').typeahead({
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
                init: function () {
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

(function ($) {
    'use strict';

    var tours = {};
    if (typeof qodef !== 'undefined') {
        qodef.modules.tours = tours;
    }

    tours.qodefOnDocumentReady = qodefOnDocumentReady;

    tours.qodefInitTourItemTabs = qodefInitTourItemTabs;
    tours.qodefTourTabsMapTrigger = qodefTourTabsMapTrigger;

    tours.qodefToursGalleryAnimation = qodefToursGalleryAnimation;

    $(document).ready(qodefOnDocumentReady);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function qodefOnDocumentReady() {
        if (typeof qodef === 'undefined' || typeof qodef === '') {
            //if theme is not installed, generate single items manualy
            qodefInitTourItemTabs();
        }

        if (typeof qodef !== 'undefined') {
            //if theme is installed, trigger google map loading on location tab on single pages
            qodefTourTabsMapTrigger();
        }

        qodefTrigerTourGalleryMasonry();

        searchTours().fieldsHelper.init();
        searchTours().handleSearch.init();

        qodefToursGalleryAnimation();
    }

    function qodefTrigerTourGalleryMasonry() {
        var holder = $('.qodef-tour-item-single-holder');
        var tourNavItems = holder.find('.qodef-tour-item-wrapper ul li a');
        tourNavItems.on('click', function () {
            var thisNavItem = $(this);
            var thisNavItemId = thisNavItem.attr('href');

            if (thisNavItemId === '#tour-item-gallery-id' && typeof qodef.modules.common.qodefInitGridMasonryListLayout === 'function') {
                qodef.modules.common.qodefInitGridMasonryListLayout();
            }
        });
    }

    function qodefInitTourItemTabs() {
        var holder = $('.qodef-tour-item-single-holder');
        var tourNavItems = holder.find('.qodef-tour-item-wrapper ul li a');
        var tourSectionsItems = holder.find('.qodef-tour-item-section');
        tourNavItems.first().addClass('qodef-active-item');

        tourNavItems.on('click', function () {
            tourNavItems.removeClass('qodef-active-item');

            var thisNavItem = $(this);
            var thisNavItemId = thisNavItem.attr('href');
            thisNavItem.addClass('qodef-active-item');

            if (tourSectionsItems.length) {
                tourSectionsItems.each(function () {

                    var thisSectionItem = $(this);
                    if (thisSectionItem.attr('id') === thisNavItemId) {
                        thisSectionItem.show();
                        if (thisNavItemId === '#tour-item-location-id') {
                            qodefToursReInitGoogleMap();
                        }
                    } else {
                        thisSectionItem.hide();
                    }
                });
            }
        });
    }

    function qodefTourTabsMapTrigger() {
        var holder = $('.qodef-tour-item-single-holder');
        var tourNavItems = holder.find('.qodef-tour-item-wrapper ul li a');
        tourNavItems.on('click', function () {
            var thisNavItem = $(this);
            var thisNavItemId = thisNavItem.attr('href');

            if (thisNavItemId === '#tour-item-location-id') {
                qodefToursReInitGoogleMap();
            }
        });
    }

    function qodefToursReInitGoogleMap() {

        if (typeof qodef !== 'undefined') {
            qodef.modules.googleMap.qodefShowGoogleMap();
        }
    }

    function searchTours() {
        var $searchForms = $('.qodef-tours-search-main-filters-holder form');

        var fieldsHelper = function () {
            var initRangeSlider = function () {
                var $rangeSliders = $searchForms.find('.qodef-tours-range-input');
                var $priceRange = $searchForms.find('.qodef-tours-price-range-field');
                var $minPrice = $searchForms.find('[name="min_price"]');
                var $maxPrice = $searchForms.find('[name="max_price"]');
                var minValue = $priceRange.data('min-price');
                var maxValue = $priceRange.data('max-price');
                var chosenMinValue = $priceRange.data('chosen-min-price');
                var chosenMaxValue = $priceRange.data('chosen-max-price');

                if ($rangeSliders.length) {
                    $rangeSliders.each(function () {
                        var thisSlider = this;

                        var slider = noUiSlider.create(thisSlider, {
                            start: [chosenMinValue, chosenMaxValue],
                            connect: true,
                            step: 1,
                            range: {
                                'min': [minValue],
                                'max': [maxValue]
                            },
                            format: {
                                to: function (value) {
                                    return Math.floor(value);
                                },
                                from: function (value) {
                                    return value;
                                }
                            }
                        });

                        slider.on('update', function (values) {
                            var firstValue = values[0];
                            var secondValue = values[1];
                            var currencySymbol = $priceRange.data('currency-symbol');
                            var currencySymbolPosition = $priceRange.data('currency-symbol-position');

                            var firstPrice = currencySymbolPosition === 'left' ? currencySymbol + firstValue : firstValue + currencySymbol;
                            var secondPrice = currencySymbolPosition === 'left' ? currencySymbol + secondValue : firstValue + secondValue;

                            $priceRange.val(firstPrice + ' - ' + secondPrice);

                            $minPrice.val(firstValue);
                            $maxPrice.val(secondValue);
                        });
                    });
                }
            };

            var initKeywordSearch = function () {
                var tours = typeof qodefToursSearchData !== 'undefined' ? qodefToursSearchData.tours : [];

                var tours = new Bloodhound({
                    datumTokenizer: Bloodhound.tokenizers.whitespace,
                    queryTokenizer: Bloodhound.tokenizers.whitespace,
                    local: tours
                });

                $searchForms.find('.qodef-tours-keyword-search').typeahead({
                        hint: true,
                        highlight: true,
                        minLength: 1
                    },
                    {
                        name: 'tours',
                        source: tours
                    });
            };

            var initDestinationSearch = function () {
                var destinations = typeof qodefToursSearchData !== 'undefined' ? qodefToursSearchData.destinations : [];

                var destinations = new Bloodhound({
                    datumTokenizer: Bloodhound.tokenizers.whitespace,
                    queryTokenizer: Bloodhound.tokenizers.whitespace,
                    local: destinations
                });

                $searchForms.find('.qodef-tours-destination-search').typeahead({
                        hint: true,
                        highlight: true,
                        minLength: 1
                    },
                    {
                        name: 'destinations',
                        source: destinations
                    });
            };

            var initSelectPlaceholder = function () {
                var $selects = $('.qodef-tours-select-placeholder');

                var changeState = function ($select) {
                    var selectVal = $select.val();

                    if (selectVal === '') {
                        $select.addClass('qodef-tours-select-default-option');
                    } else {
                        $select.removeClass('qodef-tours-select-default-option');
                    }
                };

                if ($selects.length) {
                    $selects.each(function () {
                        var $select = $(this);

                        changeState($(this));

                        $select.on('change', function () {
                            changeState($(this));
                        });
                    })
                }
            };

            return {
                init: function () {
                    initRangeSlider();
                    initKeywordSearch();
                    initDestinationSearch();
                    initSelectPlaceholder();
                }
            }
        }();

        var handleSearch = function () {
            var rewriteURL = function (queryString) {
                //init variables
                var currentPage = '';

                //does current url has query string
                if (location.href.match(/\?.*/) && document.referrer) {
                    //get clean current url
                    currentPage = location.href.replace(/\?.*/, '');
                }

                //rewrite url with current page and new url string
                window.history.replaceState({page: currentPage + '?' + queryString}, '', currentPage + '?' + queryString);
            };

            var sendRequest = function ($form, changeLabel, resetPagination, animate) {
                var $submitButton = $form.find('input[type="submit"]');
                var $searchContent = $('.qodef-tours-search-content');
                var $searchPageContent = $('.qodef-tours-search-page-holder');
                var searchInProgress = false;

                changeLabel = typeof changeLabel !== 'undefined' ? changeLabel : true;
                resetPagination = typeof resetPagination !== 'undefined' ? resetPagination : true;
                animate = typeof animate !== 'undefined' ? animate : false;

                var searchingLabel = $submitButton.data('searching-label');
                var originalLabel = $submitButton.val();

                if (!searchInProgress) {
                    if (changeLabel) {
                        $submitButton.val(searchingLabel);
                    }

                    if (resetPagination) {
                        $form.find('[name="page"]').val(1);
                    }

                    searchInProgress = true;
                    $searchContent.addClass('qodef-tours-searching');

                    var data = {
                        action: 'tours_search_handle_form_submission'
                    };

                    data.fields = $form.serialize();

                    $.ajax({
                        type: 'GET',
                        url: qodefToursAjaxURL,
                        dataType: 'json',
                        data: data,
                        success: function (response) {
                            if (changeLabel) {
                                $submitButton.val(originalLabel);
                            }

                            $searchContent.removeClass('qodef-tours-searching');
                            searchInProgress = false;

                            $searchContent.find('.qodef-tours-row .qodef-tours-row-inner-holder').html(response.html);
                            rewriteURL(response.url);

                            $('.qodef-tours-search-pagination').remove();

                            $searchContent.append(response.paginationHTML);

                            if (animate) {
                                $('html, body').animate({scrollTop: $searchPageContent.offset().top - 80}, 700);
                            }
                            qodefToursGalleryAnimation();
                        }
                    });
                }
            };

            var formHandler = function ($form) {

                if ($('body').hasClass('post-type-archive-tour-item')) {
                    $form.on('submit', function (e) {
                        e.preventDefault();
                        e.stopPropagation();

                        sendRequest($form);
                    });
                }
            };

            var handleOrderBy = function ($searchForms) {
                var $orderingItems = $('.qodef-search-ordering-item');
                var $orderByField = $searchForms.find('[name="order_by"]');
                var $orderTypeField = $searchForms.find('[name="order_type"]');

                if ($orderingItems.length) {
                    $orderingItems.on('click', function (e) {
                        e.preventDefault();
                        e.stopPropagation();

                        var $thisItem = $(this);

                        $orderingItems.removeClass('qodef-search-ordering-item-active');
                        $thisItem.addClass('qodef-search-ordering-item-active');

                        var orderBy = $thisItem.data('order-by');
                        var orderType = $thisItem.data('order-type');

                        if (typeof orderBy !== 'undefined' && typeof orderType !== 'undefined') {
                            $orderByField.val(orderBy);
                            $orderTypeField.val(orderType);
                        }

                        sendRequest($searchForms, false, false);
                    });
                }
            };

            var handleViewType = function ($searchForms) {
                var $viewTypeItems = $('.qodef-tours-search-view-item');
                var $typeField = $searchForms.find('[name="view_type"]');

                if ($viewTypeItems.length) {
                    $viewTypeItems.on('click', function (e) {
                        e.preventDefault();
                        e.stopPropagation();

                        var $thisView = $(this);

                        $viewTypeItems.removeClass('qodef-tours-search-view-item-active');
                        $thisView.addClass('qodef-tours-search-view-item-active');

                        var viewType = $thisView.data('type');

                        if (typeof viewType !== 'undefined') {
                            $typeField.val(viewType);
                        }

                        sendRequest($searchForms, false, false);
                    });
                }
            };

            var handlePagination = function ($searchForms) {
                var $paginationHolder = $('.qodef-tours-search-pagination');
                var $pageField = $searchForms.find('[name="page"]');

                if ($paginationHolder.length) {
                    $(document).on('click', '.qodef-tours-search-pagination li', function (e) {
                        e.preventDefault();
                        e.stopPropagation();

                        var $thisItem = $(this);

                        var page = $thisItem.data('page');

                        if (typeof page !== 'undefined') {
                            $pageField.val(page);
                        }

                        sendRequest($searchForms, true, false, true);
                    });
                }
            }

            return {
                init: function () {
                    formHandler($searchForms);
                    handleOrderBy($searchForms);
                    handleViewType($searchForms);
                    handlePagination($searchForms);
                }
            }
        }();

        return {
            fieldsHelper: fieldsHelper,
            handleSearch: handleSearch
        }
    }

    /*
    * Tours Gallery animation
    */
    function qodefToursGalleryAnimation() {
        var toursGalleryItems = $('.qodef-tours-gallery-item');

        if (toursGalleryItems.length) {
            toursGalleryItems.each(function () {
                var toursGalleryItem = $(this),
                    contentHolder = toursGalleryItem.find('.qodef-tours-gallery-item-content-holder'),
                    excerpt = contentHolder.find('.qodef-tours-gallery-item-excerpt'),
                    deltaY = Math.ceil(excerpt.height());

                contentHolder.css('transform', 'translate3d(0,' + deltaY + 'px,0)');

                toursGalleryItem.mouseenter(function () {
                    contentHolder.css('transform', 'translate3d(0,0,0)');
                });

                toursGalleryItem.mouseleave(function () {
                    deltaY = Math.ceil(excerpt.height());
                    contentHolder.css('transform', 'translate3d(0,' + deltaY + 'px,0)');
                });
            });
        }
    }

    return tours;
})(jQuery);

(function ($) {
    'use strict';

    var toursListSC = {};
    if (typeof qodef !== 'undefined') {
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

        var initList = function (listHolder) {
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

            if (themeInstalled()) {
                qodef.modules.common.qodefInitParallax();
            }

            $(window).resize(function () {
                resizeTourItems(listHolder);
            });

        };

        var filter_tour = function (filters, listFeed) {

            var currentFilter = filters;
            var type = currentFilter.data('type');

            filters.parent().find('.qodef-tour-list-filter-item').each(function (e) {
                $(this).removeClass('qodef-tour-list-current-filter')
            });
            console.log(filters.parent().find('.qodef-tour-list-filter-item'));
            currentFilter.addClass('qodef-tour-list-current-filter');

            type = typeof type === 'undefined' ? '*' : '.' + type;

            listFeed.find('.qodef-tours-list-holder-inner').isotope({
                filter: type
            });
        }
        var initFilter = function (listFeed) {
            var filters = listFeed.find('.qodef-tour-list-filter-item');

            filters.on('click', function (e) {
                e.preventDefault();
                e.stopPropagation();

                filter_tour($(this), listFeed);
            });
        };


        var resetFilter = function (listFeed) {
            var filters = listFeed.find('.qodef-tour-list-filter-item');

            var temp_curent = listFeed.find('.qodef-tour-list-current-filter');

            filters.removeClass('qodef-tour-list-current-filter');

            filters.eq(0).addClass('qodef-tour-list-current-filter');

            listFeed.find('.qodef-tours-list-holder-inner').isotope({
                filter: '*'
            });
            filter_tour(temp_curent, listFeed);
        };

        var initPagination = function (listObject) {
            var paginationDataHolder = listObject.find('.qodef-tours-list-pagination-data');
            var itemsHolder = listObject.find('.qodef-tours-list-holder-inner');

            var fetchData = function (callback) {
                var data = {
                    action: 'setsail_tours_list_ajax_pagination',
                    fields: paginationDataHolder.find('input').serialize()
                };

                $.ajax({
                    url: qodefToursAjaxURL,
                    data: data,
                    dataType: 'json',
                    type: 'POST',
                    success: function (response) {
                        if (response.havePosts) {
                            paginationDataHolder.find('[name="next_page"]').val(response.nextPage);
                        }

                        if (themeInstalled()) {
                            qodef.modules.common.qodefInitParallax();
                        }

                        callback.call(this, response);
                        window.grading_function();

                    }
                });
            };

            var loadMorePagination = function () {
                var loadMoreButton = listObject.find('.qodef-tours-load-more-button');
                var paginationHolder = listObject.find('.qodef-tours-pagination-holder');
                var loadingInProgress = false;

                if (loadMoreButton.length) {
                    loadMoreButton.on('click', function (e) {
                        e.preventDefault();
                        e.stopPropagation();

                        var loadingLabel = loadMoreButton.data('loading-label');
                        var originalText = loadMoreButton.text();

                        loadMoreButton.text(loadingLabel);
                        console.log(listObject.find('.qodef-tour-list-filter-item.qodef-tour-list-current-filter'));
                        resetFilter(listObject);

                        if (!loadingInProgress) {
                            loadingInProgress = true;

                            fetchData(function (response) {
                                console.log(response.html);
                                if (response.havePosts === true) {
                                    loadMoreButton.text(originalText);

                                    var responseHTML = $(response.html);

                                    itemsHolder.append(responseHTML);

                                    itemsHolder.waitForImages(function () {
                                        resizeTourItems(itemsHolder);
                                        itemsHolder.isotope('appended', responseHTML).isotope('reloadItems');
                                        // qodef.modules.tours.qodefToursGalleryAnimation();
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

        var resizeTourItems = function resizeTourItems(container) {
            var itemsMainHolder = container.parent();
            if (itemsMainHolder.hasClass('qodef-tours-type-masonry')) {
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
            init: function () {
                if (listItem.length && typeof $.fn.isotope !== 'undefined') {
                    listItem.each(function () {
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
