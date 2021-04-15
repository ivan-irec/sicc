<?php include("../bd.php");?>
<?php include("../include/header.php");?>

        <!-- <a href="../logout.php" >Salir</a>   -->
<nav class="navbar navbar-dark bg-dark">
  <nav class="navbar navbar-expand-lg navbar-light ">
    <div class="container-fluid">
     <a class="navbar-brand" href="../index.php">SICC</a>
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
     </button>
    </div>
  </nav>
</nav>


     <!-- Mensaje de accion -->
    <!-- validacion de mensaje -->
    <?php if (isset($_SESSION['mensaje'])) { ?>
      <div class="alert alert-<?= $_SESSION['tipo_mensaje']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['mensaje']?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <!-- Limpia datos de sesion. -->
      <?php session_unset(); } ?>


    <h2>Cliente</h2>
    <div class="card card-body">
     <div class="container-md">
        <form action="insert_cliente.php" method="POST">
          <div class="form-group">
            <input type="text" name="name" placeholder="Nombre" autofocus required>
          </div>
          <div class="form-group">
            <input type="text" name="apellido"  placeholder="Apellido" autofocus required>
          </div>
          <div class="form-group">
            <input type="text" name="telefono"  pattern=[0-9]* placeholder="Telefono" autofocus required>
          </div>
          <div class="form-group">
            <input type="text" name="direccion"  placeholder="Dirección" autofocus required>
          </div>
          <div class="form-group">
            <textarea name="peticion" id="" cols="41" rows="10" style="resize:none;"  placeholder="Petición de trabajo realizado" autofocus required></textarea>
          </div>

          <input type="submit" name="reg_cliente" class="btn btn-success btn-block" value="Registrar">
        
        </form>
  </div>      
  </div>
     <table class="table table-bordered">
        <thead>
          <tr>
            <th>Folio</th>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>telefono</th>
            <th>Petición</th>
            <th colspan="2">Acciones</th>
          </tr>
        </thead>

        <tbody>
          <?php
          $query = "SELECT * FROM cliente";
          $busqueda = mysqli_query($conect, $query);    

          while($fila = mysqli_fetch_assoc($busqueda)) { ?>
          <tr>
            <td><?php echo $fila['id_cliente']; ?></td>
            <td><?php echo $fila['nombre']." ".$fila['apellido'] ; ?></td>
            <td><?php echo $fila['direccion']; ?></td>
            <td><?php echo $fila['telefono']; ?></td>
            <td><?php echo $fila['peticion']; ?></td>
            
            <td>

              <a href="edit_cliente.php?id_cliente=<?php echo $fila['id_cliente']?>" class="btn btn-primary"> 
                <!-- font -->
                <i class="fas fa-sync"></i>
              </a>

              <a href="delet_cliente.php?id_cliente=<?php echo $fila['id_cliente']?>" class="btn btn-danger" >
              <i class="far fa-trash-alt"></i>
              </a> 
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>

<?php include("../include/footer.php");?>