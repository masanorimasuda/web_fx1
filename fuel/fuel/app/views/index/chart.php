<h1>チャートデータ　15分足</h1>
<div class="clearfix container">
	<div class="col-sm-4">
		<h2>【アーカイブ】</h2>
		<?php
		// 画像ディレクトリあるだけリンク
		echo '<ul class="list-inline clearfix">';
		foreach($img_dir_list as $key=>$value) {
			echo '<li><i class="fa fa-line-chart"></i> '.Html::anchor('/index/chart/'.str_replace('_','/',$key), $key).'</li>';
		}
		echo '</ul>';
		?>
	</div>
	<div class="col-sm-8">
		<h2>【<?php echo $set_date; ?>】</h2>
		<div class="row">
		<?php
			// chart widget
			include_once "widget/chart.php";
		?>
		</div>
	</div>
</div>