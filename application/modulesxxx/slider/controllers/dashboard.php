<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
*************************************************************
Página/Clase    : Modules/Slider/Controller/dashboard.php
Propósito       : Creacion de banners generales
Notas           : N/A
Modificaciones  : N/A
******** Datos Creación *********
Fecha y hora    : 04/04/2015 - 15:12 hrs.
*************************************************************
*/
class Dashboard extends MX_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('slider_model','sliders');
    }
    
    public function index()
    {   
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }
        ## Programing
        $data['slider_general'] = $this->sliders->_lst_banners_general();
        ## Inicio de Sesión
        $data['page_title'] = 'Listado de Slider';

        ## Template Admin Dashboard
        $data['module'] = 'slider';
        $data['view_file'] = 'index_view';
        echo Modules::run('template/header_login',$data);
        echo Modules::run('template/admin',$data);
        echo Modules::run('template/footer_admin',$data);

    }

    public function banners($id){
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

        ## Programing        
        $data['slider_collections'] = $this->sliders->_lst_banners_collections($id);
        $data['idslider'] = $id;

        $data['page_title'] = 'Banner Collections';
        ## Template Admin Dashboard
        $data['module'] = 'slider';
        $data['view_file'] = 'banner_collection_view';
        echo Modules::run('template/header_login',$data);
        echo Modules::run('template/admin',$data);
        echo Modules::run('template/footer_admin',$data);
    }

    public function delete($id){
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

        ## Programing
        $additional_data = array(
            'slide_estado'   => 0,
        );
        $this->sliders->_update_slider($additional_data,$id);
        $this->session->set_flashdata('message', 'delete');
        redirect(base_url().'slider/dashboard','refresh');
    }

    public function create_banner(){
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

        ## Formulario
        $data['nombre'] = array(
            'name'  => 'nombre',
            'id'    => 'nombre',
            'class' => 'form-control',
            'type'  => 'text',
            'required' => 'required',
            'value' => $this->form_validation->set_value('nombre')
        );

        $data['estado'] = '';
        $data['idslider'] = '';
        $data['page_title'] = 'Creación Banner Collections';
        ## Template Admin Dashboard
        $data['module'] = 'slider';
        $data['view_file'] = 'collections_form_view';
        ## echo Modules::run('template/header_login',$data);
        echo Modules::run('template/admin_ajax',$data);
        ## echo Modules::run('template/footer_admin',$data);
    }

    public function edit_banner($id = null){
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

        ## Formulario
        $dt_slider = $this->sliders->obtener_datos_slider((int)$id);
        if(count($dt_slider)!=0){
            $data['nombre'] = array(
                'name'  => 'nombre',
                'id'    => 'nombre',
                'class' => 'form-control',
                'type'  => 'text',
                'required' => 'required',
                'value' => $dt_slider['slide_nombre']
            );

            $data['idslider'] = $dt_slider['slide_id'];
            $data['estado']   = $dt_slider['slide_estado'];

            $data['page_title'] = 'Editar Banner Collections';
            ## Template Admin Dashboard
            $data['module'] = 'slider';
            $data['view_file'] = 'collections_form_view';
            ##echo Modules::run('template/header_login',$data);
            echo Modules::run('template/admin',$data);
            ##echo Modules::run('template/footer_admin',$data);

        }elseif($id == '' or is_string($id)){
            redirect('slider/dashboard','refresh');
        }

    }

    ## Creación y Edición de cada Slider
    public function create_slider(){
       // $this->form_validation->set_rules('nombre', 'Nombre', 'required|xss_clean');
        $this->form_validation->set_rules('estado', 'Estado', 'required|xss_clean');
        $this->form_validation->set_rules('id', 'Código', 'xss_clean');
        if ($this->form_validation->run() == true)
        {
            $id          = $this->input->post('idslider');
            $nombre      = $this->input->post('nombre');
            $estado      = $this->input->post('estado');

            $this->load->model('slider_model', 'sliders', TRUE);
            $arr_datos = array(
                'slide_nombre'         =>  $nombre,
                'slide_fecha_created'  => date('Y-m-d'),
                'slide_estado'         => $estado
            );
            if(!empty($id)){
                $this->session->set_flashdata('message', 'update');
                $this->sliders->_update_slider($arr_datos,(int)$id);
                redirect('slider/dashboard','refresh');
            }else{
                $ins_slider = $this->sliders->_insert_slider($arr_datos);
                if(!$ins_slider){
                    $this->session->set_flashdata('message', 'error');
                }
                redirect('slider/dashboard','refresh');
            }
        }else{
            $this->session->set_flashdata('message', 'error');
            print_r(validation_errors());
            redirect('slider/dashboard','refresh');
        }
    }
    
}

/*
*end modules/login/controllers/dashboard.php
*/