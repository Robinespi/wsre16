<?php

session_start();

	
	if(isset($_SESSION['email'])){
		echo '<div align="right"><a href="logout.php">Logout</a></div>';
	}
	


?>


<!DOCTYPE html>
<html>
	<head>
	<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<style type="text/css">
	html, body { height: 100%; margin: 0; padding: 0; }
	#map { height: 50%; width: 50%; }
	</style>
	<title>Creditos</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	
	<link rel='stylesheet' type='text/css' href='registro.css' />
	</head>

	<body>
	
	<table id="creditos"align="center">
	<tr>
	
	<td>
	<div><p><h1 align='center'>Robin Espinosa</h1></p>
	<p><h2 align='center'>Ingeniería de Computadores</h2></p>
	<center>
	<IMG width="50%" HEIGHT="50%" border=2 SRC='https://pbs.twimg.com/profile_images/750076284806565888/60MriQPr.jpg'>
	</center>
	</div>
	</td>	
	

	<td>
	<div><p><h1 align='center'>Walid Boussaboun</h1></p>
	<p><h2 align='center'>Ingeniería de Software</h2></p>
	<center>
	<IMG width="50%" HEIGHT="50%" border=2 SRC='https://s13.postimg.org/cmfyvf5uv/Untitled.png'>
	</center>
	</div>
	
	</td>
	</tr>
	</table>
	
	<table id="infocliente" align="center" border="1"></table>
	<script>
	
	$.getJSON("http://ip-api.com/json/?callback=?", function(data) {  
	var tabla_cliente;
	tabla_cliente+="<tr><td><h3>Cliente</h3></td></tr>";
    $.each(data, function(k, v) {
		if(k=="country" || k=="regionName" || k=="timezone"){tabla_cliente+="<tr><td>" + k + "</td><td><b>" + v + "</b></td></tr>";}
           });
		   $("#infocliente").html(tabla_cliente);
       });
	   
	</script>
	
	<p align='center'><a href='layout.php'>Volver a la pagina de inicio</a></p>
	
	
	</body>




</html>
