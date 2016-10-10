<!DOCTYPE html>

<html>
	<head>
	<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Registro</title>
	<link rel='stylesheet' type='text/css' href='registro.css' />
	<script src="formulario.js" language="javascript" type="text/javascript"></script>
	</head>

	<body>
	<center>
	<p> *Obligatorio</p>
	<form id='registro' method="post"  name='registro' onSubmit='return checkform()' enctype="multipart/form-data">
	<table borde="0">
	
	<tr>
	<td>Nombre(*):</td>
	<td><input type="text" name='Nombre' id='Nombre'  value=""></td>
	</tr>
	
	<tr>
	<td>Apellidos(*):</td>
	<td><input type="text" name='Apellidos' id='Apellidos' value=""></td>
	</tr>
	
	<tr>
	<td>E-mail(*):</td>
	<td><input type="text" name='Email' id='E-mail' value=""></td>
	</tr>
	
	<tr>
	<td>Contraseña(*):</td>
	<td><input type="password" name='Contraseña' id='Contraseña' value=""></td>
	</tr>
	
	<tr>
	<td>Numero telefono(*):</td>
	<td><input type="text" name='Numerotelefono' id='Numero telefono' value=""></td>
	</tr>
	
	<tr>
	<td>Especialidad(*):</td>
	<td id='fotra' name='fotra'>
	<select name='Especialidad' id='Especialidad' onChange='javascript:CEspecialidad()'>
	<option value='Ingenieria del Software' >Ingenieria del Software</option>
	<option value='Ingenieria de Computadores' >Ingenieria de Computadores</option>
	<option value='Ingenieria de la Computacion' >Ingenieria de la Computacion</option>
	<option value='otra'>Otra especialidad</option>
	</select>
	</td>
	</tr>
	
	<tr>
	<td>Tecnologia y herramientas en las que estas interesado(Opcional):</td>
	<td>
	<textarea rows="4" cols="40" id="interes" name="interes"></textarea>
	</td>
	</tr>
	<tr>
	<td>Foto de perfil(Opcional):</td>
	<td><img id="imagen" name= 'foto' src="images/avatar.jpg" width="100" height="100"/>
	<input type="file" name='img' id='img' onChange="document.getElementById('imagen').src=window.URL.createObjectURL(this.files[0])"></td>
	</tr>
	<tr>
	<td><input type="submit" name='Registrar' id='Registrar' value="Registrar"></td>
	</tr>
	</table>
	</form>
	
	</center>
	
	<p align='center'><a href='layout.html'>Volver a la pagina de inicio</a></p>
	</body>



</html>


<?php
	
	if(isset($_POST['Email'])){
		
	require_once('verificar.php');
	
	$nombre = $_POST['Nombre'];
	$apellidos = $_POST['Apellidos'];
	$email = $_POST['Email'];
	$contrasena = $_POST['Contraseña'];
	$numt = $_POST['Numerotelefono'];
	$especialidad = $_POST['Especialidad'];
	$interes = $_POST['interes'];
	
	$error = '';
	
	$link = mysqli_connect("mysql.hostinger.es","u349629874_espi","Pepitogrillo","u349629874_quiz");
	if(!$link)
	{
		
		echo"Fallo al conectar a la base de datos".$link->connect_error;
		
	}
	
	$error=  vCorre($email);
	
	if($error == ''){
	
	
	$sql="INSERT INTO usuario(Nombre,Apellidos,Email,Contrasena,NumeroTelefono,Especialidad,Interes)VALUES('$nombre','$apellidos','$email','$contrasena',$numt,'$especialidad','$interes')";
	if(!mysqli_query($link,$sql))
	{
		
		die('Error'.mysqli_error($link));
		
	}else
	header('location:registrado.php');
	}
	else
	{
		
		die('Error'.$error);
		
	}
	
	
	
	mysqli_close($link);
	}
	
?>