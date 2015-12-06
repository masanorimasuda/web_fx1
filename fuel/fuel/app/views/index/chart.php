<h1>チャートデータ　15分足</h1>
<div class="clearfix container">
	<div class="col-sm-4">
		<h2>【アーカイブ】</h2>
		<?php
		// 画像ディレクトリあるだけリンク
		echo '<ul class="list-inline clearfix">';
		foreach($img_dir_list as $key=>$value) {
			if($key != "0") echo '<li><i class="fa fa-line-chart"></i> '.Html::anchor('/index/chart/'.str_replace('_','/',$key), str_replace('/','',$key)).'</li>';
		}
		echo '</ul>';
		?>
	</div>
	<div class="col-sm-8">
		<div class="row">
		<?php
			if($file_exist_flag) {
				// chart widget
				include_once "widget/chart.php";
			}else {
				echo '<h2>【チャート　15分足】<br>'.$yesterday.'</h2>';
				echo "チャートが見つかりませんでした。";
			}
		?>
		</div>
	</div>
</div>