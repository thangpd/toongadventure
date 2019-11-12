(function ($) {
    'use strict';

    $(document).ready(qodefOnDocumentReady);
    $(window).load(qodefOnWindowLoad);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function qodefOnDocumentReady() {
        qodefInitBookingDashboardActions();
    }

    /*
     All functions to be called on $(window).load() should be in this function
     */
    function qodefOnWindowLoad() {
    }

    /**
     * Initialize Booking Table Ajax Actions
     */
    function qodefInitBookingDashboardActions() {

        var actionButtons = $('.qodef-booking-table-action-btn');

        if (actionButtons.length) {

            actionButtons.click(function (e) {
                e.preventDefault();
                
                var self = $(this),
                    bookingId = self.data('booking-id'),
                    action;

                if (self.hasClass('approve-booking')) {
                    action = 'approve';
                } else if (self.hasClass('cancel-booking')) {
                    action = 'cancel';
                }
                
                qodefChangeButtonStatus( bookingId, action );
            });
        }
    }

    function qodefChangeButtonStatus( id, action ) {
        var notice = $('.qodef-booking-dash-notice');
        
        var ajaxData = {
            action: 'qodefToursChangeBookingStatus',
            bookingId: id,
            newStatus: action
        };

        $.ajax({
            type: 'POST',
            data: ajaxData,
            url: SetSailToursAjaxUrl.url,
            success: function (data) {
                var response = JSON.parse( data );
                
                if ( response.status === 'success' ) {
                    notice.addClass(response.status);
                    notice.html(response.message);
                    notice.fadeIn(500);
                    window.location.reload();
                } else {
                    notice.addClass(response.status);
                    notice.html(response.message);
                    notice.fadeIn(500);
                    setTimeout(function(){
                        notice.fadeOut(500);
                    }, 1500);
                }
            }
        });
    }

})(jQuery);