<?php $active = "gestionar.php"; ?>
<?php include 'header.php'; ?>
<?php include 'conexion.php'; ?>

<?php 

 #si hay envio de datos, los inserto en la base de datos 
 if($_POST){

    $nombre_proyecto = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $url = $_POST['url'];
    #nombre de la imagen
    $imagen = $_FILES['archivo']['name'];
    #tenemos que guardar la imagen en una carpeta 
    $imagen_temporal=$_FILES['archivo']['tmp_name'];
    #creamos una variable fecha para concatenar al nombre de la imagen, para que cada imagen sea distinta y no se pisen 
    $fecha = new DateTime();
    $imagen= $fecha->getTimestamp()."_".$imagen;
    move_uploaded_file($imagen_temporal,"../upload/".$imagen);
   
    #creo una instancia(objeto) de la clase de conexion
    $conexion = new Conexion();
    $sql="INSERT INTO proyectos (nombre, imagen, descripcion, url) VALUES ('$nombre_proyecto' , '$imagen', '$descripcion', '$url')";
    $conexion->ejecutar($sql);

 }
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

   if(isset($_GET['modificar'])){
        $id = $_GET['modificar'];
      
        #pagina de modificacion por id
        header("location:modificar.php?modificar=".$id);
    }
   
 }
 #vamos a consultar para llenar la tabla 
 $conexion = new Conexion();
 $proyectos= $conexion->consultar("SELECT * FROM proyectos");
 #comprobamos que la info este en forma de arreglo
 #print_r($resultado);

?>

<!--ya tenemos un container en el header que cierra en el footer-->
<main class="container py-5">
    <div class="row d-flex justify-content-center mb-5">
        <div class="col-md-6 col-sm-8">
            <div class="card color">
                <div class="card-header">
                    <h3>Proyecto</h3>
                </div>
                <div class="card-body">
                    <!--para recepcionar archivos uso enctype-->
                    <form action="gestionar.php" method="post" enctype="multipart/form-data">
                        <div>
                            <label for="nombre">Nombre:</label>
                            <input required class="form-control" type="text" name="nombre" id="nombre">
                        </div>
                    
                        <div>
                            <label for="archivo">Imagen:</label>
                            <input required class="form-control" type="file" name ="archivo" id="archivo">
                        </div>
                        <br>
                        <div>
                            <label for="descripcion">Descripción:</label>
                            <textarea required class="form-control" name="descripcion" id="descripcion" cols="30" rows="4"></textarea>
                        </div>
                        <div>
                            <label for="url">Url:</label>
                            <input required class="form-control" type="text" name="url" id="url">
                        </div>
                        <div>
                        <br>
                        <input class="btn btn-success" type="submit" value="Agregar">
                        </div>
                
                    </form>
                </div> <!--cierra el body-->
    
            </div><!--cierra el card-->
            
        </div><!--cierra el col-->
    </div><!--cierra el row-->
    <div>
        <div class="row d-flex justify-content-center mb-5">
            <div class="col-md-10 col-sm-6">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Imagen</th>
                            <th class="texto">Descripcion</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody >
                        <?php #leemos proyectos 1 por 1
                        foreach($proyectos as $proyecto){ ?>
                    
                        <tr >
                            <!--<td scope="row"><?php #echo $proyecto['id'];?></td> -->
                            <td><?php echo $proyecto['nombre'];?></td>
                            <td> <img width="100" src="../upload/<?php echo $proyecto['imagen'];?>" alt="">  </td>
                            <td class="texto"><?php echo $proyecto['descripcion'];?></td>
                            <td><a name="eliminar" id="eliminar" class="btn btn-danger" href="?borrar=<?php echo $proyecto['id'];?>">Borrar</a></td>
                            <td><a name="modificar" id="modificar" class="btn btn-warning" href="?modificar=<?php echo $proyecto['id'];?>">Modificar</a></td>
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