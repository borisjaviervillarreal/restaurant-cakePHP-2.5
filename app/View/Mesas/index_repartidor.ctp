<?php
$this->Paginator->options(array(
	'update'=>'#contenedor-mesas',
	'before'=>$this->Js->get('#procesando')->effect('fadeIn',array('buffer'=>false)),
	'complete'=>$this->Js->get('#procesando')->effect('fadeOut',array('buffer'=>false))
	));
?>

<div id="contenedor-mesas">

<div class="page-header">
	<h2><?php echo __('Mis Despachos Asignados:'); ?></h2>
</div>

<div class="col-md-12">

	<div class = "progress oculto" id="procesando">
		<div class = "progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
			<span class="sr-only">100% Complete</span>
		</div>
	</div>

	<table class="table table-striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id despacho'); ?></th>
			<th><?php echo $this->Paginator->sort('Indicaciones'); ?></th>
			<th><?php echo $this->Paginator->sort('creado'); ?></th>
			<th><?php echo $this->Paginator->sort('modificado'); ?></th>
			<th><?php echo $this->Paginator->sort('repartidor asignado'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($mesas as $mesa): ?>
	<tr>
		<td><?php echo h($mesa['Mesa']['id']); ?>&nbsp;</td>
		<td><?php echo h($mesa['Mesa']['posicion']); ?>&nbsp;</td>
		<td><?php echo h($mesa['Mesa']['created']); ?>&nbsp;</td>
		<td><?php echo h($mesa['Mesa']['modified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($mesa['Mesero']['nombre'], array('controller' => 'meseros', 'action' => 'view', $mesa['Mesero']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Datos Despacho'), array('action' => 'view', $mesa['Mesa']['id']),array('class' => 'btn btn-sm btn-info','title'=>'Ver Datos del Despacho'));?>
			<?php echo $this->Html->link(__('Despacho Entregado'), array('action' => 'entregado', $mesa['Mesa']['id']),array('class' => 'btn btn-sm btn-info','title'=>'Indicar despacho entregado'));?>

			<?php if($current_user['role'] == 'admin'): 
				echo $this->Html->link(__(''), array('action' => 'edit', $mesa['Mesa']['id']),array('class' => 'btn glyphicon glyphicon-pencil','title'=>'Editar'));?>
			<?php echo $this->Form->postLink(__(''), array('action' => 'delete', $mesa['Mesa']['id']), array('class' => 'btn glyphicon glyphicon-trash', 'title'=>'Eliminar'), __('Are you sure you want to delete # %s?', $mesa['Mesa']['id'])); ?>
			<?php endif;?>
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
		<li> <?php echo $this->Paginator->prev('< ' . __('previous'), array('tag'=>false), null, array('class' => 'prev disabled'));?></li>
		<?php echo $this->Paginator->numbers(array('separator' => '','tag'=>'li','currentTag'=>'a','currentClass'=>'active'));?>
		<li><?php echo $this->Paginator->next(__('next') . ' >', array('tag'=>false), null, array('class' => 'next disabled'));?></li>
	</ul>
	<?php
	echo $this->Js->writeBuffer();
	?>
</div>