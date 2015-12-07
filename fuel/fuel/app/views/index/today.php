<h1><i class="fa fa-newspaper-o"></i>&nbsp;本日の重要指標　<i class="fa fa-line-chart"></i>&nbsp;前日の変動</h1>

<div class="clearfix container">
	<div class="col-sm-4">
		<div class="row">
		<?php
			include_once "widget/news.php"
		?>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="row">
			<?php
			// chart widget
			include_once "widget/chart.php";
			?>
		</div>
	</div>
</div>
