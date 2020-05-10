require("./bootstrap");

//funcion que hace abrir y cerrar el sidebar
$(document).ready(function() {
    $(".button-left").click(function() {
        $(".sidebar").toggleClass("fliph");
        $(".iconX").toggle();
        $(".content-margin").toggleClass("content-margin-0");
    });
});
