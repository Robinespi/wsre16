<?php
	ini_set('session.cookie_lifetime',60);
	session_start();
	//echo session_id();
	$rol= $_SESSION['rol'];
	$usuario=$_SESSION['email'];
	//echo '<p>'.$usuario.'</p>';
	if($rol != "profesor")
	{
		header('location:Login.php');
		exit();
	}

?>



<html>
	<head>
	<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Modificar Pregunta</title>
	<link rel='stylesheet' type='text/css' href='registro.css' />
	<script src="ModificarPreguntas.js" language="javascript" type="text/javascript"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	</head>

	<body>
	<div align="right"><a href="logout.php">Logout</a></div>	
	<center>
	
	<div id="npreguntas"><b></b></div>
	
	
	
	<div id="verinput"></div>
	<div id="verpreg"><b>Aqui se podran ver las preguntas guardadas</b></div>
	</center>
	</body>
</html>