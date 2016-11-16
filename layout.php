<?php

session_start();

?>


<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Preguntas</title>
    <link rel='stylesheet' type='text/css' href='estilos/style.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='estilos/wide.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='estilos/smartphone.css' />
  </head>
  <body>
  <div id='page-wrap'>
	<header class='main' id='h1'>
		
			<?php
			if(isset($_SESSION['email'])){
			
			echo '<span class="right"><a href="logout.php">Logout</a></span>';
			
			}else{
			echo '<span class="right"><a href="RegistrarConFoto.php">Registrarse </a></span>';
			echo '<span class="right"><a href="registroV5.html">Registrarse Html5 </a></span>';
			echo '<span class="right"><a href="Login.php">Login</a></span>';
			}
			?>
		<h2>Quiz: el juego de las preguntas</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layout.php'>Inicio</a></span>
		<span><a href='VerPreguntas.php'>Preguntas</a></span>
		<span><a href='creditos.php'>Creditos</a></span>
		<span><a href='CambiarContra.php'>Cambiar la Contraseña</a></span>
		<?php 
		if(isset($_SESSION['email'])){
		if($_SESSION['rol']=="alumno"){
			
			echo '<span><a href="GestionPreguntas.php">Añadir Pregunta</a></spam>';
			
		}else if($_SESSION['rol']=="profesor"){
			
			echo '<span><a href="ModificarPreguntas.php">Modificar Preguntas</a></spam>';
		}
		}
		?>
	</nav>
    <section class="main" id="s1">
    
	<div>
	Aqui se visualizan las preguntas y los creditos ...
	</div>
    </section>
	<footer class='main' id='f1'>
		<p><a href="http://es.wikipedia.org/wiki/Quiz" target="_blank">Que es un Quiz?</a></p>
		<a href='https://github.com'>Link GITHUB</a>
	</footer>
</div>
</body>
</html>
