
/*
	全ページ利用js
 */
$(function() {
  $(".year_toggle a").on("click", function() {
    $(this).parents("h3").next().toggle();
    if ($(this).parents("h3").find("i").hasClass("fa-arrow-circle-o-down")) {
      $(this).parents("h3").find("i").attr("class", "fa fa-arrow-circle-o-up");
    } else if ($(this).parents("h3").find("i").hasClass("fa-arrow-circle-o-up")) {
      $(this).parents("h3").find("i").attr("class", "fa fa-arrow-circle-o-down");
    }
  });
});
