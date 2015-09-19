<div class="albumComments view">
<h2><?php  echo __('Album Comment'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($albumComment['AlbumComment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Album Id'); ?></dt>
		<dd>
			<?php echo h($albumComment['AlbumComment']['album_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Version Id'); ?></dt>
		<dd>
			<?php echo h($albumComment['AlbumComment']['version_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($albumComment['AlbumComment']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo h($albumComment['AlbumComment']['user']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment'); ?></dt>
		<dd>
			<?php echo h($albumComment['AlbumComment']['comment']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Album Comment'), array('action' => 'edit', $albumComment['AlbumComment']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Album Comment'), array('action' => 'delete', $albumComment['AlbumComment']['id']), null, __('Are you sure you want to delete # %s?', $albumComment['AlbumComment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Album Comments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album Comment'), array('action' => 'add')); ?> </li>
	</ul>
</div>
