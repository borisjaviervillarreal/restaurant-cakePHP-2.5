    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h2>Bienvenid@ <?php echo $current_user['nombre']." ".$current_user['apellido'];?></h2>
        <br>
      <?php if($current_user['role'] == 'user'): ?>
        <h4>Muchas gracias por usar nuestro sistema para preparar tus pedidos y generar tu orden, la cual sera despachada a la direccion que nos has proporcionado al registrarte en nuestro sistema. Contamos con una gran variedad de platillos preparados con los mejores ingredientes y a los mejores precios.</h4>
      <?php endif;?>
      <?php if($current_user['role'] == 'admin'): ?>
        <h4>Muchas gracias por ingresar a nuestro sistema, tu rol es el de administrador el cual te permite tener acceso a todas las opciones existentes del sistema, desde aqui podras manejar las ordenes de platillos generadas por nuestros clientes, generar los despachos, asignar su respectivo despachador entre muchas mas opciones.</h4>
      <?php endif;?>
      <?php if($current_user['role'] == 'repartidor'): ?>
        <h4>Muchas gracias por ingresar a nuestro sistema, tu rol es el de repartidor el cual te permite tener acceso a todas los despachos que te han sido asignados para ser repartidos, tambien podras verificar los despachos que has marcado como entregados.</h4>
      <?php endif;?>
        
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Menús para grupos</h2>
          <p>Disponemos de menús para grupos, elaborados con todo detalle para que cualquier evento que celebre sea un éxito. </p>
          <p><a class="btn btn-default" href="#" role="button">Ver detalles &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Nuestras Tentaciones</h2>
          <p>Pregunte por nuestras sugerencias, todos nuestros platos son excelentes, una auténtica tentación para los sentidos. </p>
          <p><a class="btn btn-default" href="#" role="button">Ver detalles &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>Menú de temporada</h2>
          <p>Descubra una escogida selección de platos que el chef actualiza cada temporada ajustándose a las estaciones y temporadas de los productos.</p>
          <p><a class="btn btn-default" href="#" role="button">Ver detalles &raquo;</a></p>
        </div>
      </div>
    </div> <!-- /container -->