<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns:fb="http://ogp.me/ns/fb#">
<head>
<meta http-equiv="content-language" content="ja" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>為替情報取得 画像チャート</title>

<link rel="stylesheet" type="text/css" href="/FX/css/common.css" media="all" />

<link href="/FX/css/ui-lightness/jquery-ui-1.10.4.custom.css" rel="stylesheet">
<script src="/FX/js/jquery-1.10.2.js"></script>
<script src="/FX/js/jquery-ui-1.10.4.custom.js"></script>


</head>
<body>
<?php
$display_date = htmlspecialchars($_GET['archive_date'],ENT_QUOTES);
echo "<h1>" .$display_date ."</h1>";
?>
<ul id="DateList">
<?php
// ディレクトリハンドルの取得
$dir_h = opendir( "../img/" ) ;

// ファイル・ディレクトリの一覧を $file_list 配列に
while (false !== ($file_list[] = readdir($dir_h))) ;
// ディレクトリハンドルを閉じる
closedir( $dir_h ) ;
 
// ファイル名(降順)にする
rsort($file_list) ;

$match_preg = '/' .$display_date. '.+/';

//ディレクトリ内のファイル名を１つずつを取得
foreach ( $file_list as $file_name )
{
	//ファイルのみを表示
	if($file_name != "." && $file_name != ".." && $file_name != "" ) {
		if(preg_match($match_preg,$file_name)) {
			echo "<li><a href='/FX/img.php?date=" .$file_name ."'>" .$file_name ."</a></li>";
		}
	}
}

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


$result = mysql_query("SELECT * from news_before where date='" .date('Y-m-d') ."'");

?>
</body>
</html>
