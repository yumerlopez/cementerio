<?php
App::uses('AppController', 'Controller');
/**
 * Emails Controller
 *
 * @property Email $Email
 * @property PaginatorComponent $Paginator
 */
class EmailsController extends AppController {

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
		$this->Email->recursive = 0;
		$this->set('emails', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Email->exists($id)) {
			throw new NotFoundException(__('Invalid email'));
		}
		$options = array('conditions' => array('Email.' . $this->Email->primaryKey => $id));
		$this->set('email', $this->Email->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Email->create();
			if ($this->Email->save($this->request->data)) {
				$this->Flash->success(__('The email has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The email could not be saved. Please, try again.'));
			}
		}
		$users = $this->Email->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Email->exists($id)) {
			throw new NotFoundException(__('Invalid email'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Email->save($this->request->data)) {
				$this->Flash->success(__('The email has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The email could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Email.' . $this->Email->primaryKey => $id));
			$this->request->data = $this->Email->find('first', $options);
		}
		$users = $this->Email->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Email->id = $id;
		if (!$this->Email->exists()) {
			throw new NotFoundException(__('Invalid email'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Email->delete()) {
			$this->Flash->success(__('The email has been deleted.'));
		} else {
			$this->Flash->error(__('The email could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
