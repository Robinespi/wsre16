
<html>
	<head>
	<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Cambiar contraseña</title>
	<link rel='stylesheet' type='text/css' href='registro.css' />
	<script src="cambio_contra.js" language="javascript" type="text/javascript"></script>
	</head>

	<body>
	<center>
	<p> *Obligatorio</p>
	<form id='cambio' method="post"  name='cambio' enctype="multipart/form-data">
	<table border="0">
	<tr>
	<td>Email(*):</td>
	<td><input type="text" name='cemail' id='cemail'  value="" onChange="javascript:veriemail(cemail.value)"></td>
	<td><div id="everi" ></div></td>
	</tr>
	</table>
	</form>
	<div id="resultado"></div>
	</center>
	
	<p align='center'><a href='layout.php'>Volver a la pagina de inicio</a></p>
	</body>



</html>