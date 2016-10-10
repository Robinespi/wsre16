
<html>
	<head>
	<link rel='stylesheet' type='text/css' href='registro.css' content-type />
	</head>
</html>

<?php
	
	
	$link = mysqli_connect("localhost","root","","Quiz");
	if(!$link)
	{
		
		echo"Fallo al conectar a la base de datos".$link->connect_error;
		
	}
	
	$resultado = mysqli_query($link,"SELECT * FROM usuario");
	
	echo '<center><table border=1> <tr> <th> Nombre </th> <th> Apellidos </th> <th> E-mail </th> <th> Contraseña </th> <th> Numero Telefono </th> <th> Especialidad </th> <th> Intereses </th></tr></center>';
	
while($row = mysqli_fetch_array($resultado))
	{
	
	echo '<tr> <td>'.$row['Nombre'].'</td><td>'.$row['Apellidos'].'</td><td>'.$row['Email'].'</td><td>'.$row['Contrasena'].'</td><td>'.$row['NumeroTelefono'].'</td><td>'.$row['Especialidad'].'</td><td>'.$row['Interes'].'</td></tr>';
	
	}
	
	
	mysqli_close($link);


?>