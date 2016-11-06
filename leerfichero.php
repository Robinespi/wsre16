<?php
//$estado="VALIDO";
	$contras=fopen('toppasswords.txt','r')or exit("Unable to open file!");
	
	while(!feof($contras)){
		
		 $linea=fgets($contras);
		 $linsin=trim($linea);
		 //echo $linea.'</br>';
		 $prueba="123456";
		 $pruebasin=trim($prueba);
		 //echo $linea.'/'.strlen ($linea).'/'.strlen ($prueba).'</br>';
		 echo $linsin.'/'.strcmp($prueba,$linsin).'</br>';
		/*if(!strcmp($prueba,$linea)){
			//$estado="INVALIDA";
			//return "Entro";
			echo $linea;
		}*/
		
	}
	
	//return $estado;
	fclose($contras);




?>