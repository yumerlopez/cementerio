<?php
App::uses('AppController', 'Controller');
/**
 * MultimediaComments Controller
 *
 * @property MultimediaComment $MultimediaComment
 * @property PaginatorComponent $Paginator
 */
class MultimediaCommentsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	private $__unAuthorizedActions = array();
	private $__adminActions = array('index', 'delete', 'add', 'edit', 'view');


	public function isAuthorized($user) {
		if (in_array($this->request->params['action'], $this->__unAuthorizedActions)) {
			return false;
		}
		
		if (in_array($this->request->params['action'], $this->__adminActions) && !parent::isAuthorized($user)) {
			return false;
		}
		
		return true;
	}

	function  beforeFilter() {
		parent::beforeFilter();
		$this->Security->unlockedActions = array('index', 'delete', 'add', 'edit', 'view');
		$this->Auth->allowedActions = array('index', 'delete', 'add', 'edit', 'view');
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->MultimediaComment->recursive = 0;
		$this->set('multimediaComments', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->MultimediaComment->exists($id)) {
			throw new NotFoundException(__('Invalid multimedia comment'));
		}
		$options = array('conditions' => array('MultimediaComment.' . $this->MultimediaComment->primaryKey => $id));
		$this->set('multimediaComment', $this->MultimediaComment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->MultimediaComment->create();
			if ($this->MultimediaComment->save($this->request->data)) {
				$this->Flash->success(__('The multimedia comment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The multimedia comment could not be saved. Please, try again.'));
			}
		}
		$multimedia = $this->MultimediaComment->Multimedia->find('list');
		$users = $this->MultimediaComment->User->find('list');
		$this->set(compact('multimedia', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->MultimediaComment->exists($id)) {
			throw new NotFoundException(__('Invalid multimedia comment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->MultimediaComment->save($this->request->data)) {
				$this->Flash->success(__('The multimedia comment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The multimedia comment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('MultimediaComment.' . $this->MultimediaComment->primaryKey => $id));
			$this->request->data = $this->MultimediaComment->find('first', $options);
		}
		$multimedia = $this->MultimediaComment->Multimedia->find('list');
		$users = $this->MultimediaComment->User->find('list');
		$this->set(compact('multimedia', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->MultimediaComment->id = $id;
		if (!$this->MultimediaComment->exists()) {
			throw new NotFoundException(__('Invalid multimedia comment'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->MultimediaComment->delete()) {
			$this->Flash->success(__('The multimedia comment has been deleted.'));
		} else {
			$this->Flash->error(__('The multimedia comment could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
