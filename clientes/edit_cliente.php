<?php
include('../bd.php');
include("../include/header.php");

if(isset($_GET['id_cliente'])){
    
    $id=$_GET['id_cliente'];
    $busqueda="SELECT * FROM cliente WHERE id_cliente = $id";
    $resultado=mysqli_query($conect,$busqueda);

    //compueba cuantas filas hay
    if(mysqli_num_rows($resultado)==1) {
        $fila=mysqli_fetch_array($resultado);
        $nombre=$fila['nombre']; // $fila['nombre_en_DB/BD']
        $apellido=$fila['apellido'];
        $direccion=$fila['direccion'];
        $telefono=$fila['telefono'];
        $peticion=$fila['peticion'];
        
    }


}


//CONSULTA DE MODIFICACION 
if(isset($_POST['edit_cliente'])){
    $id=$_GET['id_cliente'];
    //metodos ya enviados por el metodo POST EN FORM
    $nombre=$_POST['name'];
    $apellido=$_POST['apellido'];
    $telefono=$_POST['telefono'];
    $direccion=$_POST['direccion'];
    $peticion=$_POST['peticion'];

    $consulta="UPDATE cliente SET nombre='$nombre',apellido='$apellido',direccion='$direccion',telefono='$telefono',peticion='$peticion' WHERE id_cliente=$id    ";
    //ejecutar
    mysqli_query($conect,$consulta);

//     $_SESSION['mensaje'] = 'Modificado';
//     //color
//     $_SESSION['tipo_mensaje'] = 'warning';
    header('location:cliente.php');
}


?>




<h2>Editar Cliente con Folio: <?php echo $fila['id_cliente'];?></h2><br>
<h3><?php echo $fila['nombre']." ".$fila['apellido'] ; ?></h3>

      
      
      <div class="card card-body">
        <form action="edit_cliente.php?id_cliente=<?php echo $fila['id_cliente']?>" method="POST">
          <div class="form-group">
            <label for="name" class="form-label">Nombre:</label>
            <input type="text" name="name" class="form-control" value="<?php echo $nombre;?>" autofocus required>
          </div>

          <div class="form-group">
          <label for="name" class="form-label">Apellido:</label>
            <input type="text" name="apellido" class="form-control" value="<?php echo $apellido;?>" autofocus required>
          </div>

          <div class="form-group">
          <label for="name" class="form-label">Dirección:</label>
            <input type="text" name="direccion" class="form-control" value="<?php echo $direccion;?>" autofocus required>
          </div>

          <div class="form-group">
          <label for="name" class="form-label">Telefono:</label>
            <input type="text" name="telefono" class="form-control" pattern=[0-9]* value="<?php echo $telefono;?>" autofocus required>
          </div>

          <div class="form-group">
          <label for="name" class="form-label">Tipo de trabajo:</label>
            <textarea name="peticion" cols="41" rows="5" style="resize:none;" class="form-control" placeholder="Modificar tipo de trabajo" autofocus required><?php echo $peticion;?></textarea>
          </div>

          <input type="submit" name="edit_cliente" class="btn btn-success btn-block" value="Editar">
          <a href="cliente.php"  class="btn btn-success btn-block" >Regresar</a>

        </form>
      </div>
    </div>
<?php include('../include/footer.php');?>