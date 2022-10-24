$(document).ready(function () {
  (function ($) {
    var form = $("#add-form"),
      input = $("#text");

    form.on("submit", function (event) {
      event.preventDefault();

      var req = $.ajax({
        url: form.attr("action"),
        type: "POST",
        data: form.serialize(),
      });

      req.done(function (data) {
        if (data == "success") {
          var li = $('<li class="list-group-item">' + input.val() + '</li>');

          li.hide()
            .appendTo('.list-group')
            .fadeIn();
        }
      });
    });
  })(jQuery);
});
