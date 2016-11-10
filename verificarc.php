<?php
require_once('nusoap-0.9.5/lib/nusoap.php');
require_once('nusoap-0.9.5/lib/class.wsdlcache.php');

$email=$_POST['email'];

$cliente=new nusoap_client('http://cursodssw.hol.es/comprobarmatricula.php?wsdl',true);
$resultado= $cliente->call('comprobar',array('x'=>$email));
print_r($resultado);

    /*// AÑADIR ESTE CODIGO AL FINAL DEL PHP QUE CONTIENE LA LLAMADA AL SERVICIO
    //Codigo para debugear y ver la respuesta y posibles errores, comentar cuando se comprueba que está correcto el servicio y la llamada
    $err = $cliente->getError();
    if ($err) {
        echo '<p><b>Constructor error: ' . $err . '</b></p>';
    }
    echo '<h2>Request</h2>';
    echo '<pre>' . htmlspecialchars($cliente->request, ENT_QUOTES) . '</pre>';
    echo '<h2>Response</h2>';
    echo '<pre>' . htmlspecialchars($cliente->response, ENT_QUOTES) . '</pre>';
    echo htmlspecialchars($cliente->response, ENT_QUOTES) . '</b></p>';
    echo '<p><b>Debug: <br>';
    echo htmlspecialchars($cliente->debug_str, ENT_QUOTES) .'</b></p>';
    //Comentar hasta aquí
     
    if($cliente->fault)
    {
        echo "FAULT: <p>Code: (".$cliente->faultcode.")</p>";
        echo "String: ".$cliente->faultstring;
    }
    else
    {
        //var_dump ($response);
        echo "Codigo: ".$response['Codigo'];
    }*/


?>