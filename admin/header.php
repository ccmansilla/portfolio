<?php

    #inicializamos variables de sesion 
    session_start();
   # print_r($_SESSION);

    #si esta logueado lo dejo trabajar y sino lo mando al login de nuevo 
    if ( isset( $_SESSION['usuario'] )!='administrador'  ){
        header("location:login.php");
        

    }

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <link rel="stylesheet" href="../css/style_admin.css">
    
     <title>Portfolio</title>
     <style>
            
                    
     </style>
</head>
<body>
<div class="container-fluid m-0 px-0">


   <nav class="navbar navbar-expand-md mx-0 navbar-dark bg-dark">
        <div class="container-fluid">
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page"  href="index.php">Proyectos</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page"  href="galeria.php">Gestionar</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" href="cerrar.php"><span>Usuario: <?php echo $_SESSION['usuario'] ?> </span>  Cerrar Sesión</a> 
                    </li>
                
                </ul>
            
            </div>
        </div>
    </nav>
   