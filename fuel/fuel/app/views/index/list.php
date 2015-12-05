<h1>RSS + 外部サイト</h1>
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">RSS</a></li>
		<li><a href="#tabs-2">サイト</a></li>
		<li><a href="#tabs-3">全RSS</a></li>
	</ul>
	<div id="tabs-1">
<?php

print date("Y-m-d H:i:s",strtotime("-1 hour"));
/* ---------------------------
 * 表示
 ---------------------------*/
print '<dl><dt>マッチング条件:</dt><dd>'.$all_patern.'</dd></dl>';

foreach($url_array as $key=>$value) {
	$rssurl = $value;
	$rssdata = simplexml_load_file($rssurl);

	echo "<h1>${key}</h1>\n";
	
	for ($i=0; $i<$max; $i++){
		$title = $rssdata->channel->item[$i]->title;   // 件名
		if ($all_patern == "all" || preg_match($all_patern, $title)) {
			$url = $rssdata->channel->item[$i]->link;  // リンク先
			$date = $rssdata->channel->item[$i]->pubDate; //日付
			$id = $rssdata->channel->item[$i]->guid; //日付
			$date = date("Y-m-d H:i:s", strtotime($date));
			
			if (strtotime($date) >= strtotime('2014-01-25 00:30:00')) {
				print "<table border='4' width='700'>\n";
				print "<tr><th>日付</th>\n";
				print "<td>${date}</td></tr>\n";
				print "<tr><th>タイトル</th>\n";
				print "<td><a href='${url}' target='_blank'>${title}</a></td></tr>\n";
				print '</table>';
			}
		}
	}

}
?>
</div>
	<div id="tabs-2">
		<h2>情報サイト</h2>
		<ul>
			<li><a href="http://fx.minkabu.jp/" target="_blank">みんなの外為</a></li>
			<li><a href="http://fxforex.seesaa.net/" target="_blank">羊飼いのfxブログ</a></li>
		</ul>

		<h2>ニュース発表</h2>
		<ul>
			<li><a href="http://min-fx.jp/market/indicators/" target="_blank">みんなのFX　経済指標カレンダー</a></li>
			<li><a href="http://www.cyberagentfx.jp/gaikaex/mark/calendar/" target="_blank">サイバーエージェントFX　経済指標カレンダー</a></li>
		</ul>

		<h2>チャート</h2>
		<ul>
			<li><a href="http://netnavigate.net/kikinzoku/" target="_blank">金チャート</a></li>
			<li><a href="http://www.bloomberg.co.jp/apps/cbuilder?T=jp09_&ticker1=USGG10YR%3AIND" target="_blank">米10年債</a></li>
			<li><a href="http://www.gaitame.com/market/aus.html" target="_blank">豪政策金利</a></li>
		</ul>

		<h2>各社為替予想</h2>
		<ul>
			<li><a href="http://fx.formylife.jp/index.html" target="_blank">本日のfx外国為替予想／今週のfx外国為替予想</a></li>
		</ul>
		 

		</div>
	<div id="tabs-3">
<?php
foreach($url_array as $key=>$value) {
	$rssurl = $value;
	$rssdata = simplexml_load_file($rssurl);

	print "<h1>" .$key ."</h1>" ."\n";

	for ($i=0; $i<$max; $i++){
		$title = $rssdata->channel->item[$i]->title;   // 件名
			$url = $rssdata->channel->item[$i]->link;  // リンク先
			$date = $rssdata->channel->item[$i]->pubDate; //日付
			$id = $rssdata->channel->item[$i]->guid; //日付
			$date = date("Y-m-d H:i:s", strtotime($date));
			
			if (strtotime($date) >= strtotime('2014-01-25 00:30:00')) {
				print '<table border="4" width="700">' ."\n";
				print '<tr><th>日付</th>'."\n";
				print '<td>' .$date .'</td></tr>'."\n";
				print '<tr><th>タイトル</th>'."\n";
				print '<td>' .'<a href="'.$url.'" target="_blank">'.$title.'</a>' .'</td></tr>'."\n";
				print '</table>';
			}
	}
}
?>
