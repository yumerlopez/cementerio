<?php
App::uses('AppModel', 'Model');
/**
 * Multimedia Model
 *
 * @property MultimediaType $MultimediaType
 * @property MultimediaCollection $MultimediaCollection
 * @property MultimediaComment $MultimediaComment
 */
class Multimedia extends AppModel {

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
		'MultimediaType' => array(
			'className' => 'MultimediaType',
			'foreignKey' => 'multimedia_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'MultimediaCollection' => array(
			'className' => 'MultimediaCollection',
			'foreignKey' => 'multimedia_collection_id',
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
		'MultimediaComment' => array(
			'className' => 'MultimediaComment',
			'foreignKey' => 'multimedia_id',
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
