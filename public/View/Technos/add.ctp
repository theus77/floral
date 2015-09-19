<div class="technos form">
<?php echo $this->Form->create('Techno'); ?>
	<fieldset>
		<legend><?php echo __('Add Techno'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('timestamp');
		echo $this->Form->input('key');
		echo $this->Form->input('content');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Technos'), array('action' => 'index')); ?></li>
	</ul>
</div>
