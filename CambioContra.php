<?php


	require_once('verificar.php');
	
	
	$usuario=$_POST['email'];
	$contra = $_POST['contra'];
	$contrav=$_POST['vcontra'];
	$contrasena=SHA1($contra);
	
	$error = '';
	
	//$link = mysqli_connect("localhost","root","","Quiz");
	$link = mysqli_connect("mysql.hostinger.es","u349629874_espi","Pepitogrillo","u349629874_quiz");
	
	if(!$link)
	{
		
		echo"Fallo al conectar a la base de datos".$link->connect_error;
		
	}
	$error=vCon($usuario,$contra,$contrav);
	
	if ($error == ''){
		
	
	$sql="Update usuario Set Contrasena='$contrasena' Where Email='$usuario'";
	if(!mysqli_query($link,$sql))
				{
					
					die('Error'.mysqli_error($link));
		
				}else{
					echo '<h1>El password se a cambiado con exito</h1>';
					echo '<p align="center"><a href="Login.php">Ir al login</a></p>';
				}
				
			
	}
	else
		{
		
			die('Error'.$error);
		
		}
		
		
	mysqli_close($link);
	
	
	




?>