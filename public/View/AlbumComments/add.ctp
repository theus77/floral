<div class="albumComments form">
<?php echo $this->Form->create('AlbumComment'); ?>
	<fieldset>
		<legend><?php echo __('Add Album Comment'); ?></legend>
	<?php
		echo $this->Form->input('album_id');
		echo $this->Form->input('version_id');
		echo $this->Form->input('date');
		echo $this->Form->input('user');
		echo $this->Form->input('comment');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Album Comments'), array('action' => 'index')); ?></li>
	</ul>
</div>
