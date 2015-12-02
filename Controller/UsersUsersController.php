<?php
App::uses('AppController', 'Controller');
/**
 * UsersUsers Controller
 *
 * @property UsersUser $UsersUser
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class UsersUsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');
	
	private $__unAuthorizedActions = array();
	private $__adminActions = array('index', 'delete', 'add', 'edit', 'view', 'ask_for_friendship');


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
		$this->Security->unlockedActions = array('index', 'delete', 'add', 'edit', 'view', 'ask_for_friendship');
		$this->Auth->allowedActions = array('index', 'delete', 'add', 'edit', 'view', 'ask_for_friendship');
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->UsersUser->recursive = 0;
		$this->set('usersUsers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->UsersUser->exists($id)) {
			throw new NotFoundException(__('Invalid users user'));
		}
		$options = array('conditions' => array('UsersUser.' . $this->UsersUser->primaryKey => $id));
		$this->set('usersUser', $this->UsersUser->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UsersUser->create();
			if ($this->UsersUser->save($this->request->data)) {
				$this->Flash->success(__('The users user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The users user could not be saved. Please, try again.'));
			}
		}
		$users = $this->UsersUser->User->find('list');
		$friends = $this->UsersUser->Friend->find('list');
		$usersUsersStatuses = $this->UsersUser->UsersUsersStatus->find('list');
		$this->set(compact('users', 'friends', 'usersUsersStatuses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->UsersUser->exists($id)) {
			throw new NotFoundException(__('Invalid users user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->UsersUser->save($this->request->data)) {
				$this->Flash->success(__('The users user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The users user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UsersUser.' . $this->UsersUser->primaryKey => $id));
			$this->request->data = $this->UsersUser->find('first', $options);
		}
		$users = $this->UsersUser->User->find('list');
		$friends = $this->UsersUser->Friend->find('list');
		$usersUsersStatuses = $this->UsersUser->UsersUsersStatus->find('list');
		$this->set(compact('users', 'friends', 'usersUsersStatuses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->UsersUser->id = $id;
		if (!$this->UsersUser->exists()) {
			throw new NotFoundException(__('Invalid users user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->UsersUser->delete()) {
			$this->Flash->success(__('The users user has been deleted.'));
		} else {
			$this->Flash->error(__('The users user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function ask_for_friendship() {
		if ($this->request->is(array('ajax'))) {
			$this->autoRender = false;
			echo 'good';
		}
	}
}
