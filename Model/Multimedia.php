<?php
App::uses('AppModel', 'Model');
/**
 * Multimedia Model
 *
 * @property MultimediaType $MultimediaType
 */
class Multimedia extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'MultimediaType' => array(
			'className' => 'MultimediaType',
			'foreignKey' => 'multimedia_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
