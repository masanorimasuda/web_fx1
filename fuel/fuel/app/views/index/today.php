<h1>チャート + ニュース　<?php echo $set_date; ?></h1>

<div class="clearfix container">
	<div class="col-sm-4">
		<h2>【ニュース】</h2>
		<div class="row">
		<?php
		//ニュース一覧
		foreach ($news as $key => $value) {
			if($value['attention_rate'] != "") {
				if($value['attention_rate'] == "重要度高") {
					echo "<dl class='col-xs-12 col-sm-6 col-md-6' style='color: red;'>";
				}else {
					echo "<dl class='col-xs-12 col-sm-6 col-md-6'>";
				}
				echo "<dt>${value['textdate']}</dt>";
				echo "<dd>";
				echo "${value['currency']}";
				echo "</dd>";
				echo "<dd>重要度　：　${value['attention_rate']}</dd>";
				echo "<dd>タイトル　：　${value['title']}</dd>";
				echo "<dd>予想　：　${value['forecast']}</dd>";
				echo "<dd>結果　：　${value['result']}</dd>";
				echo "</dl>";
			}
		}
		?>
		</div>
	</div>
	<div class="col-sm-8">
		<h2>【チャート　15分足】</h2>
		<div class="row">
			<?php
			// chart widget
			include_once "widget/chart.php";
			?>
		</div>
	</div>
</div>
