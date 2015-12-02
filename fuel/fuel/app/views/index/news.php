<ul class="nav nav-pills">
	<li class='<?php echo Arr::get($subnav, "list" ); ?>'><?php echo Html::anchor('index/list','List');?></li>
	<li class='<?php echo Arr::get($subnav, "chart" ); ?>'><?php echo Html::anchor('index/chart','Chart');?></li>
	<li class='<?php echo Arr::get($subnav, "news" ); ?>'><?php echo Html::anchor('index/news','News');?></li>
	<li class='<?php echo Arr::get($subnav, "chartnews" ); ?>'><?php echo Html::anchor('index/chart_news','Chart news');?></li>

</ul>
<p>News</p>