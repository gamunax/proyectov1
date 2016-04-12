<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
*************************************************************
Página/Clase    : Modules/Admin/Controller/login.php
Propósito       : Página de Administrador Dashboard
Notas           : N/A
Modificaciones  : N/A
******** Datos Creación *********
Fecha y hora    : 04/04/2015 - 15:12 hrs.
*************************************************************
*/
class Dashboard extends MX_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('reimpresion_model', 'reimpresion', TRUE);
    }

     public function index()
    {
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

        
        $data['paquetes_general'] = $this->reimpresion->list_paquetes();
        ## Inicio de Sesión
        $data['page_title'] = 'Impresion de remitos cargo adjunto';

        ## Template Admin Dashboard
        $data['module'] = 'reimpresion';
        $data['view_file'] = 'reimpresion_ca/index_view';
        echo Modules::run('template/header_login',$data);
        echo Modules::run('template/admin',$data);
        echo Modules::run('template/footer_admin',$data);
    }

    /* public function reimpresionca()
    {   
        $data['module'] = 'reimpresion';
        $data['view_file'] = 'reimpresion_ca/index_view';
        echo Modules::run('template/header_login',$data);
        //$this->load->view('template/admin');
        echo Modules::run('template/body_reimpresionca',$data);
        //echo Modules::run('template/body_reimpresionca',$data);
     //   $this->load->view('reimpresion_ca/index_view');
       // $this->load->view('nosotros');
        echo Modules::run('template/footer_admin',$data);
    }*/
        
        
    

 

    

}

?>