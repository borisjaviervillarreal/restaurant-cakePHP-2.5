<div class="page-header">
	<h2><?php echo __('Nuevo Repartidor'); ?></h2>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<?php echo $this->Form->create('Mesero', array('role' => 'form')); ?>
				
				<?php
					echo $this->Form->input('dni', array('class' => 'form-control', 'label' => 'DNI'));
					echo $this->Form->input('nombre', array('class' => 'form-control', 'label' => 'Nombre'));
					echo $this->Form->input('apellido', array('class' => 'form-control', 'label' => 'Apellido'));
					echo $this->Form->input('telefono', array('class' => 'form-control', 'label' => 'Teléfono'));
					echo $this->Form->input('direccion', array('class' => 'form-control', 'label' => 'Direccion'));
					echo $this->Form->input('username', array('class' => 'form-control', 'label' => 'Nombre de Usuario'));
					echo $this->Form->input('password', array('class' => 'form-control', 'label' => 'Password'));
					//echo $this->Form->input('role', array('class' => 'form-control', 'label' => '', 'type' => 'select', 'options' => array('admin' => 'Administrador', 'user' => 'Usuario', 'repartidor'=>'Repartidor'), array('class' => 'form-control')));

				?>
				

				<p>
				<?php echo $this->Form->end(array('label' => 'Crear Repartidor', 'class' =>'btn btn-success')); ?>
				</p>
			<div class="btn-group">
			  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
			    <?php echo __('Acciones'); ?> <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu" role="menu">
				<li><?php echo $this->Html->link(__('Lista Repartidores'), array('action' => 'index')); ?></li>
			    <li class="divider"></li>
			    <li><?php echo $this->Html->link(__('List Despachos'), array('controller' => 'mesas', 'action' => 'index')); ?></li>
			  </ul>
			</div>
		</div>
	</div>
</div>
