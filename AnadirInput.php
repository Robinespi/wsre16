<?php

$datos=$_POST['num_preg'];

$link = mysqli_connect("localhost","root","","Quiz");
	//$link = mysqli_connect("mysql.hostinger.es","u349629874_espi","Pepitogrillo","u349629874_quiz");
	if(!$link)
	{
		
		echo"Fallo al conectar a la base de datos".$link->connect_error;
		
	}

	$resultado = mysqli_query($link,"SELECT * FROM preguntas WHERE Num_preg='$datos'");
	if(!$resultado){
		
		die('Error'.mysqli_error($link));
		
	}
	

	
	$row = mysqli_fetch_array($resultado);
	

	echo '<form id="insertar" method="post"  name="insertar" enctype="multipart/form-data">';
	echo	"Codigo";
	echo	'<input type="text" name="codigo" id="codigo" value="'.$row['Num_preg'].'" disabled="true"><br>';
	echo	"Propietario";
	echo	'<input type="text" name="propietario" id="propietario" value="'.$row['Email'].'" disabled="true"><br>';
	echo	"Pregunta";
	echo	'<input type="text" name="pregunta" id="pregunta" value="'.$row['Pregunta'].'"><br>';
	echo	"Respuesta";
	echo	'<input type="text" name="respuesta" id="respuesta" value="'.$row['Respuesta'].'"><br>';
	echo	"Dificultad";
	echo	'<input type="text" name="dificultad" id="dificultad" value="'.$row['Dificultad'].'"><br>';
	echo	"Tematica";
	echo	'<input type="text" name="tematica" id="tematica" value="'.$row['Tematica'].'"><br>';
	echo '<input type="button" name="modificar" id="modificar" value="Modificar Pregunta Seleccionada" onClick="javascript:modificarp(codigo.value,pregunta.value,respuesta.value,dificultad.value,tematica.value)">';
	echo '<div id="resultado"></div>';
	echo    '</form>';
	
	mysqli_close($link);
	
 



?>