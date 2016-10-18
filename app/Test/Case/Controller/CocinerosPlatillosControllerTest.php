<?php
App::uses('CocinerosPlatillosController', 'Controller');

/**
 * CocinerosPlatillosController Test Case
 *
 */
class CocinerosPlatillosControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cocineros_platillo',
		'app.cocinero',
		'app.platillo',
		'app.categoria_platillo',
		'app.orden_item',
		'app.orden',
		'app.orden_mesa',
		'app.mesa',
		'app.mesero',
		'app.pedido',
		'app.user'
	);

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
		$this->markTestIncomplete('testIndex not implemented.');
	}

/**
 * testView method
 *
 * @return void
 */
	public function testView() {
	//	$this->markTestIncomplete('testView not implemented.');
	}

/**
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {
	//	$this->markTestIncomplete('testAdd not implemented.');
	}

/**
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {
	//	$this->markTestIncomplete('testEdit not implemented.');
	}

/**
 * testDelete method
 *
 * @return void
 */
	public function testDelete() {
	//	$this->markTestIncomplete('testDelete not implemented.');
	}

}
