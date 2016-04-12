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
class Equipos extends MX_Controller
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

        $data['productos_general'] = $this->productos->_lst_productos('equipos');
        ## Inicio de Sesión
        $data['page_title'] = 'Equipos';

        ## Template Admin Dashboard
        $data['module'] = 'producto';
        $data['view_file'] = 'equipos/lst_repuestos_view';
        echo Modules::run('template/header_login',$data);
        echo Modules::run('template/admin',$data);
        echo Modules::run('template/footer_admin',$data);
    }

    public function create_producto(){
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

        $data['descripcion'] = array(
            'name'  => 'descripcion',
            'id'    => 'descripcion',
            'class' => 'form-control',
            'type'  => 'text',
            'required' => 'required',
            'value' => $this->form_validation->set_value('descripcion')
        );

        $data['precio'] = array(
            'name'  => 'precio',
            'id'    => 'precio',
            'class' => 'form-control',
            'type'  => 'text',
            'required' => 'required',
            'value' => $this->form_validation->set_value('precio')
        );

        $data['stock'] = array(
            'name'  => 'stock',
            'id'    => 'stock',
            'class' => 'form-control',
            'type'  => 'text',
            'required' => 'required',
            'value' => $this->form_validation->set_value('stock')
        );

        $data['imagen'] = array(
            'name'  => 'imagen',
            'id'    => 'imagen',    
            'data-classButton' => 'btn btn-default' ,
            'data-classInput' => 'form-control inline v-middle input-s',
            'type'  => 'file',
            'value' => $this->form_validation->set_value('imagen'),
        );

        $data['imagen_detail'] = array(
            'name'  => 'imagen_detail',
            'id'    => 'imagen_detail',    
            'data-classButton' => 'btn btn-default' ,
            'data-classInput' => 'form-control inline v-middle input-s',
            'type'  => 'file',
            'value' => $this->form_validation->set_value('imagen_detail'),
        );

        $data['img_print'] = '';

        $data['estado'] = '';
        $data['id_producto'] = '';
        $data['categoria'] = $this->productos->_lst_cbo_categoria();
        $data['idcategoria'] = 0;

        $data['id_producto_detail'] = '';
        $data['estado_detail'] = '';

        $data['page_title'] = 'Nuevo';
        ## Template Admin Dashboard
        $data['module'] = 'producto';
        $data['view_file'] = 'equipos/producto_frm_view';
        //echo Modules::run('template/header_login',$data);
        echo Modules::run('template/admin_ajax',$data);
        //echo Modules::run('template/footer_admin',$data);
    }

    public function producto_edit($id = NULL){
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

        $dt_producto = $this->productos->_obtener_datos_productos((int)$id);
        if(count($dt_producto)!=0){
            ## Formulario
                $data['nombre'] = array(
                    'name'  => 'nombre',
                    'id'    => 'nombre',
                    'class' => 'form-control',
                    'type'  => 'text',
                    'required' => 'required',
                    'value' => $dt_producto['prod_nombre']
                );

                $data['descripcion'] = array(
                    'name'  => 'descripcion',
                    'id'    => 'descripcion',
                    'class' => 'form-control',
                    'type'  => 'text',
                    'required' => 'required',
                    'value' => $dt_producto['prod_descripcion']
                );

                $data['precio'] = array(
                    'name'  => 'precio',
                    'id'    => 'precio',
                    'class' => 'form-control',
                    'type'  => 'text',
                    'required' => 'required',
                    'value' => $dt_producto['prod_precio']
                );

                $data['stock'] = array(
                    'name'  => 'stock',
                    'id'    => 'stock',
                    'class' => 'form-control',
                    'type'  => 'text',
                    'required' => 'required',
                    'value' => $dt_producto['prod_stock']
                );

                $data['imagen'] = array(
                    'name'  => 'imagen',
                    'id'    => 'imagen',    
                    'data-classButton' => 'btn btn-default' ,
                    'data-classInput' => 'form-control inline v-middle input-s',
                    'type'  => 'file',
                    'value' => $dt_producto['prod_img_grande']
                );

                $data['imagen_detail'] = array(
                    'name'  => 'imagen_detail',
                    'id'    => 'imagen_detail',    
                    'data-classButton' => 'btn btn-default' ,
                    'data-classInput' => 'form-control inline v-middle input-s',
                    'type'  => 'file',
                    'value' => $this->form_validation->set_value('imagen_detail'),
                );

                $data['img_print'] = $dt_producto['prod_img_grande'];

            ##
            $data['estado']      = $dt_producto['prod_estado'];
            $data['id_producto'] = $dt_producto['prod_id'];
            $data['categoria']   = $this->productos->_lst_cbo_categoria();
            $data['idcategoria'] = $dt_producto['prod_cat_id'];

            ## Listado de detalle de productos
                $data['productos_detail']   = $this->productos->_lst_productos_details((int)$dt_producto['prod_id']);
                $data['estado_detail'] = '';
                $data['id_producto_detail'] = '';


            $data['page_title'] = 'Editar';
            ## Template Admin Dashboard
            $data['module'] = 'producto';
            $data['view_file'] = 'equipos/producto_frm_view';
            ## echo Modules::run('template/header_login',$data);
            echo Modules::run('template/admin_ajax',$data);
            ## echo Modules::run('template/footer_admin',$data);
        }elseif($id == '' or is_string($id)){
            redirect('producto/dashboard','refresh');
        }
    }

    public function cu_create_producto(){

        $this->form_validation->set_rules('nombre', 'Nombre', 'required|xss_clean');
        $this->form_validation->set_rules('descripcion', 'descripción', 'required|xss_clean');
        $this->form_validation->set_rules('precio', 'Precio', 'required|xss_clean');
        $this->form_validation->set_rules('stock', 'Stock', 'required|xss_clean');
        $this->form_validation->set_rules('estado', 'Estado', 'required|xss_clean');
        $this->form_validation->set_rules('id', 'Código', 'xss_clean');
        if ($this->form_validation->run() == true)
        {
            $id_producto = $this->input->post('id_producto');
            $categoria   = $this->input->post('idcategoria');
            $descripcion = $this->input->post('descripcion');
            $nombre      = $this->input->post('nombre');
            $estado      = $this->input->post('estado');
            $precio      = $this->input->post('precio');
            $stock       = $this->input->post('stock');
            $tipo        = $this->input->post('tipo');

            $arr_datos = array(
                'prod_descripcion'      =>  $descripcion,
                'prod_nombre'           =>  $nombre,
                'prod_cat_id'           =>  $categoria,
                'prod_precio'           =>  $precio,
                'prod_tipo'             =>  $tipo,
                'prod_stock'            =>  $stock,
                'prod_estado'           =>  $estado,
                'prod_fecha_creacion'   =>  date('Y-m-d H:m:s'),
            );
            if(!empty($id_producto)){
                /*
                    echo '<pre>';
                    echo $id_producto;
                    print_r($arr_datos);
                    echo '</pre>';
                    //die();
                    print_r($imagen); 
                    die();
                */
                $imagen = $this->recursos->upload_img_products('imagen','uploads/producto/'.$id_producto.'/',true);
                if(is_array($imagen)){
                    $this->session->set_flashdata('message', 'update');
                    $this->productos->_update_productos($arr_datos,(int)$id_producto);
                }else{
                    $this->session->set_flashdata('message', 'update');
                    $arr_datos_temp = array(
                        'prod_img_grande'   => $imagen,
                        'prod_img_small'    => $imagen
                    );
                    $arr_inst_datos = array_merge($arr_datos,$arr_datos_temp);
                    $this->productos->_update_productos($arr_inst_datos,(int)$id_producto);
                }
                ## redirect('producto/equipos/producto_edit/'.$id_producto,'refresh');
                redirect('producto/equipos','refresh');
            }else{
                $ins_datos = $this->productos->_insert_productos($arr_datos);
                if($ins_datos){
                    $imagen = $this->recursos->upload_img_products('imagen','uploads/producto/'.$ins_datos.'/',true);
                    if(is_array($imagen)){
                        $this->session->set_flashdata('message', 'error');
                    }else{
                        $this->session->set_flashdata('message', 'insert');
                        $arr_datos_temp = array(
                            'prod_img_grande'   => $imagen,
                            'prod_img_small'    => $imagen
                        );
                        $this->productos->_update_productos($arr_datos_temp,(int)$ins_datos);
                    }
                }else{
                    $this->session->set_flashdata('message', 'error');
                }
                ## redirect('producto/equipos/producto_edit/'.$ins_datos,'refresh');
                redirect('producto/equipos','refresh');
            }
        }else{
            $this->session->set_flashdata('message', 'error');
            print_r(validation_errors());
            //redirect('producto/repuestos','refresh');
        }
    }

    public function cu_create_producto_detail(){

        $this->form_validation->set_rules('estado', 'Estado', 'required|xss_clean');
        $this->form_validation->set_rules('id', 'Código', 'xss_clean');
        if ($this->form_validation->run() == true)
        {
            $id_producto        = $this->input->post('id_producto');
            $id_producto_detail = $this->input->post('id_producto_detail');
            $estado             = $this->input->post('estado');

            $arr_datos = array(
                'gale_producto_id'   =>  $id_producto,
                'gale_estado'        =>  $estado
                // 'gale_imagen_grande'    =>  $nombre,
            );

            if(!empty($id_producto_detail)){
                $imagen = $this->recursos->upload_img_products('imagen','uploads/producto/'.$id_producto.'/',true);
                if(is_array($imagen)){
                    $this->session->set_flashdata('message', 'update');
                    $this->productos->_update_productos_detail($arr_datos,(int)$id_producto_detail);
                }else{
                    $this->session->set_flashdata('message', 'update');
                    $arr_datos_temp = array(
                        'gale_imagen_grande'    => $imagen,
                    );
                    $arr_inst_datos = array_merge($arr_datos,$arr_datos_temp);
                    $this->productos->_update_productos_detail($arr_inst_datos,(int)$id_producto_detail);
                }
                ## redirect('producto/equipos/producto_edit/'.$id_producto,'refresh');
                redirect('producto/equipos/','refresh');
            }else{
                $ins_datos = $this->productos->_insert_productos_detail($arr_datos);
                if($ins_datos){
                    $imagen = $this->recursos->upload_img_products('imagen','uploads/producto/'.$id_producto.'/',true);
                    if(is_array($imagen)){
                        $this->session->set_flashdata('message', 'error');
                    }else{
                        $this->session->set_flashdata('message', 'insert');
                        $arr_datos_temp = array(
                            'gale_imagen_grande'    => $imagen,
                        );
                        $this->productos->_update_productos_detail($arr_datos_temp,(int)$ins_datos);
                    }
                }else{
                    $this->session->set_flashdata('message', 'error');
                }
                ## redirect('producto/equipos/producto_edit/'.$id_producto,'refresh');
                redirect('producto/equipos/','refresh');
            }
        }else{
            $this->session->set_flashdata('message', 'error');
            print_r(validation_errors());
            redirect('producto/equipos','refresh');
        }
    }

    public function delete_detail($id,$prod,$tipo = null){
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

        ## Programing
            // 0 = Desactivado
            // 1 = Activado
            // 2 = Eliminado
        if($tipo == 0 and $tipo != null ){
            $this->session->set_flashdata('message', 'update');
            $additional_data = array(
                'gale_estado'   => 0,
            );
        }elseif($tipo == 1 and $tipo != null ){
            $this->session->set_flashdata('message', 'update');
            $additional_data = array(
                'gale_estado'   => 1,
            );
        }else{
            $this->session->set_flashdata('message', 'delete');
            $additional_data = array(
                'gale_estado'   => 2,
            );
        }

        $this->productos->_update_productos_detail($additional_data,$id);
        // $this->session->set_flashdata('message', 'delete');
        // print_r($additional_data);
        redirect(base_url().'producto/equipos/producto_edit/'.$prod,'refresh');
    }

    public function delete($id,$tipo = null){
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

        ## Programing
            // 0 = Desactivado
            // 1 = Activado
            // 2 = Eliminado
        if($tipo == 0 and $tipo != null ){
            $this->session->set_flashdata('message', 'update');
            $additional_data = array(
                'prod_estado'   => 0,
            );
        }elseif($tipo == 1 and $tipo != null ){
            $this->session->set_flashdata('message', 'update');
            $additional_data = array(
                'prod_estado'   => 1,
            );
        }else{
            $this->session->set_flashdata('message', 'delete');
            $additional_data = array(
                'prod_estado'   => 2,
            );
        }

        $this->productos->_update_productos($additional_data,$id);
        // $this->session->set_flashdata('message', 'delete');
        redirect(base_url().'producto/equipos','refresh');
    }

}

/*
*end modules/login/controllers/dashboard.php
*/