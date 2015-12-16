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
	public $components = array('Paginator');
	
	private $__unAuthorizedActions = array();
	private $__adminActions = array('index', 'delete', 'add', 'edit', 'view', 'ask_for_friendship', 'friendship_index');


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
		$this->Security->unlockedActions = array('index', 'delete', 'add', 'edit', 'view', 'ask_for_friendship', 'friendship_index');
		$this->Auth->allowedActions = array('index', 'delete', 'add', 'edit', 'view', 'ask_for_friendship', 'friendship_index');
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
				$this->Flash->success(__('The friendship has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The friendship could not be saved. Please, try again.'));
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
				$this->Flash->success(__('The friendship has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The friendship could not be saved. Please, try again.'));
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
		$dataSource = $this->UsersUser->getDataSource();
		$dataSource->begin();
		$current_user = $this->Session->read('CurrentSessionUser');
		try {
			if ($this->UsersUser->delete()) {
				$dataSource->commit();
				$this->Flash->success(__('The friendship request has been deleted.'));
				$this->Session->write('action_to', Router::url(array('controller'=>'users_users', 'action'=>'friendship_index', $current_user['id'])));
				return $this->redirect(array('controller' => 'users', 'action' => 'user_profile'));
			} else {
				$dataSource->rollback();
				$this->Flash->error(__('The friendship request could not be deleted. Please, try again.'));
				$this->Session->write('action_to', Router::url(array('controller'=>'users_users', 'action'=>'friendship_index', $current_user['id'])));
				return $this->redirect(array('controller' => 'users', 'action' => 'user_profile'));
			}
		} catch (Exception $ex) {
			$dataSource->rollback();
			$this->Flash->error(__('The friendship request could not be deleted. Please, try again.'));
			$this->Session->write('action_to', Router::url(array('controller'=>'users_users', 'action'=>'friendship_index', $current_user['id'])));
			return $this->redirect(array('controller' => 'users', 'action' => 'user_profile'));
		}
	}
	
	public function ask_for_friendship() {
		if ($this->request->is(array('ajax'))) {
			$this->autoRender = false;
			if (!empty($this->request->data)) {
				$users_users_status = $this->UsersUser->UsersUsersStatus->find('first', array('conditions' => array('UsersUsersStatus.name' => 'Por Aprobar')));
				$this->request->data['UsersUser']['user_id'] = $this->request->data['user_id'];
				$this->request->data['UsersUser']['friend_id'] = $this->request->data['friend_id'];
				$this->request->data['UsersUser']['users_users_status_id'] = $users_users_status['UsersUsersStatus']['id'];
				unset($this->request->data['user_id']);
				unset($this->request->data['friend_id']);
				$this->UsersUser->create();
				if (!$this->UsersUser->save($this->request->data)) {
					throw new Exception('');
				}
			}
		}
	}
	
	public function friendship_index($user_id = null) {
		if (!$this->UsersUser->User->exists($user_id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->UsersUser->recursive = 0;
		
		
		$query = array('conditions' => array('UsersUser.user_id' => $user_id,
											 'UsersUsersStatus.name' => 'Por Aprobar'));
		$this->Paginator->settings = $query;
		$usersUsers = $this->Paginator->paginate();
		$this->set('usersUsersPending', $usersUsers);
		
		$query = array('conditions' => array('UsersUser.user_id' => $user_id,
											 'UsersUsersStatus.name' => 'Aprobado'));
		$this->Paginator->settings = $query;
		$usersUsers = $this->Paginator->paginate();
		$this->set('usersUsers', $usersUsers);
		
		$query = array('conditions' => array('UsersUser.user_id' => $user_id,
											 'UsersUsersStatus.name' => 'Bloqueado'));
		$this->Paginator->settings = $query;
		$usersUsers = $this->Paginator->paginate();
		$this->set('usersUsersBlocked', $usersUsers);
	}
	
	public function approve_friendship_petition($id = null) {
		$this->UsersUser->id = $id;
		if (!$this->UsersUser->exists()) {
			throw new NotFoundException(__('Invalid users user'));
		}
		$current_user = $this->Session->read('CurrentSessionUser');
		if ($this->request->is(array('post'))) {
			$users_user_status = $this->UsersUser->UsersUsersStatus->find('first', array('conditions' => array('UsersUsersStatus.name' => 'Aprobado')));
			$this->__update_friendship_status($id, $users_user_status['UsersUsersStatus']['id']);
			$this->__set_friendship($id);
			$this->Session->write('action_to', Router::url(array('controller'=>'users_users', 'action'=>'friendship_index', $current_user['id'])));
			return $this->redirect(array('controller' => 'users', 'action' => 'user_profile'));
		}
		
	}
	
	public function block_friendship($id = null) {
		$this->UsersUser->id = $id;
		if (!$this->UsersUser->exists()) {
			throw new NotFoundException(__('Invalid users user'));
		}
		$current_user = $this->Session->read('CurrentSessionUser');
		if ($this->request->is(array('post'))) {
			$users_user_status = $this->UsersUser->UsersUsersStatus->find('first', array('conditions' => array('UsersUsersStatus.name' => 'Bloqueado')));
			$this->__update_friendship_status($id, $users_user_status['UsersUsersStatus']['id']);
			$this->Session->write('action_to', Router::url(array('controller'=>'users_users', 'action'=>'friendship_index', $current_user['id'])));
			return $this->redirect(array('controller' => 'users', 'action' => 'user_profile'));
		}
	}
	
	private function __set_friendship($id = null) {
		$options = array('conditions' => array('UsersUser.' . $this->UsersUser->primaryKey => $id));
		$user_users = $this->UsersUser->find('first', $options);
		unset($this->request->data['UsersUser']);
		$this->request->data['UsersUser']['id'] = $this->UsersUser->getMaxId() + 1;
		$this->request->data['UsersUser']['user_id'] = $user_users['UsersUser']['friend_id'];
		$this->request->data['UsersUser']['friend_id'] = $user_users['UsersUser']['user_id'];
		$this->request->data['UsersUser']['users_users_status_id'] = $user_users['UsersUser']['users_users_status_id'];
		
		$dataSource = $this->UsersUser->getDataSource();
		$dataSource->begin();
		$current_user = $this->Session->read('CurrentSessionUser');
		try {
			if ($this->UsersUser->save($this->request->data['UsersUser'])) {
				$dataSource->commit();
			} else {
				$dataSource->rollback();
				$this->Flash->error(__('The friendship request could not be update. Please, try again.'));
				$this->Session->write('action_to', Router::url(array('controller'=>'users_users', 'action'=>'friendship_index', $current_user['id'])));
				return $this->redirect(array('controller' => 'users', 'action' => 'user_profile'));
			}
		} catch (Exception $ex) {
			$dataSource->rollback();
			$this->Flash->error(__('The friendship request could not be update. Please, try again.'));
			$this->Session->write('action_to', Router::url(array('controller'=>'users_users', 'action'=>'friendship_index', $current_user['id'])));
			return $this->redirect(array('controller' => 'users', 'action' => 'user_profile'));
		}
	}

	private function __update_friendship_status($id, $status_id) {
		$dataSource = $this->UsersUser->getDataSource();
		$dataSource->begin();
		$current_user = $this->Session->read('CurrentSessionUser');
		try {
			if ($this->UsersUser->save(array('id' => $id, 'users_users_status_id' => $status_id))) {
				$dataSource->commit();
			} else {
				$dataSource->rollback();
				$this->Flash->error(__('The friendship request could not be update. Please, try again.'));
				$this->Session->write('action_to', Router::url(array('controller'=>'users_users', 'action'=>'friendship_index', $current_user['id'])));
				return $this->redirect(array('controller' => 'users', 'action' => 'user_profile'));
			}
		} catch (Exception $ex) {
			$dataSource->rollback();
			$this->Flash->error(__('The friendship request could not be update. Please, try again.'));
			$this->Session->write('action_to', Router::url(array('controller'=>'users_users', 'action'=>'friendship_index', $current_user['id'])));
			return $this->redirect(array('controller' => 'users', 'action' => 'user_profile'));
		}
	}
}
