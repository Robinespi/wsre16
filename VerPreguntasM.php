<?php
	
	//$link = mysqli_connect("localhost","root","","Quiz");
	$link = mysqli_connect("mysql.hostinger.es","u349629874_espi","Pepitogrillo","u349629874_quiz");
	if(!$link)
	{
		
		echo"Fallo al conectar a la base de datos".$link->connect_error;
		
	}
	
	
	
	$resultado = mysqli_query($link,"SELECT * FROM preguntas");
	if(!$resultado){
		
		die('Error'.mysqli_error($link));
		
	}
	echo"SEECCIONE UNA PREGUNTA PARA MODIFICARLA";
	echo '<center><table border=1> <tr><th> Seleccion </th> <th> Numero Pregunta </th> <th> Autor </th> <th> Dificultad </th> <th> Tematica </th> <th> Pregunta </th> <th> Respuesta </th> </tr></center>';
	
	while($row = mysqli_fetch_array($resultado))
	{
	//echo '<tr> <td>''<input type="radio" name="'.$row['Num_preg'].'"'.'</td><td>'.$row['Email'].'</td><td>'.$row['Dificultad'].'</td><td>'.$row['Pregunta'].'</td></tr>';
	echo '<tr> <td> <input type="radio" id="preguntas" name="preguntas" value="'.$row['Num_Preg'].'" onClick="javascript:verPreguntaD(this.value)"><td>'.$row['Num_Preg'].'</td><td>'.$row['Email'].'</td><td>'.$row['Dificultad'].'</td><td>'.$row['Tematica'].'</td><td>'.$row['Pregunta'].'</td><td>'.$row['Respuesta'].'</td></td></tr>';
	}
	
	mysqli_close($link);
	

?>