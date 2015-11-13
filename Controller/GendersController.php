<?php
App::uses('AppController', 'Controller');
/**
 * Genders Controller
 *
 * @property Gender $Gender
 * @property PaginatorComponent $Paginator
 */
class GendersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	private $__unAuthorizedActions = array();
	private $__adminActions = array('index', 'delete', 'add', 'edit', 'view');


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
		$this->Security->unlockedActions = array('index', 'delete', 'add', 'edit', 'view');
		$this->Auth->allowedActions = array('index', 'delete', 'add', 'edit', 'view');
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Gender->recursive = 0;
		$this->set('genders', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Gender->exists($id)) {
			throw new NotFoundException(__('Invalid gender'));
		}
		$options = array('conditions' => array('Gender.' . $this->Gender->primaryKey => $id));
		$this->set('gender', $this->Gender->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Gender->create();
			if ($this->Gender->save($this->request->data)) {
				$this->Flash->success(__('The gender has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The gender could not be saved. Please, try again.'));
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
		if (!$this->Gender->exists($id)) {
			throw new NotFoundException(__('Invalid gender'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Gender->save($this->request->data)) {
				$this->Flash->success(__('The gender has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The gender could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Gender.' . $this->Gender->primaryKey => $id));
			$this->request->data = $this->Gender->find('first', $options);
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
		$this->Gender->id = $id;
		if (!$this->Gender->exists()) {
			throw new NotFoundException(__('Invalid gender'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Gender->delete()) {
			$this->Flash->success(__('The gender has been deleted.'));
		} else {
			$this->Flash->error(__('The gender could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
