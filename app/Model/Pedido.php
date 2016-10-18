<?php
class Pedido extends AppModel{

	//asociacion platillo muchos pedidos belongsto (platillo pertenece a un pedido)

	public $belongsTo = array(
		'Platillo'=>array(
			'className'=>'Platillo',
			'foreignKey'=>'platillo_id'
			)
		);
}
?>