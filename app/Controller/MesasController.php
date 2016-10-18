<?php
App::uses('AppController', 'Controller');
/**
 * Mesas Controller
 *
 * @property Mesa $Mesa
 * @property PaginatorComponent $Paginator
 */
class MesasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('RequestHandler', 'Session');
	public $helper = array('Html','Form','Time','Js');

	public $paginate = array(
		'limit'=>3,
		'order'=>array(
			'Mesa.id'=>'asc'
			)
		);

	public function isAuthorized($user){

		if($user['role'] == 'user'){

			if(in_array($this->action,array('add','index','view','edit'))){
				return true;
			}
			else{
				if($this->Auth->user('id')){
					$this->Session->setFlash('No se puede acceder','default',array('class'=>'alert alert-danger'));
					$this->redirect($this->Auth->redirect());
				}
			}

		}

		return parent::isAuthorized($user);

	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Mesa->recursive = 0;
		$this->paginate['Mesa']['limit'] = 6;
		$this->paginate['Mesa']['order'] = array('Mesa.id'=>'asc');
		$this->paginate['Mesa']['conditions'] = array('Mesa.estado_id'=>'3');
		$this->set('mesas', $this->paginate());
	}

	public function indexRepartidor($id=null) {
		$this->Mesa->recursive = 0;
		$this->paginate['Mesa']['limit'] = 6;
		$this->paginate['Mesa']['order'] = array('Mesa.id'=>'asc');
		$this->paginate['Mesa']['conditions'] = array('Mesa.estado_id'=>'3','Mesa.mesero_id'=>$id);
		$this->set('mesas', $this->paginate());
	}


	public function entregado($id = null) {

			$this->Mesa->updateAll(array('estado_id'=>'1'),array('Mesa.id'=>$id));
			$this->Session->setFlash('El despacho ha sido asignado como entregado correctamente, puede consultarlo en "Ver mis despachos entregados".','default',array('class'=>'alert alert-success'));
			return $this->redirect(array('controller' => 'users', 'action' => 'bienvenida'));
		
	}

	public function indexEntregado($id=null) {
		$this->Mesa->recursive = 0;
		$this->paginate['Mesa']['limit'] = 6;
		$this->paginate['Mesa']['order'] = array('Mesa.id'=>'asc');
		$this->paginate['Mesa']['conditions'] = array('Mesa.estado_id'=>'1','Mesa.mesero_id'=>$id);
		$this->set('mesas', $this->paginate());
	}

	public function indexEntregadoTodos() {
		$this->Mesa->recursive = 0;
		$this->paginate['Mesa']['limit'] = 6;
		$this->paginate['Mesa']['order'] = array('Mesa.id'=>'asc');
		$this->paginate['Mesa']['conditions'] = array('Mesa.estado_id'=>'1');
		$this->set('mesas', $this->paginate());
	}

		public function indexBusqueda($id_mesa=null) {
		$this->Mesa->recursive = 0;
		$this->paginate['Mesa']['limit'] = 6;
		$this->paginate['Mesa']['order'] = array('Mesa.id'=>'asc');
		$this->paginate['Mesa']['conditions'] = array('Mesa.id'=>$id_mesa);
		$this->set('mesas', $this->paginate());
	}

	    public function search(){
        $search = null;
        if(!empty($this->request->query['search'])){

            $search = $this->request->query['search'];
            $search = preg_replace('/[^a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]/', '', $search);
            $terms = explode(' ', trim($search));
            $terms = array_diff($terms, array(''));

            foreach ($terms as $term) {
                $terms1[]= preg_replace('/[^a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]/','',$term);
                $conditions[]=array('Mesa.id LIKE'=>'%'.$term.'%');
            }

            $ordenes = $this->Mesa->find('all',array('recursive'=>-1,'conditions'=>$conditions,'limit'=>200));
            if(count($ordenes)==1){
                return $this->redirect(array('controller' => 'mesas', 'action' => 'indexBusqueda', $ordenes[0]['Mesa']['id']));
            }else{
                $this->Session->setFlash('Ningun Despacho con el número de despacho ingresado. Intentelo nuevamente', 'default', array('class' => 'alert alert-danger'));
            }
            $terms1 = array_diff($terms1, array(''));
            $this->set(compact('mesas','terms1'));
        }

        $this->set(compact('search'));
        
    }

    	    public function searchRepartidor($id=null){
        $search = null;
        if(!empty($this->request->query['search'])){

            $search = $this->request->query['search'];
            $search = preg_replace('/[^a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]/', '', $search);
            $terms = explode(' ', trim($search));
            $terms = array_diff($terms, array(''));

            foreach ($terms as $term) {
                $terms1[]= preg_replace('/[^a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]/','',$term);
                $conditions[]=array('Mesa.id LIKE'=>'%'.$term.'%','Mesa.mesero_id'=>$id);
            }

            $ordenes = $this->Mesa->find('all',array('recursive'=>-1,'conditions'=>$conditions,'limit'=>200));
            if(count($ordenes)==1){
                return $this->redirect(array('controller' => 'mesas', 'action' => 'indexBusqueda', $ordenes[0]['Mesa']['id']));
            }else{
                $this->Session->setFlash('Ningun Despacho con el número de despacho ingresado. Intentelo nuevamente', 'default', array('class' => 'alert alert-danger'));
            }
            $terms1 = array_diff($terms1, array(''));
            $this->set(compact('mesas','terms1'));
        }

        $this->set(compact('search'));
     }   

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Mesa->exists($id)) {
			throw new NotFoundException(__('Invalid despacho'));
		}
		$options = array('conditions' => array('Mesa.' . $this->Mesa->primaryKey => $id));
		$this->set('mesa', $this->Mesa->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Mesa->create();
			if ($this->Mesa->save($this->request->data)) {
				$this->loadModel('Orden', 'RequestHandler');

				//Actualizar en ordenes que han sido despachadas con un 3

				foreach ($this->request->data['Orden'] as $ordenes){  
   		
   					$this->Orden->updateAll(array('Orden.estado_id'=>'3'),array('Orden.id'=>$ordenes));
   				}
				 

				$this->Session->setFlash('El despacho ha sido creado exitosamente.','default',array('class'=>'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('El despacho no ha podido ser creado. Intentelo nuevamente.','default',array('class'=>'alert alert-danger'));
			}
		}
		$meseros = $this->Mesa->Mesero->find('list');
		$ordens = $this->Mesa->Orden->find('list', array('order' => 'Orden.id ASC', 'conditions' => array('Orden.estado_id' => '0')));
		$this->set(compact('meseros','ordens'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Mesa->exists($id)) {
			throw new NotFoundException(__('Invalid mesa'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Mesa->save($this->request->data)) {
				$this->Session->setFlash('El despacho ha sido modificado exitosamente.','default',array('class'=>'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('El despacho no ha sido modificado exitosamente. Intentelo nuevamente','default',array('class'=>'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Mesa.' . $this->Mesa->primaryKey => $id));
			$this->request->data = $this->Mesa->find('first', $options);
		}
		$meseros = $this->Mesa->Mesero->find('list');
		$ordens = $this->Mesa->Orden->find('list');
		$this->set(compact('meseros','ordens'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Mesa->id = $id;
		if (!$this->Mesa->exists()) {
			throw new NotFoundException(__('Invalid mesa'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Mesa->delete()) {
			$this->Session->setFlash('El despacho ha sido eliminado exitosamente.','default',array('class'=>'alert alert-success'));
		} else {
			$this->Session->setFlash('El despacho no ha podido ser eliminado. Intentelo nuevamente.','default',array('class'=>'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
