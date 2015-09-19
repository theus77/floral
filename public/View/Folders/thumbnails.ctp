<?php 

	if(isset($album)){
		$action = 'viewInAlbum';
		$back_action = 'viewAlbum';
		$title = 'l\'album '.$album['Album']['name'];
		$uuid = $album['Album']['uuid'];
		$download = 'downloadAlbum';
	}
	else if(isset($project)){
		$action = 'viewInProject';
		$back_action = 'view';
		$title = 'le projet '.$project['Folder']['name'];
		$uuid = $project['Folder']['uuid'];
		$download = 'download';
	}
	$this->Paginator->options(array(
	    'url' => array(
	        'controller' => 'folders', 'action' =>  $back_action, encodeUuid($uuid)
	    )
	));
?>
<div class="page_section">
	<div class="page_title">Photos présentent dans <?php 
		echo $title;
		// var_dump($this->Paginator);
		if ($this->Paginator->hasPrev() || $this->Paginator->hasNext()) {
			echo $this->Paginator->counter(' (Page {:page} sur {:pages})');
		}
	?></div>
	<div class="page_section_top"></div>
	<div class="page_section_middle">
		<?php 
			foreach ($versions as $version){
				$thumbnail = isset($version['Version'])?$version['Version']:$version;
				echo $this->Html->link(
						$this->Html->tag('span', $this->Html->image('viewVersion/'.encodeUuid($thumbnail['uuid']).'/resize:fillArea/width:202/height:202/radius:3/background:dbdbdb/'.$thumbnail['name'].'.png', array('width' => '202', 'height' => '202')), array('class' => 'thumnail-icon')),
						array('controller' => 'versions', 'action' =>  $action, encodeUuid($thumbnail['uuid']), encodeUuid($uuid), '#' => 'content'),
						array('escape' => false)
				);
			}
		?>
		<?php if(count($versions) == 0):?>
			<p>
				Attention <?php echo $title; ?> est soit vide soit d'un type non supporté.
			</p>
		<?php endif;?>
		<div><?php
			//TODO recupere le rate s'il existe 
			/*$this->Paginator->options(array(
					'url' => array(
							'rate' => 0
					)
			));*/
		
			echo $this->Paginator->numbers(array(
				'model' => 'Version',
				'before' => 'Pages '
			));
		?></div>			
		<div><?php 
		if($user) {			
			echo $this->Html->link(__('Liste des dossiers'), array('action' => 'index', '#' => encodeUuid($uuid)))." - ";
		}
			echo $this->Html->link(__('Download'), array('action' => $download, encodeUuid($uuid)));
		?></div>	
	</div>
	<div class="page_section_bottom"></div>
</div>