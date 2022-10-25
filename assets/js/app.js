$(document).ready(function () {
  (function ($) {
    var form = $("#add-form"),
      input = form.find("#text");

    // input textarea na index.php bude vždy prázdna a vo focuse
    input.val('').focus();
    
    // Po submite sa zabráni preddefinovanej akcii prehliadača
    form.on("submit", function (event) {
      event.preventDefault();

      // Ajax odbehne na podstánku add-item.php a vráti nám informácie
      var req = $.ajax({
        url: form.attr("action"),
        type: "POST",
        data: form.serialize(),
      });

      // Po ukončení ajaxu skontrolujeme či nám podstránka vrátila success
      req.done(function (data) {
        if (data == "success") {
          // Html kód s vloženou hodnotou z odoslaného submitu
          var li = $('<li class="list-group-item">' + input.val() + '</li>'),
              // Zistíme aktuálnu farbu pozadia ostatných prvkov v zozname
              libg = $('.list-group-item').css('background-color');

          // li element pridáme do ul zoznamu s animáciou
          li.appendTo('.list-group')
            .css({backgroundColor: '#3cf281'})
            .delay(300)
            .animate({backgroundColor: libg});

          // vyčistím formulár
          input.val('');

        }
      });
    });

    // Zaistíme aby odosielanie formulárov fungovalo aj cez ENTER klávesu
    input.on('keypress', function(event){
      if (event.which == 13){
        form.submit();
        // return false zabráni aby bol spolu s formulárom odoslaný aj samotný ENTER
        return false;
      }
    });

  })(jQuery);
});
