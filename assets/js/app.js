$(document).ready(function () {
  (function ($) {
    var form = $("#add-form");

    form.on("submit", function (event) {
      event.preventDefault();

      var req = $.ajax({
        url: form.attr("action"),
        type: "POST",
        data: form.serialize(),
      });

      req.done(function (data) {
        console.log(data);
      });
    });
  })(jQuery);
});
