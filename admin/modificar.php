<?php $active = "gestionar.php"; ?>
<?php include 'header.php'; ?>
<?php 

include 'conexion.php'; 
if($_GET){
    if(isset($_GET['modificar'])){
        $id = $_GET['modificar'];
       
        $_SESSION['id_proyecto'] = $id;
        #vamos a consultar para llenar la tabla 
        $conexion = new Conexion();
        $proyecto= $conexion->consultar("SELECT * FROM proyectos where id=".$id);
     
    }
}


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
   
    $id = $_SESSION['id_proyecto'];
    #creo una instancia(objeto) de la clase de conexion
    $conexion = new Conexion();
    $sql = "UPDATE proyectos SET nombre = '$nombre_proyecto' , imagen = '$imagen', descripcion = '$descripcion', url = '$url' WHERE proyectos.id = '$id';";
    $conexion->ejecutar($sql);
    header("location:gestionar.php");

}
?>
<main class="container py-5">
<?php #leemos proyectos 1 por 1
  foreach($proyecto as $fila){ ?>
    <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-10">
                <div class="card color">
                    <div class="card-header">
                        <h3>Proyecto</h3>
                    </div>
                    <div class="card-body">
                        <!--para recepcionar archivos uso enctype-->
                        <form action="#" method="post" enctype="multipart/form-data">
                            <div>
                                <label for="nombre">Nombre:</label>
                                <input required class="form-control" type="text" name="nombre" id="nombre" value="<?php echo $fila['nombre']; ?>">
                            </div>
                        
                            <div>
                                <label for="archivo">Imagen:</label>
                                <input required class="form-control" type="file" name ="archivo" id="archivo" >
                            </div>
                            <br>
                            <div>
                                <label for="descripcion">Descripción:</label>
                                <textarea required class="form-control" name="descripcion" id="descripcion" cols="30" rows="4"><?php echo $fila['descripcion'];?></textarea>
                            </div>
                            <div>
                                <label for="url">Url:</label>
                                <input required class="form-control" type="text" name="url" id="url" value="<?php echo $fila['url'];?>">
                            </div>
                            <div>
                            <br>
                            <input class="btn btn-warning" type="submit" value="Modificar">
                            </div>
                    
                        </form>
                    </div> <!--cierra el body-->
        
                </div><!--cierra el card-->
                
            </div><!--cierra el col-->
        </div><!--cierra el row-->
        <?php #cerramos la llave del foreach
                        } ?>
</main>
<?php include 'footer.php'; ?>