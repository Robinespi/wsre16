<?php
ini_set('session.cookie_lifetime',60);
session_start();
//echo session_id();
	$rol= $_SESSION['rol'];
	$usuario=$_SESSION['email'];
	echo '<p>'.$usuario.'</p>';
	if($rol != "alumno")
	{
		header('location:Login.php');
		exit();
	}

?>
<html>
	<head>
	<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Gestionar Pregunta</title>
	<link rel='stylesheet' type='text/css' href='registro.css' />
	<script src="GestionPreguntas.js" language="javascript" type="text/javascript"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script>
	//Llamar la funcion cada 5s
	setInterval(preguntas,5000);
	//AJAX ver Num preguntas JQuery
	function verNumPreguntas(){
    $(document).ready(function(){
        $.ajax({url: "NumPreguntas.php", success: function(result){$("#npreguntas").html(result);}});
        });
		}
	
	</script>
	</head>

	<body>
	<center>
	<div id="npreguntas"><b></b></div>
	<p> *Obligatorio</p>
	<form id='insertar' method="post"  name='insertar' onSubmit='return checkform()' enctype="multipart/form-data">
		
		Pregunta
		<textarea rows="1" cols="40" name='pregunta' id='pregunta' value=''></textarea> <br>
		Respuesta
		<input type="text" name='respuesta' id='respuesta' value=''><br>
		Dificultad
		<input type="text" name='dificultad' id='dificultad' value=''>
		Tematica
		<input type="text" name='tematica' id='tematica' value=''>
		<input type="button" name='guardar' id='guardar' value="Enviar Pregunta" onClick="javascript:meterPregunta(pregunta.value,respuesta.value,dificultad.value,tematica.value)">
		<input type="button" name='ver' id='ver' value="Ver Preguntas" onClick="javascript:verpreguntas()">
	</form>
	<div id="espregunta"><b>Informacion sobre añadir pregunta</b></div>
	<div id="verpreg"><b>Aqui se podran ver las preguntas guardadas</b></div>
	</center>
	</body>
</html>

