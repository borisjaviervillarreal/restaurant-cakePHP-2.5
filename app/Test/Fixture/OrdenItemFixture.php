<?php
/**
 * OrdenItemFixture
 *
 */
class OrdenItemFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'platillo_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'orden_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'cliente_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'cantidad' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'subtotal' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => '6,2', 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_spanish_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'platillo_id' => 1,
			'orden_id' => 1,
			'cliente_id' => 1,
			'cantidad' => 1,
			'subtotal' => '',
			'created' => '2016-05-30 21:23:41',
			'modified' => '2016-05-30 21:23:41'
		),
	);

}
