<ul style="float: right;">
	<li class='<?php echo Arr::get($subnav, "admin" ); ?>'><?php echo Html::anchor('admin/index','<i class="fa fa-sign-in"></i>&nbsp;ログイン');?></li>
</ul>

	<ul class="nav nav-pills">
		<li class='<?php echo Arr::get($subnav, "today" ); ?>'><?php echo Html::anchor('today','<i class="fa fa-newspaper-o"></i>&nbsp;本日の重要指標・<i class="fa fa-line-chart"></i>&nbsp;前日の通貨変動');?></li>
		<li class='<?php echo Arr::get($subnav, "rss" ); ?>'><?php echo Html::anchor('rss','<i class="fa fa-rss"></i>&nbsp;RSS');?></li>
		<li class='<?php echo Arr::get($subnav, "links" ); ?>'><?php echo Html::anchor('links','<i class="fa fa-external-link"></i>&nbsp;外部サイト');?></li>
		<!--<li class='<?php echo Arr::get($subnav, "chartnews" ); ?>'><?php echo Html::anchor('chartnews','チャート・ニュース');?></li>-->
		<!--<li class='<?php echo Arr::get($subnav, "setting" ); ?>'><?php echo Html::anchor('setting','設定');?></li>-->
		<li class="dropdown">
			<a  id="dropdownMenu1" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-archive"></i>&nbsp;アーカイブ <b class="caret"></b></a>
			<ul class="dropdown-menu" aria-labelledby="sample-menu-1" style="padding: 0;margin:0;">
				<li class='<?php echo Arr::get($subnav, "chart" ); ?>'><?php echo Html::anchor('chart','<i class="fa fa-line-chart"></i>
&nbsp;チャート');?></li>
				<li class='<?php echo Arr::get($subnav, "news" ); ?>'><?php echo Html::anchor('news','<i class="fa fa-newspaper-o"></i>&nbsp;ニュース');?></li>
			</ul>
		</li>
	</ul>

