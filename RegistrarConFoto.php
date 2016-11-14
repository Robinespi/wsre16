<?php

session_start();

if(isset($_SESSION['email'])){
	
	header('location:layout.php');
	
}


?>



<!DOCTYPE html>
<html>
	<head>
	<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Registro</title>
	<link rel='stylesheet' type='text/css' href='registro.css' />
	<script src="registrar.js" language="javascript" type="text/javascript"></script>
	</head>

	<body>
	<center>
	<p> *Obligatorio</p>
	<form id='registro' method="post"  name='registro' enctype="multipart/form-data">
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
	<td><input type="text" name='Email' id='E-mail' value="" onChange="javascript:verificarc(Email.value)"></td>
	<td><div id="everifi"></div></td>
	</tr>
	
	<tr>
	<td>Contraseña(*):</td>
	<td><input type="password" name='Contraseña' id='Contraseña' value="" onChange="javascript:verificarcontra(Contraseña.value,clave.value)">
	Clave(*):
	<input type="text" name="clave" id="clave" value="" onChange="javascript:verificarcontra(Contraseña.value,clave.value)"> </td>
	<td><div id="cverifi" ></div></td>
	</tr>
	
	<tr>
	<td>Contraseña(*):</td>
	<td><input type="password" name='Contraseñav' id='Contraseñav' value="">
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
	<td><input type="button" name='Registrar' id='Registrar' value="Registrar" disabled="true" onClick="javascript:checkform(Nombre.value,Apellidos.value,Email.value,Contraseña.value,Contraseñav.value,Numerotelefono.value,Especialidad.value,interes.value,img)"></td>
	</tr>
	</table>
	</form>
	<div id="registrado"></div>
	</center>
	
	<p align='center'><a href='layout.php'>Volver a la pagina de inicio</a></p>
	</body>



</html>


