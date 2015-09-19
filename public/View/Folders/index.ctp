<?php 
	function printSubFolders($self, $children){
		echo '<ul>';
		foreach ($children as $child){
			echo '<li>';
			
			if (isset($child['Folder'])) {
				switch ($child['Folder']['folderType']) {
					case 1:
						echo $self->Html->link($child['Folder']['name'],
							array('controller' => 'folders', 'action' => 'view', encodeUuid($child['Folder']['uuid'])),
							array('escape' => false));
						if (isset($child['Children'])) {
							printSubFolders($self, $child['Children']);
						}
						break;
					
					default:
						echo $self->Html->link($child['Folder']['name'],
							array('controller' => 'folders', 'action' => 'view', encodeUuid($child['Folder']['uuid'])),
							array('escape' => false));
						break;
					
				}
				
			} else { // it's an album
				echo $self->Html->link($child['Album']['name'],
					array('controller' => 'folders', 'action' => 'viewAlbum', encodeUuid($child['Album']['uuid'])),
					array('escape' => false));
			}
			echo '</li>';
		}
		echo '</ul>';
	}
?>

<div class="page_section">

	<?php foreach ($folders as $folder): ?>
		<div class="page_title">Albums et projets présent dans le dossier <?php 
			echo $folder['Folder']['name'];
		?></div>
		<div class="page_section_top"></div>
		<div class="page_section_middle">
		<p>
			<?php printSubFolders($this, $folder['Children']); ?>
		</p>
		</div>
		<div class="page_section_bottom"></div>
		<div>&nbsp;</div>
	<?php endforeach; ?>
</div>