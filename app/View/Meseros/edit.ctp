<div class="page-header">
	<h2><?php echo __('Editar Repartidor'); ?></h2>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<?php echo $this->Form->create('Mesero', array('role' => 'form')); ?>
				
				<?php
					echo $this->Form->input('id');
					echo $this->Form->input('dni', array('class' => 'form-control', 'label' => 'DNI'));
					echo $this->Form->input('nombre', array('class' => 'form-control', 'label' => 'Nombre'));
					echo $this->Form->input('apellido', array('class' => 'form-control', 'label' => 'Apellido'));
					echo $this->Form->input('telefono', array('class' => 'form-control', 'label' => 'Teléfono'));
				?>
			
				<p>
					<?php echo $this->Form->end(array('label' => 'Editar Repartidor', 'class' =>'btn btn-success')); ?>
				</p>
			<div class="btn-group">
			  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
			    <?php echo __('Acciones'); ?> <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu" role="menu">
				<li><?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $this->Form->value('Mesero.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Mesero.id'))); ?></li>
				<li><?php echo $this->Html->link(__('Lista Repartidores'), array('action' => 'index')); ?></li>
			    <li class="divider"></li>
				<li><?php echo $this->Html->link(__('Lista Despachos'), array('controller' => 'mesas', 'action' => 'index')); ?></li>
			  </ul>
			</div>
		</div>
	</div>
</div>
