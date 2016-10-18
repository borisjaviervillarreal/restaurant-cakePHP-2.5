<?php
App::uses('AppModel', 'Model');
/**
 * Mesa Model
 *
 * @property Mesero $Mesero
 */
class Mesa extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'serie';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'posicion' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'mesero_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Mesero' => array(
			'className' => 'Mesero',
			'foreignKey' => 'mesero_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)

	);

//CREAR TABLA MESA_ORDENES PARA ROMPER RELACION

	public $hasAndBelongsToMany = array(
		'Orden' => array(
			'className' => 'Orden',
			'joinTable' => 'orden_mesas',
			'foreignKey' => 'mesa_id',
			'associationForeignKey' => 'orden_id',
			'unique' => 'true',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);
/*
	public $hasMany = array(
		'User' => array(
			'className'=>'User',
			'foreignKey'=>'id',
			'dependent'=>true,
			'conditions'=>'',
			'fields'=>'',
			'order'=>'',
			'limit'=>'',
			'offset'=>'',
			'exclusive'=>'',
			'finderQuery'=>'',
			'counterQuery'=>''
			)

	);
*/


}
