<h2>Listing S</h2>
<br>
<?php if ($s): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($s as $value): ?>
	<tr>
		<td>
			<?php echo Html::anchor('admin//view/'.$value->id, 'View'); ?> |
			<?php echo Html::anchor('admin//edit/'.$value->id, 'Edit'); ?> |
			<?php echo Html::anchor('admin//delete/'.$value->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
</table>

<?php else: ?>
<p>No S.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin//create', 'Add new ', array('class' => 'btn btn-success')); ?>

</p>
