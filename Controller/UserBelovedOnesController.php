<?php
App::uses('AppController', 'Controller');
/**
 * UserBelovedOnes Controller
 *
 * @property UserBelovedOne $UserBelovedOne
 * @property PaginatorComponent $Paginator
 */
class UserBelovedOnesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	public $uses = array('UserBelovedOne', 'User', 'MultimediaCollectionType', 'MultimediaCollection');
	
	private $__unAuthorizedActions = array();
	private $__adminActions = array('index', 'delete', 'add', 'edit', 'view', 'user_index');


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
		$this->Security->unlockedActions = array('index', 'delete', 'add', 'edit', 'view', 'user_index');
		$this->Auth->allowedActions = array('index', 'delete', 'add', 'edit', 'view', 'user_index');
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->UserBelovedOne->recursive = 0;
		$this->set('userBelovedOnes', $this->Paginator->paginate());
	}
	
	public function user_index($user_id = null) {
		if (!$this->User->exists($user_id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->UserBelovedOne->recursive = 0;
		$query = array('conditions' => array('UserBelovedOne.user_id' => $user_id));
		$this->Paginator->settings = $query;
		$this->set('userBelovedOnes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->UserBelovedOne->exists($id)) {
			throw new NotFoundException(__('Invalid user beloved one'));
		}
		$options = array('conditions' => array('UserBelovedOne.' . $this->UserBelovedOne->primaryKey => $id));
		$this->set('userBelovedOne', $this->UserBelovedOne->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$dataSource = $this->User->getDataSource();
			$dataSource->begin();
			try {
				$this->UserBelovedOne->create();
				if ($this->UserBelovedOne->save($this->request->data)) {
					$multimedia_collection_type_photo_id = $this->MultimediaCollectionType->find('first', array('conditions' => array('MultimediaCollectionType.name' => 'Photo Album')));
					$multimedia_collection_type_video_id = $this->MultimediaCollectionType->find('first', array('conditions' => array('MultimediaCollectionType.name' => 'Video Collection')));
					
					$this->request->data['MultimediaCollection'][0]['name'] = 'General Photo Album';
					$this->request->data['MultimediaCollection'][0]['description'] = 'General Photo Album';
					$this->request->data['MultimediaCollection'][0]['multimedia_collection_type_id'] = $multimedia_collection_type_photo_id['MultimediaCollectionType']['id'];
					$this->request->data['MultimediaCollection'][0]['user_beloved_one_id'] = $this->UserBelovedOne->id;
					
					$this->request->data['MultimediaCollection'][1]['name'] = 'General Video Collection';
					$this->request->data['MultimediaCollection'][1]['description'] = 'General Video Collection';
					$this->request->data['MultimediaCollection'][1]['multimedia_collection_type_id'] = $multimedia_collection_type_video_id['MultimediaCollectionType']['id'];
					$this->request->data['MultimediaCollection'][1]['user_beloved_one_id'] = $this->UserBelovedOne->id;
					
					if ($this->MultimediaCollection->saveMany($this->request->data['MultimediaCollection'])) {
						$dataSource->commit();
						$this->Session->setFlash(__('The user beloved one has been saved.'), 'default', array('class' => 'success_flash'));
						$current_user = $this->Session->read('CurrentSessionUser');
						$this->Session->write('action_to', Router::url(array('controller'=>'user_beloved_ones', 'action'=>'user_index', $current_user['id'])));
						return $this->redirect(array('controller' => 'users', 'action' => 'user_profile'));
					}
				} else {
					$dataSource->rollback();
					$this->Session->setFlash(__('The user beloved one could not be saved. Please, try again.'), 'default', array('class' => 'error_flash'));
				}
			} catch (Exception $exc) {
				echo $exc->getTraceAsString();
			}
		}
		$users = $this->UserBelovedOne->User->find('list');
		$userBelovedOneRelationships = $this->UserBelovedOne->UserBelovedOneRelationship->find('list');
		$this->set(compact('users', 'userBelovedOneRelationships'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->UserBelovedOne->exists($id)) {
			throw new NotFoundException(__('Invalid user beloved one'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->UserBelovedOne->save($this->request->data)) {
				$this->Session->setFlash(__('The user beloved one has been saved.'), 'default', array('class' => 'success_flash'));
				$current_user = $this->Session->read('CurrentSessionUser');
				$this->Session->write('action_to', Router::url(array('controller'=>'user_beloved_ones', 'action'=>'user_index', $current_user['id'])));
				return $this->redirect(array('controller' => 'users', 'action' => 'user_profile'));
			} else {
				$this->Session->setFlash(__('The user beloved one could not be saved. Please, try again.'), 'default', array('class' => 'error_flash'));
			}
		} else {
			$options = array('conditions' => array('UserBelovedOne.' . $this->UserBelovedOne->primaryKey => $id));
			$this->request->data = $this->UserBelovedOne->find('first', $options);
		}
		$users = $this->UserBelovedOne->User->find('list');
		$userBelovedOneRelationships = $this->UserBelovedOne->UserBelovedOneRelationship->find('list');
		$this->set(compact('users', 'userBelovedOneRelationships'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->UserBelovedOne->id = $id;
		if (!$this->UserBelovedOne->exists()) {
			throw new NotFoundException(__('Invalid user beloved one'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->UserBelovedOne->delete()) {
			$this->Flash->success(__('The user beloved one has been deleted.'));
		} else {
			$this->Flash->error(__('The user beloved one could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
