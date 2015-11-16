<?php 

set_include_path(get_include_path() . PATH_SEPARATOR . 'ZendFramework-1.10.8/library/');

/* incluir classes necessarias */
require_once("ZendFramework-1.10.8/library/Zend/Soap/Client.php"); 
 
/* canal de chamada para webservice */
$soap = new Zend_Soap_Client("http://127.0.0.1/calculadora_service/CalculadoraService.php?wsdl");

echo $soap->soma(11, 2) . PHP_EOL; // imprime 13
echo '<br>';
echo $soap->subtrai(11, 2) . PHP_EOL; //imprime 9