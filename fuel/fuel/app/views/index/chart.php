<ul class="nav nav-pills">
	<li class='<?php echo Arr::get($subnav, "list" ); ?>'><?php echo Html::anchor('index/list','List');?></li>
	<li class='<?php echo Arr::get($subnav, "chart" ); ?>'><?php echo Html::anchor('index/chart','Chart');?></li>
	<li class='<?php echo Arr::get($subnav, "news" ); ?>'><?php echo Html::anchor('index/news','News');?></li>
	<li class='<?php echo Arr::get($subnav, "chart_news" ); ?>'><?php echo Html::anchor('index/chart_news','Chart news');?></li>

</ul>
<p>Chart</p>

<h1><?php echo $_GET['date']; ?></h1>


<h2>�j���[�X</h2>
<?php

/*
	NEWS�\��
*/
$link = mysql_connect('localhost', 'root', 'makurisan');
if (!$link) {
    die('�ڑ����s�ł��B'.mysql_error());
}

$db_selected = mysql_select_db('FX', $link);
if (!$db_selected){
    die('�f�[�^�x�[�X�I�����s�ł��B'.mysql_error());
}

$strsql = "SET CHARACTER SET UTF8";
mysql_query($strsql,$link);

$setting_percent = 0.5;

$currency_array = array(
	'AUDUSD',
	'AUDJPY',
	'USDJPY',
	'NZDJPY',
	'CNHJPY',
	'EURJPY',
	'NZDUSD',
	'EURUSD'
);
//�j���[�X�ꗗ
$result = mysql_query("SELECT * from news_before where date = '" .str_replace("_","-",$_GET['date']) ."'");

while ($row = mysql_fetch_assoc($result)) {
	if(strstr($row['currency'],"USD") || strstr($row['currency'],"AUD") || strstr($row['currency'],"JPY") || strstr($row['currency'],"NZD")) {
		$attention_flag = 0;
		if($row['attention_rate'] == "�d�v�x��") {
			$attention_flag = 1;
		}

		if($row['attention_rate'] != "") {
			if($attention_flag == 1) {
				echo "<dl style='border-bottom: 1px solid #ffffff;display: block;color: red;'>";
			}else {
				echo "<dl style='border-bottom: 1px solid #ffffff;display: block;'>";
			}
			echo "<dt>" .$row['textdate'] ."</dt>";
			echo "<dd>";
			echo $row['currency'];
			echo "</dd>";
			echo "<dd>�d�v�x�@�F�@" .$row['attention_rate'] ."</dd>";
			echo "<dd>�^�C�g���@�F�@" .$row['title'] ."</dd>";
			echo "<dd>�\�z�@�F�@" .$row['forecast'] ."</dd>";
			echo "<dd>���ʁ@�F�@" .$row['result'] ."</dd>";
			echo "</dl>";
		}
	}
}
?>
<h2>15����</h2>
<?php
foreach($currency_array as $key=>$value) {
	$result = mysql_query('SELECT * from ' .$value ." WHERE date = '" .str_replace("_","-",$_GET['date']) ."'");

	while ($row = mysql_fetch_assoc($result)) {
		$highlow_percent = (($row['highest']-$row['lowest'])/$row['start'])*100;
		$compare_percent = ($row['compare']/$row['start'])*100;
	}
?>
<dl style="float: left;">
	<dt><?php echo $value; ?></dt>
	<dd><?php echo "<img src='/img/" .$_GET['date'] ."/" .$value ."_15.png' width='400' />\n"; ?></dd>

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
