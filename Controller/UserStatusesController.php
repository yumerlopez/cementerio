<?php
App::uses('AppController', 'Controller');
/**
 * UserStatuses Controller
 *
 * @property UserStatus $UserStatus
 * @property PaginatorComponent $Paginator
 */
class UserStatusesController extends AppController {

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
		$this->UserStatus->recursive = 0;
		$this->set('userStatuses', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->UserStatus->exists($id)) {
			throw new NotFoundException(__('Invalid user status'));
		}
		$options = array('conditions' => array('UserStatus.' . $this->UserStatus->primaryKey => $id));
		$this->set('userStatus', $this->UserStatus->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UserStatus->create();
			if ($this->UserStatus->save($this->request->data)) {
				$this->Flash->success(__('The user status has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user status could not be saved. Please, try again.'));
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
		if (!$this->UserStatus->exists($id)) {
			throw new NotFoundException(__('Invalid user status'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->UserStatus->save($this->request->data)) {
				$this->Flash->success(__('The user status has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user status could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UserStatus.' . $this->UserStatus->primaryKey => $id));
			$this->request->data = $this->UserStatus->find('first', $options);
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
		$this->UserStatus->id = $id;
		if (!$this->UserStatus->exists()) {
			throw new NotFoundException(__('Invalid user status'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->UserStatus->delete()) {
			$this->Flash->success(__('The user status has been deleted.'));
		} else {
			$this->Flash->error(__('The user status could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
