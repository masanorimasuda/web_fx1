<h1>チャート + ニュース　<?php echo $set_date; ?></h1>

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
