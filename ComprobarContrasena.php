<?php
require_once('nusoap-0.9.5/lib/nusoap.php');
require_once('nusoap-0.9.5/lib/class.wsdlcache.php');

$ns="http://raespinosa.esy.es/ComprobarContrasena.php?wsdl";
//$ns="http://localhost/wsre16/ComprobarContrasena.php?wsdl";
$server= new soap_server;
$server->configureWSDL('comprobar',$ns);
$server->wsdl->schemaTargetNamespace=$ns;

$server->register('comprobar',array('x'=>'xsd:string','y'=>'xsd:string'),array('z'=>'xsd:string'),$ns);

function comprobar($x,$y){
	
	
	$valido='0';
	
	$claves=fopen('claves.txt','r')or exit("Unable to open file!");
	while(!feof($claves)){

		$clave=fgets($claves);
		$clave=trim($clave);
		if(!strcmp($y,$clave)){
			
			$valido='1';
			break;
		}
	}
	fclose($claves);
	if($valido == '1'){
	$estado="VALIDA";
	$contras=fopen('toppasswords.txt','r')or exit("Unable to open file!");
	$cverficar=trim($x);
	while(!feof($contras)){
		
		 $linea=fgets($contras);
		 $linver=trim($linea);
		 
		if(!strcmp($cverficar,$linver)){
			$estado="INVALIDA";
			break;
		}
		
	}
	
	
	fclose($contras);
	return $estado;
	}
	else {return "USUARIO NO AUTORIZADO";}
	
}

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);


?>