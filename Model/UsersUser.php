<?php
App::uses('AppModel', 'Model');
/**
 * UsersUser Model
 *
 * @property User $User
 * @property Friend $Friend
 * @property UsersUsersStatus $UsersUsersStatus
 */
class UsersUser extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Friend' => array(
			'className' => 'User',
			'foreignKey' => 'friend_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'UsersUsersStatus' => array(
			'className' => 'UsersUsersStatus',
			'foreignKey' => 'users_users_status_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
