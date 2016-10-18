<?php
class PedidosController extends AppController{

	public $components = array('Session','RequestHandler');
	public $helpers = array('Html','Form','Time');

    public function isAuthorized($user){

        if($user['role'] == 'user'){

            if(in_array($this->action,array('add','view','itemUpdate','remove','quitar','recalcular'))){
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

	
	public function add(){

		if($this->request->is('ajax')){
			$id = $this->request->data['id'];
            $user_id = $this->request->data['user_id'];
			$cantidad = $this->request->data['cantidad'];
			$platillo = $this->Pedido->Platillo->find('all',array('fields'=>array('Platillo.precio'),'conditions'=>array('Platillo.id'=>$id)));
			$precio = $platillo[0]['Platillo']['precio'];
			$subtotal = $cantidad * $precio;


			$pedido = array('platillo_id'=>$id,'cantidad'=>$cantidad,'subtotal'=>$subtotal, 'user_id'=>$user_id);

			$existe_pedido = $this->Pedido->find('all',array('fields'=>array('Pedido.platillo_id'),'conditions'=>array('Pedido.platillo_id'=>$id)));

			if(count($existe_pedido)==0){
				$this->Pedido->save($pedido);
			}	
		}

		//Para evitar que cakephp nos exija una vista add
		$this->autoRender = false;	
	}

	public function view($user_id=null){

        
        $res_pedidos = $this->Pedido->find('all', array('fields' => array('Pedido.user_id'), 'conditions' => array('Pedido.user_id' => $user_id)));

		if(count($res_pedidos)==0){

			$this->Session->setFlash("Aun no se han realizado pedidos",'default',array('class'=>'alert alert-warning'));
			return $this->redirect(array('controller'=>'platillos','action'=>'index'));
		}

		$this->set('pedidos',$this->Pedido->find('all',array('order'=>'Pedido.id ASC', 'conditions' => array('Pedido.user_id' => $user_id))));		
		$total_pedidos = $this->Pedido->find('all',array('fields'=>array('SUM(Pedido.subtotal) as subtotal'),'conditions' => array('Pedido.user_id' => $user_id)));
		//verificar con debug
		$mostrar_total_pedidos = $total_pedidos[0][0]['subtotal'];
		$this->set('total_pedidos',$mostrar_total_pedidos);
	}

	public function itemUpdate(){

        if($this->request->is('ajax'))
        {
            $id = $this->request->data['id'];

            $idus = $this->request->data['idus'];
            
            $cantidad = isset($this->request->data['cantidad']) ? $this->request->data['cantidad'] : null;
            
            if($cantidad == 0)
            {
                $cantidad = 1;
            }
            
            $item = $this->Pedido->find('all', array('fields' => array('Pedido.id', 'Platillo.precio'), 'conditions' => array('Pedido.id' => $id)));
            
            $precio_item = $item[0]['Platillo']['precio'];
            
            $subtotal_item = $cantidad * $precio_item;
            
            $item_update = array('id' => $id, 'cantidad' => $cantidad, 'subtotal' => $subtotal_item);
            
            $this->Pedido->saveAll($item_update);
        }
        
        $total = $this->Pedido->find('all', array('fields' => array('SUM(Pedido.subtotal) as subtotal'),'conditions' => array('Pedido.user_id' => $idus)));
        $mostrar_total = $total[0][0]['subtotal'];
        
        $pedido_update = $this->Pedido->find('all', array('fields' => array('Pedido.id', 'Pedido.subtotal'), 'conditions' => array('Pedido.id' => $id)));
        
        $mostrar_pedido = array('id' => $pedido_update[0]['Pedido']['id'], 'subtotal' => $pedido_update[0]['Pedido']['subtotal'], 'total' => $mostrar_total);
        
        echo json_encode(compact('mostrar_pedido'));
        $this->autoRender = false;
    }

    public function remove(){
    	if($this->request->is('ajax')){
    		$id = $this->request->data['id'];
            $iduse = $this->request->data['iduse'];
    		$this->Pedido->delete($id);
    	}

    	$total_remove = $this->Pedido->find('all', array('fields' => array('SUM(Pedido.subtotal) as subtotal'),'conditions' => array('Pedido.user_id' => $iduse)));
        $mostrar_total_remove = $total_remove[0][0]['subtotal'];
    	$pedidos = $this->Pedido->find('all');
        
        if(count($mostrar_total_remove) == 0)
        {
            $mostrar_total_remove = "0.00";
        }
        
        echo json_encode(compact('pedidos', 'mostrar_total_remove'));
        $this->autoRender = false;

    }

    public function quitar(){
        if($this->Pedido->deleteAll(1,false)){

            $this->Session->setFlash('Todos los pedidos han sido eliminados','default',array('class'=>'alert alert-success'));

        }else{
            $this->Session->setFlash('No se pudo eliminar los pedidos','default',array('class'=>'alert alert-danger'));
        }
        return $this->redirect(array('controller'=>'platillos','action'=>'index'));
    }

}
?>