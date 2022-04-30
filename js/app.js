(function($) {
    'use strict';
    // Navbat Toggle
    var scroll = $(window).scrollTop();

    // Loader 
    $(window).on('load', function() {
        $('#status').fadeOut();
        $('#preloader').delay(350).fadeOut('slow');
        $('body').delay(350).css({
            'overflow': 'visible'
        });
    });
    // BACK TO TOP
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn();
        } else {
            $('.back-to-top').fadeOut();
        }
    });
    $('.back-to-top').click(function() {
        $("html, body").animate({
            scrollTop: 0
        }, 800);
        return false;
    });

    //Tooltip
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    });
    //Popover
    $(function() {
        $('[data-toggle="popover"]').popover()
    });
})(jQuery)