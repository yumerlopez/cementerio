<?php
App::uses('AppModel', 'Model');
/**
 * Event Model
 *
 * @property UserBelovedOne $UserBelovedOne
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
}
