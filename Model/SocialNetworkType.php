<?php
App::uses('AppModel', 'Model');
/**
 * SocialNetworkType Model
 *
 * @property SocialNetwork $SocialNetwork
 */
class SocialNetworkType extends AppModel {

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
		'SocialNetwork' => array(
			'className' => 'SocialNetwork',
			'foreignKey' => 'social_network_type_id',
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
