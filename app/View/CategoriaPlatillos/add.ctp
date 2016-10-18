<div class="page-header">
	<h2><?php echo __('Nueva Categoria Platillo'); ?></h2>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<?php echo $this->Form->create('CategoriaPlatillo'); ?>
				
				<?php
					echo $this->Form->input('categoria', array('class' => 'form-control', 'label' => 'Categoría'));
				?>
				
				<p>
				<?php echo $this->Form->end(array('label' => 'Crear Categoría', 'class' =>'btn btn-success')); ?>
				</p>

			<div class="btn-group">
			  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
			    <?php echo __('Actions'); ?> <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu" role="menu">
				<li><?php echo $this->Html->link(__('List Categoria Platillos'), array('action' => 'index')); ?></li>
			    <li class="divider"></li>
				<li><?php echo $this->Html->link(__('List Platillos'), array('controller' => 'platillos', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('New Platillo'), array('controller' => 'platillos', 'action' => 'add')); ?> </li>
			  </ul>
			</div>
		</div>
	</div>
</div>