<?php   
set_include_path(get_include_path() . PATH_SEPARATOR . 'ZendFramework-1.10.8/library/');

/* incluir as classes necessoarias */
include_once("ZendFramework-1.10.8/library/Zend/Soap/Server.php"); 
include_once("ZendFramework-1.10.8/library/Zend/Soap/AutoDiscover.php"); 
 
if(isset($_GET['wsdl'])) {             
        /*          
         * Usar o Soap AutoDiscover para criacao do WSDL de forma dinamica          
         */        
        $autodiscover = new Zend_Soap_AutoDiscover();         
        $autodiscover->setClass('Calculadora');
        $autodiscover->handle();
} else {
        // Disponibilizar o webservice atraves do canal:
        $soap = new Zend_Soap_Server("http://127.0.0.1/calculadora_service/CalculadoraService.php?wsdl");
        $soap->setClass('Calculadora');
        $soap->handle();
}
 
/*
 * Classe calculadora
 */
class Calculadora {
 
        /**
         * Realiza Soma
         * @param integer $a
         * @param integer $b
         * @return integer
         */
        public function soma($a, $b) {
                return $a + $b;
        }
 
        /**
         * Realiza Subtracao
         * @param integer $a
         * @param integer $b
         * @return integer
         */
        public function subtrai($a, $b) {
                return $a - $b;
        }
}