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
		
		$request_on_error = $this->Session->read('request_on_error');
		if ($request_on_error !== null && isset($request_on_error) && $request_on_error !== '') {
			$this->request->data = $request_on_error;
			$this->Session->delete('request_on_error');
		}
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
			$dataSource = $this->Event->getDataSource();
			$dataSource->begin();
			try {
				$this->Event->create();
				if ($this->Event->save($this->request->data)) {
					$dataSource->commit();
					$this->Flash->success(__('The event has been saved.'));
					$this->Session->write('action_to', Router::url(array('controller'=>'events', 'action'=>'user_beloved_one_index', $this->request->data['Event']['user_beloved_one_id'])));
					return $this->redirect(array('controller' => 'users', 'action' => 'user_profile'));
				} else {
					$dataSource->rollback();
					$this->Flash->error(__('The event could not be saved. Please, try again.'));
					$this->Session->write('request_on_error', $this->request->data);
					$this->Session->write('action_to', Router::url(array('controller'=>'events', 'action'=>'add', $user_beloved_one_id)));
					return $this->redirect(array('controller' => 'users', 'action' => 'user_profile'));
				}
			} catch (Exception $ex) {
				$dataSource->rollback();
				$this->Flash->error(__('The event could not be saved. Please, try again.'));
				$this->Session->write('request_on_error', $this->request->data);
				$this->Session->write('action_to', Router::url(array('controller'=>'events', 'action'=>'add', $user_beloved_one_id)));
				return $this->redirect(array('controller' => 'users', 'action' => 'user_profile'));
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
			$dataSource = $this->Event->getDataSource();
			$dataSource->begin();
			try {
				if ($this->Event->save($this->request->data)) {
					$dataSource->commit();
					$this->Flash->success(__('The event has been saved.'));
					$this->Session->write('action_to', Router::url(array('controller'=>'events', 'action'=>'user_beloved_one_index', $this->request->data['Event']['user_beloved_one_id'])));
					return $this->redirect(array('controller' => 'users', 'action' => 'user_profile'));
				} else {
					$dataSource->rollback();
					$this->Flash->error(__('The event could not be saved. Please, try again.'));
					$this->Session->write('request_on_error', $this->request->data);
					$this->Session->write('action_to', Router::url(array('controller'=>'events', 'action'=>'edit', $id)));
					return $this->redirect(array('controller' => 'users', 'action' => 'user_profile'));
				}
			} catch (Exception $ex) {
				$dataSource->rollback();
				$this->Flash->error(__('The event could not be saved. Please, try again.'));
				$this->Session->write('request_on_error', $this->request->data);
				$this->Session->write('action_to', Router::url(array('controller'=>'events', 'action'=>'edit', $id)));
				return $this->redirect(array('controller' => 'users', 'action' => 'user_profile'));
			}
		} else {
			if (empty($this->request->data)) {
				$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
				$this->request->data = $this->Event->find('first', $options);
			}
		}
		
		$userBelovedOne = $this->Event->UserBelovedOne->find('first', array('recursive' => 0,
																			'fields' => array('UserBelovedOne.id', 'UserBelovedOne.full_name', 'UserBelovedOneRelationship.name'),
																			'conditions' => array('UserBelovedOne.id' => $this->request->data['Event']['user_beloved_one_id'])));
		
		$this->set(compact('userBelovedOne'));
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
