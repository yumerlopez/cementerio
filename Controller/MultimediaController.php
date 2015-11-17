<?php
App::uses('AppController', 'Controller');
/**
 * Multimedia Controller
 *
 * @property Multimedia $Multimedia
 * @property PaginatorComponent $Paginator
 */
class MultimediaController extends AppController {

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
		$this->Multimedia->recursive = 0;
		$this->set('multimedia', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Multimedia->exists($id)) {
			throw new NotFoundException(__('Invalid multimedia'));
		}
		$options = array('conditions' => array('Multimedia.' . $this->Multimedia->primaryKey => $id));
		$this->set('multimedia', $this->Multimedia->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($multimedia_type, $user_beloved_one_id = null) {
		if ($this->request->is('post')) {
			$this->Multimedia->create();
			if ($this->Multimedia->save($this->request->data)) {
				$this->Flash->success(__('The multimedia has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The multimedia could not be saved. Please, try again.'));
			}
		}
		$this->set('multimedia_type', $multimedia_type);
		if ($multimedia_type === 'photo') {
			$multimedia_type = 'Photo';
			$multimedia_collection_type = 'Photo Album';
			$multimedia_collection = 'General Photo Album';
		}
		if ($multimedia_type === 'video') {
			$multimedia_type = 'Video';
			$multimedia_collection_type = 'Video Collection';
			$multimedia_collection = 'General Video Collection';
		}
		$userBelovedOne = $this->Multimedia->MultimediaCollection->UserBelovedOne->find('first', array('conditions' => array('UserBelovedOne.id' => $user_beloved_one_id)));
		$multimediaType = $this->Multimedia->MultimediaType->find('first', array('conditions' => array('MultimediaType.name' => $multimedia_type)));
		$multimediaCollection = $this->Multimedia->MultimediaCollection->find('first', array('recursive' => 1,
																							 'conditions' => array('MultimediaCollection.user_beloved_one_id' => $user_beloved_one_id,
																												   'MultimediaCollectionType.name' => $multimedia_collection_type,
																												   'MultimediaCollection.name' => $multimedia_collection)));
		$this->set(compact('multimediaType', 'multimediaCollection', 'userBelovedOne'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Multimedia->exists($id)) {
			throw new NotFoundException(__('Invalid multimedia'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Multimedia->save($this->request->data)) {
				$this->Flash->success(__('The multimedia has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The multimedia could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Multimedia.' . $this->Multimedia->primaryKey => $id));
			$this->request->data = $this->Multimedia->find('first', $options);
		}
		$multimediaTypes = $this->Multimedia->MultimediaType->find('list');
		$multimediaCollections = $this->Multimedia->MultimediaCollection->find('list');
		$this->set(compact('multimediaTypes', 'multimediaCollections'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Multimedia->id = $id;
		if (!$this->Multimedia->exists()) {
			throw new NotFoundException(__('Invalid multimedia'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Multimedia->delete()) {
			$this->Flash->success(__('The multimedia has been deleted.'));
		} else {
			$this->Flash->error(__('The multimedia could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
