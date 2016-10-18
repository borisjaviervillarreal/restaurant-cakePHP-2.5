
  <div class="container" style="margin-top:40px">
    <div class="row">
      <div class="col-sm-6 col-md-4 col-md-offset-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <strong> Ingresar a mi cuenta</strong>
          </div>
          <div class="panel-body">
            <?php echo $this->Form->create('User', array('class' => 'panel-body')); ?>
              <fieldset>
                <div class="row">
                  <div class="center-block">
                    <img style="width: 96px;height: 96px;margin: 0 auto 10px;display: block;-moz-border-radius: 50%;-webkit-border-radius: 50%;border-radius: 50%;"
                      src="http://png.clipart.me/graphics/thumbs/114/cheerful-chef-with-tray-for-restaurant-design-such-a-logo-jpeg-version-also-available-in-gallery_114769567.jpg" alt="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12 col-md-10  col-md-offset-1 ">
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-user"></i>
                        </span> 
                        <?php echo $this->Form->input('username', array('label' => false, 'class' => 'form-control', 'placeholder' => 'Usuario')); ?>
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
                      <?php echo $this->Form->button('Ingresar', array('class' => 'btn btn-lg btn-primary btn-block')); ?>
                    </div>
                  </div>
                </div>
              </fieldset>
            <?php echo $this->Form->end(); ?>
          </div>
          <div style="padding: 1px 15px;color: #A0A0A0;">
            No tienes cuenta! <?php echo $this->Html->link('Registrate aqui',array('controller'=>'users','action'=>'add'));?>
          </div>
                </div>
      </div>
    </div>
  </div>