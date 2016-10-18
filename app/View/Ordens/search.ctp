

    <h1>Buscar Orden</h1>
    <br>
    <div class="row">
        <?php echo $this->Form->create('Orden', array('type' => 'GET')); ?>
        
        <div class="col-sm-4">
            <?php echo $this->Form->input('search', array('label' => false, 'div' => false, 'class' => 'form-control', 'autocomplet' => 'off', 'value' => $search)); ?>
        </div>
        
  
        
        <div class="col-sm-3">
           <?php echo $this->Form->button('Buscar', array('div' => false, 'class' => 'btn btn-primary')); ?>
        </div>
        
        <?php echo $this->Form->end(); ?>
        
    </div>

 

