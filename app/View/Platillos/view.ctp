<?php echo $this->Html->script(array('addtocart.js'),array('inline'=>false))?>

<h1><?php echo $platillo['Platillo']['nombre']; ?></h1>

<div class="row">

	<div class="col col-sm-7">
			<?php echo $this->Html->image('../files/platillo/foto/' . $platillo['Platillo']['foto_dir'] . '/' . 'vga_' .$platillo['Platillo']['foto'], array('class' => 'img-thumbnail img-responsive')); ?>
	</div>

	<div class="col col-sm-5">

		<strong><?php echo $platillo['Platillo']['nombre']; ?></strong>
		

		<br />
		<br />

		Descripción: <?php echo h($platillo['Platillo']['descripcion']); ?>

		<br />
		<br />

		€ <span id="productprice"><?php echo h($platillo['Platillo']['precio']); ?></span>

		<br />
		<br />
	<?php if($current_user['role'] == 'user'): ?>
		<?php echo $this->Form->button('Agregar a Pedido',array('class'=>'btn btn-primary addtocart','id'=>$platillo['Platillo']['id'],'user_id'=>$current_user['id']));?>
	<?php endif;?>
		<br />
		<br />
	 <?php if($current_user['role'] == 'admin'): ?>
		Creado: <?php echo $platillo['Platillo']['created']; ?>

		<br />
		<br />

		Modificado: <?php echo $platillo['Platillo']['modified']; ?>
		<br />
		<br />
	<?php endif;?>
		Categoría: <?php echo $this->Html->link($platillo['CategoriaPlatillo']['categoria'], array('controller' => 'categoria_platillos', 'action' => 'view', $platillo['CategoriaPlatillo']['id'])); ?>
		<br />
		<br />
		<div class="btn-group">
		  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
		    <?php echo __('Acciones'); ?> <span class="caret"></span>
		  </button>
		  <ul class="dropdown-menu" role="menu">
		<?php if($current_user['role'] == 'admin'): ?>
			<li><?php echo $this->Html->link(__('Editar Platillo'), array('action' => 'edit', $platillo['Platillo']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Eliminar Platillo'), array('action' => 'delete', $platillo['Platillo']['id']), array(), __('Are you sure you want to delete # %s?', $platillo['Platillo']['id'])); ?> </li>
		<?php endif;?>
			<li><?php echo $this->Html->link(__('Lista Platillos'), array('action' => 'index')); ?> </li>
		<?php if($current_user['role'] == 'admin'): ?>
			<li><?php echo $this->Html->link(__('Nuevo Platillo'), array('action' => 'add')); ?> </li>
		    <li class="divider"></li>
		<?php endif;?>
			<li><?php echo $this->Html->link(__('Lista Categoria Platillos'), array('controller' => 'categoria_platillos', 'action' => 'index')); ?> </li>
		<?php if($current_user['role'] == 'admin'): ?>
			<li><?php echo $this->Html->link(__('Nueva Categoria Platillo'), array('controller' => 'categoria_platillos', 'action' => 'add')); ?> </li>
		    <li class="divider"></li>
			<li><?php echo $this->Html->link(__('Lista Cocineros'), array('controller' => 'cocineros', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('Nuevo Cocinero'), array('controller' => 'cocineros', 'action' => 'add')); ?> </li>
		<?php endif;?>
		  </ul>
		</div>

	</div>

</div>

 <?php if($current_user['role'] == 'admin'): ?>

<div class="related">
	<h3><?php echo __('Cocineros Asignados'); ?></h3>
	<?php if (!empty($platillo['Cocinero'])): ?>
	<div class="col-md-12">
		<table class="table table-striped">
			<tr>
				<th><?php echo __('Id'); ?></th>
				<th><?php echo __('Nombre'); ?></th>
				<th><?php echo __('Apellido'); ?></th>
				<th><?php echo __('Created'); ?></th>
				<th><?php echo __('Modified'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
			<?php foreach ($platillo['Cocinero'] as $cocinero): ?>
				<tr>
					<td><?php echo $cocinero['id']; ?></td>
					<td><?php echo $cocinero['nombre']; ?></td>
					<td><?php echo $cocinero['apellido']; ?></td>
					<td><?php echo $cocinero['created']; ?></td>
					<td><?php echo $cocinero['modified']; ?></td>
					<td class="actions">
						<?php echo $this->Html->link(__(''), array('controller' => 'cocineros', 'action' => 'view', $cocinero['id']), array('class' => 'btn glyphicon glyphicon-eye-open','title'=>'Ver')); ?>
						<?php echo $this->Html->link(__(''), array('controller' => 'cocineros', 'action' => 'edit', $cocinero['id']), array('class' => 'btn glyphicon glyphicon-pencil','title'=>'Editar')); ?>
						<?php echo $this->Form->postLink(__(''), array('controller' => 'cocineros', 'action' => 'delete', $cocinero['id']), array('class' => 'btn glyphicon glyphicon-trash', 'title'=>'Eliminar'), __('Are you sure you want to delete # %s?', $cocinero['id'])); ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('New Cocinero'), array('controller' => 'cocineros', 'action' => 'add'), array('class' => 'btn btn-sm btn-default')); ?>
	</div>
</div>
<?php endif;?>