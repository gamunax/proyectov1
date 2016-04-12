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
class Inicio extends MX_Controller
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
        switch ($this->session->userdata('perfil')) {
            case '':
                $data['token'] = $this->token();
                ## Inicio de Sesión
                $data['page_title'] = 'Login';
                ## Template Login
                echo Modules::run('template2/header_login',$data);
                echo Modules::run('template2/login',$data);
                echo Modules::run('template2/footer_login',$data);

                break;
            case 'admin':
                redirect(base_url().'admin/dashboard/extranet','refresh');
                break;
            case 'user':
                redirect(base_url().'admin/user','refresh');
                break;
            default:        
                ## Inicio de Sesión
                $data['token'] = $this->token();
                $data['page_title'] = 'Login';
                ## Template Login
                echo Modules::run('template2/header_login',$data);
                echo Modules::run('template2/login',$data);
                echo Modules::run('template2/footer_login',$data);

                //$this->load->view('layout/head_login_view',$data);
                //$this->load->view('index_view');
                //$this->load->view('layout/footer_login_view');
                
                break;      
        }
    }

    public function token()
    {
        $token = md5(uniqid(rand(),true));
        $this->session->set_userdata('token',$token);
        return $token;
    }
    
    public function valid()
    {
        if($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token'))
        {
          
        
            $this->form_validation->set_rules('ruc', 'nombre de usuario', 'required|trim|min_length[2]|max_length[150]|xss_clean');
            $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[3]|max_length[150]|xss_clean');
            //lanzamos mensajes de error si es que los hay
            //$this->form_validation->set_message('required', 'El %s es requerido');
            //$this->form_validation->set_message('min_length', 'El %s debe tener al menos %s carácteres');
            //$this->form_validation->set_message('max_length', 'El %s debe tener al menos %s carácteres');
          
            if($this->form_validation->run() == FALSE)
            {
                

               $this->index();
            }else{
                
                $username   = $this->input->post('ruc');
                $password   = $this->input->post('password'); //sha1($this->input->post('password'));
                $check_user = $this->login->login_user($username,$password);

                
                if($check_user == TRUE)
                {
                    $data = array(
                        'is_logued_in'  =>  TRUE,
                        'id_usuario'    =>  $check_user->ID,
                        'perfil'        =>  'admin',
                        'ruc'           =>  $check_user->DOCUMENTO,
                        'nombre'        =>  $check_user->RAZON_SOCIAL
                    );

                 
                    $this->session->set_userdata($data);
                    redirect(base_url().'extranet/inicio','refresh');
                }
            }
        }else{
            print_r(validation_errors());
            redirect(base_url().'login/inicio','refresh');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url().'extranet/inicio','refresh');
    }
    
}

/*
*end modules/login/controllers/index.php
*/