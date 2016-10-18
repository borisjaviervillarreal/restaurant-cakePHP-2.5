<?php
class OrdenItem extends AppModel{
	//una orden tendra muchos ordenitem belongsto

	public $belongsTo = array(
		'Orden'=>array(
			'className'=>'Orden',
			'foreignKey'=>'orden_id',
			'conditions'=>'',
			'fields'=>'',
			'order'=>''
			),
		'Platillo'=>array(
			'className'=>'Platillo',
			'foreignKey'=>'platillo_id',
			'conditions'=>'',
			'fields'=>'',
			'order'=>''
			),
		);

	
}
?>