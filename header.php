<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	
	<link rel="icon" type="image/png" href="img/icon.png">
	<link rel="stylesheet" href="css/style.css">
    <title>Carlos Mansilla</title>
  </head>
  <body class="overflow-scroll">
  <header>
	  <div class="encabezado d-flex justify-content-center align-items-end py-3">
		<div>
			<img src="img/foto.jpg" class="encabezado__image" alt="Carlos Mansilla"/>
		</div>
		<div class="encabezado__texto encabezado__texto__neon ps-3">
			<h1 class="encabezado__texto__titulo">Carlos Mansilla</h1>
			<p class="encabezado__texto__parrafo">Desarrollador Web</p>
		</div>
	  </div>
	  <nav class="navbar navbar-dark bg-dark navbar-expand-lg px-5">
		  <div class="container-fluid">
			<a class="navbar-brand py-0" href="index.php"> Portfolio> </a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
			  <div class="navbar-nav d-flex justify-content-around w-100">
				<div class="nav-item px-5">
				  <a class="nav-link <?php echo ($active == 'index.php')? 'active' : '' ?>" href="index.php">Conocimientos</a>
				</div>
				<div class="nav-item px-5">
				  <a class="nav-link <?php echo ($active == 'pages.php')? 'active' : '' ?>" href="pages.php">Paginas</a>
				</div>
				<div class="nav-item px-5">
				  <a class="nav-link <?php echo ($active == 'contact.php')? 'active' : '' ?>" href="contact.php">Contacto</a>
				</div>
				<div class="nav-item px-5">
				  <a class="nav-link" href="admin/index.php">Admin</a>
				</div>
			  </div>
			</div>
		  </div>
		</nav>
	</header>
	<main class="container pt-5">