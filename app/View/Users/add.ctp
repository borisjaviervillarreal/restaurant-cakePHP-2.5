<?php /*
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<?php echo $this->Form->create('User', array('role' => 'form')); ?>
				<fieldset>
					<h2><?php echo __('Nuevo Usuario'); ?></h2>
				<?php
					echo $this->Form->input('fullname', array('class' => 'form-control', 'label' => 'Nombre'));
					echo $this->Form->input('username', array('class' => 'form-control', 'label' => 'Usuario'));
					echo $this->Form->input('password', array('class' => 'form-control', 'label' => 'Contraseña'));
					//echo $this->Form->input('role', array('class' => 'form-control', 'label' => 'Rol', 'type' => 'select', 'options' => array('admin' => 'Administrador', 'user' => 'Usuario'), array('class' => 'form-control')));
				?>
				</fieldset>

				<p>
				<?php echo $this->Form->end(array('label' => 'Crear Usuario', 'class' =>'btn btn-success')); ?>
				</p>
			<div class="btn-group">
			  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
			    <?php echo __('Actions'); ?> <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu" role="menu">
				<li><?php echo $this->Html->link(__('Listar usuarios'), array('action' => 'index')); ?></li>
			  </ul>
			</div>
		</div>
	</div>
</div>
*/?>


  <div class="container" style="margin-top:40px">
    <div class="row">
      <div class="col-sm-6 col-md-4 col-md-offset-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <strong> Registro Nuevo Usuario</strong>
          </div>
          <div class="panel-body">
            <?php echo $this->Form->create('User', array('role' => 'form')); ?>
              <fieldset>
                <div class="row">
                  <div class="center-block">
                    <img style="width: 96px;height: 96px;margin: 0 auto 10px;display: block;-moz-border-radius: 50%;-webkit-border-radius: 50%;border-radius: 50%;"
                      src="http://www.fancyicons.com/free-icons/103/pretty-office-3/png/256/sign_up_256.png" alt="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12 col-md-10  col-md-offset-1 ">
                      <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-pencil"></i>
                        </span> 
                        <?php echo $this->Form->input('dni', array('label' => false, 'class' => 'form-control', 'placeholder' => 'DNI')); ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-pencil"></i>
                        </span> 
                        <?php echo $this->Form->input('nombre', array('label' => false, 'class' => 'form-control', 'placeholder' => 'Nombre')); ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-pencil"></i>
                        </span> 
                        <?php echo $this->Form->input('apellido', array('label' => false, 'class' => 'form-control', 'placeholder' => 'Apellido')); ?>
                      </div>
                    </div>
                       <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-phone-alt"></i>
                        </span> 
                        <?php echo $this->Form->input('telefono', array('label' => false, 'class' => 'form-control', 'placeholder' => 'Telefono')); ?>
                      </div>
                    </div>
                       <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-road"></i>
                        </span> 
                        <?php echo $this->Form->input('direccion', array('label' => false, 'class' => 'form-control', 'placeholder' => 'Direccion')); ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-user"></i>
                        </span> 
                        <?php echo $this->Form->input('username', array('label' => false, 'class' => 'form-control', 'placeholder' => 'Nombre de usuario')); ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-lock"></i>
                        </span>
                        <?php echo $this->Form->input('password', array('label' => false, 'class' => 'form-control', 'placeholder' => 'Password')); ?>
                      </div>
                    </div>
                      
                    <div class="form-group">
                      <?php echo $this->Form->button('Registrar', array('class' => 'btn btn-lg btn btn-success btn-block')); ?>
                    </div>
                  </div>
                </div>
              </fieldset>
            <?php echo $this->Form->end(); ?>
          </div>
      </div>
    </div>
  </div>
