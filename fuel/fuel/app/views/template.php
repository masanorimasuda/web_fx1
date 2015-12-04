<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<?php
	echo Asset::css(
		array(
			'//netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css' //font awesome
		)
	);
	//個々のページのcss
	echo Asset::render('add_css');
	//個々のページのjs
	echo Asset::render('add_js');
	?>
<meta name="description" content="FX(外国為替証拠金取引)運用補助・チャート分析サイト">
<meta name='robots' content='noindex,follow'>
</head>
<body>
	<div class="container">
		<div class="col-md-12">
			<h1><?php echo $title; ?></h1>
			<hr>
<?php if (Session::get_flash('success')): ?>
			<div class="alert alert-success">
				<strong>Success</strong>
				<p>
				<?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
				</p>
			</div>
<?php endif; ?>
<?php if (Session::get_flash('error')): ?>
			<div class="alert alert-danger">
				<strong>Error</strong>
				<p>
				<?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
				</p>
			</div>
<?php endif; ?>
		</div>

		<div class="col-md-12">
			<ul style="float: right;">
				<li><a href="/admin/login">ログイン</a></li>
			</ul>

<?php
include_once("widget/gnavi1.php");
echo $content; ?>
		</div>
		<footer>
<?php if(false) { ?>
			<p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>
			<p>
				<a href="http://fuelphp.com">FuelPHP</a> is released under the MIT license.<br>
				<small>Version: <?php echo e(Fuel::VERSION); ?></small>
			</p>
<?php } ?>
		</footer>
	</div>
</body>
</html>
