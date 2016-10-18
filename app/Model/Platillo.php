<?php
App::uses('AppModel', 'Model');
/**
 * Platillo Model
 *
 * @property CategoriaPlatillo $CategoriaPlatillo
 * @property Cocinero $Cocinero
 */
class Platillo extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nombre';

	public $actsAs = array(
		'Upload.Upload'=>array(
			'foto'=>array(
				'fields'=>array(
					'dir'=>'foto_dir'
					),
				'thumbnailMethod'=>'php',
				'thumbnailSizes'=>array(
					'vga'=>'640x480',
					'thumb'=>'150x150'
					),
				'deleteOnUpdate'=>true,
				'deleteFolderOnDelete'=>true
				)
			)
		);

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'nombre' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'descripcion' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'precio' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'foto' => array(
			'uploadError'=>array(
				'rule' => 'uploadError',
				'message' => 'Error, intenta de nuevo',
				'on' => 'create'
				),
			'isUnderPhpSizeLimit' => array(
				'rule' => 'isUnderPhpSizeLimit',
				'message' => 'Archivo excede el limite de tamano de subida'
				),
			'isValidMimeType' => array(
				'rule' => array('isValidMimeType', array('image/jpeg','image/png'),false),
				'message' => 'La imagen no es jpeg o png'),
			'isBelowMaxSize' =>array(
				'rule' => array('isBelowMaxSize',1048576),
				'message' => 'El tamano de imagen es demasiado grande'
				),
			'isValidExtension' => array(
				'rule' => array('isValidExtension',array('jpg','png'),false),
				'message' => 'La imagen no tiene la extension jpg o png'
				),
			'checkUniqueName' => array(
				'rule' => array('checkUniqueName'),
				'message' => 'La imagen ya se encuentra registrada',
				'on'=>'update'
				),
			),
		'categoria_platillo_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
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
		'CategoriaPlatillo' => array(
			'className' => 'CategoriaPlatillo',
			'foreignKey' => 'categoria_platillo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	//Relacion platillos pedidos hasmany un platillo muchos pedidos
	public $hasMany = array(
		'Pedido' => array(
			'className'=>'Pedido',
			'foreignKey'=>'platillo_id',
			'dependent'=>false
		),
		//Platillo tendra muchos ordenitems
		'OrdenItem' => array(
			'className'=>'OrdenItem',
			'foreignKey'=>'platillo_id',
			'dependent'=>false,
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
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Cocinero' => array(
			'className' => 'Cocinero',
			'joinTable' => 'cocineros_platillos',
			'foreignKey' => 'platillo_id',
			'associationForeignKey' => 'cocinero_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

	function checkUniqueName($data){
		$isUnique = $this->find('first',array('fields' => array('Platillo.foto'),'conditions'=>array('Platillo.foto'=>$data['foto'])));
		if(!empty($isUnique)){
			return false;

		}else{
			return true;
		}

	}

}
