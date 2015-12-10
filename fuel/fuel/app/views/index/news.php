<h1><i class="fa fa-newspaper-o"></i>&nbsp;ニュース</h1>
<div class="clearfix container">
	<div class="col-sm-3">
		<h2 class='h_decoration'>&nbsp;アーカイブ</h2>
		<?php
		// newsリンクリストあるだけ表示
		echo '<ul class="list-inline clearfix">';
		foreach ($news_datelist as $key => $value) {
			echo '<li style="padding: 10px;"><i class="fa fa-newspaper-o"></i> '.Html::anchor('/index/news/'.str_replace('-','/',$key), $key).'</li>';
		}
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
