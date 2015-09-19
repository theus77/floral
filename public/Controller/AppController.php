<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	/**
	 * This controller does not use a model
	 *
	 * @var array
	 */
	public $uses = array('Techno', 'ApertureConnector.Version', 'ApertureConnector.AlbumVersion');

	/**
	 * Use the BanchaPaginatorComponent to also support pagination
	 * and remote searching for Sencha Touch and ExtJS stores
	 */
	public $components = array(
			'Acl',
			'Auth' => array(
					'authorize' => array(
							'Actions' => array('actionPath' => 'controllers')
					)
			),
			'Session',
			'RequestHandler'
	);

	public $helpers = array('Html', 'Form', 'Session');

	public function beforeFilter() {
		// 		parent::beforeFilter();
		//Configure AuthComponent
		$this->Auth->loginAction = array('plugin' => '', 'controller' => 'users', 'action' => 'login');
		$this->Auth->logoutRedirect = array('plugin' => '', 'controller' => 'users', 'action' => 'login');
		$this->Auth->loginRedirect = array('plugin' => '', 'controller' => 'pages', 'action' => 'display');

		$technoPost = $this->Techno->find('all', array('limit' => 3, 'order' => array('Techno.timestamp DESC')));
		if($technoPost){
			$this->set('teaserPosts', $technoPost);
		}
		else {
			$this->set('teaserPosts', array());
		}
		$options = array();
		$options['order'] = 'RANDOM()';
		$options['conditions'] = array('albumId' => 2888);
		$rec = $this->AlbumVersion->find('first', $options);
		$version = $this->Version->findByModelid($rec['AlbumVersion']['versionId']);
		$this->set('randomImage', $version);

		$this->set('user', $this->Auth->user());
		
		parent::beforeFilter();
		$this->Auth->allow('postSearch', 'search', 'viewVersion');
	}

	

	public function postSearch() {
		$query = "*";
		if(isset($this->request->data) && isset($this->request->data['query'])){
			$query = $this->request->data['query'];
		}
		$this->redirect(array('action' => 'search', $query), 301);
	}
	
	public function search() {
		//todo
	}
}
?>
