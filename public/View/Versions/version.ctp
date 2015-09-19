<?php 
	if(isset($album)){
		$uuid = $album['Album']['uuid'];
		$modelId = $album['Album']['modelId'];
		$action = 'viewInAlbum';
		$back_action = 'viewAlbum';
	}
	else if(isset($project)){
		$uuid = $project['Folder']['uuid'];
		$modelId = $project['Folder']['modelId'];
		$action = 'viewInProject';
		$back_action = 'view';
	}
?>
<div class="l-image">
	<div class="image-title">
		<?php 
		if(isset($properties['Caption/Abstract']) && strlen(trim($properties['Caption/Abstract'])) > 0){
			echo $properties['Caption/Abstract'];
		} 
		else {
			echo $properties['ProjectName']; 
		}?>
	</div>
	<div class="image-img">
<?php echo  $this->Html->image(
			'viewVersion/'.encodeUuid($version['Version']['uuid']).'/resize:ratio/background:FFF/width:854/height:854/radius:20/'
			.$version['Version']['name'].'.png', array('alt' => 'image title'));?>
	</div>
	<div class="image-toolbar">
	<?php 
		echo $this->Html->link(
				'First',
				array('controller' => 'versions',
						'action' => $action,
						encodeUuid($versions[0]['Version']['uuid']),
						encodeUuid($uuid),
						'#' => 'content'),
				array('escape' => false, 'class' => 'first-btn', 'title' => 'Première image')
		);
		echo $this->Html->link(
				'Preview',
				array('controller' => 'versions',
						'action' => $action,
						encodeUuid($versions[($imageIdx-1 < 0?count($versions)-1:$imageIdx-1)]['Version']['uuid']),
						encodeUuid($uuid),
						'#' => 'content'),
				array('escape' => false, 'class' => 'preview-btn', 'title' => 'Image précédente')
		);
		echo $this->Html->link(
				'Thumbnails',
				array('controller' => 'folders',
						'action' => $back_action,
						encodeUuid($uuid),
						'page' => floor($imageIdx/16)+1),
				array('escape' => false, 'class' => 'thumbnails-btn', 'title' => 'Afficher les miniatures')
		);
		if(isset($properties['ExportedJpg'])){
			echo $this->Html->link(
					'Exported image',
					Configure::read('exportedUrl').$properties['ExportedJpg'],
					array('escape' => false, 'class' => 'exported-btn', 'title' => 'Télécharger une version', 'target' => '_blank')
			);
		}
		echo $this->Html->link(
				'Next',
				array('controller' => 'versions',
						'action' => $action,
						encodeUuid($versions[($imageIdx+1 >= count($versions)?0:$imageIdx+1)]['Version']['uuid']),
						encodeUuid($uuid),
						'#' => 'content'),
				array('escape' => false, 'class' => 'next-btn', 'title' => 'Image suivante')
		);
		echo $this->Html->link(
				'Last',
				array('controller' => 'versions',
						'action' => $action,
						encodeUuid($versions[count($versions)-1]['Version']['uuid']),
						encodeUuid($uuid),
						'#' => 'content'),
				array('escape' => false, 'class' => 'last-btn', 'title' => 'Dernière image')
		);
	?>
	</div>
</div>



<div class="templatemo_left_section">
	<div class="templatemo_title">Commentaires</div>

	<div class="templatemo_section">
		<div class="templatemo_section_top"></div>
		<div class="templatemo_section_mid">
			<?php 
			if(!$comments){
				echo $this->Html->tag('p', 'Pas encore de commentaire pour cette photo.');
			}
			foreach ($comments as $comment){
				echo $this->Html->tag('div',
					$this->Html->tag('div', $comment['AlbumComment']['user'])
					.$this->Html->tag('div', $comment['AlbumComment']['date'])
					.$this->Html->tag('div', $comment['AlbumComment']['comment']), array('class' => 'commentaire'));
			}
			?>
		</div>
		<div class="templatemo_section_bottom"></div>

	</div>

	<div class="templatemo_section">
		<div class="templatemo_title">Ajoutez votre commentaire</div>


		<div class="templatemo_section">
			<div class="templatemo_section_top"></div>
			<div class="templatemo_section_mid">
				<?php if($user) { ?>
				<?php echo $this->form->create('AlbumComment', array('action' => 'addComment')); ?>
				<?php echo $this->form->hidden('AlbumComment.album_id', array( 'value' => $modelId )); ?>
				<?php echo $this->form->hidden('AlbumComment.version_id', array( 'value' => $version['Version']['modelId'] )); ?>
				<?php echo $this->form->input('AlbumComment.user', array('label' => 'Votre nom', 'value' => $user['nickname'])); ?>
				<?php echo $this->form->input('AlbumComment.comment'); ?>
				<?php echo $this->form->submit('Envoyer'); ?>

				<?php echo $this->form->end(); ?>		
				<?php } else { ?>
				<p>Identifiez-vous pour laisser un commentaire.</p>
				<?php } ?>		
			</div>


			<div class="templatemo_section_bottom"></div>
		</div>
	</div>
</div>
<div class="templatemo_right_section">
	<div class="tempatemo_section_box_1">
		<h1>Données</h1>
		<ul>
		<?php 
			if(isset($properties['ImageDate'])) echo $this->Html->tag('li', 'Date: '.date('j/m/Y à G:i:s', $properties['ImageDate']));
			if(isset($properties['Make'])) echo $this->Html->tag('li', 'Marque: '.$properties['Make']);
			if(isset($properties['Model'])) echo $this->Html->tag('li', 'Modèle: '.$properties['Model']);
			if(isset($properties['LensModel'])) echo $this->Html->tag('li', 'Objectif: '.$properties['LensModel']);
			if(isset($properties['ISOSpeedRating'])) echo $this->Html->tag('li', 'ISO: '.$properties['ISOSpeedRating']);
			if(isset($properties['FocalLength'])) echo $this->Html->tag('li', 'Focale: '.$properties['FocalLength'].'mm');
			if(isset($properties['ApertureValue'])) echo $this->Html->tag('li', 'Ouverture: f/'.$properties['ApertureValue']);
			if(isset($properties['ExposureBiasValue'])) echo $this->Html->tag('li', 'Compensation: '.$properties['ExposureBiasValue'].' ev');
			if(isset($properties['ShutterSpeed'])) echo $this->Html->tag('li', 'Temps de pose: '.($properties['ShutterSpeed']>1?$properties['ShutterSpeed']:'1/'.round(1/$properties['ShutterSpeed'])).' sec');
			if(isset($properties['VersionName'])) echo $this->Html->tag('li', 'Nom de l\'image: '.$properties['VersionName']);
			if(isset($properties['Latitude'])) {
				echo $this->Html->tag('li', $this->Html->link('Localisation sur Google map', 'http://maps.google.com/maps?ll='.$properties['Latitude'].','.$properties['Longitude'].'&spn=0.3,0.3&q='.$properties['Latitude'].','.$properties['Longitude'].'&hl=fr'));
			}
			if(isset($properties['ExportedJpg'])) {
				echo $this->Html->tag('li', $this->Html->link('Image en pleine résolution', Configure::read('exportedUrl').$properties['ExportedJpg']));
			}
			
			?>
		</ul>
	</div>
	<div class="tempatemo_right_bottom">
    </div>
	<div class="tempatemo_section_box_1">
		<h1>Autres photos de la galerie</h1>
		<div class="thumnails-container">
			<?php 
			$startIdx = max(0, $imageIdx-2);
			$startIdx = min($startIdx, count($versions)-5);
			if($startIdx < 0)$startIdx = 0;
			for ($i = $startIdx; $i<$startIdx+5 && isset($versions[$i]['Version']); ++$i){
				$thumbnail = $versions[$i]['Version'];
				echo $this->Html->link(
						$this->Html->tag('span', $this->Html->image('viewVersion/'.encodeUuid($thumbnail['uuid']).'/resize:fillArea/width:90/height:90/radius:3/background:dbdbdb/'.$thumbnail['name'].'.png', array('width' => '90', 'height' => '90')), array('class' => 'thumnail-icon')),
						array('controller' => 'versions', 
								'action' => $action, 
								encodeUuid($thumbnail['uuid']), 
								encodeUuid($uuid), 
								'#' => 'content'),
						array('escape' => false)
				);
			}
			?>
			</div>
	</div>
</div>
