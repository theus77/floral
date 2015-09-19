<?php
App::uses('AppController', 'Controller');
/**
 * Technos Controller
 *
 * @property Techno $Techno
 */
class TechnosController extends AppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this->Techno->recursive = 0;
		$this->set('technos', $this->paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		if (!$this->Techno->exists($id)) {
			throw new NotFoundException(__('Invalid techno'));
		}
		$options = array('conditions' => array('Techno.' . $this->Techno->primaryKey => $id));
		$this->set('techno', $this->Techno->find('first', $options));
	}

	public function viewByKey($key = null) {
		$technoPost = $this->Techno->findByKey($key);
		if($technoPost){
			$this->set('post', $technoPost);
		}
		else {
			throw new NotFoundException();
		}
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Techno->create();
			if ($this->Techno->save($this->request->data)) {
				$this->Session->setFlash(__('The techno has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The techno could not be saved. Please, try again.'));
			}
		}
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		if (!$this->Techno->exists($id)) {
			throw new NotFoundException(__('Invalid techno'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Techno->save($this->request->data)) {
				$this->Session->setFlash(__('The techno has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The techno could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Techno.' . $this->Techno->primaryKey => $id));
			$this->request->data = $this->Techno->find('first', $options);
		}
	}

	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @throws MethodNotAllowedException
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null) {
		$this->Techno->id = $id;
		if (!$this->Techno->exists()) {
			throw new NotFoundException(__('Invalid techno'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Techno->delete()) {
			$this->Session->setFlash(__('Techno deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Techno was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function teaser() {
		$technoPost = $this->Techno->find('all', array('limit' => 3, 'order' => array('Techno.timestamp DESC')));
		if($technoPost){
			return $technoPost;
		}
		else {
			throw new NotFoundException();
		}
	}

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('summary', 'show');
		$this->set('page', 'technos');
	}
	
	public function summary() {
	
		$technoPost = $this->Techno->find('all');
		if($technoPost){
			$this->set('posts', $technoPost);
			$this->set('_serialize', array('posts'));
		}
		else {
			throw new NotFoundException();
		}
	}
	
	public function show($key=null) {
		
		$technoPost = $this->Techno->findByKey($key);
		if($technoPost){
			$this->set('post', $technoPost);
			$this->set('_serialize', array('post'));
		}
		else {
			throw new NotFoundException();
		}
	}
	
}
?>