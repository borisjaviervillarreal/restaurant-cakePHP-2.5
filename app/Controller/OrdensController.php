<?php

class OrdensController extends AppController{
	public $components=array('Session','RequestHandler');
	public $helpers=array('Html',"Form",'Time','Js');

    public $paginate = array(
        'limit'=>5,
        'order'=>array(
            'Orden.id'=>'desc'
            )
        );

   /* public function isAuthorized($user){

        if($user['role'] == 'user'){

            if(in_array($this->action,array('add'))){
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

    }*/

    public function index($id_user=null){

        $this->Orden->recursive = 0;

        $this->paginate['Orden']['limit'] = 5;
        $this->paginate['Orden']['order'] = array('Orden.id'=>'desc');
        $this->paginate['Orden']['conditions'] = array('Orden.cliente_id'=>$id_user);
        $this->set('ordens',$this->paginate());
    }

    public function indexClients(){
        $this->Orden->recursive = 0;

        $this->paginate['Orden']['limit'] = 5;
        $this->paginate['Orden']['order'] = array('Orden.id'=>'desc');
        $this->paginate['Orden']['conditions'] = array('Orden.estado_id'=>'3');
        $this->set('ordens',$this->paginate());
    }

    public function indexClientsNo(){
        $this->Orden->recursive = 0;

        $this->paginate['Orden']['limit'] = 5;
        $this->paginate['Orden']['order'] = array('Orden.id'=>'desc');
        $this->paginate['Orden']['conditions'] = array('Orden.estado_id'=>'0');
        $this->set('ordens',$this->paginate());
    }

    public function indexOrders($id_order=null){
        $this->Orden->recursive = 0;

        $this->paginate['Orden']['limit'] = 5;
        $this->paginate['Orden']['order'] = array('Orden.id'=>'desc');
        $this->paginate['Orden']['conditions'] = array('Orden.id'=>$id_order);
        $this->set('ordens',$this->paginate());
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
                $conditions[]=array('Orden.id LIKE'=>'%'.$term.'%');
            }

            $ordenes = $this->Orden->find('all',array('recursive'=>-1,'conditions'=>$conditions,'limit'=>200));
            if(count($ordenes)==1){
                return $this->redirect(array('controller' => 'ordens', 'action' => 'indexOrders', $ordenes[0]['Orden']['id']));
            }else{
                $this->Session->setFlash('Ninguna Órden con el número de órden ingresado. Intentelo nuevamente', 'default', array('class' => 'alert alert-danger'));
            }
            $terms1 = array_diff($terms1, array(''));
            $this->set(compact('ordens','terms1'));
        }

        $this->set(compact('search'));
        
    }

        public function searchUser($id_user=null){
        $search = null;
        if(!empty($this->request->query['search'])){

            $search = $this->request->query['search'];
            $search = preg_replace('/[^a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]/', '', $search);
            $terms = explode(' ', trim($search));
            $terms = array_diff($terms, array(''));

            foreach ($terms as $term) {
                $terms1[]= preg_replace('/[^a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]/','',$term);
                $conditions[]=array('Orden.id LIKE'=>'%'.$term.'%','Orden.cliente_id'=>$id_user);
            }

            $ordenes = $this->Orden->find('all',array('recursive'=>-1,'conditions'=>$conditions,'limit'=>200));
            if(count($ordenes)==1){
                return $this->redirect(array('controller' => 'ordens', 'action' => 'indexOrders', $ordenes[0]['Orden']['id']));
            }else{
                $this->Session->setFlash('Ninguna Órden con el número de órden ingresado. Intentelo nuevamente', 'default', array('class' => 'alert alert-danger'));
            }
            $terms1 = array_diff($terms1, array(''));
            $this->set(compact('ordens','terms1'));
        }

        $this->set(compact('search'));
        
    }


	public function add($user_id=null) {
        $this->loadModel('Pedido', 'RequestHandler');
        $this->loadModel('User', 'RequestHandler');
        $us=$user_id; //CONSIGUE EL ID DEL USUARIO PARA MOSTRAR PEDIDOS DE CADA USUARIO
        $orden_item = $this->Pedido->find('all', array('order' => 'Pedido.id ASC', 'conditions' => array('Pedido.user_id' => $us)));
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $us));
        $this->set('usu', $this->User->find('first', $options));
        
        // debug($orden_item);
        
        if(count($orden_item) > 0)
        {
            $total_pedidos = $this->Pedido->find('all', array('fields' => array('SUM(Pedido.subtotal) as subtotal'),'conditions' => array('Pedido.user_id' => $us)));
            $mostrar_total_pedidos = $total_pedidos[0][0]['subtotal'];
            
            // Recuperando DESPACHADORES del restaurante
           // $mesas = $this->Orden->Mesa->find('list');
            
            $this->set(compact('orden_item','mostrar_total_pedidos'));
        }
        else
        {
            $this->Session->setFlash('Ninguna orden ha sido procesada', 'default', array('class' => 'alert alert-danger'));
            return $this->redirect(array('controller' => 'platillos', 'action' => 'index'));
        }
        
        if($this->request->is('post'))
        {
            $this->Orden->create();
            if($this->Orden->save($this->request->data))
            {
                $id_orden = $this->Orden->id;
                
                for($i = 0; $i < count($orden_item); $i++)
                {
                    $platillo_id = $orden_item[$i]['Pedido']['platillo_id'];
                    $cantidad = $orden_item[$i]['Pedido']['cantidad'];
                    $subtotal = $orden_item[$i]['Pedido']['subtotal'];
                    
                    $orden_items = array('platillo_id' => $platillo_id, 'orden_id' => $id_orden, 'cliente_id' => $us, 'cantidad' => $cantidad, 'subtotal' => $subtotal);
                    $this->Orden->OrdenItem->saveAll($orden_items);
                }
                
                //Eliminando el contenido de la tabla pedidos segun el usuario
                $this->Pedido->deleteAll(array('Pedido.user_id'=>$us));
                
                $this->Session->setFlash('La orden fue procesada con éxito', 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('controller' => 'platillos', 'action' => 'index'));
            }
            else
            {
                $this->Session->setFlash('La orden no pudo ser procesada.'. 'default', array('class' => 'alert alert-danger'));
            } 
        }
    }
}
?>