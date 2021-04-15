<?php
include('../bd.php');

if (isset($_POST['reg_cliente'])) {
    
  $name = $_POST['name'];
  $apellido = $_POST['apellido'];
  $tel = $_POST['telefono'];
  $direc = $_POST['direccion'];
  $peticion = $_POST['peticion'];

  $query = "INSERT INTO cliente (nombre, apellido, direccion, telefono, peticion) VALUES ('$name', '$apellido', '$direc', '$tel', '$peticion')";
  $insertar = mysqli_query($conect, $query);
  if(!$insertar) {
    die("Fallo Conexion.");
  }



   $_SESSION['mensaje'] = 'Registrado';
//    //color
   $_SESSION['tipo_mensaje'] = 'success';
  //redireccionar.
header('Location: cliente.php');

}


?>