<?php
// グローバルナビ
include_once "widget/gnavi1.php";
?>

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

<div class="clearfix container">
	<h2>【<?php echo $set_date; ?>】</h2>
	<div class="row">
	<?php
	foreach($currency_datas as $key=>$value) {
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
				echo "<dd style='color: red;'>${compare_percent}</dd>";
			}else {
				echo "<dd>${compare_percent}</dd>";
			}
			?>
		</dl>
	<?php
	}
	?>
	</div>
</div>