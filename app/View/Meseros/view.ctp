
<div class="well">
<h2><?php echo __('Datos del Repartidor'); ?></h2>
	<dl>
	<?php if($current_user['role'] == 'admin'): ?>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($mesero['Mesero']['id']); ?>
			&nbsp;
		</dd>
	<?php endif;?>
		<dt><?php echo __('Dni'); ?></dt>
		<dd>
			<?php echo h($mesero['Mesero']['dni']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($mesero['Mesero']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Apellido'); ?></dt>
		<dd>
			<?php echo h($mesero['Mesero']['apellido']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefono'); ?></dt>
		<dd>
			<?php echo h($mesero['Mesero']['telefono']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Direccion'); ?></dt>
		<dd>
			<?php echo h($mesero['Mesero']['direccion']); ?>
			&nbsp;
		</dd>

	<?php if($current_user['role'] == 'admin'): ?>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($mesero['Mesero']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($mesero['Mesero']['modified']); ?>
			&nbsp;
		</dd>
	<?php endif;?>
	</dl>
</div>
<?php if($current_user['role'] == 'admin'): ?>
<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <?php echo __('Actions'); ?> <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
  	<li><?php echo $this->Html->link(__('Editar Repartidor'), array('action' => 'edit', $mesero['Mesero']['id'])); ?></li>
  	<li><?php echo $this->Form->postLink(__('Eliminar Repartidor'), array('action' => 'delete', $mesero['Mesero']['id']), array(), __('Are you sure you want to delete # %s?', $mesero['Mesero']['id'])); ?></li>
  	<li><?php echo $this->Html->link(__('Lista Repartidores'), array('action' => 'index')); ?></li>
  	<li><?php echo $this->Html->link(__('Nuevo Repartidor'), array('action' => 'add')); ?></li>
  </ul>
</div>
<?php endif;?>
<div class="related">
	<h3><?php echo __('Despachos Asignados a este Repartidor por ser entregados:'); ?></h3>
	<?php if (!empty($mesero['Mesa'])): ?>
	<div class="col-md-12">
		<table class="table table-striped">
		<tr>
			<th><?php echo __('Id'); ?></th>
			<th><?php echo __('Indicaciones'); ?></th>
			<th><?php echo __('Created'); ?></th>
			<th><?php echo __('Modified'); ?></th>
			
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($mesero['Mesa'] as $mesa): ?>
			<tr>
				<td><?php echo $mesa['id']; ?></td>
				<td><?php echo $mesa['posicion']; ?></td>
				<td><?php echo $mesa['created']; ?></td>
				<td><?php echo $mesa['modified']; ?></td>
				
				<td class="actions">
					<?php echo $this->Html->link(__('Ver'), array('controller' => 'mesas', 'action' => 'view', $mesa['id']), array('class' => 'btn btn-sm btn-default')); ?>
					<?php if($current_user['role'] == 'admin'): ?>
					<?php echo $this->Html->link(__('Editar'), array('controller' => 'mesas', 'action' => 'edit', $mesa['id']), array('class' => 'btn btn-sm btn-default')); ?>
					<?php echo $this->Form->postLink(__('Eliminar'), array('controller' => 'mesas', 'action' => 'delete', $mesa['id']), array('class' => 'btn btn-sm btn-default'), __('Esta seguro que desea eliminar el despacho # %s?', $mesa['id'])); ?>
					<?php endif;?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
	</div>
<?php endif; ?>

</div>