<h1><i class="fa fa-newspaper-o"></i>&nbsp;本日の重要指標　<i class="fa fa-line-chart"></i>&nbsp;前日の変動</h1>

<div class="clearfix container">
	<div class="col-sm-4">
		<div class="row">
			<h2 class='h_decoration'>&nbsp;日付</h2>
			<?php
			// 画像ディレクトリあるだけリンク
			foreach($date_list_array as $key=>$value) {
				echo "<h3 class='year_toggle'><i class='fa fa-arrow-circle-o-down'></i>&nbsp;<a>${key}</a></h3>";
				echo '<ul class="list-inline clearfix"style="display: none;">';
				foreach($value as $key_in => $value_in) {
					echo '<li style="padding: 10px;"><i class="fa fa-line-chart"></i> '.Html::anchor('/archive/chartnews/'.str_replace('_','/',$value_in), str_replace('/','',$value_in)).'</li>';
				}
				echo '</ul>';
			}
			?>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="row">
			<div class="clearfix">
				<?php
				// news
				include_once "widget/news.php";
				?>
			</div>
			<div class="clearfix">
				<?php
				// chart widget
				include_once "widget/chart.php";
				?>
			</div>
		</div>
	</div>
</div>
