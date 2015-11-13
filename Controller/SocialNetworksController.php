<?php
App::uses('AppController', 'Controller');
/**
 * SocialNetworks Controller
 *
 * @property SocialNetwork $SocialNetwork
 * @property PaginatorComponent $Paginator
 */
class SocialNetworksController extends AppController {

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
		$this->SocialNetwork->recursive = 0;
		$this->set('socialNetworks', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SocialNetwork->exists($id)) {
			throw new NotFoundException(__('Invalid social network'));
		}
		$options = array('conditions' => array('SocialNetwork.' . $this->SocialNetwork->primaryKey => $id));
		$this->set('socialNetwork', $this->SocialNetwork->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SocialNetwork->create();
			if ($this->SocialNetwork->save($this->request->data)) {
				$this->Flash->success(__('The social network has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The social network could not be saved. Please, try again.'));
			}
		}
		$users = $this->SocialNetwork->User->find('list');
		$socialNetworkTypes = $this->SocialNetwork->SocialNetworkType->find('list');
		$this->set(compact('users', 'socialNetworkTypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->SocialNetwork->exists($id)) {
			throw new NotFoundException(__('Invalid social network'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SocialNetwork->save($this->request->data)) {
				$this->Flash->success(__('The social network has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The social network could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SocialNetwork.' . $this->SocialNetwork->primaryKey => $id));
			$this->request->data = $this->SocialNetwork->find('first', $options);
		}
		$users = $this->SocialNetwork->User->find('list');
		$socialNetworkTypes = $this->SocialNetwork->SocialNetworkType->find('list');
		$this->set(compact('users', 'socialNetworkTypes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->SocialNetwork->id = $id;
		if (!$this->SocialNetwork->exists()) {
			throw new NotFoundException(__('Invalid social network'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->SocialNetwork->delete()) {
			$this->Flash->success(__('The social network has been deleted.'));
		} else {
			$this->Flash->error(__('The social network could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
