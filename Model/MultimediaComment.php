<?php
App::uses('AppModel', 'Model');
/**
 * MultimediaComment Model
 *
 * @property Multimedia $Multimedia
 * @property User $User
 */
class MultimediaComment extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Multimedia' => array(
			'className' => 'Multimedia',
			'foreignKey' => 'multimedia_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
