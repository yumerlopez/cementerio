<?php
App::uses('AppController', 'Controller');
/**
 * EventComments Controller
 *
 * @property EventComment $EventComment
 * @property PaginatorComponent $Paginator
 */
class EventCommentsController extends AppController {

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
		$this->EventComment->recursive = 0;
		$this->set('eventComments', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->EventComment->exists($id)) {
			throw new NotFoundException(__('Invalid event comment'));
		}
		$options = array('conditions' => array('EventComment.' . $this->EventComment->primaryKey => $id));
		$this->set('eventComment', $this->EventComment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EventComment->create();
			if ($this->EventComment->save($this->request->data)) {
				$this->Flash->success(__('The event comment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The event comment could not be saved. Please, try again.'));
			}
		}
		$events = $this->EventComment->Event->find('list');
		$users = $this->EventComment->User->find('list');
		$this->set(compact('events', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->EventComment->exists($id)) {
			throw new NotFoundException(__('Invalid event comment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->EventComment->save($this->request->data)) {
				$this->Flash->success(__('The event comment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The event comment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('EventComment.' . $this->EventComment->primaryKey => $id));
			$this->request->data = $this->EventComment->find('first', $options);
		}
		$events = $this->EventComment->Event->find('list');
		$users = $this->EventComment->User->find('list');
		$this->set(compact('events', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->EventComment->id = $id;
		if (!$this->EventComment->exists()) {
			throw new NotFoundException(__('Invalid event comment'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->EventComment->delete()) {
			$this->Flash->success(__('The event comment has been deleted.'));
		} else {
			$this->Flash->error(__('The event comment could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
