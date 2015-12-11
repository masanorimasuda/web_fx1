<h1><i class="fa fa-line-chart"></i>
&nbsp;チャート　15分足</h1>
<div class="clearfix container">
	<div class="col-sm-3">
		<h2 class='h_decoration'>&nbsp;日付</h2>
		<?php
		// 画像ディレクトリあるだけリンク
		foreach($date_list_array as $key=>$value) {
			echo "<h3 class='year_toggle'><i class='fa fa-arrow-circle-o-down'></i>&nbsp;<a>${key}</a></h3>";
			echo '<ul class="list-inline clearfix"style="display: none;">';
			foreach($value as $key_in => $value_in) {
				echo '<li style="padding: 10px;"><i class="fa fa-line-chart"></i> '.Html::anchor('/index/chart/'.str_replace('_','/',$value_in), str_replace('/','',$value_in)).'</li>';
			}
			echo '</ul>';
		}
		?>
	</div>
	<div class="col-sm-9">
		<div class="row">
		<?php
			if($file_exist_flag) {
				// chart widget
				include_once "widget/chart.php";
			}else {
				echo "<h2 class='h_decoration'>&nbsp;チャート　15分足<br>${yesterday}</h2>";
				echo "チャートが見つかりませんでした。";
			}
		?>
		</div>
	</div>
</div>