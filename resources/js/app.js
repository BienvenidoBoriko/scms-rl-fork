require('./bootstrap');

//funcion que hace abrir y cerrar el sidebar
$(document).ready(function() {
    $('.button-left').click(function() {
        $('.sidebar').toggleClass('fliph');
        $(".iconX").toggle();
        $(".content-margin").toggleClass('content-margin-0');
    });

});



//ckeditor. remplaza todos los textarea con id contenido pro un
//editor de texto completo
CKEDITOR.replace('contenido', {
    filebrowserUploadUrl: "{{route('post.image.upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});