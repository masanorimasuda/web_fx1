<ul class="nav nav-pills">
	<li class='<?php echo Arr::get($subnav, "today" ); ?>'><?php echo Html::anchor('today','本日の重要指標・前日の通貨変動');?></li>
	<li class='<?php echo Arr::get($subnav, "chart" ); ?>'><?php echo Html::anchor('chart','チャート');?></li>
	<li class='<?php echo Arr::get($subnav, "news" ); ?>'><?php echo Html::anchor('news','ニュース');?></li>
	<!--<li class='<?php echo Arr::get($subnav, "chartnews" ); ?>'><?php echo Html::anchor('chartnews','チャート・ニュース');?></li>-->
	<li class='<?php echo Arr::get($subnav, "rss" ); ?>'><?php echo Html::anchor('rss','RSS/外部サイトリンク');?></li>
	<!--<li class='<?php echo Arr::get($subnav, "setting" ); ?>'><?php echo Html::anchor('setting','設定');?></li>-->
</ul>