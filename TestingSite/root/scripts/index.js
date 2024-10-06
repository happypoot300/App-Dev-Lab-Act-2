$(document).ready(function () {
  $(".button__addtask").click(function () {
    window.location.href = "pages/forms/add_task_form.php";
  });

  $(".dropdown").click(function () {
    $(this).find(".dropdown-content").toggle();
  });

  $(document).on("click", function (event) {
    if (!$(event.target).closest(".dropdown").length) {
      $(".dropdown-content").hide();
    }
  });

  $(".dropdown-content .edit").click(function () {
    var id = $(this).closest(".dropdown").find("i").attr("data-id");
    window.location.href = "pages/forms/update_task_form.php?id=" + id;
  });

  $(".dropdown-content .delete").click(function () {
    var id = $(this).closest(".dropdown").find("i").attr("data-id");
    window.location.href = "pages/crud/delete_task.php?id=" + id;
  });
});

// add click event handler to check
$(".check").click(function () {
  // toggle strikethrough class on check
  const $this = $(this);
  const $td = $this.closest("tr").find(".td__text");

  if ($td.hasClass("strikethrough")) {
    $td.removeClass("strikethrough");
    $this.removeClass("active");
  } else {
    $td.addClass("strikethrough");
    $this.addClass("active");
  }
});
