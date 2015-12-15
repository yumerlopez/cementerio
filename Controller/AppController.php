<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	
	public $components = array(
		'Security',
        'Session',
        'Auth' => array(
			'loginRedirect' => array(
                'controller' => 'pages',
                'action' => 'home'
            ),
			'logoutRedirect' => array(
                'controller' => 'users',
                'action' => 'login_register'
            ),
			'loginAction' => array(
				'controller' => 'users',
				'action' => 'login_register'
			),
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Blowfish'
                )
            ),
			'authorize' => array('Controller')
        ),
		'Flash'
    );


	public function beforeRender() {
		parent::beforeRender(); 
		$this->Auth->unauthorizedRedirect = array(array('controller' => 'pages', 'action' => 'display', 'home'));
	}
	
	public function isAuthorized($user) {
		$user = $this->Session->read('CurrentSessionUser');
		if (isset($user['Role']['name']) && $user['Role']['name'] === 'Administrador') {
			return true;
		}
		$this->Session->setFlash(__('Access deny!'), 'default', array('class' => 'error_flash'));
		return false;
	}
	
	public function toHome() {
        return $this->redirect(array('controller' => 'pages', 'action' => 'display', 'home'));
    }
	
	protected function _generateRandomString($length = 32, $type = 'all') {
		if ($type === 'all') {
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		}
		if ($type === 'numerics') {
			$characters = '0123456789';
		}
		if ($type === 'nonnumerics') {
			$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		}
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
}
