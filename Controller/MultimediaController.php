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
	public function add() {
		if ($this->request->is('post')) {
			$this->Multimedia->create();
			if ($this->Multimedia->save($this->request->data)) {
				$this->Flash->success(__('The multimedia has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The multimedia could not be saved. Please, try again.'));
			}
		}
		$multimediaTypes = $this->Multimedia->MultimediaType->find('list');
		$this->set(compact('multimediaTypes'));
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
		$this->set(compact('multimediaTypes'));
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
