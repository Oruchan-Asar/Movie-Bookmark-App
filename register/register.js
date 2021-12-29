$("#floatingPassword").on("focusout", function () {
  if ($(this).val() != $("#floatingPasswordConfirm").val()) {
    $("#floatingPasswordConfirm").removeClass("valid").addClass("invalid");
  } else {
    $("#floatingPasswordConfirm").removeClass("invalid").addClass("valid");
  }
});

$("#floatingPasswordConfirm").on("keyup", function () {
  if ($("#floatingPassword").val() != $(this).val()) {
    $(this).removeClass("valid").addClass("invalid");
  } else {
    $(this).removeClass("invalid").addClass("valid");
  }
});
