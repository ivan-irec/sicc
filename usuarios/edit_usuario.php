<?php
include('../bd.php');
include("../include/header.php");

if(isset($_GET['id_usuario'])){
    
    $id=$_GET['id_usuario'];
    $busqueda="SELECT * FROM usuario WHERE id_usuario = $id";
    $resultado=mysqli_query($conect,$busqueda);

    //compueba cuantas filas hay
    if(mysqli_num_rows($resultado)==1) {
        $fila=mysqli_fetch_array($resultado);
        $nombre=$fila['nombre']; // $fila['nombre_en_DB/BD']
        $puesto=$fila['puesto'];
        $area=$fila['area_id'];
        
    }
    //Seleccion Area.
    $busqueda_area = "SELECT id_area, nombre FROM area ";
    $select = mysqli_query($conect, $busqueda_area);

}



//CONSULTA DE MODIFICACION 
if(isset($_POST['edit_usuario'])){
    $id=$_GET['id_usuario'];
    //metodos ya enviados por el metodo POST EN FORM
    $nombre=$_POST['name'];
    $puesto=$_POST['puesto'];
    $area=$_POST['area'];

    $editar="UPDATE usuario SET nombre='$nombre',puesto='$puesto',area_id='$area' WHERE id_usuario=$id";
    //ejecutar
    mysqli_query($conect,$editar);

    if(!$editar){
        die("No completado");
    }

    


    $_SESSION['mensaje'] = 'Modificado';
    //color
    $_SESSION['tipo_mensaje'] = 'warning';
    header('Location:usuario.php');
}
?>





<h2>Editar Usuario :</h2>
<h3><?php echo $fila['nombre'] ;?></h3>





    <div>
        <table  class="table table-bordered table-primary">
            <th>Puestos</th>
            <td>1.-Administrador</td>
            <td>2.-Soporte</td>
            <td>3.-Instalació</td>
            <td>4.-Cobranza</td>
        </table>
    </div>
    <form >


     <table class="table table-bordered">
        <thead>
          <tr>
            <th>Folio</th>
            <th>Nombre</th>
            <th>Puesto</th>
          </tr>
        </thead>
        

        <tbody>        
          <tr>
            <td><?php echo $fila['nombre']; ?></td>
            <td><?php echo $fila['puesto']; ?></td>
            <td><?php echo $fila['area_id'] ?></td>
            
            
      </table>
</form>

<div class="card card-body">
 <div class="container-md text-center">
  <form action="edit_usuario.php?id_usuario=<?php echo $fila['id_usuario']?>" method="POST">Nombre:

            <input type="text" name="name" placeholder="Nombre" value="<?php echo $fila['nombre'];?>" autofocus required>

            <div  class="form-group">Puesto:
            <label for="empleado">
            <input type="radio" name="puesto" id="empleado" value="empleado">Empleado 
            </label>
            <label for="jefe">
            <input type="radio" name="puesto" id="jefe" value="jefe">Jefe
            </label>
            </div>
          <div  class="form-group">
            <select name="area" id="">
                
                <option name="" value="">Selecciona Área</option>
    
                <?php foreach($select as $e){ ?>

                <option name=""  value="<?php echo $e['id_area']; ?>" >
                <!-- //Mostrar desplegable  -->
                <?php echo $e['nombre']; }?>

                </option>
            
            </select>
          </div>
          <div  class="form-group">
          <input type="submit" name="edit_usuario" class="btn btn-success btn-block" value="Editar">
          <a href="usuario.php"type="submit" name="edit_usuario" class="btn btn-success btn-block" value="Regresar">Regresar</a>
          </div>

        </form>
  </div>
</div>









<?php include('../include/footer.php');?>