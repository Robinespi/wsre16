<?php 

	require_once('verificar.php');
	require_once('VerPreguntasM.php');
	//require_once('preguntaxml.php');
	
	$codigo=$_POST['codigo'];
	$pregunta = $_POST['pregunta'];
	$respuesta = $_POST['respuesta'];
	$dificultad = $_POST['dificultad'];
	$tematica = $_POST['tematica'];
	
	$error = '';
	//$link = mysqli_connect("localhost","root","","Quiz");
	$link = mysqli_connect("mysql.hostinger.es","u349629874_espi","Pepitogrillo","u349629874_quiz");
	
	if(!$link)
	{
		
		echo"Fallo al conectar a la base de datos".$link->connect_error;
		
	}
	$error=vPreg($pregunta,$dificultad,$respuesta,$tematica);
	
	if ($error == ''){
		
	
	$sql="Update preguntas Set Pregunta='$pregunta', Dificultad='$dificultad', Respuesta='$respuesta',Tematica='$tematica' Where Num_preg='$codigo'";
	if(!mysqli_query($link,$sql))
				{
					
					die('Error'.mysqli_error($link));
		
				}else{
					/*if(!addPregunta($pregunta,$respuesta,$dificultad,$tematica)){
			
						die("Error con el xml");
			
						}*/
					
					header('location:Insertado.php');
				}
				
			
	}
	else
		{
		
			die('Error'.$error);
		
		}
		
		
	mysqli_close($link);
	
	
		
	

?>