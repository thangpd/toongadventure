jQuery(document).ready(function ($) {

    window.grading_function = function () {
        let inside = $(document).find('.inside-circle');
        if (inside) {
            $.each(inside, function (index, value) {
                let grading = $(this).data('value');
                let percent = grading / 5 * 100;
                percent = percent * 180 / 100;

                $(this).html(grading);
                /*.myLoading-indicator-circle-wrap .mask.full,
        .myLoading-indicator-circle-wrap .fill*/
                var parent = $(this).parents('.myLoading-indicator-circle-wrap');
                rotate(parent.find('.mask.full'), percent);
                rotate(parent.find('.fill'), percent);
            })
        }
    }
    window.grading_function();

    function rotate(el, degree) {
        // For webkit browsers: e.g. Chrome
        el.css({WebkitTransform: 'rotate(' + degree + 'deg)'});
        // For Mozilla browser: e.g. Firefox
        el.css({'-moz-transform': 'rotate(' + degree + 'deg)'});
    }

});