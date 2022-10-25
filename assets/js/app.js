$(document).ready(function () {
  (function ($) {
    var form = $("#add-form"),
      input = form.find("#text");

    input.val('').focus();
    
    form.on("submit", function (event) {
      event.preventDefault();

      var req = $.ajax({
        url: form.attr("action"),
        type: "POST",
        data: form.serialize(),
      });

      req.done(function (data) {
        if (data == "success") {
          var li = $('<li class="list-group-item">' + input.val() + '</li>'),
              libg = $('.list-group-item').css('background-color');

          li.appendTo('.list-group')
            .css({backgroundColor: '#3cf281'})
            .delay(300)
            .animate({backgroundColor: libg});

        }
      });
    });

    input.on('keypress', function(event){
      if (event.which == 13){
        form.submit();
        return false;
      }
    });

  })(jQuery);
});
