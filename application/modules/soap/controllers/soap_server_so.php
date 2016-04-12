<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
*************************************************************
Página/Clase    : Modules/Admin/Controller/login.php
Propósito       : Página de Administrador Dashboard
Notas           : N/A
Modificaciones  : N/A
******** Datos Creación *********
Autor           : Junior Tello
Fecha y hora    : 04/04/2015 - 15:12 hrs.
*************************************************************
*/

class Soap_server_so extends CI_Controller
{


    function Soap_server_so()
    {
      //  parent::__construct();
       /* $this->load->library("Nusoap_library"); //cargando mi biblioteca
        $this->nusoap_server = new soap_server();
        $this->nusoap_server->configureWSDL("SOAP Server", $ns);
        $this->nusoap_server->wsdl->schemaTargetNamespace = $ns;
 
        //registrando funciones
        $input_array = array ('a' => "xsd:string", 'b' => "xsd:string");
        $return_array = array ("return" => "xsd:string");
        $this->nusoap_server->register('addnumbers', $input_array, $return_array, "urn:SOAPServerWSDL", "urn:".$ns."/addnumbers", "rpc", "encoded", "Addition Of Two Numbers");
        */

         parent::__construct();
        $ns =  'http://'.$_SERVER['HTTP_HOST'].'/Soap_server_so/';
        $this->load->library("Nusoap_lib"); //cargando mi biblioteca
        $this->nusoap_server = new soap_server();
        $this->nusoap_server->configureWSDL("SOAP Server", $ns);
        $this->nusoap_server->wsdl->schemaTargetNamespace = $ns;
 
        //registrando funciones
        $input_array = array ('a' => "xsd:int", 'b' => "xsd:int");
        $return_array = array ("return" => "xsd:int");
        $this->nusoap_server->register('addnumbers', $input_array, $return_array, "urn:SOAPServerWSDL", "urn:".$ns."/addnumbers", "rpc", "encoded", "Addition Of Two Numbers");
    }
 
    function index()
    {
        function addnumbers($a,$b)
        {
            $c = $a + $b;
            return $c;
        }
 
        $this->nusoap_server->service(file_get_contents("php://input"));
    }

    
}
?>