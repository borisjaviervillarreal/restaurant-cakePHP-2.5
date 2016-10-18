<div class="page-header">
	<h2><?php echo __('Editar Despacho'); ?></h2>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<?php echo $this->Form->create('Mesa', array('role' => 'form', 'novalidate')); ?>
				<fieldset>
					
				<?php
					echo $this->Form->input('id');
					echo $this->Form->input('posicion', array('class' => 'form-control', 'label' => 'Indicaciones'));
					echo $this->Form->input('mesero_id', array('class' => 'form-control', 'label' => 'Repartidor'));
					echo $this->Form->input('Orden', array('class' => 'form-control', 'label' => 'ID Ordenes Seleccionadas'));
				?>
				</fieldset>
				<p>
					<?php echo $this->Form->end(array('label' => 'Editar Despacho', 'class' =>'btn btn-success')); ?>
				</p>
			<div class="btn-group">
			  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
			    <?php echo __('Acciones'); ?> <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu" role="menu">
			    <li><?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $this->Form->value('Mesa.id')), array(), __('Esta seguro de querer eliminar el despacho # %s?', $this->Form->value('Mesa.id'))); ?></li>
			    <li><?php echo $this->Html->link(__('Lista de Despachos'), array('action' => 'index')); ?></li>
			    <li class="divider"></li>
			    <li><?php echo $this->Html->link(__('Lista de Repartidores'), array('controller' => 'meseros', 'action' => 'index')); ?></li>
			    <li><?php echo $this->Html->link(__('Nuevo Repartidor'), array('controller' => 'meseros', 'action' => 'add')); ?></li>
			  </ul>
			</div>

		</div>
	</div>
</div>
