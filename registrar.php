<?php
	
	$nombre = $_POST['Nombre'];
	$apellidos = $_POST['Apellidos'];
	$email = $_POST['Email'];
	$contrasena = $_POST['Contraseña'];
	$numt = $_POST['Numerotelefono'];
	$especial = $_POST['Especialidad'];
	$interes = $_POST['interes'];
	
	
	if($especial == 'otra'){
		
		$otra = $_POST['txotra'];
		$especialidad = $otra;
		
	}
	else {
		
		$especialidad = $especial;
		
	}
	
	$link = mysqli_connect("localhost","root","","Quiz");
	if(!$link)
	{
		
		echo"Fallo al conectar a la base de datos".$link->connect_error;
		
	}
	
	$sql="INSERT INTO Usuario(Nombre,Apellidos,Email,Contrasena,NumeroTelefono,Especialidad,Interes)VALUES('$nombre','$apellidos','$email','$contrasena',$numt,'$especialidad','$interes')";
	if(!mysqli_query($link,$sql))
	{
		
		die('Error'.mysqli_error($link));
		
	}
	echo"Datos añadidos correctamente";
	echo"<p align='center'><a href='VerUsuarios.php'>Ver datos de la bases de datos</a></p>";
	
	mysqli_close($link);
?>