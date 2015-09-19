<div class="technos view">
<h2><?php  echo __('Techno'); ?></h2>
	<dl>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($techno['Techno']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Timestamp'); ?></dt>
		<dd>
			<?php echo h($techno['Techno']['timestamp']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Key'); ?></dt>
		<dd>
			<?php echo h($techno['Techno']['key']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($techno['Techno']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo h($techno['Techno']['content']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Techno'), array('action' => 'edit', $techno['Techno']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Techno'), array('action' => 'delete', $techno['Techno']['id']), null, __('Are you sure you want to delete # %s?', $techno['Techno']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Technos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Techno'), array('action' => 'add')); ?> </li>
	</ul>
</div>
