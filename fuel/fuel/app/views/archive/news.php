<h1>ニュース</h1>
<div class="clearfix container">
	<div class="col-sm-4">
		<h2>【アーカイブ】</h2>
		<?php
		// newsリンクリストあるだけ表示
		echo '<ul class="list-inline clearfix">';
		foreach ($news_datelist as $key => $value) {
			echo '<li><i class="fa fa-newspaper-o"></i> '.Html::anchor('/index/news/'.str_replace('-','/',$key), $key).'</li>';
		}
		echo '</ul>';
		?>
	</div>

	<div class="col-sm-8">
		<div class="row">
	<?php
		include_once "widget/news.php";
	?>
		</div>
	</div>
</div>
