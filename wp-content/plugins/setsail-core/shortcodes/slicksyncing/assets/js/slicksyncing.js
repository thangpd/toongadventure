(function ($) {
    'use strict';

    var slicksyncing = {};

    $('.slider-nav').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: false,
        adaptiveHeight: true,
        infinite: false,
        useTransform: true,
        speed: 400,
        cssEase: 'cubic-bezier(0.77, 0, 0.18, 1)',
    });


    $('.qodef-slicksyncing-holder').on('click', '.item', function (event) {
        event.preventDefault();
        var goToSingleSlide = $(this).data('slick-index');
        $('.slider-nav').slick('slickGoTo', goToSingleSlide);
    });
    
})(jQuery);