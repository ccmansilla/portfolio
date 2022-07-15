<?php $active = "index.php"; ?>
<?php include 'header.php'; ?>
<?php include 'conexion.php'; ?>

<?php 

#mostrar datos 
 #vamos a consultar para llenar la tabla 
 $conexion = new Conexion();# es un objeto de tipo conexion,
 
 $proyectos= $conexion->consultar("SELECT * FROM proyectos");
 #comprobamos que la info este en forma de arreglo
 #print_r($resultado);

?>

<main class="container py-5">
    <div class ="row row-cols-1 row-cols-md-3 g-4">
    <?php #leemos proyectos 1 por 1
    foreach($proyectos as $proyecto){ ?>
        <div class="col">
        <div class="card border border-1 shadow">
            <img class="card-img-top" width="100" src="../upload/<?php echo $proyecto['imagen'];?>" alt="">
            <div class="card-body">
            <h5 class="card-title text-dark"><?php echo $proyecto['nombre'];?></h5>
            <p class="card-text text-dark"><?php echo $proyecto['descripcion'];?></p>
            <a href="<?php echo $proyecto['url'];?>" class="btn btn-success" target="_blank">Abrir Pagina</a>
            </div>
        </div>
        </div>
    <?php } ?>
    </div>
</main>
<?php include 'footer.php'; ?>
