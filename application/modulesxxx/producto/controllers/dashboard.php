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
        $this->load->model('productos_model', 'productos', TRUE);
        date_default_timezone_set('America/Lima');
        $this->load->library('recursos');
    }

    public function index()
    {
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

        $data['productos_general'] = $this->productos->_lst_productos();
        ## Inicio de Sesión
        $data['page_title'] = 'Soporte Técnico';

        ## Template Admin Dashboard
        $data['module'] = 'producto';
        $data['view_file'] = 'index_view';
        echo Modules::run('template/header_login',$data);
        echo Modules::run('template/admin',$data);
        echo Modules::run('template/footer_admin',$data);
    }

    public function tecnico(){
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

        $data['tecnico_general'] = $this->productos->_lst_tecnico();
        ## Inicio de Sesión
        $data['page_title'] = 'Soporte Tecnico';

        ## Template Admin Dashboard
        $data['module'] = 'producto';
        $data['view_file'] = 'soporte_index_view';
        echo Modules::run('template/header_login',$data);
        echo Modules::run('template/admin',$data);
        echo Modules::run('template/footer_admin',$data);
    }

    public function ver_tecnico($id = null){
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

        ## Formulario
        $dt_tecnico = $this->productos->_obtener_datos_tecnico((int)$id,'form');
        if(count($dt_tecnico)!=0){

            $data['titulo']   = $dt_tecnico['pag_titulo'];
            $data['contenido']   = $dt_tecnico['pag_contenido'];

            $data['page_title'] = 'Ver Soporte Tecnico';
            ## Template Admin Dashboard
            $data['module'] = 'producto';
            $data['view_file'] = 'soporte_detalle_view';
            echo Modules::run('template/header_login',$data);
            echo Modules::run('template/admin',$data);
            echo Modules::run('template/footer_admin',$data);

        }elseif($id == '' or is_string($id)){
            redirect(base_url().'producto/dashboard/tecnico','refresh');
        }
    }


    # Orden
    public function orden(){
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

        $data['orden_lst'] = $this->productos->_lst_orden();
        ## Inicio de Sesión
        $data['page_title'] = 'Orden';

        ## Template Admin Dashboard
        $data['module'] = 'producto';
        $data['view_file'] = 'orden/lst_orden_view';
        echo Modules::run('template/header_login',$data);
        echo Modules::run('template/admin',$data);
        echo Modules::run('template/footer_admin',$data);
    }

    public function ver_orden($id = null){
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

        ## Formulario
        $dt_tecnico = $this->productos->_obtener_datos_orden((int)$id,'orden');
        if(count($dt_tecnico)!=0){

            $data['titulo']   = $dt_tecnico['pag_titulo'];
            $data['contenido']   = $dt_tecnico['pag_contenido'];

            $data['page_title'] = 'Ver Ordenes';
            ## Template Admin Dashboard
            $data['module'] = 'producto';
            $data['view_file'] = 'orden/orden_detalle_view';
            echo Modules::run('template/header_login',$data);
            echo Modules::run('template/admin',$data);
            echo Modules::run('template/footer_admin',$data);

        }elseif($id == '' or is_string($id)){
            redirect(base_url().'producto/dashboard/tecnico','refresh');
        }
    }

    #Clientes
    public function cliente(){
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

        $data['orden_lst'] = $this->productos->_lst_orden();
        ## Inicio de Sesión
        $data['page_title'] = 'Clientes';

        ## Template Admin Dashboard
        $data['module'] = 'producto';
        $data['view_file'] = 'cliente/lst_cliente_view';
        echo Modules::run('template/header_login',$data);
        echo Modules::run('template/admin',$data);
        echo Modules::run('template/footer_admin',$data);
    }

    public function ver_cliente($id = null){
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

        ## Formulario
        $dt_tecnico = $this->productos->_obtener_datos_orden((int)$id,'orden');
        if(count($dt_tecnico)!=0){

            $data['titulo']   = $dt_tecnico['pag_titulo'];
            $data['contenido']   = $dt_tecnico['pag_contenido'];

            $data['page_title'] = 'Ver Clientes';
            ## Template Admin Dashboard
            $data['module'] = 'producto';
            $data['view_file'] = 'cliente/cliente_detalle_view';
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