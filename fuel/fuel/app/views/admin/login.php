<div class="clearfix container" style="margin-top: 50px;">
	<?php echo Form::open(array('autocomplete'=>'off', 'class' => 'form-horizontal')); ?>
	<?php if (isset($login_error)): ?>
		<div class="error"><?php echo $login_error; ?></div>
	<?php endif; ?>
		<div class="form-group">
			<label for="email" class="col-sm-2 control-label">ID</label>
			<div class="col-sm-6 clearfix">
				<?php echo Form::input('email', Input::post('email'),array('autocomplete'=>'off','class'=>'form-control')); ?>
				<?php if ($val->error('email')): ?>
				<div class="error clearfix">
					<?php echo $val->error('email')->get_message('You must provide a username or email'); ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
		<div class="form-group">
			<label for="password" class="col-sm-2 control-label">パスワード</label>
			<div class="col-sm-6">
				<?php echo Form::password('password','',array('autocomplete'=>'off','placeholder'=>'パスワードを入力して下さい','class'=>'form-control')); ?>
				<?php if ($val->error('password')): ?>
				<div class="error">
					<?php echo $val->error('password')->get_message(':label 空でないパスワードを入力してください。'); ?>
				</div>
				<?php endif; ?>

			</div>
		</div>
		<ul class="clearfix form-group">
			<li class='col-sm-offset-2 col-sm-8'><?php echo Form::submit(array('value'=>'ログイン', 'name'=>'submit','class'=>'btn btn-default')); ?></li>
		</ul>
	<?php echo Form::close(); ?>
</div>
