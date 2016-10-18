<div class="well">
<h2><?php 
	if($current_user['role'] == 'admin'):
		echo __('Datos del Usuario'); 
	endif;
	if($current_user['role'] == 'repartidor'):
		echo __('Datos del Cliente'); 
	endif;
?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('DNI'); ?></dt>
		<dd>
			<?php echo h($user['User']['dni']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($user['User']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Apellido'); ?></dt>
		<dd>
			<?php echo h($user['User']['apellido']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefono'); ?></dt>
		<dd>
			<?php echo h($user['User']['telefono']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Direccion'); ?></dt>
		<dd>
			<?php echo h($user['User']['direccion']); ?>
			&nbsp;
		</dd>
		<dt><?php if($current_user['role'] == 'admin'): 
			echo __('Usuario'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rol'); ?></dt>
		<dd>
			<?php echo h($user['User']['role']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Creado'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modificado'); ?></dt>
		<dd>
			<?php echo h($user['User']['modified']); 
			endif;
			?>
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
  	<li><?php echo $this->Html->link(__('Editar usuario'), array('action' => 'edit', $user['User']['id'])); ?> </li>
	<li><?php echo $this->Form->postLink(__('Eliminar usuario'), array('action' => 'delete', $user['User']['id']), array(), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
	<li><?php echo $this->Html->link(__('Listar usuarios'), array('action' => 'index')); ?> </li>
	<li><?php echo $this->Html->link(__('Crear usuario'), array('action' => 'add')); ?> </li>
  </ul>
</div>
<?php endif; ?>