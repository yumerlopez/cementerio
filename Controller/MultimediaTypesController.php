<?php
App::uses('AppController', 'Controller');
/**
 * MultimediaTypes Controller
 *
 * @property MultimediaType $MultimediaType
 * @property PaginatorComponent $Paginator
 */
class MultimediaTypesController extends AppController {

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
		$this->MultimediaType->recursive = 0;
		$this->set('multimediaTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->MultimediaType->exists($id)) {
			throw new NotFoundException(__('Invalid multimedia type'));
		}
		$options = array('conditions' => array('MultimediaType.' . $this->MultimediaType->primaryKey => $id));
		$this->set('multimediaType', $this->MultimediaType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->MultimediaType->create();
			if ($this->MultimediaType->save($this->request->data)) {
				$this->Flash->success(__('The multimedia type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The multimedia type could not be saved. Please, try again.'));
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
		if (!$this->MultimediaType->exists($id)) {
			throw new NotFoundException(__('Invalid multimedia type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->MultimediaType->save($this->request->data)) {
				$this->Flash->success(__('The multimedia type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The multimedia type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('MultimediaType.' . $this->MultimediaType->primaryKey => $id));
			$this->request->data = $this->MultimediaType->find('first', $options);
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
		$this->MultimediaType->id = $id;
		if (!$this->MultimediaType->exists()) {
			throw new NotFoundException(__('Invalid multimedia type'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->MultimediaType->delete()) {
			$this->Flash->success(__('The multimedia type has been deleted.'));
		} else {
			$this->Flash->error(__('The multimedia type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
