<ul class="nav nav-pills">
	<li class='<?php echo Arr::get($subnav, "chart" ); ?>'><?php echo Html::anchor('chart','Chart');?></li>
	<li class='<?php echo Arr::get($subnav, "news" ); ?>'><?php echo Html::anchor('news','News');?></li>
	<li class='<?php echo Arr::get($subnav, "chartnews" ); ?>'><?php echo Html::anchor('chartnews','Chart news');?></li>
	<li class='<?php echo Arr::get($subnav, "rss" ); ?>'><?php echo Html::anchor('rss','Rss');?></li>
</ul>
<p>Chart news</p>

<h1><?php echo $set_date; ?></h1>

<h2>ニュース</h2>
<?php
//ニュース一覧
foreach ($news as $key => $value) {
	if($value['attention_rate'] != "") {
		if($value['attention_rate'] == "重要度高") {
			echo "<dl style='border-bottom: 1px solid #ffffff;display: block;color: red;'>";
		}else {
			echo "<dl style='border-bottom: 1px solid #ffffff;display: block;'>";
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
<h2>15分足</h2>
<?php
foreach($currency_datas as $key=>$value) {
	//Debug::dump($value);
	$highlow_percent = (($value['highest'] - $value['lowest'])/$value['start'])*100;
	$compare_percent = ($value['compare']/$value['start'])*100;
?>
<dl style="float: left;">
	<dt><?php echo $value['currency']; ?></dt>
	<dd><?php
		$tmp_text = str_replace('-','_',"/assets/img/${set_date}/${value['currency']}");
		echo "<img src='${tmp_text}_15.png' width='400' />\n";
	?></dd>

	<dt>HIGEEST - LOWEST</dt>
	<?php
	if($highlow_percent >= $setting_percent || $highlow_percent <= -1 * $setting_percent) {
		echo "<dd style='color: red;'>" .$highlow_percent ."</dd>";
	}else {
		echo "<dd>" .$highlow_percent ."</dd>";
	}
	?>

	<dt>Compare</dt>
	<?php
	if($compare_percent >= $setting_percent || $compare_percent <= -1 * $setting_percent) {
		echo "<dd style='color: red;'>" .$compare_percent ."</dd>";
	}else {
		echo "<dd>" .$compare_percent ."</dd>";
	}
	?>
</dl>
<?php } ?>
