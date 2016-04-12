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
require(APPPATH.'/libraries/REST_Controller.php');
class Services_rest extends REST_Controller
{

   function envios_get()
    {
       // $result = new Response_students();    
     
       /*if(!$this->get("id")){
            $this->response(NULL, 400);
        }*/
     //   $this->load->library('REST_Controller');
        $emision = $this->get('emision');
        $remito = $this->get('remito');
        $this->load->model('rest_model');
        $envio = $this->rest_model->return_envio($emision, $remito);
    
            
        $this->response($envio, 200);
    }

}
?>