<?php include 'admin/conexion.php'; ?>
<?php
#si hay envio de datos, los inserto en la base de datos 
if($_POST){

    $nombre = $_POST['nombre'];    
    $email = $_POST['email'];
    $texto = $_POST['texto'];
   
    #creo una instancia(objeto) de la clase de conexion
    $conexion = new Conexion();
    $sql="INSERT INTO mensajes (nombre, email, texto) VALUES ('$nombre' , '$email', '$texto')";
    $conexion->ejecutar($sql);

 }
 ?>
<?php $active = "contact.php"; ?>
<?php require_once 'header.php'; ?>
<div class="content__centrado">
<div class="d-flex justify-content-start align-items-center"> 
    <div class="lista__icono"><img src="img/mensaje.png" class="lista__icono__item" alt="mensaje"></div>  
    <div class="lista__link"><h2>Mensaje</h2></div> 
</div>
<div class="formulario">        
    <form class="section__form" action="contact.php" method="post">
            <label class="form-label" for="nombre">Nombre:</label>
            <input class="form-control" type="text" id="nombre" name="nombre" required>
            <br>
            <label cclass="form-label" for="email">Email:</label>
            <input  class="form-control" type="email" name="email" required>
            <br>
            <label class="form-label" for="texto">Texto:</label> <br>
            <textarea  class="form-control" name="texto" id="texto" cols="60" rows="10" required></textarea>
            <br>
            <input type="submit" class="btn btn-success" value="Enviar">
            <br>
    </form>
</div>
</div>
<?php require_once 'footer.php'; ?>