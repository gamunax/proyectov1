<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
*************************************************************
Página/Clase    : Modules/Slider/Controller/collections.php
Propósito       : Creacion de banners internos
Notas           : N/A
Modificaciones  : N/A
******** Datos Creación *********
Fecha y hora    : 04/04/2015 - 15:12 hrs.
*************************************************************
*/
class Collections extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('slider_model','sliders');
        $this->load->library('recursos');
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


        $data['page_title'] = 'Banner Collections';
        ## Template Admin Dashboard
        $data['module'] = 'slider';
        $data['view_file'] = 'banner_collection_view';
        echo Modules::run('template/header_login',$data);
        echo Modules::run('template/admin',$data);
        echo Modules::run('template/footer_admin',$data);
    }

    public function delete($id, $tipo = null){
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

    
        if($tipo == 0 and $tipo != null ){
            $this->session->set_flashdata('message', 'update');
            $additional_data = array(
                'dslide_estado'   => 0,
            );
            
        }elseif($tipo == 1 and $tipo != null ){
            $this->session->set_flashdata('message', 'update');
            $additional_data = array(
                'dslide_estado'   => 1,
            );
        }else{
            $this->session->set_flashdata('message', 'delete');
            $additional_data = array(
                'dslide_estado'   => 2,
            );
        }

        $this->sliders->_update_slider_collection($additional_data,$id);
        $this->session->set_flashdata('message', 'delete');
        redirect(base_url().'slider/dashboard/banners/1','refresh');
    }

    public function create_collection($id = null){
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
            //'required' => 'required',
            'value' => $this->form_validation->set_value('nombre')
        );
        $data['name'] = array(
            'name'  => 'name',
            'id'    => 'name',
            'class' => 'form-control',
            'type'  => 'text',
           // 'required' => 'required',
            'value' => $this->form_validation->set_value('name')
        );
        $data['nombre2'] = array(
            'name'  => 'nombre2',
            'id'    => 'nombre2',
            'class' => 'form-control',
            'type'  => 'text',
          //  'required' => 'required',
            'value' => $this->form_validation->set_value('nombre2')
        );
        $data['name2'] = array(
            'name'  => 'name2',
            'id'    => 'name2',
            'class' => 'form-control',
            'type'  => 'text',
          //  'required' => 'required',
            'value' => $this->form_validation->set_value('name2')
        );

        $data['enlace'] = array(
            'name'  => 'enlace',
            'id'    => 'enlace',
            'class' => 'form-control',
            'type'  => 'text',
            'required' => 'required',
            'value' => $this->form_validation->set_value('enlace')
        );

        $data['imagen'] = array(
            'name'  => 'imagen',
            'id'    => 'imagen',
            'ui-jq' => 'filestyle',
            'data-icon' => 'false',
            'data-classButton' => 'btn btn-default' ,
            'data-classInput' => 'form-control inline v-middle input-s',
            'type'  => 'file',
            'value' => $this->form_validation->set_value('imagen'),
        );

        $data['estado'] = '';
        $data['id_dslider'] = '';
        $data['idslider'] = $id;

        $data['page_title'] = 'Creación Banner Collections';
        ## Template Admin Dashboard
        $data['module'] = 'slider';
        $data['view_file'] = 'coleccion_form_view';
        ## echo Modules::run('template/header_login',$data);
        echo Modules::run('template/admin_ajax',$data);
        ## echo Modules::run('template/footer_admin',$data);
    }

    public function edit_collection($id = null){
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

        ## Formulario
        $dt_slider = $this->sliders->obtener_datos_slider_collection((int)$id);
        if(count($dt_slider)!=0){
            $data['nombre'] = array(
                'name'  => 'nombre',
                'id'    => 'nombre',
                'class' => 'form-control',
                'type'  => 'text',
                
                'value' => $dt_slider['dslide_nombre']
            );

             $data['name'] = array(
                'name'  => 'name',
                'id'    => 'name',
                'class' => 'form-control',
                'type'  => 'text',
                
                'value' => $dt_slider['nombre_ingles']
            );

              $data['nombre2'] = array(
                'name'  => 'nombre2',
                'id'    => 'nombre2',
                'class' => 'form-control',
                'type'  => 'text',
                
                'value' => $dt_slider['slide_nombre2']
            );

             $data['name2'] = array(
                'name'  => 'name2',
                'id'    => 'name2',
                'class' => 'form-control',
                'type'  => 'text',
                
                'value' => $dt_slider['nombre2_ingles']
            );

            $data['enlace'] = array(
                'name'  => 'enlace',
                'id'    => 'enlace',
                'class' => 'form-control',
                'type'  => 'text',
               
                'value' => $dt_slider['dslide_enlace']
            );

            $data['imagen'] = array(
                'name'  => 'imagen',
                'id'    => 'imagen',
                
                
                'data-classButton' => 'btn btn-default' ,
                'data-classInput' => 'form-control inline v-middle input-s',
                'type'  => 'file',
                'value' => $dt_slider['dslide_imagen'],
            );

            $data['id_dslider'] = $dt_slider['dslide_id'];
            $data['idslider'] = $dt_slider['dslide_idslider'];
            $data['estado']   = $dt_slider['dslide_estado'];

            $data['img_print'] = $dt_slider['dslide_imagen'];

            $data['page_title'] = 'Editar Banner Collections';
            ## Template Admin Dashboard
            $data['module'] = 'slider';
            $data['view_file'] = 'coleccion_form_view';
            //echo Modules::run('template/header_login',$data);
            echo Modules::run('template/admin_ajax',$data);
            //echo Modules::run('template/footer_admin',$data);

        }elseif($id == '' or is_string($id)){
            redirect('slider/dashboard','refresh');
        }

    }

    ## Creación y Edición de cada Slider
    public function create_collections(){
        //$this->form_validation->set_rules('nombre', 'Nombre', 'required|xss_clean');
        $this->form_validation->set_rules('estado', 'Estado', 'required|xss_clean');
        $this->form_validation->set_rules('enlace', 'Enlace', 'required|xss_clean');
        $this->form_validation->set_rules('ventana', 'Ventana', 'required|xss_clean');
        $this->form_validation->set_rules('id', 'Código', 'xss_clean');
        if ($this->form_validation->run() == true)
        {
            $id          = $this->input->post('id_dslider');
            $id_slider   = $this->input->post('idslider');
            $enlace      = $this->input->post('enlace');
            $ventana     = $this->input->post('ventana');
            $nombre      = $this->input->post('nombre');
            $name      = $this->input->post('name');
            $nombre2      = $this->input->post('nombre2');
            $name2      = $this->input->post('name2');
            $estado      = $this->input->post('estado');

            $arr_datos = array(
                'dslide_nombre'         =>  $nombre,
                'nombre_ingles'         =>  $name,
                'slide_nombre2'         =>  $nombre2,
                'nombre2_ingles'         =>  $name2,
                'dslide_idslider'       =>  $id_slider,
                'dslide_enlace'         =>  $enlace,
                'dslide_ventana'        =>  $ventana,
                'dslide_fecha_created'  =>  date('Y-m-d'),
                'dslide_estado'         =>  $estado
            );
            if(!empty($id)){
                $imagen = $this->recursos->upload_img_products('imagen','uploads/slider/'.$id_slider.'/');
                if(is_array($imagen)){
                    $this->session->set_flashdata('message', 'update');
                    $this->sliders->_update_slider_collection($arr_datos,(int)$id);
                }else{
                    $this->session->set_flashdata('message', 'update');
                    $arr_datos_temp = array(
                        'dslide_imagen'    => $imagen,
                    );
                    $arr_inst_prensa = array_merge($arr_datos,$arr_datos_temp);
                    $this->sliders->_update_slider_collection($arr_inst_prensa,(int)$id);
                }
                redirect('slider/dashboard/banners/'.$id_slider,'refresh');
            }else{
                $ins_slider = $this->sliders->_insert_slider_collections($arr_datos);
                if($ins_slider){
                    $imagen = $this->recursos->upload_img_products('imagen','uploads/slider/'.$id_slider.'/');
                    //print_r($imagen); die();
                    if(is_array($imagen)){
                        $this->session->set_flashdata('message', 'error');
                    }else{
                        $this->session->set_flashdata('message', 'insert');
                        $arr_datos_temp = array(
                            'dslide_imagen'    => $imagen,
                        );
                        $this->sliders->_update_slider_collection($arr_datos_temp,(int)$ins_slider);
                    }
                }else{
                    $this->session->set_flashdata('message', 'error');
                }
                redirect('slider/dashboard/banners/'.$id_slider,'refresh');
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