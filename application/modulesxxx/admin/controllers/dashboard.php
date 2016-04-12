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
class Dashboard extends MX_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('products_model','products');
    }
    
    public function index()
    {   
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

        //$data['products_latest'] = $this->products->last_products(4);
        ## Inicio de Sesión
        $data['page_title'] = 'Dashboard';

        ## Template Admin Dashboard
        $data['module'] = 'admin';
        $data['view_file'] = 'index_view';
        echo Modules::run('template/header_login',$data);
        echo Modules::run('template/admin',$data);
        echo Modules::run('template/footer_admin',$data);   
    }

    public function contenido(){
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }
        ## Programing
        $dt_page = $this->products->_obtener_datos_page('contenido');

        ## Inicio de Sesión
        $data['page_title'] = 'Contenido';

        $data['contenido'] = array(
            'name'  => 'contenido',
            'id'    => 'contenido',
            'class' => 'form-control',
            'type'  => 'text',
            'required' => 'required',
            'value' => $dt_page['pag_contenido']
        );

        $data['idcontenido'] = $dt_page['pag_id'];
        ## Template Admin Dashboard
        $data['module'] = 'admin';
        $data['view_file'] = 'contenido_form_view';
        echo Modules::run('template/header_login',$data);
        echo Modules::run('template/admin',$data);
        echo Modules::run('template/footer_admin',$data);

    }

    public function page(){
        $this->form_validation->set_rules('idcontenido', 'Código', 'required|xss_clean');
        if ($this->form_validation->run() == true)
        {
            $id = $this->input->post('idcontenido');

            $contenido    = $this->input->post('contenido');

            $arr_datos = array();
            switch($id){
                case 4 :
                    $arr_datos = array(
                        'pag_contenido'      =>  $contenido,
                        'pag_fecha_update'   => date('Y-m-d H:m:s')
                    );
                    break;
                default:
                    $this->session->set_flashdata('message', 'error');
                    redirect('nosotros/dashboard','refresh');
                    break;
            }

            if(!empty($id)){
                if(!empty($arr_datos)){
                    $this->session->set_flashdata('message', 'update');
                    $this->products->_update_page($arr_datos,(int)$id);
                    redirect('admin/dashboard/contenido','refresh');
                }else{
                    $this->session->set_flashdata('message', 'error');
                    redirect('admin/dashboard/contenido','refresh');
                }
            }else{
                $this->session->set_flashdata('message', 'error');
                redirect('admin/dashboard/contenido','refresh');
            }
        }else{
            $this->session->set_flashdata('message', 'error');
            print_r(validation_errors());
            redirect('admin/dashboard/contenido','refresh');
        }
    }


    #Clientes
    public function contactos(){
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

        $data['orden_lst'] = $this->products->_lst_contacto();
        ## Inicio de Sesión
        $data['page_title'] = 'Contacto';

        ## Template Admin Dashboard
        $data['module'] = 'admin';
        $data['view_file'] = 'contacto/lst_contacto_view';
        echo Modules::run('template/header_login',$data);
        echo Modules::run('template/admin',$data);
        echo Modules::run('template/footer_admin',$data);
    }

    public function ver_contacto($id = null){
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

        ## Formulario
        $dt_tecnico = $this->products->_obtener_datos_contacto((int)$id,'contacto');
        if(count($dt_tecnico)!=0){

            $data['titulo']   = $dt_tecnico['pag_titulo'];
            $data['contenido']   = $dt_tecnico['pag_contenido'];

            $data['page_title'] = 'Ver Contacto';
            ## Template Admin Dashboard
            $data['module'] = 'admin';
            $data['view_file'] = 'contacto/contacto_detalle_view';
            echo Modules::run('template/header_login',$data);
            echo Modules::run('template/admin',$data);
            echo Modules::run('template/footer_admin',$data);

        }elseif($id == '' or is_string($id)){
            redirect(base_url().'producto/dashboard/tecnico','refresh');
        }
    }
    
}

/*
*end modules/login/controllers/dashboard.php
*/