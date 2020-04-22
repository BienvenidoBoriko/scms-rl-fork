require('./bootstrap');
$(document).ready(function() {
    $('.button-left').click(function() {
        $('.sidebar').toggleClass('fliph');
        $(".iconX").toggle();
    });

});
