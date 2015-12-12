###
	全ページ利用js
###
$ ->
	$(".year_toggle a").on "click", ->
		$(this).parents("h3").next().toggle()
		$(this).parents("h3").find("i").attr("class","fa fa-arrow-circle-o-up");
		return
	return