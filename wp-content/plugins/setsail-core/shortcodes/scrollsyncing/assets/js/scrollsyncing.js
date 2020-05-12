(function($) {
    'use strict';

    var scrollsyncing = {};
    qodef.modules.scrollsyncing = scrollsyncing;

    scrollsyncing.qodefInitHivegallery = qodefInitHivegallery;


    scrollsyncing.qodefOnDocumentReady = qodefOnDocumentReady;

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

    /*$(function () {
        $('#smoothscroll li').on('click', function () {
            var n = $(this).data('id'),
                t = $('#' + n)[0],
                i = t.offsetTop;
            $("#smoothscroll li").removeClass("active");
            $(this).addClass("active");
            scrollTo($('#js-scrollbar')[0], i - 30, 100)
        })
        $("#js-scrollbar .item").each(function () {
            var n = $(this).attr("id"),
                t = $(this).data("id"),
                i = document.getElementById(t),
                r = i.offsetTop,
                u = new Waypoint({
                    element: document.getElementById(n),
                    handler: function () {
                        $("#smoothscroll li").removeClass("active");
                        $("#smoothscroll").find("li[data-id='" + n + "']").addClass("active");
                        scrollTo(document.getElementById("smoothscroll"), r - 100, 100)
                    },
                    context: document.getElementById("js-scrollbar"),
                    offset: "20%"
                })
        });
    })*/
})(jQuery);