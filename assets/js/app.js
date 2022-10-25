$(document).ready(function () {
  (function ($) {

    /**
     * ADD formulár
     */
    
    var form = $("#add-form"),
    input = form.find("#text"),
    lgi = $('.list-group-item'),
    libg = lgi.css('background-color');

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

          // Pošleme ajax aby nám vytiahol novopridaný li element
          $.ajax({url: baseUrl}).done(function(html){
            var newItem = $(html).find('li:last-child');

                // li element pridáme do ul zoznamu s animáciou
                newItem.appendTo('.list-group')
                  .css({backgroundColor: '#3cf281'})
                  .delay(300)
                  .animate({backgroundColor: libg});
          });
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

    /**
     * EDIT formulár
     */
    // Označenie textu v edit.php
    $('#edit-form').find('#text').select();


    /**
     * DELETE formulár
     */
    // potvrdenie vymazania v delete.php
    $('#delete-form').on('submit', function(event){
      return confirm('4 real bruh?')
    });

  })(jQuery);
});
