<?php

if(isset($_POST['email'])){
	
	$email=$_POST['email'];
	
	
	//$link = mysqli_connect("localhost","root","","Quiz");
	$link = mysqli_connect("mysql.hostinger.es","u349629874_espi","Pepitogrillo","u349629874_quiz");
	if(!$link)
	{
		
		echo"Fallo al conectar a la base de datos".$link->connect_error;
		
	}
	$usuarios = mysqli_query($link,"SELECT * FROM usuario WHERE Email='$email'");
	
	$cont= mysqli_num_rows($usuarios);
	
	if($cont == 1){
	echo '<center>';
	echo '<table>';
	echo '<tr>';
	echo '<td>Nueva Contraseña(*):</td>';
	echo '<td><input type="password" name="cnue" id="cnue" value="" onChange="javascript:verificarcontra(cnue.value,clave.value)">';
	echo "Clave(*):";
	echo '<input type="text" name="clave" id="clave" value="" onChange="javascript:verificarcontra(cnue.value,clave.value)"> </td>';
	echo '<td><div id="cverifi" ></div></td>';
	echo '</tr>';
	
	echo '<tr>';
	echo '<td>Repita la contraseña(*):</td>';
	echo '<td><input type="password" name="crep" id="crep" value=""></td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td><input type="button" name="Cambiar" id="Cambiar" value="Cambiar" disabled="true" onClick="javascript:modificarc(cnue.value,crep.value,cemail.value)"></td>';
	echo '</tr>';
	echo '</table>';
	echo '</center>';
	}
	else{
	echo "No se puede cambiar el password";
	}

}
?>
