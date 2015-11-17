<?php
App::uses('AppController', 'Controller');
/**
 * MultimediaCollections Controller
 *
 * @property MultimediaCollection $MultimediaCollection
 * @property PaginatorComponent $Paginator
 */
class MultimediaCollectionsController extends AppController {

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
		$this->MultimediaCollection->recursive = 0;
		$this->set('multimediaCollections', $this->Paginator->paginate());
	}
	
	public function user_beloved_one_index($multimedia_collection_type, $user_beloved_one_id = null) {
		if (!$this->MultimediaCollection->UserBelovedOne->exists($user_beloved_one_id)) {
			throw new NotFoundException(__('Invalid user beloved one'));
		}
		
		$this->set('multimedia_collection_type', $multimedia_collection_type);
		if ($multimedia_collection_type === 'photo') {
			$multimedia_collection_type = 'Photo Album';
		}
		if ($multimedia_collection_type === 'video') {
			$multimedia_collection_type = 'Video Collection';
		}
		
		$this->Event->recursive = 0;
		$query = array('conditions' => array('MultimediaCollection.user_beloved_one_id' => $user_beloved_one_id,
											 'MultimediaCollectionType.name' => $multimedia_collection_type));
		$this->Paginator->settings = $query;
		$user_beloved_one = $this->MultimediaCollection->UserBelovedOne->find('first', array('conditions' => array('UserBelovedOne.id' => $user_beloved_one_id)));
		$this->set('multimediaCollections', $this->Paginator->paginate());
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
		if (!$this->MultimediaCollection->exists($id)) {
			throw new NotFoundException(__('Invalid multimedia collection'));
		}
		$options = array('conditions' => array('MultimediaCollection.' . $this->MultimediaCollection->primaryKey => $id));
		$this->set('multimediaCollection', $this->MultimediaCollection->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($multimedia_collection_type, $user_beloved_one_id = null) {
		if ($this->request->is('post')) {
			$this->MultimediaCollection->create();
			if ($this->MultimediaCollection->save($this->request->data)) {
				$this->Flash->success(__('The multimedia collection has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The multimedia collection could not be saved. Please, try again.'));
			}
		}
//		$multimediaCollectionTypes = $this->MultimediaCollection->MultimediaCollectionType->find('list');
		$this->set('multimedia_collection_type', $multimedia_collection_type);
		if ($multimedia_collection_type === 'photo') {
			$multimedia_collection_type = 'Photo Album';
		}
		if ($multimedia_collection_type === 'video') {
			$multimedia_collection_type = 'Video Collection';
		}
		$multimediaCollectionType = $this->MultimediaCollection->MultimediaCollectionType->find('first', array('conditions' => array('MultimediaCollectionType.name' => $multimedia_collection_type)));
		$userBelovedOne = $this->MultimediaCollection->UserBelovedOne->find('first', array('recursive' => 0,
																						   'fields' => array('UserBelovedOne.id', 'UserBelovedOne.full_name', 'UserBelovedOneRelationship.name'),
																						   'conditions' => array('UserBelovedOne.id' => $user_beloved_one_id)));
		$this->set(compact('multimediaCollectionType', 'userBelovedOne'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->MultimediaCollection->exists($id)) {
			throw new NotFoundException(__('Invalid multimedia collection'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->MultimediaCollection->save($this->request->data)) {
				$this->Flash->success(__('The multimedia collection has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The multimedia collection could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('MultimediaCollection.' . $this->MultimediaCollection->primaryKey => $id));
			$this->request->data = $this->MultimediaCollection->find('first', $options);
		}
		$multimediaCollectionTypes = $this->MultimediaCollection->MultimediaCollectionType->find('list');
		$userBelovedOnes = $this->MultimediaCollection->UserBelovedOne->find('list');
		$this->set(compact('multimediaCollectionTypes', 'userBelovedOnes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->MultimediaCollection->id = $id;
		if (!$this->MultimediaCollection->exists()) {
			throw new NotFoundException(__('Invalid multimedia collection'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->MultimediaCollection->delete()) {
			$this->Flash->success(__('The multimedia collection has been deleted.'));
		} else {
			$this->Flash->error(__('The multimedia collection could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
