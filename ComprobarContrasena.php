<?php
require_once('nusoap-0.9.5/lib/nusoap.php');
require_once('nusoap-0.9.5/lib/class.wsdlcache.php');

$ns="http://raespinosa.esy.es/ComprobarContrasena.php?wsdl";
$server= new soap_server;
$server->configureWSDL('comprobar',$ns);
$server->wsdl->schemaTargetNamespace=$ns;

$server->register('comprobar',array('x'=>'xsd:string'),array('z'=>'xsd:string'),$ns);

function comprobar($x){
	
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

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);


?>