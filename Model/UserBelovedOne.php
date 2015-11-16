<?php
App::uses('AppModel', 'Model');
/**
 * UserBelovedOne Model
 *
 * @property User $User
 * @property UserBelovedOneRelationship $UserBelovedOneRelationship
 * @property Event $Event
 */
class UserBelovedOne extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
	
	public $virtualFields = array(
		'full_name' => 'CONCAT(UserBelovedOne.name, " ", UserBelovedOne.last_name)'
	);


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

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Event' => array(
			'className' => 'Event',
			'foreignKey' => 'user_beloved_one_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
