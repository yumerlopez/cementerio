<?php
App::uses('AppModel', 'Model');
/**
 * UserBelovedOneRelationship Model
 *
 * @property UserBelovedOne $UserBelovedOne
 */
class UserBelovedOneRelationship extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'UserBelovedOne' => array(
			'className' => 'UserBelovedOne',
			'foreignKey' => 'user_beloved_one_relationship_id',
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
