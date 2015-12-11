<?php
App::uses('AppController', 'Controller');
/**
 * UsersUsersStatuses Controller
 *
 * @property UsersUsersStatus $UsersUsersStatus
 * @property PaginatorComponent $Paginator
 */
class UsersUsersStatusesController extends AppController {

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
		$this->UsersUsersStatus->recursive = 0;
		$this->set('usersUsersStatuses', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->UsersUsersStatus->exists($id)) {
			throw new NotFoundException(__('Invalid users users status'));
		}
		$options = array('conditions' => array('UsersUsersStatus.' . $this->UsersUsersStatus->primaryKey => $id));
		$this->set('usersUsersStatus', $this->UsersUsersStatus->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UsersUsersStatus->create();
			if ($this->UsersUsersStatus->save($this->request->data)) {
				$this->Flash->success(__('The users users status has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The users users status could not be saved. Please, try again.'));
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
		if (!$this->UsersUsersStatus->exists($id)) {
			throw new NotFoundException(__('Invalid users users status'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->UsersUsersStatus->save($this->request->data)) {
				$this->Flash->success(__('The users users status has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The users users status could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UsersUsersStatus.' . $this->UsersUsersStatus->primaryKey => $id));
			$this->request->data = $this->UsersUsersStatus->find('first', $options);
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
		$this->UsersUsersStatus->id = $id;
		if (!$this->UsersUsersStatus->exists()) {
			throw new NotFoundException(__('Invalid users users status'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->UsersUsersStatus->delete()) {
			$this->Flash->success(__('The users users status has been deleted.'));
		} else {
			$this->Flash->error(__('The users users status could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
