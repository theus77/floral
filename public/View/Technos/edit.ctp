<div class="technos form">
<?php echo $this->Form->create('Techno'); ?>
	<fieldset>
		<legend><?php echo __('Edit Techno'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('timestamp');
		echo $this->Form->input('key');
		echo $this->Form->input('id');
		echo $this->Form->input('content');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Techno.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Techno.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Technos'), array('action' => 'index')); ?></li>
	</ul>
</div>

	<script>
		CKEDITOR.replace( 'data[Techno][content]' );
		/*CKEDITOR.replace( 'data[Techno][content]', {
			toolbarGroups: [
				{ name: 'document',	   groups: [ 'mode', 'document' ] },			// Displays document group with its two subgroups.
		 		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },			// Group's name will be used to create voice label.
		 		'/',																// Line break - next group will be placed in new line.
		 		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		 		{ name: 'links' },
		 		'/',
		 		{ name: 'tools', items: [ 'maximize'] }
			]

			// NOTE: Remember to leave 'toolbar' property with the default value (null).
		});*/
	</script>
