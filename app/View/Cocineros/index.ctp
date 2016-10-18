<?php
$this->Paginator->options(array(
	'update'=>'#contenedor-cocineros',
	'before'=>$this->Js->get('#procesando')->effect('fadeIn',array('buffer'=>false)),
	'complete'=>$this->Js->get('#procesando')->effect('fadeOut',array('buffer'=>false))
	));
?>

<div id="contenedor-cocineros">

<div class="page-header">
	<h2><?php echo __('Cocineros'); ?></h2>
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
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('apellido'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($cocineros as $cocinero): ?>
	<tr>
		<td><?php echo h($cocinero['Cocinero']['id']); ?>&nbsp;</td>
		<td><?php echo h($cocinero['Cocinero']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($cocinero['Cocinero']['apellido']); ?>&nbsp;</td>
		<td><?php echo h($cocinero['Cocinero']['created']); ?>&nbsp;</td>
		<td><?php echo h($cocinero['Cocinero']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__(''), array('action' => 'view', $cocinero['Cocinero']['id']), array('class' => 'btn glyphicon glyphicon-eye-open','title'=>'Ver')); ?>
			<?php echo $this->Html->link(__(''), array('action' => 'edit', $cocinero['Cocinero']['id']), array('class' => 'btn glyphicon glyphicon-pencil','title'=>'Editar')); ?>
			<?php echo $this->Form->postLink(__(''), array('action' => 'delete', $cocinero['Cocinero']['id']), array('class' => 'btn glyphicon glyphicon-trash', 'title'=>'Eliminar'), __('Are you sure you want to delete # %s?', $cocinero['Cocinero']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	</div>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Pagina {:page} de {:pages}, Mostrando {:current} registros de {:count} total, Registro inicial {:start}, final {:end}')
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