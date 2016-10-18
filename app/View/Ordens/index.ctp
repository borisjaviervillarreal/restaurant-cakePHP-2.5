<?php
   $this->Paginator->options(array(
      'update' => '#contenedor-ordens',
      'before' => $this->Js->get("#procesando")->effect('fadeIn', array('buffer' => false)),
      'complete' => $this->Js->get("#procesando")->effect('fadeOut', array('buffer' => false))
   ));
?>

<?php if(empty($ordens)): ?>

<h2>No existen ordenes disponibles</h2>

<?php else: ?>

<div id="contenedor-ordens">

<div class="page-header">

	<h2><?php echo __('Mis Órdenes'); ?></h2>

</div>

	<div class="col-md-12">

	<div class="progress oculto" id="procesando">
	  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
	    <span class="sr-only">100% Complete</span>
	  </div>
	</div>


		<table class="table table-striped">
		<thead>
		<tr>
				<th><?php echo $this->Paginator->sort('Orden Id'); ?></th>
				<th><?php echo $this->Paginator->sort('Total'); ?> €</th>
				<th><?php echo $this->Paginator->sort('Creado'); ?></th>
				<th><?php echo $this->Paginator->sort('Modificado'); ?></th>
				<th><?php echo $this->Paginator->sort('Estado de la orden'); ?></th>
				<th class="actions"><?php echo __('Acciones'); ?></th>
		</tr>
		</thead>
		<tbody>

        <?php foreach($ordens as $orden): ?>
		
		<tr>
			<td><?php echo h($orden['Orden']['id']); ?></td>
			<td><?php echo h($orden['Orden']['total']); ?></td>
			<td><?php echo $this->Time->format('d-m-Y h:i A', h($orden['Orden']['created'])); ?></td>
			<td><?php echo $this->Time->format('d-m-Y h:i A', h($orden['Orden']['modified'])); ?></td>
			<td><?php if($orden['Orden']['estado_id'] == '3'): 
			echo "Despachado" ?>
				<?php endif;?>
				<?php if($orden['Orden']['estado_id'] == '0'): 
			echo "No Despachado" ?>
				<?php endif;?></td>
			<td class="actions">
				<?php 
				    echo $this->Html->link('Ver Items de la orden', array('controller' => 'orden_items', 'action' => 'view', $orden['Orden']['id']), array('class' => 'btn btn-sm btn-info'));
				?>
			</td>
		</tr>
        <?php endforeach; ?>
		
		</tbody>
		</table>
	</div>

		<p>
		<?php
		echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
		));
		?>	</p>
		<ul class="pagination">
			<li> <?php echo $this->Paginator->prev('< ' . __('previous'), array('tag' => false), null, array('class' => 'prev disabled')); ?> </li>
			<?php echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'active')); ?>
			<li> <?php echo $this->Paginator->next(__('next') . ' >', array('tag' => false), null, array('class' => 'next disabled')); ?> </li>
		</ul>
	<?php echo $this->Js->writeBuffer(); ?>
</div> <!-- contenedor-ordens -->

<?php endif; ?>