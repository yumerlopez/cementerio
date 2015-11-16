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

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->MultimediaCollection->recursive = 0;
		$this->set('multimediaCollections', $this->Paginator->paginate());
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
	public function add() {
		if ($this->request->is('post')) {
			$this->MultimediaCollection->create();
			if ($this->MultimediaCollection->save($this->request->data)) {
				$this->Flash->success(__('The multimedia collection has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The multimedia collection could not be saved. Please, try again.'));
			}
		}
		$multimediaCollectionTypes = $this->MultimediaCollection->MultimediaCollectionType->find('list');
		$userBelovedOnes = $this->MultimediaCollection->UserBelovedOne->find('list');
		$this->set(compact('multimediaCollectionTypes', 'userBelovedOnes'));
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
