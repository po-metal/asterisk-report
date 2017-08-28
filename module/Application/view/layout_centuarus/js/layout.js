$(function ($) {
    $('#page-wrapper').toggleClass(getCookie('nav'));

    $('#make-small-nav').on('click', function () {
        $('#page-wrapper').toggleClass('nav-small');

        var navSmall = '';
        if (!$('#page-wrapper').hasClass('nav-small')) {
            navSmall = 'nav-small';
        }
        setCookie('nav', navSmall);
    });
});