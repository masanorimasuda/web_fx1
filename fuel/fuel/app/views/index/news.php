<?php
// グローバルナビ
include_once "widget/gnavi1.php";
?>
<h1>ニュース</h1>

<div class="clearfix container">
	<div class="col-sm-4">
		<h2>【アーカイブ】</h2>
		<?php
		// newsリンクリストあるだけ表示
		echo '<ul class="list-inline clearfix">';
		foreach ($news_datelist as $key => $value) {
			echo '<li><i class="fa fa-newspaper-o"></i> '.Html::anchor('/index/news/'.str_replace('-','/',$key), $key).'</li>';
		}
		echo '</ul>';
		?>
	</div>

	<div class="col-sm-8">
		<h2>【<?php echo $set_date; ?>】</h2>
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
	}?>

		</div>
	</div>
</div>
