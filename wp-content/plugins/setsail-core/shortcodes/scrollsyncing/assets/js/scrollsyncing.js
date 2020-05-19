(function($) {
    'use strict';

    $("#smoothscroll li").on("click", function () {
        var n = $(this).data("id"),
            t = $('#' + n),
            i = t[0].offsetTop;

        $("#smoothscroll li").removeClass("active");
        $(this).addClass("active");

        $('#js-scrollbar').stop().animate({
            scrollTop: i - 30
        }, 100)
    });

    $("#js-scrollbar .item").each(function () {
        var n = $(this).attr("id"),
            t = $(this).data("id"),
            i = $('#' + t),
            r = i[0].offsetTop,
            u = new Waypoint({
                element: $('#' + n),
                handler: function () {
                    $("#smoothscroll li").removeClass("active");
                    $("#smoothscroll").find("li[data-id='" + n + "']").addClass("active");
                    $('#smoothscroll').stop().animate({
                        scrollTop: r - 100
                    }, 100)
                },
                context: $("#js-scrollbar"),
                offset: "20%"
            })
    });
})(jQuery);