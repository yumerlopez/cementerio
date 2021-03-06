<?php
App::uses('AppModel', 'Model');
/**
 * Event Model
 *
 * @property UserBelovedOne $UserBelovedOne
 * @property EventComment $EventComment
 */
class Event extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'UserBelovedOne' => array(
			'className' => 'UserBelovedOne',
			'foreignKey' => 'user_beloved_one_id',
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
		'EventComment' => array(
			'className' => 'EventComment',
			'foreignKey' => 'event_id',
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
