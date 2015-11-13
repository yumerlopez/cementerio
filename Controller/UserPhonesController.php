<?php
App::uses('AppController', 'Controller');
/**
 * UserPhones Controller
 *
 * @property UserPhone $UserPhone
 * @property PaginatorComponent $Paginator
 */
class UserPhonesController extends AppController {

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
		$this->UserPhone->recursive = 0;
		$this->set('userPhones', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->UserPhone->exists($id)) {
			throw new NotFoundException(__('Invalid user phone'));
		}
		$options = array('conditions' => array('UserPhone.' . $this->UserPhone->primaryKey => $id));
		$this->set('userPhone', $this->UserPhone->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UserPhone->create();
			if ($this->UserPhone->save($this->request->data)) {
				$this->Flash->success(__('The user phone has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user phone could not be saved. Please, try again.'));
			}
		}
		$users = $this->UserPhone->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->UserPhone->exists($id)) {
			throw new NotFoundException(__('Invalid user phone'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->UserPhone->save($this->request->data)) {
				$this->Flash->success(__('The user phone has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user phone could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UserPhone.' . $this->UserPhone->primaryKey => $id));
			$this->request->data = $this->UserPhone->find('first', $options);
		}
		$users = $this->UserPhone->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->UserPhone->id = $id;
		if (!$this->UserPhone->exists()) {
			throw new NotFoundException(__('Invalid user phone'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->UserPhone->delete()) {
			$this->Flash->success(__('The user phone has been deleted.'));
		} else {
			$this->Flash->error(__('The user phone could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
