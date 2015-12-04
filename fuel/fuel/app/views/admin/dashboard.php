
	<div class="EachBlock MaruWaku">
		<h3 class="UpperMaruWaku horizon_gradient_gray">一般メニュー</h3>
		<ul class="clearfix">
			<li class="btn btn--grey"><?php echo Html::anchor('inbox','送受信トレイ',array('class'=>'btn__size_windowhalf'));?></li>
			<li class="btn btn--grey"><?php echo Html::anchor('building/index','物件管理',array('class'=>'btn__size_windowhalf'));?></li>
			<li class="btn btn--grey"><?php echo Html::anchor('customer/new','顧客管理',array('class'=>'btn__size_windowhalf'));?></li>
			<li class="btn btn--grey"><?php echo Html::anchor('owner/new','オーナー管理',array('class'=>'btn__size_windowhalf'));?></li>
			<li class="btn btn--grey"><?php echo Html::anchor('estateagent/new','業者管理',array('class'=>'btn__size_windowhalf'));?></li>
			<li class="btn btn--grey"><?php echo Html::anchor('mypage/index','マイページ',array('class'=>'btn__size_windowhalf'));?></li>
		</ul>
	</div>

	<?php //if($now_group_id == 100 || $now_group_id == 999) { ?>
	<div class="EachBlock MaruWaku">
		<h3 class="UpperMaruWaku horizon_gradient_pink">管理者メニュー</h3>
		<ul class="DefaultBigBtn clearfix">
			<?php if($now_group_id >= 100) { ?>
			<li class="btn btn--grey"><?php echo Html::anchor('adminmenu/index','管理者メニュー',array('class'=>'btn__size_windowhalf'));?></li>
			<?php } ?>
			<li class="btn btn--grey"><?php echo Html::anchor('ownermypageinfo/index','オーナーMyページ新着登録',array('class'=>'btn__size_windowhalf'));?></li>
		</ul>
	</div><!-- /.EachBlock -->
	<?php //}?>
