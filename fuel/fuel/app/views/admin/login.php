<div id="LoginWrapper">
<?php echo Form::open(array('autocomplete'=>'off')); ?>

	<?php if (isset($_GET['destination'])): ?>
		<?php echo Form::hidden('destination',$_GET['destination']); ?>
	<?php endif; ?>

	<?php if (isset($login_error)): ?>
		<div class="error"><?php echo $login_error; ?></div>
	<?php endif; ?>
	<div class="MaruWaku" id="LoginBox">
		<table class="clearfix">
			<tr class="InputBox">
				<th>
					<label for="email">ID</label>
				</th>
				<td>
					<div class="input"><?php echo Form::input('email', Input::post('email'),array('autocomplete'=>'off')); ?></div>
					<?php if ($val->error('email')): ?>
						<div class="error"><?php echo $val->error('email')->get_message('You must provide a username or email'); ?></div>
					<?php endif; ?>
				</td>
			</tr>
			<tr class="InputBox">
				<th>
					<label for="password">パスワード</label>
				</th>
				<td>
					<div class="input"><?php
						//★パスワード保存を無効にする方法を要確認★
						echo Form::password('password','',array('autocomplete'=>'off','placeholder'=>'パスワードを入力して下さい'));
					?></div>
					<?php if ($val->error('password')): ?>
						<div class="error"><?php echo $val->error('password')->get_message(':label 空でないパスワードを入力してください。'); ?></div>
					<?php endif; ?>
				</td>
			</tr>
		</table>

		<ul class="clearfix">
			<li class="btn btn--grey btn--middle"><?php echo Form::submit(array('value'=>'ログイン', 'name'=>'submit','class'=>'btn__size_big')); ?></li>
		</ul>
	</div>
<?php echo Form::close(); ?>

</div><!-- /#LoginWrapper -->