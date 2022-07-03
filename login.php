<?php 

	#defino la variable para que exista aunque no haya envio 
	$usuario = "";
	$clave = "";
	#si hubo un envio 
	if ($_POST){
		#si hay info asignarla, sino ""
		if (isset($_POST['usuario'])){
			$usuario = $_POST['usuario'];
		} else {
			$usuario = "";
		}
		#Determina si una variable está definida y no es NULL 
		if (isset($_POST['clave'])){
			$clave = $_POST['clave'];
		}else{
			$clave = "";
		}
	
		#chequea si el usuario y la clave ingresados son los del administrador
		if($usuario == 'admin' && $clave == '123') {
			#las variables que vamos a guardar en estas variables van a poder mantenerte en todas las paginas del sitio web
			session_start();
			
			#se loguea el usuario y mantenemos el usuario en toda la pagina 
			#declaro variables de tipo sesiones, puedo guardar varias variables con el tipo de dato que necesito 
			$_SESSION["usuario"]=$usuario;
			$_SESSION["estado"]="logueado";

			echo $_SESSION["usuario"]." ".$_SESSION["estado"];
		}
	}	
?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/style_admin.css">
	<link rel="icon" type="image/png" href="../img/icon.png">
    <title>Portfolio Carlos Mansilla</title>
  </head>
  <body>
	<div class="container d-flex justify-content-center">
	
	<div class="form-login">
	<form action="login.php" method="post">
	  <div class="mb-3">
		<label for="usuario" class="form-label">Usuario:</label>
		<input type="text" class="form-control" id="usuario" name="usuario" require>
		<div class="invalid-feedback">
		  Por favor, debe ingresar un usuario.
		</div>
	  </div>
	  <div class="mb-3">
		<label for="clave" class="form-label">Contrasea:</label>
		<input type="password" class="form-control" id="clave" name="clave" require>
		<div class="invalid-feedback">
		  Por favor, debe ingresar una contrasena.
		</div>
	  </div>
	  <div class="d-flex justify-content-center mb-3">
	  	<button type="submit" id='booton' class="btn btn-primary">Ingresar</button>
	  </div>
	</form>
	</div>

	</div>
	<script>
		let usuario = document.getElementById('usuario');
		let clave = document.getElementById('clave');
		let boton = document.getElementById('booton');
		
		function check(evento){
			quitarClaseError();
			if(usuario.value === ''){
				usuario.classList.add('is-invalid');
				evento.preventDefault();
				return;
			}
			if(clave.value === ''){
				clave.classList.add('is-invalid');
				evento.preventDefault();
				return;
			}
			return this.submit();
		}
		
		function quitarClaseError(){
			let elementos = document.querySelectorAll(".is-invalid");
			for (let index = 0; index < elementos.length; index++) {
				elementos[index].classList.remove("is-invalid");
			}
		}
		
		boton.addEventListener('click', check);
		
	</script>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>