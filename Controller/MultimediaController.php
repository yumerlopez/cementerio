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
	private $__adminActions = array('index', 'delete', 'add', 'edit', 'view', 'add_multimedia');


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
		$this->Security->unlockedActions = array('index', 'delete', 'add', 'edit', 'view', 'add_multimedia');
		$this->Auth->allowedActions = array('index', 'delete', 'add', 'edit', 'view', 'add_multimedia');
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
		$multimedia = $this->Multimedia->find('first', $options);
		$options1 = array('conditions' => array('Multimedia.multimedia_collection_id' => $multimedia['Multimedia']['multimedia_collection_id'],
											   'Multimedia.id <' => $multimedia['Multimedia']['id']),
						  'order' => array('Multimedia.id' => 'DESC'));
		$multimedia_previous =  $this->Multimedia->find('first', $options1);
		$options2 = array('conditions' => array('Multimedia.multimedia_collection_id' => $multimedia['Multimedia']['multimedia_collection_id'],
											   'Multimedia.id >' => $multimedia['Multimedia']['id']),
						  'order' => array('Multimedia.id' => 'ASC'));
		$multimedia_next =  $this->Multimedia->find('first', $options2);
		
		foreach ($multimedia['MultimediaComment'] as $key => $multimedia_comment) {
			$user = $this->Multimedia->MultimediaComment->User->find('first', array('recursive' => -1, 'conditions' => array('User.id' => $multimedia_comment['user_id'])));
			$multimedia['MultimediaComment'][$key]['User'] = $user['User'];
			unset($multimedia['MultimediaComment'][$key]['user_id']);
		}
		
		$this->set('multimedia', $multimedia);
		$this->set('multimedia_previous', $multimedia_previous);
		$this->set('multimedia_next', $multimedia_next);
	}

/**
 * add method
 *
 * @return void
 */
	public function add($multimedia_type, $user_beloved_one_id = null) {
		if ($this->request->is('post')) {
			$dataSource = $this->Multimedia->getDataSource();
			$dataSource->begin();
			try {
				$this->request->data['Multimedia']['url'] = $this->__get_multimedia_path($this->request->data['Multimedia']['multimedia_file'], $multimedia_type);
				$this->Multimedia->create();
				if ($this->Multimedia->save($this->request->data)) {
					if ($multimedia_type === 'photo') {
						$folder = 'img' . DS;
					}
					if ($multimedia_type === 'video') {
						$folder = 'video' . DS;
					}
					if (move_uploaded_file($this->request->data['Multimedia']['multimedia_file']['tmp_name'], WWW_ROOT . $folder . $this->request->data['Multimedia']['url']) && 
						chmod(WWW_ROOT . $folder . $this->request->data['Multimedia']['url'], 0777)) {
						$dataSource->commit();
						$this->Session->setFlash(__('The multimedia has been saved.'), 'default', array('class' => 'success_flash'));
						return $this->redirect(array('action' => 'index'));			
					} else {
						$dataSource->rollback();
						$this->Session->setFlash(__('The multimedia could not be saved. Please, try again.'), 'default', array('class' => 'error_flash'));
					}
				} else {
					$dataSource->rollback();
					$this->Session->setFlash(__('The multimedia could not be saved. Please, try again.'), 'default', array('class' => 'error_flash'));
				}
			} catch (Exception $exc) {
				$dataSource->rollback();
				$this->Session->setFlash(__('The multimedia could not be saved. Please, try again.'), 'default', array('class' => 'error_flash'));
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
	
	public function add_multimedia($multimedia_type, $multimedia_collection_id = null) {
		if ($this->request->is('post')) {
//			print_r($this->request->data);
			$dataSource = $this->Multimedia->getDataSource();
			$dataSource->begin();
			try {
				foreach ($this->request->data['Multimedia'] as $key => $multimedia_item) {
					$this->request->data['Multimedia'][$key]['url'] = $this->__get_multimedia_path($multimedia_item['multimedia_file'], $multimedia_type);
				}
//				print_r($this->request->data);
				$this->Multimedia->create();
				if ($this->Multimedia->saveMany($this->request->data['Multimedia'])) {
					if ($multimedia_type === 'photo') {
						$folder = 'img' . DS;
					}
					if ($multimedia_type === 'video') {
						$folder = 'video' . DS;
					}
					$bool = true;
					foreach ($this->request->data['Multimedia'] as $key => $multimedia_item) {
						if ($bool) {
							$bool &= move_uploaded_file($multimedia_item['multimedia_file']['tmp_name'], WWW_ROOT . $folder . $multimedia_item['url']);
							$bool &= chmod(WWW_ROOT . $folder . $multimedia_item['url'], 0777);
						} else {
							break;
						}
					}
					if ($bool) {
						$dataSource->commit();
						$this->Session->setFlash(__('The multimedia has been saved.'), 'default', array('class' => 'success_flash'));
						return $this->redirect(array('action' => 'index'));
					} else {
						$dataSource->rollback();
						$this->Session->setFlash(__('The multimedia could not be saved. Please, try again.'), 'default', array('class' => 'error_flash'));
					}
				} else {
					$dataSource->rollback();
					$this->Session->setFlash(__('The multimedia could not be saved. Please, try again.'), 'default', array('class' => 'error_flash'));
				}
			} catch (Exception $exc) {
				$dataSource->rollback();
				$this->Session->setFlash(__('The multimedia could not be saved. Please, try again.'), 'default', array('class' => 'error_flash'));
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
//		$userBelovedOne = $this->Multimedia->MultimediaCollection->UserBelovedOne->find('first', array('conditions' => array('UserBelovedOne.id' => $user_beloved_one_id)));
		$multimediaType = $this->Multimedia->MultimediaType->find('first', array('conditions' => array('MultimediaType.name' => $multimedia_type)));
		$multimediaCollection = $this->Multimedia->MultimediaCollection->find('first', array('recursive' => 1,
																							 'conditions' => array('MultimediaCollection.id' => $multimedia_collection_id)));
		$this->set(compact('multimediaType', 'multimediaCollection'/*, 'userBelovedOne'*/));
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
	
	private function __get_multimedia_path($multimedia_file, $multimedia_type) {
		$user = $this->Session->read('CurrentSessionUser');
		if (isset($multimedia_file) && !empty($multimedia_file) && $multimedia_file['error'] === 0) {
			if (is_uploaded_file($multimedia_file['tmp_name'])) {
				$filename = basename(strtolower(str_replace(' ', '_', $multimedia_file['name'])));
				$filename_extension = explode(".", $filename);
				$file = $this->_generateRandomString() . '.' . $filename_extension[sizeof($filename_extension) - 1];
				if ($multimedia_type === 'photo') {
					$filen_path = 'users' . DS . $user['id'] . DS . 'photos' . DS . $file;
				}
				if ($multimedia_type === 'video') {
					$filen_path = 'users' . DS . $user['id'] . DS . $file;
				}
			} else {
				throw new Exception('Error uploading multimedia');
			}
		}
		return $filen_path;
	}
}
