require("./bootstrap");

//funcion que hace abrir y cerrar el sidebar
$(document).ready(function() {
    $(".button-left").click(function() {
        $(".sidebar").toggleClass("fliph");
        $(".iconX").toggle();
        $(".content-margin").toggleClass("content-margin-0");
    });

      $(document).on("change", 'input[type="file"]', function(event) {
          var filename = $(this).val();
          if (filename == undefined || filename == "") {
              $(this)
                  .next(".custom-file-label")
                  .html("No file chosen");
          } else {
              $(this)
                  .next(".custom-file-label")
                  .html(event.target.files[0].name);
          }
      });
});
