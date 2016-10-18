<div class="well">
<h2><?php echo __('Datos del Despacho'); ?></h2>
	<dl>
		<dt><?php echo __('Id Despacho:'); ?></dt>
		<dd>
			<?php echo h($mesa['Mesa']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Indicaciones:'); ?></dt>
		<dd>
			<?php echo h($mesa['Mesa']['posicion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Creado:'); ?></dt>
		<dd>
			<?php echo h($mesa['Mesa']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modificado:'); ?></dt>
		<dd>
			<?php echo h($mesa['Mesa']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Repartidor Asignado:'); ?></dt>
		<dd>
			<?php echo $this->Html->link($mesa['Mesero']['nombre'], array('controller' => 'meseros', 'action' => 'view', $mesa['Mesero']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php if($current_user['role'] == 'admin'): ?>
<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <?php echo __('Acciones'); ?> <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
	<li><?php echo $this->Html->link(__('Editar Despacho'), array('action' => 'edit', $mesa['Mesa']['id'])); ?></li>
	<li><?php echo $this->Form->postLink(__('Eliminar Despacho'), array('action' => 'delete', $mesa['Mesa']['id']), array(), __('Esta seguro de querer eliminar el despacho # %s?', $mesa['Mesa']['id'])); ?></li>
	<li><?php echo $this->Html->link(__('Lista de Despachos'), array('action' => 'index')); ?></li>
	<li><?php echo $this->Html->link(__('Nuevo Despacho'), array('action' => 'add')); ?></li>
    <li class="divider"></li>
	<li><?php echo $this->Html->link(__('Lista de Repartidores'), array('controller' => 'meseros', 'action' => 'index')); ?></li>
	<li><?php echo $this->Html->link(__('Nuevo Repartidor'), array('controller' => 'meseros', 'action' => 'add')); ?></li>
  </ul>
</div>
<?php endif;?>
<div class="related">
	<h3><?php echo __('Ordenes Asignadas a este despacho:'); ?></h3>
	<?php if (!empty($mesa['Orden'])): ?>
	<div class="col-md-12">
		<table class="table table-striped">
			<tr>
				<th><?php echo __('Id Orden'); ?></th>
				<th><?php echo __('Total'); ?></th>
				<th><?php echo __('Cliente'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
			<?php foreach ($mesa['Orden'] as $orden): ?>
				<tr>
					<td><?php echo $orden['id']; ?></td>
					<td><?php echo $orden['total']; ?></td>
					<td><?php 

					echo $this->Html->link(__('Ver Datos de Cliente'), array('controller' => 'users', 'action' => 'view', $orden['cliente_id']), array('class' => 'btn btn-sm btn-default'));

					?></td>
					<td class="actions">
						<?php echo $this->Html->link(__('Ver Orden'), array('controller' => 'ordens', 'action' => 'indexOrders', $orden['id']), array('class' => 'btn btn-sm btn-default')); ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>
<?php endif; ?>