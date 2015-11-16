<?php
App::uses('AppModel', 'Model');
/**
 * MultimediaCollectionType Model
 *
 * @property MultimediaCollection $MultimediaCollection
 */
class MultimediaCollectionType extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'MultimediaCollection' => array(
			'className' => 'MultimediaCollection',
			'foreignKey' => 'multimedia_collection_type_id',
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
