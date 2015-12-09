<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
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

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Event', 'Multimedia', 'Post');
	
	private $__unAuthorizedActions = array();
	private $__adminActions = array('index', 'delete', 'add', 'edit', 'view', 'login_register', 'logout');


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
//		$this->Auth->allowedActions = array('display');
	}

/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			return $this->redirect(array('controller' => 'pages', 'action' => 'display', 'home'));
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}
	
	public function home() {
		$events = $this->Event->find('all', array('order' => array('Event.id' => 'DESC')));
		$multimedia = $this->Multimedia->find('all', array('order' => array('Multimedia.id' => 'DESC')));
		$posts = $this->Post->find('all', array('order' => array('Post.id' => 'DESC')));
		
		$results = array();
		
		foreach ($multimedia as $key => $multimedia_item) {
			$results[$multimedia_item['Multimedia']['modified']][$key][$multimedia_item['MultimediaType']['name']]['name'] = $multimedia_item['Multimedia']['name'];
			$results[$multimedia_item['Multimedia']['modified']][$key][$multimedia_item['MultimediaType']['name']]['description'] = $multimedia_item['Multimedia']['description'];
			$results[$multimedia_item['Multimedia']['modified']][$key][$multimedia_item['MultimediaType']['name']]['url'] = $multimedia_item['Multimedia']['url'];
			$results[$multimedia_item['Multimedia']['modified']][$key][$multimedia_item['MultimediaType']['name']]['MultimediaCollection']['name'] = $multimedia_item['MultimediaCollection']['name'];
		}
		
		foreach ($events as $key => $event) {
			$results[$event['Event']['modified']][$key]['Event']['UserBelovedOne']['full_name'] = $event['UserBelovedOne']['full_name'];
			$results[$event['Event']['modified']][$key]['Event']['name'] = $event['Event']['name'];
			$results[$event['Event']['modified']][$key]['Event']['description'] = $event['Event']['description'];
			$results[$event['Event']['modified']][$key]['Event']['start'] = $event['Event']['start'];
			$results[$event['Event']['modified']][$key]['Event']['end'] = $event['Event']['modified'];
		}
		
		foreach ($posts as $key => $post) {
			$results[$post['Post']['modified']][$key]['Post']['post'] = $post['Post']['post'];
		}
		
		krsort($results);
		
//		print_r($results);
		
		$this->set('results', $results);
	}
}
