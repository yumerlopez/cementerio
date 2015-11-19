<?php
App::uses('AppController', 'Controller');
/**
 * UserBelovedOneRelationships Controller
 *
 * @property UserBelovedOneRelationship $UserBelovedOneRelationship
 * @property PaginatorComponent $Paginator
 */
class UserBelovedOneRelationshipsController extends AppController {

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
		$this->UserBelovedOneRelationship->recursive = 0;
		$this->set('userBelovedOneRelationships', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->UserBelovedOneRelationship->exists($id)) {
			throw new NotFoundException(__('Invalid user beloved one relationship'));
		}
		$options = array('conditions' => array('UserBelovedOneRelationship.' . $this->UserBelovedOneRelationship->primaryKey => $id));
		$this->set('userBelovedOneRelationship', $this->UserBelovedOneRelationship->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UserBelovedOneRelationship->create();
			if ($this->UserBelovedOneRelationship->save($this->request->data)) {
				$this->Flash->success(__('The user beloved one relationship has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user beloved one relationship could not be saved. Please, try again.'));
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
		if (!$this->UserBelovedOneRelationship->exists($id)) {
			throw new NotFoundException(__('Invalid user beloved one relationship'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->UserBelovedOneRelationship->save($this->request->data)) {
				$this->Flash->success(__('The user beloved one relationship has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user beloved one relationship could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UserBelovedOneRelationship.' . $this->UserBelovedOneRelationship->primaryKey => $id));
			$this->request->data = $this->UserBelovedOneRelationship->find('first', $options);
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
		$this->UserBelovedOneRelationship->id = $id;
		if (!$this->UserBelovedOneRelationship->exists()) {
			throw new NotFoundException(__('Invalid user beloved one relationship'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->UserBelovedOneRelationship->delete()) {
			$this->Flash->success(__('The user beloved one relationship has been deleted.'));
		} else {
			$this->Flash->error(__('The user beloved one relationship could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
