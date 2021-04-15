<?php
//conexion
include('../bd.php');
//si el folio existe
if(isset($_GET['id_usuario'])){
    $id=$_GET['id_usuario'];
    $consulta="DELETE FROM usuario WHERE id_usuario = $id" ;
    //Para poder hacer la consulta o accion descrita
    $resultado=mysqli_query($conect,$consulta);


    //comprobar
    if(!$resultado){
        die("No completado");
    }


    $_SESSION['mensaje']='Eliminado';
    //para cambiar color
    $_SESSION['tipo_mensaje']='danger';
    header('Location:usuario.php');
}


?>