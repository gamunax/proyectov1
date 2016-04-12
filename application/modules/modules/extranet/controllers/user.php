<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
*************************************************************
Página/Clase    : Modules/Controller/Login/inicio.php
Propósito       : Página de Login
Notas           : N/A
Modificaciones  : N/A
******** Datos Creación *********
Autor           : Junior Tello
Fecha y hora    : 04/04/2015 - 15:12 hrs.
*************************************************************
*/
class User extends MX_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model','login');
        $this->load->library(array('session','form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->database('default');
    }
    
    public function index()
    {   
        redirect(base_url().'admin/dashboard','refresh');
    }


}

/*
*end modules/login/controllers/index.php
*/