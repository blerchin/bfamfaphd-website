$(document).ready(function() {
    if(window.g.front_page){
        $('.header ul.navigation').localScroll({
            offset: {top: -30},
            hash: true
        });
    }

});
