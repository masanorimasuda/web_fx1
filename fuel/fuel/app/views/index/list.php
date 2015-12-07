<h1><i class="fa fa-rss"></i>&nbsp;RSS取得</h1>
<div id="tabs" style="background: none;">
	<ul style="background: #ccc;border-color: #333;">
		<li><a href="#tabs-1">RSS</a></li>
		<!--<li><a href="#tabs-2">サイト</a></li>-->
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
				print "<table class='table table-striped table-bordered table-condensed'>\n";
				print "<tr><th width='10%'>日付</th>\n";
				print "<td>${date}</td></tr>\n";
				print "<tr><th>タイトル</th>\n";
				print "<td><i class='fa fa-external-link-square'></i>&nbsp;<a href='${url}' target='_blank'>${title}</a></td></tr>\n";
				print '</table>';
			}
		}
	}

}
?>
</div>
	<div id="tabs-3">
<?php
foreach($url_array as $key=>$value) {
	$rssurl = $value;
	$rssdata = simplexml_load_file($rssurl);

	print "<h1>${key}</h1>\n";

	for ($i=0; $i<$max; $i++){
		$title = $rssdata->channel->item[$i]->title;   // 件名
			$url = $rssdata->channel->item[$i]->link;  // リンク先
			$date = $rssdata->channel->item[$i]->pubDate; //日付
			$id = $rssdata->channel->item[$i]->guid; //日付
			$date = date("Y-m-d H:i:s", strtotime($date));
			
			if (strtotime($date) >= strtotime('2014-01-25 00:30:00')) {
				print "<table class='table table-striped table-bordered table-condensed'>\n";
				print "<tr><th width='10%'>日付</th>\n";
				print "<td>${date}</td></tr>\n";
				print '<tr><th>タイトル</th>'."\n";
				print "<td><i class='fa fa-external-link-square'></i>&nbsp;<a href='${url}' target='_blank'>${title}</a></td></tr>\n";
				print '</table>';
			}
	}
}
?>
