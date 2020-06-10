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

    var id_tour = $('.qodef-container').data('id_tour');
    console.log(id_tour);
    if (id_tour !== undefined) {
        var data = {action: 'setsail_core_slicksyncing_get_grading_tour', id_tour: id_tour};
        $.ajax({
            url: qodefToursAjaxURL,
            data: data,
            method: "GET",
            dataType: "json",
            success: function (res) {
                console.log(res);
                if (res.level != undefined) {
                    $('.qodef-slicksyncing-holder').find('.slider-nav').slick('slickGoTo', res.level)
                }
            }
        })
    }

    $('.qodef-slicksyncing-holder').on('click', '.item', function (event) {
        event.preventDefault();
        var goToSingleSlide = $(this).data('slick-index');
        $(this).find('.slider-nav').slick('slickGoTo', goToSingleSlide);
    });

})(jQuery);