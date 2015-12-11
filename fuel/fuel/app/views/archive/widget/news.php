<h2 class='h_decoration'>&nbsp;重要ニュース / <?php echo $set_date; ?></h2>

<?php
/**
 * 下記変数セット
 *
 * $news
 * $set_date
 */

	//ニュース一覧
	foreach ($news as $key => $value) {
		if($value['attention_rate'] != "") {
			if($value['attention_rate'] == "重要度高") {
				echo "<dl class='col-xs-12 col-sm-12 col-md-6' style='color: red;'>";
			}else {
				echo "<dl class='col-xs-12 col-sm-12 col-md-6'>";
			}
			echo "<dt>${value['textdate']}</dt>";
			echo "<dd>【${value['currency']}】";
			echo "</dd>";
			echo "<dd>【重要度】${value['attention_rate']}</dd>";
			echo "<dd>【タイトル】${value['title']}</dd>";
			echo "<dd>【予想】${value['forecast']}</dd>";
			echo "<dd>【結果】${value['result']}</dd>";
			echo "</dl>";
		}
	}
?>
