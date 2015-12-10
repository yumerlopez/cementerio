<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $helpers = array('Html', 'Form', 'Session');
	public $uses = array('User', 'Role', 'UserPhone', 'SocialNetworkType', 'UsersUser', 'UsersUsersStatus');
	public $components = array('Paginator', 'Session');
	
	private $__unAuthorizedActions = array();
	private $__adminActions = array('index', 'delete', 'add', 'edit', 'view', 'login_register', 'logout', 'set_edit_user_picture', 'search');


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
		$this->Security->unlockedActions = array('index', 'delete', 'add', 'edit', 'view', 'login_register', 'logout', 'set_edit_user_picture', 'search');
		$this->Auth->allowedActions = array('index', 'delete', 'add', 'edit', 'view', 'login_register', 'logout', 'set_edit_user_picture', 'search');
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout='login_register';
		if ($this->request->is('post')) {
			$dataSource = $this->User->getDataSource();
			$dataSource->begin();
			try {
				$this->User->create();
				if ($this->User->save($this->request->data)) {
					if (!empty($this->request->data['UserPhone'])) {
						foreach ($this->request->data['UserPhone'] as $key => $user_phone) {
							$this->request->data['UserPhone'][$key]['user_id'] = $this->User->id;
						}
						$this->UserPhone->create();
						if ($this->UserPhone->saveMany($this->request->data['UserPhone'])) {
							$dataSource->commit();
							$this->Session->setFlash(__('The user has been saved.'), 'default', array('class' => 'success_flash'));
							mkdir(WWW_ROOT . DS . 'img'  . DS . 'users' . DS . $this->User->id . DS . 'photos', 0777, true);
							mkdir(WWW_ROOT . DS . 'img'  . DS . 'users' . DS . $this->User->id . DS . 'profile', 0777, true);
							mkdir(WWW_ROOT . DS . 'video'  . DS . 'users' . DS . $this->User->id, 0777, true);
							if ($this->Session->read('referer') == Router::url(array('controller' => 'users', 'action' => 'login_register'), true)) {
								$this->Session->delete('referer');
								return $this->redirect(array('action' => 'login_register'));
							} else {
								return $this->redirect(array('action' => 'index'));
							}
						} else {
							$dataSource->rollback();
							$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'default', array('class' => 'error_flash'));
						}
					} else {
						$dataSource->rollback();
						$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'default', array('class' => 'error_flash'));
					}
				} else {
					$dataSource->rollback();
					$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'default', array('class' => 'error_flash'));
				}
			} catch (Exception $ex) {
				$dataSource->rollback();
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'default', array('class' => 'error_flash'));
			}
		}
		if ($this->Session->read('referer') == Router::url(array('controller' => 'users', 'action' => 'login_register'), true)) {
			$request = $this->Session->read('request');
			$this->request->data = $request['data'];
			$this->set('action', $request->params['action']);
			$user_status_id = $this->User->UserStatus->find('first', array('conditions' => array('UserStatus.name' => 'Activo')));
			$role_id = $this->User->Role->find('first', array('conditions' => array('Role.name' => 'User')));
			$this->set('user_status_id', $user_status_id['UserStatus']['id']);
			$this->set('role_id', $role_id['Role']['id']);
		} else {
			$this->Session->delete('referer');
		}
		
		$genders = $this->User->Gender->find('list');
		$nationalities = $this->User->Nationality->find('list');
		$userStatuses = $this->User->UserStatus->find('list');
		$roles = $this->User->Role->find('list');
		$this->set(compact('genders', 'nationalities', 'userStatuses', 'roles'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$dataSource = $this->User->getDataSource();
			$dataSource->begin();
			try {
//				print_r($this->request->data);
				if ($this->User->save($this->request->data)) {
					$this->__updateUserPhone($this->request->data['User']['id'], (isset($this->request->data['UserPhone']) ? $this->request->data['UserPhone'] : array()), 'UserPhone');
					$this->__updateUserPhone($this->request->data['User']['id'], (isset($this->request->data['Email']) ? $this->request->data['Email'] : array()), 'Email');
					$this->__updateUserPhone($this->request->data['User']['id'], (isset($this->request->data['SocialNetwork']) ? $this->request->data['SocialNetwork'] : array()), 'SocialNetwork');
					$dataSource->commit();
					$this->Session->setFlash(__('The user has been saved.'), 'default', array('class' => 'success_flash'));
					return $this->redirect(array('action' => 'user_profile'));
				} else {
					$dataSource->rollback();
					$this->Session->setFlash(__('The user could not be saved. Please, try again.1'), 'default', array('class' => 'error_flash'));
				}
				
			} catch (Exception $ex) {
				$dataSource->rollback();
//				$this->Session->setFlash($ex->getTraceAsString(), 'default', array('class' => 'error_flash'));
				$this->Session->setFlash(__('The user could not be saved. Please, try again.2'), 'default', array('class' => 'error_flash'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$genders = $this->User->Gender->find('list');
		$nationalities = $this->User->Nationality->find('list');
		$userStatuses = $this->User->UserStatus->find('list');
		$roles = $this->User->Role->find('list');
		$socialNetworkTypes = $this->SocialNetworkType->find('all', array('fields' => array('SocialNetworkType.*'),
																		  'order' => array('SocialNetworkType.name' => 'ASC')));
		$options = array();
		foreach ($socialNetworkTypes as $socialNetworkType) {
			array_push($options, array('name' => $socialNetworkType['SocialNetworkType']['name'], 'value' => $socialNetworkType['SocialNetworkType']['id'], 'data-image' => $this->webroot . 'img' . DS . $socialNetworkType['SocialNetworkType']['url_image']));
		}
		$options_json = json_encode($options);
		$this->set(compact('genders', 'nationalities', 'userStatuses', 'roles', 'options', 'options_json'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Flash->success(__('The user has been deleted.'));
		} else {
			$this->Flash->error(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	private function __register($request) {
//		$this->view = 'login_register';
//		$dataSource = $this->User->getDataSource();
//		$dataSource->begin();
		try {
			$this->Session->write('request', $request);
			$this->Session->write('referer', Router::url(array('controller' => 'users', 'action' => 'login_register'), true));
			$this->redirect(array('action' => 'add'));
//			$this->User->create();
//			$request->data['User']['activation_code'] = $this->_generateRandomString();
//			$user_status = $this->User->UserStatus->find('first', array('conditions' => array('UserStatus.name' => 'Inactivo')));
//			$request->data['User']['user_status_id'] = $user_status['UserStatus']['id'];
//			if ($this->User->save($request->data)) {
//				$request->data['User']['id'] = $this->User->id;
//				$this->_sendEmail('lopezyumer@gmail.com', __('New User Register'), 'register');
//				$this->_sendEmail($request->data['User']['username'], __('New User Register'), 'register');
//				$this->Session->setFlash(__('The user was register. Please, check your email inbox!'), 'default', array('class' => 'success_flash'));
//				$dataSource->commit();
//			} else {
//				$this->Session->setFlash(__('The user could not be saved. Please, check the errors and try again.'), 'default', array('class' => 'error_flash'));
//				$dataSource->rollback();
//			}
		} catch (Exception $ex) {
//			$this->Session->setFlash(__('The user could not be saved. Please, check the errors and try again.'), 'default', array('class' => 'error_flash'));
//			$dataSource->rollback();
		}
	}
	
	private function __login($request) {
		$this->view = 'login_register';
		try {
			$options['conditions'] = array('User.username' => $request->data['User']['username']);
			$this->User->recursive = 0;
			$record = $this->User->find('first', $options);
			if (!empty($record)) {
				if ($record['UserStatus']['name'] === 'Activo') {
					if ($this->Auth->login($record['User'])) {
						$this->Session->write('CurrentSessionUser', $record['User']);
						return $this->redirect($this->Auth->loginRedirect);
					}
					$this->Session->setFlash(__('Invalid username or password'), 'default', array('class' => 'error_flash'));
				} else {
					$this->Session->setFlash(__('User inactivated or blocked'), 'default', array('class' => 'error_flash'));
				}
			} else {
				$this->Session->setFlash(__('Unable to login'), 'default', array('class' => 'error_flash'));
			}
		} catch (Exception $ex) {
			$this->Session->setFlash(__('Unable to login'), 'default', array('class' => 'error_flash'));
		}
	}
	
	public function login_register() {
		$this->layout='login_register';
		
		if ($this->request->is('post')) {
			if ($this->request->data['User']['action'] === 'login') {
				$this->request->data['User']['username'] = $this->request->data['User']['usernamelogin'];
				$this->request->data['User']['password'] = $this->request->data['User']['passwordlogin'];
				unset($this->request->data['User']['usernamelogin']);
				unset($this->request->data['User']['passwordlogin']);
				$this->__login($this->request);
				unset($this->request->data['User']['username']);
				unset($this->request->data['User']['password']);
			}
			if ($this->request->data['User']['action'] === 'register') {
				$this->__register($this->request);
			}
		}
		unset($this->request->data['User']);
		$role = $this->Role->find('first', array('recursive' => -1,
												 'conditions' => array('Role.name' => 'User')));
		$this->set('role_id', $role['Role']['id']);
	}
	
	public function logout() {
        $this->Session->destroy();
        return $this->redirect($this->Auth->logout());
	}
	
	public function user_profile() {
		$this->layout='user_profile';
	}
	
	public function set_edit_user_picture($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$dataSource = $this->User->getDataSource();
			$dataSource->begin();
			try {
				$data = json_decode($this->request->data['User']['url-image']);
				$filename_path = WWW_ROOT . DS . 'img'  . DS . 'users' . DS . $this->request->data['User']['id'] . DS . 'profile' . DS;
				
				$data_image_array_original = explode(";",$data->original);
				$imagen_extention_original = explode("/", $data_image_array_original[0]);
				$data_image_original = substr($data_image_array_original[1], 7);
				
				$data_image_array_tumbr = explode(";",$data->data);
				$imagen_extention_tumbr = explode("/", $data_image_array_tumbr[0]);
				$data_image_thumb = substr($data_image_array_tumbr[1], 7);

				$this->request->data['User']['url_image'] = 'users' . DS . $this->request->data['User']['id'] . DS . 'profile' . DS  . 'profile.' . $imagen_extention_original[1];
				
				if ($this->User->save($this->request->data)) {
					$dataSource->commit();
					file_put_contents($filename_path . 'profile.' . $imagen_extention_original[1], base64_decode($data_image_original));
					chmod($filename_path . 'profile.' . $imagen_extention_original[1], 0777);
					file_put_contents($filename_path . 'thumbprofile.' . $imagen_extention_tumbr[1], base64_decode($data_image_thumb));
					chmod($filename_path . 'thumbprofile.' . $imagen_extention_tumbr[1], 0777);
					$this->Session->setFlash(__('The user has been saved.'), 'default', array('class' => 'success_flash corners'));
					return $this->redirect(array('action' => 'user_profile'));
				} else {
					$dataSource->rollback();
					$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'default', array('class' => 'error_flash'));
				}
				
			} catch (Exception $exc) {
				$dataSource->rollback();
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'default', array('class' => 'error_flash'));
//				echo $exc->getTraceAsString();
			}

		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}
	
	public function search () {
		$users = array();
//		if (isset($this->request->data['User']['search']) && !empty($this->request->data['User']['search'])) {
			$this->User->recursive = 1;
			$this->User->Behaviors->load('Containable');
			$current_user = $this->Session->read('CurrentSessionUser');
			$query = array(
					'conditions' => array('UserStatus.name' => 'Activo',
										  'NOT' => array('User.id' => $current_user['id'],
														 'Role.name' => 'Administrador'),
										  'OR' => array('User.name LIKE ' => '%' . $this->request->data['User']['search'] . '%',
														'User.last_name LIKE ' => '%' . $this->request->data['User']['search'] . '%'))
				);
			$this->Paginator->settings = $query;
			$users = $this->Paginator->paginate();
			foreach ($users as $key => $user) {
				$users[$key]['MyFriends'] = $this->__get_friendship_stauts($user, $current_user['id']);
			}
//		}
		$this->set('users', $users);
	}
	
	private function __updateUserPhone($user_id, $new_user_items, $model) {
		foreach ($new_user_items as $key => $value) {
			$new_user_items[$key]['user_id'] = $user_id;
		}
		$this->User->{$model}->deleteAll(array($model . '.user_id' => $user_id), false);
		$this->User->{$model}->saveMany($new_user_items);
	}
	
	private function __get_friendship_stauts($user, $current_user_id) {
		foreach ($user['MyFriends'] as $key => $friend) {
			if ($friend['id'] === $current_user_id) {
				$user['MyFriends'] = $this->UsersUsersStatus->find('first', array('conditions' => array('UsersUsersStatus.id' => $friend['UsersUser']['users_users_status_id'])));
				break;
			}
		}
//		print_r($user['MyFriends']);
		return $user['MyFriends'];
	}
}
