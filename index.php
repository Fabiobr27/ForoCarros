<?php

	// Fabio Benitez Ramirez

	require_once("libs/Sesion.php") ;

	
	$ses = Sesion::getInstance() ;

	
	if ($ses->checkActiveSession())
		$ses->redirect("main_ajax.php") ;


	if (!empty($_POST)):

		$email = $_POST["email"] ;
		$pass  = $_POST["pass"] ;

		
		$ok  = $ses->login($email, $pass) ;

		
		if ($ok) $ses->redirect("main_ajax.php?p=1") ;

	endif ;

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>· Base De Dato Coches·</title>
	<meta charset="utf8" />
	<link rel="stylesheet" type="text/css" href="css/forocarros.css" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
        <style>
            body{
                background-image: url("imagenes/fondo.jpg");
                background-repeat: no-repeat;
                background-size:cover; 
            }
            </style>
</head>
<body>

	<div class="container">

		<!-- logotipo -->
		<div class="row">
			<div class="col-sd-12 mx-auto">
                            <img class="logo" src="imagenes/logo2.png" alt="ForoCarros" />
			</div>
		</div>

	
		<form method="post">

			
			<div class="row mt-5 form-group">
				<div class="col-md-12">
					<input class="form-control w-25 mx-auto" type="text" 
						   name="email" placeholder="email@forocarros.com" required />
				</div>
			</div>

			
			<div class="row form-group">
				<div class="col-md-12">
					<input class="form-control w-25 mx-auto" type="text" 
						   name="pass" placeholder="contraseña" required />
				</div>
			</div>

			<?php
				if ((isset($ok)) && (!$ok)):
			?>
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="alert alert-danger w-50" role="alert">
					  Usuario o contraseña incorrectas.
					</div>
				</div>
			</div>
			<?php
				endif ;
			?>

			<!-- botón LOGIN -->
			<div class="row form-group">
				<div class="col-md-12 text-center">
					<button class="btn btn-primary w-25" type="submit">Entrar</button>
				</div>
			</div>

		</form>

		
		<div class="row">
			<div class="col-md-12 text-center">
				<a href="registro.php" class="btn btn-link">registrar</a>
			</div>
		</div>

	</div> 

</body>
</html>