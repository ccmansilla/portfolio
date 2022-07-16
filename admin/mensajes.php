<?php $active = "mensajes.php"; ?>
<?php include 'header.php'; ?>
<?php include 'conexion.php'; ?>

<?php 

 #si nos envian por url, get 
 if($_GET){

    #ademas de borrar de la base , tenemos que borrar la foto de la carpeta imagenes
   if(isset($_GET['borrar'])){
        $id = $_GET['borrar'];
        $conexion = new Conexion();

        #recuperamos la imagen de la base antes de borrar 
        $imagen = $conexion->consultar("select imagen FROM  proyectos where id=".$id);
        #la borramos de la carpeta 
        unlink("../upload/".$imagen[0]['imagen']);

        #borramos el registro de la base 
        $sql ="DELETE FROM proyectos WHERE proyectos.id =".$id; 
        $id_proyecto = $conexion->ejecutar($sql);

        #para que no intente borrar muchas veces
        header("location:gestionar.php");
   }
   
 }
 #vamos a consultar para llenar la tabla 
 $conexion = new Conexion();
 $mensajes= $conexion->consultar("SELECT * FROM mensajes");
 #comprobamos que la info este en forma de arreglo
 #print_r($resultado);

?>

<!--ya tenemos un container en el header que cierra en el footer-->
<main class="container py-5">
    <div class="row d-flex justify-content-center mb-5">
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th class="tabla__texto__display">Texto</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody >
                    <?php #leemos mensajes 1 por 1
                    foreach($mensajes as $mensaje){ ?>
                
                    <tr >
                        <!--<td scope="row"><?php #echo $proyecto['id'];?></td> -->
                        <td><?php echo $mensaje['nombre'];?></td>
                        <td><?php echo $mensaje['email'];?></td>
                        <td class="tabla__texto__display"><?php echo $mensaje['texto'];?></td>
                        <td><a name="eliminar" id="eliminar" class="btn btn-danger" href="?borrar=<?php echo $proyecto['id'];?>">Borrar</a></td>
                    </tr>

                    <?php #cerramos la llave del foreach
                    } ?>
                </tbody>
            </table>
        </div><!--cierra el col-->  
    </div>
    </div>
</main>
<?php include 'footer.php'; ?>