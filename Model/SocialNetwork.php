<?php
App::uses('AppModel', 'Model');
/**
 * SocialNetwork Model
 *
 * @property User $User
 * @property SocialNetworkType $SocialNetworkType
 */
class SocialNetwork extends AppModel {


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
		'SocialNetworkType' => array(
			'className' => 'SocialNetworkType',
			'foreignKey' => 'social_network_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
