<?php
// グローバルナビ
include_once "widget/gnavi1.php";
?>

<h1>チャート + ニュース　<?php echo $set_date; ?></h1>

<div class="clearfix container">
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

<div class="clearfix container">
	<h2>【チャート　15分足】</h2>
	<div class="row">
		<?php
		foreach($currency_datas as $key=>$value) {
			//Debug::dump($value);
			$highlow_percent = (($value['highest'] - $value['lowest'])/$value['start'])*100;
			$compare_percent = ($value['compare']/$value['start'])*100;
		?>
		<dl class="col-xs-12 col-sm-12 col-md-6">
			<dt><?php echo $value['currency']; ?></dt>
			<dd><?php
				$tmp_text = str_replace('-','_',"/assets/img/${set_date}/${value['currency']}");
				echo "<img src='${tmp_text}_15.png' width='400' />\n";
			?></dd>

			<dt>HIGEEST - LOWEST</dt>
			<?php
			if($highlow_percent >= $setting_percent || $highlow_percent <= -1 * $setting_percent) {
				echo "<dd style='color: red;'>${highlow_percent}</dd>";
			}else {
				echo "<dd>${highlow_percent}</dd>";
			}
			?>

			<dt>Compare</dt>
			<?php
			if($compare_percent >= $setting_percent || $compare_percent <= -1 * $setting_percent) {
				echo "<dd style='color: red;'>" .$compare_percent ."</dd>";
			}else {
				echo "<dd>${compare_percent}</dd>";
			}
			?>
		</dl>
		<?php } ?>
	</div>
</div>