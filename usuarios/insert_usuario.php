<?php
include('../bd.php');

if (isset($_POST['reg_usuario'])) {
    
  $name = $_POST['name'];
  $puesto = $_POST['puesto'];
  $area = $_POST['area'];
  

  $query = "INSERT INTO usuario (nombre, puesto, area_id) VALUES ('$name','$puesto','$area')";
  $insertar = mysqli_query($conect, $query);
  if(!$insertar) {
    die("Fallo Conexion.");
  }



    $_SESSION['mensaje'] = 'Registrado';
   //color
   $_SESSION['tipo_mensaje'] = 'success';
  //redireccionar.
header('Location: usuario.php');

}

?>