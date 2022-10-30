$(document).ready(function () {
  (function ($) {

    /**
     * Variables
     */
    var form = $("#add-form"),
    input = form.find("#text"),
    list = $('#item-list'),
    lgi = $('.list-group-item'),
    animation = {
      startColor: '#3cf281',
      endColor: lgi.css('background-color') || '#250d49',
      delay: 300
    }

    /**
     * ADD formulár
     */
    
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
        dataType: 'json'
      });

      // Po ukončení ajaxu skontrolujeme či nám podstránka vrátila success
      req.done(function (data) {
        console.log(data);
        if (data == "success") {

          // Pošleme ajax aby nám vytiahol novopridaný li element
          $.ajax({url: baseUrl}).done(function(html){
            var newItem = $(html).find('li:last-child');

                // li element pridáme do ul zoznamu s animáciou
                newItem.appendTo(list)
                  .css({backgroundColor: animation.startColor})
                  .delay(animation.delay)
                  .animate({backgroundColor: animation.endColor});
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
