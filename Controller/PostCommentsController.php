<?php
App::uses('AppController', 'Controller');
/**
 * PostComments Controller
 *
 * @property PostComment $PostComment
 * @property PaginatorComponent $Paginator
 */
class PostCommentsController extends AppController {

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
		$this->PostComment->recursive = 0;
		$this->set('postComments', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PostComment->exists($id)) {
			throw new NotFoundException(__('Invalid post comment'));
		}
		$options = array('conditions' => array('PostComment.' . $this->PostComment->primaryKey => $id));
		$this->set('postComment', $this->PostComment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PostComment->create();
			if ($this->PostComment->save($this->request->data)) {
				$this->Flash->success(__('The post comment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The post comment could not be saved. Please, try again.'));
			}
		}
		$posts = $this->PostComment->Post->find('list');
		$users = $this->PostComment->User->find('list');
		$this->set(compact('posts', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PostComment->exists($id)) {
			throw new NotFoundException(__('Invalid post comment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PostComment->save($this->request->data)) {
				$this->Flash->success(__('The post comment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The post comment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PostComment.' . $this->PostComment->primaryKey => $id));
			$this->request->data = $this->PostComment->find('first', $options);
		}
		$posts = $this->PostComment->Post->find('list');
		$users = $this->PostComment->User->find('list');
		$this->set(compact('posts', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->PostComment->id = $id;
		if (!$this->PostComment->exists()) {
			throw new NotFoundException(__('Invalid post comment'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->PostComment->delete()) {
			$this->Flash->success(__('The post comment has been deleted.'));
		} else {
			$this->Flash->error(__('The post comment could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
