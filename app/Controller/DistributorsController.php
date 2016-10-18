<?php
App::uses('AppController', 'Controller');
/**
 * Distributors Controller
 *
 * @property Distributor $Distributor
 * @property PaginatorComponent $Paginator
 */
class DistributorsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Distributor->recursive = 0;
		$this->set('distributors', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Distributor->exists($id)) {
			throw new NotFoundException(__('Invalid distributor'));
		}
		$options = array('conditions' => array('Distributor.' . $this->Distributor->primaryKey => $id));
		$this->set('distributor', $this->Distributor->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Distributor->create();
			if ($this->Distributor->save($this->request->data)) {
				$this->Session->setFlash(__('The distributor has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The distributor could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Distributor->exists($id)) {
			throw new NotFoundException(__('Invalid distributor'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Distributor->save($this->request->data)) {
				$this->Session->setFlash(__('The distributor has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The distributor could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Distributor.' . $this->Distributor->primaryKey => $id));
			$this->request->data = $this->Distributor->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Distributor->id = $id;
		if (!$this->Distributor->exists()) {
			throw new NotFoundException(__('Invalid distributor'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Distributor->delete()) {
			$this->Session->setFlash(__('The distributor has been deleted.'));
		} else {
			$this->Session->setFlash(__('The distributor could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
