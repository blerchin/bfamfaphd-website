$(document).ready(function() {
    $('.header ul.navigation').localScroll({
        offset: {top: -30},
    hash: true
    });
    $('body').scrollspy({
        offset: 70,
        target: 'nav'
    });

});
