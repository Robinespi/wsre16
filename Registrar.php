<?php
	
	if(isset($_POST['email'])){
		
	require_once('verificar.php');
	require_once('SubirFoto.php');
	
	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$email = $_POST['email'];
	$contra = $_POST['contraseña'];
	$contrasena= MD5($contra);
	$numt = $_POST['numt'];
	$interes = $_POST['interes'];
	
	$espe= $_POST['especialidad'];
	if($espe == 'otra'){
		
		$especialidad = $_POST['txotra'];
		
	}else
	$especialidad = $_POST['especialidad'];
	
	$nombrei= "img";
	
	$error = '';
	
	$link = mysqli_connect("mysql.hostinger.es","u349629874_espi","Pepitogrillo","u349629874_quiz");
	if(!$link)
	{
		
		echo"Fallo al conectar a la base de datos".$link->connect_error;
		
	}
	
	$error= vForm($nombre,$apellidos,$email,$contra,$numt);
	
		if($error == ''){
			$tmp_name = $_FILES[$nombrei]['tmp_name'];
			if(!is_uploaded_file($tmp_name)){
				
				$ruta2= "images/avatar.jpg";
				$sql2="INSERT INTO usuario(Nombre,Apellidos,Email,Contrasena,NumeroTelefono,Especialidad,Interes,Imagen)VALUES('$nombre','$apellidos','$email','$contrasena',$numt,'$especialidad','$interes','$ruta2')";
				if(!mysqli_query($link,$sql2))
				{
		
					die('Error'.mysqli_error($link));
		
				}else
				header('location:registrado.php');
				
			
			}
		else 
			{
				if(subir_fichero($nombrei)){
	
				$directorio_destino = "images";
				$img_file = $_FILES[$nombrei]['name'];
				$ruta= $directorio_destino . '/' . $img_file;
				$sql="INSERT INTO usuario(Nombre,Apellidos,Email,Contrasena,NumeroTelefono,Especialidad,Interes,Imagen)VALUES('$nombre','$apellidos','$email','$contrasena',$numt,'$especialidad','$interes','$ruta')";
				if(!mysqli_query($link,$sql))
				{
		
					die('Error'.mysqli_error($link));
		
				}else
				header('location:registrado.php');
			}
			else{
		
			die('Error'."al subir la imagen");
			}
			}
		
		}
		else
		{
		
			die('Error'.$error);
		
		}
	mysqli_close($link);
	}
	
?>