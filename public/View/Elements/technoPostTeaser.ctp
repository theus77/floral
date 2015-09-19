
	<?php 
	foreach($posts as $post){
		echo '<div class="templatemo_news"><p>'.$this->Html->link($post['Techno']['title'], array('controller' => 'techno', 'action' => 'viewByKey', 'key' => $post['Techno']['key'])).'</p></div>';
	}?>

