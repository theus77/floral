<div class="l-image">
	<?php echo $this->Html->image('viewVersion/'.encodeUuid($version['Version']['uuid']).'/resize:ratio/width:854/height:854/radius:20/'.$version['Version']['name'].'.png', array('alt' => 'image title'));?>
	<?php echo $this->Html->link('Exported',
				$version['Version']['exportedJpg']);?>
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
				<?php echo $this->form->hidden('AlbumComment.album_id', array( 'value' => 0 )); ?>
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
		<h1>Autres photos de la galerie</h1>
		<div class="thumnails-container">
			<?php 
			foreach ($versions as $thumbnail){
				echo $this->Html->link(
						$this->Html->tag('span', $this->Html->image('viewVersion/'.encodeUuid($thumbnail['Version']['uuid']).'/resize:fillArea/width:90/height:90/radius:3/background:dbdbdb/'.$thumbnail['Version']['name'].'.png', array('width' => '90', 'height' => '90')), array('class' => 'thumnail-icon')),
						array(encodeUuid($projectUuid), encodeUuid($thumbnail['Version']['uuid']), '#' => 'content'),
						array('escape' => false)
				);
			}
			?>
			</div>
	</div>
</div>
