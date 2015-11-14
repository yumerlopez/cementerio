<?php
App::uses('AppModel', 'Model');
/**
 * UserBelovedOne Model
 *
 * @property User $User
 * @property UserBelovedOneRelationship $UserBelovedOneRelationship
 */
class UserBelovedOne extends AppModel {


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
		'UserBelovedOneRelationship' => array(
			'className' => 'UserBelovedOneRelationship',
			'foreignKey' => 'user_beloved_one_relationship_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
