
<html>
<head>
<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
<title>Login</title>
<link rel='stylesheet' type='text/css' href='registro.css' />
</head>

<body>
	<center>
	<p> *Obligatorio</p>
	<form id='login' method="post"  name='login'  enctype="multipart/form-data">
	<?php 
	if(isset($_GET["errorusu"])){
	$error=$_GET["errorusu"];
	if($error=="si"){
		echo '<p>'."Datos Incorrectos".'</p>';
		} 
	else { 
		echo "Introduce tus datos";
		}
	}
	?>
	Introduce el Usuario
	<input type='text' name='usuario' id='usuario' value=''><br>
	Introduce la contraseña
	<input type='password' name='contrasena' id='contrasena' value=''>
	<input type="submit" name='login' id='login' value="Login">
	</form>
		<p align='center'><a href='CambiarContra.php'>¿Has olvidado la contraseña?</a></p>
		<p align='center'><a href='layout.php'>Volver a la pagina de inicio</a></p>
	</center>
</body>
</html>

<?php
	session_start();
	if(isset($_SESSION['email'])){
		
		header('location:layout.php');
		
	}
	else{
	if(isset($_POST['usuario'])){
	
	$usuario = $_POST['usuario'];
	$pass = $_POST['contrasena'];
	$contrasena = SHA1($pass);
	
	//$link = mysqli_connect("localhost","root","","Quiz");
	$link = mysqli_connect("mysql.hostinger.es","u349629874_espi","Pepitogrillo","u349629874_quiz");
	if(!$link)
	{
		
		echo"Fallo al conectar a la base de datos".$link->connect_error;
		
	}
	$usuarioin = mysqli_query($link,"SELECT * FROM usuario WHERE Email='$usuario'");
	
	$int=mysqli_fetch_array($usuarioin);
	$intentos = $int['Intentos'];
	
	
	
	if($intentos < 3){
		$usuarios = mysqli_query($link,"SELECT * FROM usuario WHERE Email='$usuario' and Contrasena='$contrasena'");
	
		$cont= mysqli_num_rows($usuarios);
		if($cont == 1){
			$resultado = mysqli_query($link,"SELECT * FROM conexiones");
			if(!$resultado){
		
			die('Error'.mysqli_error($link));
			}
	
			$session= mysqli_num_rows($resultado);

			if($session == 0)
			$num_session=0;
			else
			$num_session=$session;
		
			$idc="conexion".$num_session;
			
			$hora=date("H");
			$minuto=date("i");
			$segundo=date("s");
			$timestamp = $hora.":".$minuto.":".$segundo;
			$hco=$timestamp;
			
			$sqls=("INSERT INTO conexiones(IdC,Email,HCo) VALUES('$idc','$usuario','$hco')");
			if(!mysqli_query($link,$sqls)){
				
				die('Error'.mysqli_error($link));
				
			}
			$row = mysqli_fetch_array($usuarios);
			
				if($row['Rol']=="alumno"){
					$intentos=0;
					$sql3="Update usuario Set Intentos='$intentos' Where Email='$usuario'";
					if(!mysqli_query($link,$sql3))
					{
		
					die('Error'.mysqli_error($link));
		
					}
					else{
					$_SESSION["autentificado"]="Si";
					$_SESSION["email"]=$usuario;
					$_SESSION["rol"]=$row['Rol'];
					header('location:GestionPreguntas.php');}
					}
					else if($row['Rol']=="profesor"){
						$intentos=0;
						$sql4="Update usuario Set Intentos='$intentos' Where Email='$usuario'";
						if(!mysqli_query($link,$sql4))
						{
		
						die('Error'.mysqli_error($link));
		
						}
						else{
						$_SESSION["autentificado"]="Si";
						$_SESSION["email"]=$usuario;
						$_SESSION["rol"]=$row['Rol'];
						header('location:ModificarPreguntas.php');}
					}
			}
			else{
					$intentos=$intentos+1;
					$sql2="Update usuario Set Intentos='$intentos' Where Email='$usuario'";
				if(!mysqli_query($link,$sql2))
				{
		
					die('Error'.mysqli_error($link));
		
				}else
					header('location:Login.php?errorusu=si');
		
					}
	} else{
		
			header('location:cbloqueada.php');
	}
	}
	}

?>

