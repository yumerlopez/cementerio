<?php
App::uses('AppModel', 'Model');
/**
 * MultimediaCollection Model
 *
 * @property MultimediaCollectionType $MultimediaCollectionType
 * @property UserBelovedOne $UserBelovedOne
 * @property Multimedia $Multimedia
 */
class MultimediaCollection extends AppModel {

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
		'MultimediaCollectionType' => array(
			'className' => 'MultimediaCollectionType',
			'foreignKey' => 'multimedia_collection_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
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
		'Multimedia' => array(
			'className' => 'Multimedia',
			'foreignKey' => 'multimedia_collection_id',
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
