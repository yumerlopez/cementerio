<?php
App::uses('AppController', 'Controller');
/**
 * MultimediaCollectionTypes Controller
 *
 * @property MultimediaCollectionType $MultimediaCollectionType
 * @property PaginatorComponent $Paginator
 */
class MultimediaCollectionTypesController extends AppController {

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
		$this->MultimediaCollectionType->recursive = 0;
		$this->set('multimediaCollectionTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->MultimediaCollectionType->exists($id)) {
			throw new NotFoundException(__('Invalid multimedia collection type'));
		}
		$options = array('conditions' => array('MultimediaCollectionType.' . $this->MultimediaCollectionType->primaryKey => $id));
		$this->set('multimediaCollectionType', $this->MultimediaCollectionType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->MultimediaCollectionType->create();
			if ($this->MultimediaCollectionType->save($this->request->data)) {
				$this->Flash->success(__('The multimedia collection type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The multimedia collection type could not be saved. Please, try again.'));
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
		if (!$this->MultimediaCollectionType->exists($id)) {
			throw new NotFoundException(__('Invalid multimedia collection type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->MultimediaCollectionType->save($this->request->data)) {
				$this->Flash->success(__('The multimedia collection type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The multimedia collection type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('MultimediaCollectionType.' . $this->MultimediaCollectionType->primaryKey => $id));
			$this->request->data = $this->MultimediaCollectionType->find('first', $options);
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
		$this->MultimediaCollectionType->id = $id;
		if (!$this->MultimediaCollectionType->exists()) {
			throw new NotFoundException(__('Invalid multimedia collection type'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->MultimediaCollectionType->delete()) {
			$this->Flash->success(__('The multimedia collection type has been deleted.'));
		} else {
			$this->Flash->error(__('The multimedia collection type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
