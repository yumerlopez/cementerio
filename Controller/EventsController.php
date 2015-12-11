<?php
App::uses('AppController', 'Controller');
/**
 * Events Controller
 *
 * @property Event $Event
 * @property PaginatorComponent $Paginator
 */
class EventsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	private $__unAuthorizedActions = array();
	private $__adminActions = array('index', 'delete', 'add', 'edit', 'view', 'user_beloved_one_index');


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
		$this->Security->unlockedActions = array('index', 'delete', 'add', 'edit', 'view', 'user_beloved_one_index');
		$this->Auth->allowedActions = array('index', 'delete', 'add', 'edit', 'view', 'user_beloved_one_index');
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Event->recursive = 0;
		$this->set('events', $this->Paginator->paginate());
	}
	
	public function user_beloved_one_index($user_beloved_one_id = null) {
		if (!$this->Event->UserBelovedOne->exists($user_beloved_one_id)) {
			throw new NotFoundException(__('Invalid user beloved one'));
		}
		$this->Event->recursive = 0;
		$query = array('conditions' => array('Event.user_beloved_one_id' => $user_beloved_one_id));
		$this->Paginator->settings = $query;
		$user_beloved_one = $this->Event->UserBelovedOne->find('first', array('conditions' => array('UserBelovedOne.id' => $user_beloved_one_id)));
		$this->set('events', $this->Paginator->paginate());
		$this->set('user_beloved_one', $user_beloved_one);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
		$this->set('event', $this->Event->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($user_beloved_one_id = null) {
		if (!$this->Event->UserBelovedOne->exists($user_beloved_one_id)) {
			throw new NotFoundException(__('Invalid user beloved one'));
		}
		if ($this->request->is('post')) {
//			print_r($this->request->data);
			$this->Event->create();
			if ($this->Event->save($this->request->data)) {
				$this->Session->setFlash(__('The event has been saved.'), 'default', array('class' => 'success_flash'));
				return $this->redirect(array('controller' => 'users', 'action' => 'user_profile'));
			} else {
				$this->Session->setFlash(__('The event could not be saved. Please, try again.'), 'default', array('class' => 'error_flash'));
			}
		}
		$userBelovedOne = $this->Event->UserBelovedOne->find('first', array('recursive' => 0,
																			'fields' => array('UserBelovedOne.id', 'UserBelovedOne.full_name', 'UserBelovedOneRelationship.name'),
																			'conditions' => array('UserBelovedOne.id' => $user_beloved_one_id)));
		
		$this->set(compact('userBelovedOne'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Event->save($this->request->data)) {
				$this->Session->setFlash(__('The event has been saved.'), 'default', array('class' => 'success_flash'));
//				$current_user = $this->Session->read('CurrentSessionUser');
//				$this->Session->write('action_to', Router::url(array('controller'=>'events', 'action'=>'user_beloved_one_index', $current_user['id'])));
				return $this->redirect(array('controller' => 'users', 'action' => 'user_profile'));
			} else {
				$this->Session->setFlash(__('The event could not be saved. Please, try again.'), 'default', array('class' => 'error_flash'));
			}
		} else {
			$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
			$this->request->data = $this->Event->find('first', $options);
		}
		$userBelovedOnesArray = $this->Event->UserBelovedOne->find('all', array('recursive' => 0,
																			'fields' => array('UserBelovedOne.id', 'UserBelovedOne.full_name', 'UserBelovedOneRelationship.name')));
		$userBelovedOnes = array();
		foreach ($userBelovedOnesArray as $key => $userBelovedOne) {
			$userBelovedOnes[$userBelovedOne['UserBelovedOne']['id']] = $userBelovedOne['UserBelovedOneRelationship']['name'] . ': ' . $userBelovedOne['UserBelovedOne']['full_name'];
		}
		$this->set(compact('userBelovedOnes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Event->id = $id;
		if (!$this->Event->exists()) {
			throw new NotFoundException(__('Invalid event'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Event->delete()) {
			$this->Flash->success(__('The event has been deleted.'));
		} else {
			$this->Flash->error(__('The event could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
