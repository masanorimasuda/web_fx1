###
	全ページ利用js
###
$ ->
	$(".year_toggle a").on "click", ->
		$(this).parents("h3").next().toggle()
		return
	return