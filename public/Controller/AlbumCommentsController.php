<?php
App::uses('AppController', 'Controller');
/**
 * AlbumComments Controller
 *
 * @property AlbumComment $AlbumComment
 */
class AlbumCommentsController extends AppController {
	
	// 	public function beforeFilter() {
	// 		parent::beforeFilter();
	// 		$this->Auth->allow('addComment');
	// 	}
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->AlbumComment->recursive = 0;
		$this->set('albumComments', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AlbumComment->exists($id)) {
			throw new NotFoundException(__('Invalid album comment'));
		}
		$options = array('conditions' => array('AlbumComment.' . $this->AlbumComment->primaryKey => $id));
		$this->set('albumComment', $this->AlbumComment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AlbumComment->create();
			if ($this->AlbumComment->save($this->request->data)) {
				$this->Session->setFlash(__('The album comment has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The album comment could not be saved. Please, try again.'));
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
		if (!$this->AlbumComment->exists($id)) {
			throw new NotFoundException(__('Invalid album comment'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->AlbumComment->save($this->request->data)) {
				$this->Session->setFlash(__('The album comment has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The album comment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AlbumComment.' . $this->AlbumComment->primaryKey => $id));
			$this->request->data = $this->AlbumComment->find('first', $options);
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
		$this->AlbumComment->id = $id;
		if (!$this->AlbumComment->exists()) {
			throw new NotFoundException(__('Invalid album comment'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AlbumComment->delete()) {
			$this->Session->setFlash(__('Album comment deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Album comment was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function addComment() {
		if ($this->request->is('post')) {
			//Si les données du formulaire peuvent être validées et sauvegardées ...
		
			if($this->AlbumComment->save($this->request->data)) {
				//On définit une message flash en session et on redirige.
				$this->Session->setFlash("Commentaire sauvegardé !");
				//In any case, I doubt that browser vendors will change implementation of 302 response code, because too many applications relay on it. The good thing is that modern browsers understand and correctly process 303 code, so if you want to be sure, return 303 instead of 302
				//http://web.archive.org/web/20060613005528/http://www.theserverside.com/tt/articles/article.tss?l=RedirectAfterPost
				$this->redirect($this->referer(), 301, false);
			}
		}
		
	}
}
?>
