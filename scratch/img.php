<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns:fb="http://ogp.me/ns/fb#">
<head>
<meta http-equiv="content-language" content="ja" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>為替情報取得</title>

<link rel="stylesheet" type="text/css" href="/css/common.css" media="all" />

<link href="css/ui-lightness/jquery-ui-1.10.4.custom.css" rel="stylesheet">
<script src="js/jquery-1.10.2.js"></script>
<script src="js/jquery-ui-1.10.4.custom.js"></script>


</head>
<body>
<h1><?php echo $_GET['date']; ?></h1>


<h2>ニュース</h2>
<?php

/*
	NEWS表示
*/
$link = mysql_connect('localhost', 'root', 'makurisan');
if (!$link) {
    die('接続失敗です。'.mysql_error());
}

$db_selected = mysql_select_db('FX', $link);
if (!$db_selected){
    die('データベース選択失敗です。'.mysql_error());
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
//ニュース一覧
$result = mysql_query("SELECT * from news_before where date = '" .str_replace("_","-",$_GET['date']) ."'");

while ($row = mysql_fetch_assoc($result)) {
	if(strstr($row['currency'],"USD") || strstr($row['currency'],"AUD") || strstr($row['currency'],"JPY") || strstr($row['currency'],"NZD")) {
		$attention_flag = 0;
		if($row['attention_rate'] == "重要度高") {
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
			echo "<dd>重要度　：　" .$row['attention_rate'] ."</dd>";
			echo "<dd>タイトル　：　" .$row['title'] ."</dd>";
			echo "<dd>予想　：　" .$row['forecast'] ."</dd>";
			echo "<dd>結果　：　" .$row['result'] ."</dd>";
			echo "</dl>";
		}
	}
}
?>
<h2>15分足</h2>
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
</body>
</html>
