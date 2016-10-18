<?php
App::uses('AppModel', 'Model');
/**
 * Mesa Model
 *
 * @property Mesero $Mesero
 */
class Estado extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'estado';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'estado' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);

}
