<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$siteDescription = __d('cake_dev', 'La famille en grand et en vert');
$siteTitle = __d('cake_dev', 'MYAM');

?>
<!DOCTYPE html>
<html>
<head>
<?php echo $this->Html->charset(); ?>
<title><?php echo $siteTitle ?>: <?php echo $siteDescription ?>: <?php echo $title_for_layout; ?>
</title>
<?php
echo $this->Html->meta('icon');

//echo $this->Html->css('cake.generic');
echo $this->Html->css('styles');

echo $this->fetch('meta');
echo $this->fetch('css');
echo $this->fetch('script');
echo $this->Html->script('ckeditor/ckeditor.js'); // Inclut la librairie ckeditor
?>
<!-- <script type="text/javascript"> -->
<!-- // function clearText(field) -->
<!-- // { -->
<!-- //     if (field.defaultValue == field.value) field.value = ''; -->
<!-- //     else if (field.value == '') field.value = field.defaultValue; -->
<!-- // } -->
<!-- </script> -->
	<style>

		/* Style the CKEditor element to look like a textfield */
		.cke_textarea_inline
		{
			padding: 10px;
			height: 200px;
			overflow: auto;

			border: 1px solid gray;
			-webkit-appearance: textfield;
		}

	</style>
</head>
<body>
	<div id="templatemo_container">
		<div id="templatemo_header">
			<div id="templatemo_logo">
				<h1>
					<?php echo $siteTitle;?>
				</h1>
				<h2>
					<?php echo $siteDescription;?>
				</h2>
			</div>
			<div id="templatemo_menu">
				<ul><!-- TODO : clean the b tags -->
					<li
					<?php echo (isset($page) && strcmp($page, 'accueil')==0)? 'class="current"' : ''?>><?php echo $this->Html->link('<B>Accueil</B>', array('controller' => 'pages', 'action' => 'display', 'accueil'), array('escape' => false));?>
					</li>
					<li
					<?php echo (isset($page) && strcmp($page, 'technos')==0)? 'class="current"' : ''?>><?php echo $this->Html->link('<B>Technologies</B>', array('controller' => 'technos', 'action' => 'summary', 'technologies'), array('escape' => false));?>
					</li>
					<li
					<?php echo (isset($page) && strcmp($page, 'photos')==0)? 'class="current"' : ''?>><?php echo $this->Html->link('<B>Photos</B>', array('controller' => 'folders', 'action' => 'view', 'RpqwCXFGSSaC606qEdUFUA'), array('escape' => false));?>
					</li>
<!-- 					<li 
					<?php echo (isset($page) && strcmp($page, 'contact')==0)? 'class="current"' : ''?>><?php echo $this->Html->link('<B>Contact</B>', array('controller' => 'pages', 'action' => 'display', 'contact'), array('escape' => false));?>
 					</li> -->
					<li
					<?php echo (isset($page) && strcmp($page, 'login')==0)? 'class="current"' : ''?>>
					<?php echo($user?$this->Html->link('<B>Logout</B>', array('controller' => 'users', 'action' => 'logout'), array('escape' => false)):$this->Html->link('<B>Login</B>', array('controller' => 'users', 'action' => 'login'), array('escape' => false)));?>
					</li>
					</ul>
			</div>
			<div class="cleaner"></div>
		</div>

		<div id="templatemo_content_area_top">
			<div class="templatemo_left_top">
				<?php 
				foreach($teaserPosts as $post){
					echo '<div class="templatemo_news"><p>'.$this->Html->link($post['Techno']['title'], array('controller' => 'technos', 'action' => 'show', $post['Techno']['key'])).'</p></div>';
				}
				?>
			</div>

			<div class="templatemo_right_top">
				<?php 
					echo $this->Html->link(
						$this->Html->image('viewVersion/'.encodeUuid($randomImage['Version']['uuid']).'/resize:fillArea/width:483/height:186/radius:6/'.$randomImage['Version']['name'].'.png', array('alt' => 'Image aléatoire', 'width' => '483', 'height' => '186')) // 'viewVersion/?resize=fillArea&width=483&height=186&radius=6&uuid='., array('alt' => 'Image aléatoire', 'width' => '483', 'height' => '186'))
								,
						//$this->Html->image('apply.php?width=483&height=186&radius=6&source='.urlencode('Thumbnails/'.$randomImage['ImageProxyState']['thumbnailPath']), array('alt' => 'Image aléatoire', 'width' => '483', 'height' => '186')),
						array('controller' => 'versions', 'action' => 'viewInAlbum', encodeUuid($randomImage['Version']['uuid']), 'tkTOIvL4THSZPKhkL4tQ0w' , '#' => 'content'),
							array('escape' => false));
				?>
				
				<div id="templatemo_search">
				<?php 
					echo $this->Form->create(null, array(
						'url' => array('controller' => 'app', 'action' => 'postSearch'),
						'id' => 'SearchForm'));
					echo $this->Form->input('query', array(
							'id' => 'searchfield',
							'placeholder' => 'Mot clé',
							'name' => 'query',
							//'onblur' => 'clearText(this)',
							//'onfocus' => 'clearText(this)',
							'title' => 'searchfield'
					));
					echo $this->Form->input(__('Search'), array(
							'type' => 'submit',
							'id' => 'searchbutton',
							'title' => 'Rechercher'
					));
					echo $this->Form->end();
				?>
				</div>
			</div>
			<div class="cleaner"></div>
		</div>
		<!-- End Of Content area top -->
		<A id="content"></A>
		<div id="templatemo_content_area_bottom">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
			<div class="cleaner"></div>
		</div>
		<!-- End Of Content area bottom -->

		<div id="templatemo_footer">
			Copyright © 2013
			<?php 
			echo $this->Html->link(
					'theus deka',
					array('controller' => 'pages', 'action' => 'display', 'accueil'),array('escape' => false));
			?>
			| Designed by <a href="http://www.templatemo.com" target="_parent">Free
				CSS Templates</a> | Validate <a
				href="http://validator.w3.org/check?uri=referer">XHTML</a> &amp; <a
				href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a>
		</div>
	</div>
	<!-- End Of Container -->
	<!--  Free CSS Templates by TemplateMo.com  -->
</body>
</html>
