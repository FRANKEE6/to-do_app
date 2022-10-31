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
    },
    editPath = '_inc/edit-item.php';
    deletepath = '_inc/delete-item.php';


    /**
     * ADD formulár
     */
    
    // input textarea na index.php bude vždy prázdna a vo focuse
    input.val('').focus();
    
    // Po submite sa zabráni preddefinovanej akcii prehliadača
    form.on("submit", function (event) {
      event.preventDefault();

      // Ajax pošle údaje na podstánku add-item.php a vráti nám status
      var req = $.ajax({
        url: form.attr("action"),
        type: "POST",
        data: form.serialize(),
        dataType: 'json'
      });

      // Po ukončení ajaxu skontrolujeme či nám podstránka vrátila success
      req.done(function (data) {
        if (data.status === "success") {

          // Pošleme ajax aby nám vytiahol novopridaný li element
          $.ajax({url: baseUrl}).done(function(html){
            var newItem = $(html).find('#item-' + data.id);
            
            // Schováme edit link
            newItem.find('.edit-link').css('display' , 'none');

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
     * J-S ajax editácia
     */
    // Ak je povolený script, schováme edit buttony
    $('.edit-link').hide();
    
    // Dvojklik na položku umožní editovať obsah a nastaví focus
    lgi.dblclick(function(){
      var divText = $(this).children(),
      that = $(this);
      
      divText.attr('contenteditable', "true");
      divText.focus();
      
      // Enter odpáli ajax ktorý získa a pošle údaje do edit-item.php
      divText.keypress(function(event){
        if (event.which == 13){
          var divContent = $(this).text(),
              contentID = $(this).parent().attr('id').slice(5);

          var req = $.ajax({
            url: editPath,
            type: "POST",
            data: {"id" : contentID , "message" : divContent},
            dataType: 'json'
          });
          
          // ak bol ajax úspešný, vypneme editovateľnosť položky a spustíme animáciu
          req.done(function (data) {
            if (data.status === "success") {
              $(that).children().attr('contenteditable', "false");
              $(that)
              .css({backgroundColor: animation.startColor})
              .delay(animation.delay)
              .animate({backgroundColor: animation.endColor});
            }
          });
          
          // zabráni pridaniu enteru
          return false;
        }
      })
    });
        
        
    /**
     * DELETE formulár
     */
    // potvrdenie vymazania v delete.php
    $('#delete-form').on('submit', function(){
      return confirm('4 real bruh?')
    });

    /**
    * J-S ajax mazanie
    */
    var deleteRequest = $('.delete-link');

    // po kliku na ikonu mazania zabránime presmerovaniu
    deleteRequest.click(function(event){
      event.preventDefault();
      var contentID = $(this).parents('.list-group-item').attr('id').slice(5),
          that = $(this).parents('.list-group-item');

      // Necháme si akciu potvrdiť užívateľom
      if (! confirm('To myslíš vážne?')){
        return;
      }
      else {
        // Vyšleme ajax s požiadavkou na zmazanie
        var req = $.ajax({
          url: deletepath,
          type: "POST",
          data: {"id" : contentID},
          dataType: 'json'
        });
  
        // V pípade úspechu odstánime element animáciou
        req.done(function (data) {
          if (data.status === "success") {
            $(that)
            .css({backgroundColor: '#e44c55'})
            .fadeOut(1000);
          }
        });
      }
    });

    
  })(jQuery);
});