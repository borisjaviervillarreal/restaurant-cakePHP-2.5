<?php

class Orden extends AppModel{

	public $validate = array(
		'cliente'=>array(
			'notEmpty'=>array(
				'rule'=>array('notEmpty'),
				'message'=>'Ingrese nombre de cliente',
				),
			),
		'dni'=>array(
			'notEmpty'=>array(
				'rule'=>array('notEmpty'),
				'message'=>'Ingrese DNI de cliente',
				),
			'numeric'=>array(
				'rule'=>array('numeric'),
				'message'=>'Solo numeros',
				),
			),
		);

	//Una orden tendra muchas ordenitem hasmany

	public $hasMany = array(
		'OrdenItem' => array(
			'className'=>'OrdenItem',
			'foreignKey'=>'orden_id',
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


	/**
 * belongsTo associations
 *
 * @var array
 */
	
	public $belongsTo = array(
		'OrdenMesa' => array(
			'className' => 'OrdenMesa',
			'foreignKey' => 'id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);








	

}
?>