<h3>Folders:</h3>
<ul>
	<li><?php echo $this->Html->link('..',
			array(encodeUuid($current['Folder']['parentFolderUuid'])),
			array('escape' => false)); ?>
	</li>
	<?php foreach ($folders as $folder): ?>
	<li><?php 
	switch ($folder['Folder']['folderType']){
		case "2":
			echo $this->Html->link($folder['Folder']['name'],
				array('..', '..', 'project', encodeUuid($folder['Folder']['uuid'])),
				array('escape' => false));
				break;
		default:
			echo $this->Html->link($folder['Folder']['name'],
				array(encodeUuid($folder['Folder']['uuid'])),
				array('escape' => false));
	}?>
	</li>
	<?php endforeach; ?>
</ul>

<h3>Albums:</h3>
<ul>
	<?php foreach ($albums as $album): ?>
	<li><?php echo $this->Html->link($album['Album']['name'],
			array('..', '..', 'album', encodeUuid($album['Album']['uuid'])),
			array('escape' => false)); ?>
	</li>
	<?php endforeach; ?>
</ul>
