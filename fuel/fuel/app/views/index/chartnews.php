<ul class="nav nav-pills">
	<li class='<?php echo Arr::get($subnav, "list" ); ?>'><?php echo Html::anchor('index/list','List');?></li>
	<li class='<?php echo Arr::get($subnav, "chart" ); ?>'><?php echo Html::anchor('index/chart','Chart');?></li>
	<li class='<?php echo Arr::get($subnav, "news" ); ?>'><?php echo Html::anchor('index/news','News');?></li>
	<li class='<?php echo Arr::get($subnav, "chartnews" ); ?>'><?php echo Html::anchor('index/chart_news','Chart news');?></li>

</ul>
<p>Chart news</p>

<ul id="DateList">
<?php
/*
// ディレクトリハンドルの取得
$dir_h = opendir( "./img/" ) ;
// ファイル・ディレクトリの一覧を $file_list 配列に
while (false !== ($file_list[] = readdir($dir_h))) ;
// ディレクトリハンドルを閉じる
closedir( $dir_h ) ;

// ファイル名(降順)にする
rsort($file_list) ;


echo "<h1>2014年08月</h1>";
//ディレクトリ内のファイル名を１つずつを取得
foreach ( $file_list as $file_name )
{
	//ファイルのみを表示
	if($file_name != "." && $file_name != ".." && $file_name != "" ) {
		if(preg_match('/2014_08.+/',$file_name)) {
			echo "<li><a href='/img.php?date=" .$file_name ."'>" .$file_name ."</a></li>";
		}
	}
}
*/
echo Asset::img('2015_07_31/AUDJPY_15.png');
echo DOCROOT;
/*
	NEWS表示
*/
/*
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


$result = mysql_query("SELECT * from news_before where date='" .date('Y-m-d') ."'");
*/
?>

<h2>アーカイブ</h2>
<a href="/FX/archive/chart_img.php?archive_date=2014_07">2014年7月</a>
<a href="/FX/archive/chart_img.php?archive_date=2014_06">2014年6月</a>

<h2>重要ニュース</h2>
<?php
/*
while ($row = mysql_fetch_assoc($result)) {
//	if(($row['attention_rate'] == "重要度高" || $row['attention_rate'] == "重要度中") && (strstr($row['currency'],"USD")) || strstr($row['currency'],"AUD")) {
	if($row['attention_rate'] == "重要度高" || $row['attention_rate'] == "重要度中") {
		$attention_flag = 0;
		if($row['attention_rate'] == "重要度高") {
			$attention_flag = 1;
		}

//		if($row['attention_rate'] != "") {
			if($attention_flag == 1) {
				echo "<dl style='border-bottom: 1px solid #ffffff;display: block;color: red;'>";
			}else {
				echo "<dl style='border-bottom: 1px solid #ffffff;display: block;'>";
			}
			echo "<dt>" .$row['textdate'] ."</dt>";
			echo "<dd>";
			echo $row['currency'];
			echo "</dd>";
			echo "<dd>" .$row['attention_rate'] ."</dd>";
			echo "<dd>" .$row['title'] ."</dd>";
			echo "</dl>";
//		}
	}
}
*/
?>

</ul>
