<ul class="nav nav-pills">
	<li class='<?php echo Arr::get($subnav, "chart" ); ?>'><?php echo Html::anchor('chart','Chart');?></li>
	<li class='<?php echo Arr::get($subnav, "news" ); ?>'><?php echo Html::anchor('news','News');?></li>
	<li class='<?php echo Arr::get($subnav, "chartnews" ); ?>'><?php echo Html::anchor('chartnews','Chart news');?></li>
	<li class='<?php echo Arr::get($subnav, "rss" ); ?>'><?php echo Html::anchor('rss','Rss');?></li>

</ul>

<h1>チャートデータ　15分足</h1>
<h2>【アーカイブ】</h2>

<?php
// 画像ディレクトリあるだけリンク
echo '<ul class="list-inline clearfix">';
foreach($img_dir_list as $key=>$value) {
	echo '<li><i class="fa fa-line-chart"></i> '.Html::anchor('/index/chart/'.str_replace('_','/',$key), $key).'</li>';
}
echo '</ul>';
?>

<div class="clearfix">
	<h2>【<?php echo $set_date; ?>】</h2>
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
<?php
}
echo '</div>';

 ?>
