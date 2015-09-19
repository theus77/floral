<div class="technos index">
	<h2><?php echo __('Technos'); ?></h2>
	<table>
	<tr>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('timestamp'); ?></th>
			<th><?php echo $this->Paginator->sort('key'); ?></th>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('content'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($technos as $techno): ?>
	<tr>
		<td><?php echo h($techno['Techno']['title']); ?>&nbsp;</td>
		<td><?php echo h($techno['Techno']['timestamp']); ?>&nbsp;</td>
		<td><?php echo h($techno['Techno']['key']); ?>&nbsp;</td>
		<td><?php echo h($techno['Techno']['id']); ?>&nbsp;</td>
		<td><?php echo h($techno['Techno']['content']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $techno['Techno']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $techno['Techno']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $techno['Techno']['id']), null, __('Are you sure you want to delete # %s?', $techno['Techno']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Techno'), array('action' => 'add')); ?></li>
	</ul>
</div>
