<?php
App::uses('AppController', 'Controller');
/**
 * SocialNetworkTypes Controller
 *
 * @property SocialNetworkType $SocialNetworkType
 * @property PaginatorComponent $Paginator
 */
class SocialNetworkTypesController extends AppController {

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
		$this->SocialNetworkType->recursive = 0;
		$this->set('socialNetworkTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SocialNetworkType->exists($id)) {
			throw new NotFoundException(__('Invalid social network type'));
		}
		$options = array('conditions' => array('SocialNetworkType.' . $this->SocialNetworkType->primaryKey => $id));
		$this->set('socialNetworkType', $this->SocialNetworkType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SocialNetworkType->create();
			if ($this->SocialNetworkType->save($this->request->data)) {
				$this->Flash->success(__('The social network type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The social network type could not be saved. Please, try again.'));
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
		if (!$this->SocialNetworkType->exists($id)) {
			throw new NotFoundException(__('Invalid social network type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SocialNetworkType->save($this->request->data)) {
				$this->Flash->success(__('The social network type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The social network type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SocialNetworkType.' . $this->SocialNetworkType->primaryKey => $id));
			$this->request->data = $this->SocialNetworkType->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->SocialNetworkType->id = $id;
		if (!$this->SocialNetworkType->exists()) {
			throw new NotFoundException(__('Invalid social network type'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->SocialNetworkType->delete()) {
			$this->Flash->success(__('The social network type has been deleted.'));
		} else {
			$this->Flash->error(__('The social network type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
