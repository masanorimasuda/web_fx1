<h1><i class="fa fa-newspaper-o"></i>&nbsp;ニュース</h1>
<div class="clearfix container">
	<div class="col-sm-3">
		<h2 class='h_decoration'>&nbsp;日付</h2>
		<?php
		foreach($news_list_array as $key => $value) {
			echo "<h3 class='year_toggle'><i class='fa fa-arrow-circle-o-down'></i>&nbsp;<a href='#'>${key}</a></h3>";
			echo '<ul class="list-inline clearfix" style="display: none;">';
			foreach($value as $key_in => $value_in) {
				echo "<li style='padding: 10px;'><i class='fa fa-newspaper-o'></i> ".Html::anchor('/archive/news/'.str_replace('-','/',$value_in), $value_in).'</li>';
			}
			echo "</ul>";
		}
		// newsリンクリストあるだけ表示
		//foreach ($news_datelist as $key => $value) {
		//	echo '<li style="padding: 10px;"><i class="fa fa-newspaper-o"></i> '.Html::anchor('/index/news/'.str_replace('-','/',$key), $key).'</li>';
		//}
		echo '</ul>';
		?>
	</div>

	<div class="col-sm-9">
		<div class="row">
	<?php
		include_once "widget/news.php";
	?>
		</div>
	</div>
</div>
