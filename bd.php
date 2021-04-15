<?php

//inicio Sesion
//con esto podemos dar un vista
session_start();

$servidor="localhost";
$user="root";
$password="";
$bd="siic2";

$conect=mysqli_connect($servidor,$user,$password,$bd);


// if(isset($conect)){
//     echo ("Conexión Correcta.");
// }



/* cerrar la conexión */
// mysqli_close($enlace);
?>