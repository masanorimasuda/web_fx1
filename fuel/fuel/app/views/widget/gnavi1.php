	<ul style="float: right;width: 100%;text-align: right;">
				<li class='<?php echo Arr::get($subnav, "admin" ); ?>'><?php echo Html::anchor('admin/index','<i class="fa fa-sign-in"></i>&nbsp;ログイン');?></li>
	</ul>


	<ul class="nav nav-pills">
		<li class='<?php echo Arr::get($subnav, "today" ); ?>'><?php echo Html::anchor('today','<i class="fa fa-newspaper-o"></i>&nbsp;本日の重要指標・<i class="fa fa-line-chart"></i>&nbsp;前日の通貨変動');?></li>
		<li class='<?php echo Arr::get($subnav, "rss" ); ?>'><?php echo Html::anchor('rss','<i class="fa fa-rss"></i>&nbsp;RSS取得');?></li>
		<li class='<?php echo Arr::get($subnav, "chartnews" ); ?>'><?php echo Html::anchor('archive/chartnews','<i class="fa fa-search"></i>&nbsp;チャート分析');?></li>
		<li class='<?php echo Arr::get($subnav, "links" ); ?>'><?php echo Html::anchor('links','<i class="fa fa-external-link"></i>&nbsp;外部サイト');?></li>
		<!--<li class='<?php echo Arr::get($subnav, "setting" ); ?>'><?php echo Html::anchor('setting','設定');?></li>-->
		<li class="dropdown">
			<a  id="dropdownMenu1" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-archive"></i>&nbsp;アーカイブ <b class="caret"></b></a>
			<ul class="dropdown-menu" aria-labelledby="sample-menu-1" style="padding: 0;margin:0;">
				<li class='<?php echo Arr::get($subnav, "chart" ); ?>'><?php echo Html::anchor('archive/chart','<i class="fa fa-line-chart"></i>&nbsp;チャート');?></li>
				<li class='<?php echo Arr::get($subnav, "news" ); ?>'><?php echo Html::anchor('archive/news','<i class="fa fa-newspaper-o"></i>&nbsp;ニュース');?></li>
				<!--<li class='<?php echo Arr::get($subnav, "chartnews" ); ?>'><?php echo Html::anchor('archive/chartnews','<i class="fa fa-line-chart"></i>&nbsp;チャート/<i class="fa fa-newspaper-o"></i>&nbsp;ニュース');?></li>-->
			</ul>
		</li>
	</ul>

