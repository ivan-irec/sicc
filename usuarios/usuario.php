<?php include("../bd.php");?>
<?php include("../include/header.php");?>
<?php
  
    $area = "SELECT id_area, nombre FROM area ";
    $select = mysqli_query($conect, $area);
    
    
?>
       

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

    <h2>Usuario</h2>
    
    <div class="card card-body">
     <div class="container-md">
        <form action="insert_usuario.php" method="POST">
          <div class="form-group">  
            <input type="text" name="name" placeholder="Nombre" autofocus required>
          </div>
          <div class="form-group">
            <div>Puesto: <br>
            <label for="empleado">
            <input type="radio" name="puesto" id="empleado" value="empleado">Empleado 
            </label>
            <label for="jefe">
            <input type="radio" name="puesto" id="jefe" value="jefe">Jefe
            </label>
            </div>
          </div>
          <div class="form-group">
            <select name="area" id="">
                
                <option name="" value="">Selecciona Área</option>
    
                <?php foreach($select as $e){ ?>

                <option name="" value="<?php echo $e['id_area']."</br>"; ?>">

                <?php echo $e['nombre']; }?>

                </option>
            
            </select>
          </div>
          
          <div class="form-group">
            <input type="submit" name="reg_usuario" class="btn btn-success btn-block" value="Registrar">
          </div>

        </form>
      </div>
      </div>




    <div>
        <table  class="table table-bordered table-primary">
            <thead>
            <tr>Puestos</tr>
            </thead>

            <td>1.-Administrador</td>
            <td>2.-Soporte</td>
            <td>3.-Instalació</td>
            <td>4.-Cobranza</td>
        </table>
    </div>

     <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Puesto</th>
            <th>Área</th>
            <th>Acción</th>
            
          </tr>
        </thead>
        

        <tbody>
          <?php
          $query = "SELECT * FROM usuario ";
        //   "SELECT usuario.nombre,puesto,area.nombre from usuario, area";
        
          $busqueda = mysqli_query($conect, $query);    

          while($fila = mysqli_fetch_assoc($busqueda)) { ?>
          <tr>
            <td><?php echo $fila['nombre']; ?></td>
            <td><?php echo $fila['puesto']; ?></td>
            <td><?php echo $fila['area_id']?></td>
            
            
            <td>

              <a href="edit_usuario.php?id_usuario=<?php echo $fila['id_usuario']?>" class="btn btn-primary"> 
                <!-- font -->
                <i class="fas fa-sync"></i>
              </a>

              <a href="delet_usuario.php?id_usuario=<?php echo $fila['id_usuario']?>" class="btn btn-danger" >
              <i class="far fa-trash-alt"></i>
              </a> 
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>

<?php include("../include/footer.php");?>
