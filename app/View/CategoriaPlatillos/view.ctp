<div class="well">
<h1><?php echo __('Categoria Platillo'); ?></h1>
	<dl>
		<dd>
			<h2><?php echo h($categoriaPlatillo['CategoriaPlatillo']['categoria']); ?></h2>
			&nbsp;
		</dd>
	</dl>
</div>

<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <?php echo __('Acciones'); ?> <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
 <?php if($current_user['role'] == 'admin'): ?>
	<li><?php echo $this->Html->link(__('Edit Categoria Platillo'), array('action' => 'edit', $categoriaPlatillo['CategoriaPlatillo']['id'])); ?> </li>
	<li><?php echo $this->Form->postLink(__('Delete Categoria Platillo'), array('action' => 'delete', $categoriaPlatillo['CategoriaPlatillo']['id']), array(), __('Are you sure you want to delete # %s?', $categoriaPlatillo['CategoriaPlatillo']['id'])); ?> </li>
<?php endif;?>
	<li><?php echo $this->Html->link(__('List Categoria Platillos'), array('action' => 'index')); ?> </li>
 <?php if($current_user['role'] == 'admin'): ?>
	<li><?php echo $this->Html->link(__('New Categoria Platillo'), array('action' => 'add')); ?> </li>
    <li class="divider"></li>
<?php endif;?>
	<li><?php echo $this->Html->link(__('List Platillos'), array('controller' => 'platillos', 'action' => 'index')); ?> </li>
 <?php if($current_user['role'] == 'admin'): ?>
	<li><?php echo $this->Html->link(__('New Platillo'), array('controller' => 'platillos', 'action' => 'add')); ?> </li>
<?php endif;?>
  </ul>
</div>

<div class="related">
	<h3><?php echo __('Platillos en esta categoria'); ?></h3>
	<?php if (!empty($categoriaPlatillo['Platillo'])): ?>
	<div class="row">
		<?php foreach ($categoriaPlatillo['Platillo'] as $platillo): ?>
		<div class="col col-sm-3">
			<figure class="platillo">
				<?php echo $this->Html->image('../files/platillo/foto/' . $platillo['foto_dir'] . '/' . 'thumb_' .$platillo['foto'], array('url' => array('controller' => 'platillos', 'action' => 'view', $platillo['id']))); ?>
			</figure>
			<br />
			<span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
			<?php echo $this->Html->link($platillo['nombre'], array('controller'=>'platillos','action' => 'view', $platillo['id'])); ?>
			<br />
			€ <?php echo h($platillo['precio']); ?>&nbsp;
			<br />
			<br />
		</div>
		<?php endforeach; ?>
	</div>
<?php endif; ?>
 <?php if($current_user['role'] == 'admin'): ?>
	<div class="actions">
		<?php echo $this->Html->link(__('Nuevo Platillo'), array('controller' => 'platillos', 'action' => 'add'), array('class' => 'btn btn-sm btn-default')); ?>
	</div>
<?php endif;?>
</div>