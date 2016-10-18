    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
          <?php echo $this->Html->link('Restaurante', array('controller' => 'users', 'action' => 'bienvenida'), array('class' => 'navbar-brand' )); ?>
          

        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">

            <?php if($current_user['role'] == 'admin'): ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuarios <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><?php echo $this->Html->link('Lista Usuarios', array('controller' => 'users', 'action' => 'index')) ?></li>
                <li><?php echo $this->Html->link('Nuevo Usuario', array('controller' => 'users', 'action' => 'addAdmin')) ?></li>
              </ul>
            </li>
            

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Repartidores <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><?php echo $this->Html->link('Lista Repartidores', array('controller' => 'meseros', 'action' => 'index')) ?></li>
                <li><?php echo $this->Html->link('Nuevo Repartidor', array('controller' => 'meseros', 'action' => 'add')) ?></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Despachos <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><?php echo $this->Html->link('Buscar Despachos', array('controller' => 'mesas', 'action' => 'search')) ?></li>
                <li><?php echo $this->Html->link('Despachos Asignados', array('controller' => 'mesas', 'action' => 'index')) ?></li>
                <li><?php echo $this->Html->link('Despachos Entregados', array('controller' => 'mesas', 'action' => 'indexEntregadoTodos')) ?></li>
                <li><?php echo $this->Html->link('Nuevo Despacho', array('controller' => 'mesas', 'action' => 'add')) ?></li>
           
              </ul>
            </li>



                         
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cocineros <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><?php echo $this->Html->link('Lista Cocineros', array('controller' => 'cocineros', 'action' => 'index')) ?></li>
                <li><?php echo $this->Html->link('Nuevo Cocinero', array('controller' => 'cocineros', 'action' => 'add')) ?></li>
              </ul>
            </li>
            

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Platillos <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><?php echo $this->Html->link('Lista Platillos', array('controller' => 'platillos', 'action' => 'index')) ?></li>
                <li><?php echo $this->Html->link('Nuevo Platillo', array('controller' => 'platillos', 'action' => 'add')) ?></li>
                <li><?php echo $this->Html->link('Buscar Platillo', array('controller' => 'platillos', 'action' => 'search')) ?></li>
                <li class="divider"></li>
                <li class="dropdown-header">Categorías</li>
                <li><?php echo $this->Html->link('Lista Categorías', array('controller' => 'categoria_platillos', 'action' => 'index')) ?></li>
                <li><?php echo $this->Html->link('Nueva Categoría', array('controller' => 'categoria_platillos', 'action' => 'add')) ?></li>                   
              </ul>
            </li>
            <?php endif; ?>

            <?php if($current_user['role'] == 'user'): ?>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Platillos <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><?php echo $this->Html->link('Lista Platillos', array('controller' => 'platillos', 'action' => 'index')) ?></li>
                <li><?php echo $this->Html->link('Buscar Platillo', array('controller' => 'platillos', 'action' => 'search')) ?></li>
                <li class="divider"></li>
                <li class="dropdown-header">Categorías</li>
                <li><?php echo $this->Html->link('Lista Categorías', array('controller' => 'categoria_platillos', 'action' => 'index')) ?></li>                   
              </ul>
            </li>
            <?php endif; ?>

            <?php if($current_user['role'] == 'repartidor'): ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Despachos <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><?php echo $this->Html->link('Buscar Mis Despachos', array('controller' => 'mesas', 'action' => 'search')) ?></li>
                <li><?php echo $this->Html->link('Despachos Asignados', array('controller' => 'mesas', 'action' => 'indexRepartidor',$current_user['id_repartidor'])) ?></li>
                <li><?php echo $this->Html->link('Despachos Entregados', array('controller' => 'mesas', 'action' => 'indexEntregado',$current_user['id_repartidor'])) ?></li>
              </ul>

            </li>
             <?php endif; ?>
          </ul>
          <?php if($current_user['role'] == 'admin' || $current_user['role'] == 'user'): ?>
          <?php echo $this->Form->create('Platillo', array('type' => 'GET', 'class' => 'navbar-form navbar-left', 'url' => array('controller' => 'platillos', 'action' => 'search'))); ?>
          <div class="form-group">
              <?php echo $this->Form->input('search', array('label' => false, 'div' => false, 'id' => 's', 'class' => 'form-control s', 'autocomplete' => 'off', 'placeholder' => 'Buscar platillo...')); ?>
          </div>
          <?php echo $this->Form->button('Buscar', array('div' => false, 'class' => 'btn btn-primary')); ?>
          <?php echo $this->Form->end(); ?>
          
          <?php endif;?>
          
            <ul class="nav navbar-nav navbar-right">

             <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo $current_user['nombre']." ".$current_user['apellido'];?> <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <?php if($current_user['role'] == 'user'): ?>
                <li><?php echo $this->Html->link('Mis Pedidos', array('controller' => 'pedidos', 'action' => 'view',$current_user['id'])); ?></li>
                <li><?php echo $this->Html->link('Mis Órdenes', array('controller' => 'ordens', 'action' => 'index',$current_user['id'])); ?>
                  <li><?php echo $this->Html->link('Buscar Órden', array('controller' => 'ordens', 'action' => 'searchUser',$current_user['id'])); ?></li></li>
                <?php endif; ?>
                <?php if($current_user['role'] == 'admin'): ?>
                <li><?php echo $this->Html->link('Órdenes Asignadas Despacho', array('controller' => 'ordens', 'action' => 'indexClients')); ?></li>
                <li><?php echo $this->Html->link('Órdenes No Asignadas Despacho', array('controller' => 'ordens', 'action' => 'indexClientsNo')); ?></li>
                <li><?php echo $this->Html->link('Buscar Órden', array('controller' => 'ordens', 'action' => 'search')); ?></li>
                <?php endif; ?>
                <li class="divider"></li>
                <li class="dropdown-header"></li>
                <li><?php echo $this->Html->link('Desconectarse', array('controller'=>'users','action'=>'logout'))?></li>                   
              </ul>
            </li>
          </ul>  

        </div><!--/.nav-collapse -->
      </div>
    </div>