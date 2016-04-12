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
        $this->load->model('cliente_model', 'clientes', TRUE);
    }

     public function index()
    {
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

        //$data['lst_categoria'] = $this->categoria->_lst_categoria(4);
        $data['clientes_general'] = $this->clientes->list_clientes();
        ## Inicio de Sesión
        $data['page_title'] = 'Dashboard';

        ## Template Admin Dashboard
        $data['module'] = 'cliente';
        $data['view_file'] = 'index_view';
        echo Modules::run('template/header_login',$data);
        echo Modules::run('template/admin',$data);
        echo Modules::run('template/footer_admin',$data);
    }

    public function create_cliente(){
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

        ## Formulario
        

        $data['rucdni'] = array(
            'name'  => 'rucdni',
            'id'    => 'rucdni',
            'class' => 'form-control',
            'type'  => 'text',
            'required' => 'required',
            'value' => $this->form_validation->set_value('rucdni')
        );

        $data['nrocliente'] = array(
            'name'  => 'nrocliente',
            'id'    => 'nrocliente',
            'class' => 'form-control',
            'type'  => 'text',
            'required' => 'required',
            'value' =>'1'
        );

        $data['fechaingreso'] = array(
            'name'  => 'fechaingreso',
            'id'    => 'fechaingreso',
            'class' => 'form-control',
            'type'  => 'date',
            //'required' => 'required',
            'value' => $this->form_validation->set_value('fechaingreso')
        );

        $data['razonsocial'] = array(
            'name'  => 'razonsocial',
            'id'    => 'razonsocial',
            'class' => 'form-control',
            'type'  => 'text',
            //'required' => 'required',
            'value' => $this->form_validation->set_value('razonsocial')
        );

        $data['apepaterno'] = array(
            'name'  => 'apepaterno',
            'id'    => 'apepaterno',
            'class' => 'form-control',
            'type'  => 'text',
            //'required' => 'required',
            'value' => $this->form_validation->set_value('apepaterno')
        );

        $data['apematerno'] = array(
            'name'  => 'apematerno',
            'id'    => 'apematerno',
            'class' => 'form-control',
            'type'  => 'text',
            //'required' => 'required',
            'value' => $this->form_validation->set_value('apematerno')
        );

        $data['nombres'] = array(
            'name'  => 'nombres',
            'id'    => 'nombres',
            'class' => 'form-control',
            'type'  => 'text',
            //'required' => 'required',
            'value' => $this->form_validation->set_value('nombres')
        );

         $data['claveweb'] = array(
            'name'  => 'claveweb',
            'id'    => 'claveweb',
            'class' => 'form-control',
            'type'  => 'text',
            //'required' => 'required',
            'value' => $this->form_validation->set_value('claveweb')
        );

          $data['direccion'] = array(
            'name'  => 'direccion',
            'id'    => 'direccion',
            'class' => 'form-control',
            'type'  => 'text',
            //'required' => 'required',
            'value' => $this->form_validation->set_value('direccion')
        );

        $data['estado'] = '';

        $data['tipo_cliente'] = '';
            
            
        $data['paquete'] = $this->clientes->list_paquetes();

        $data['idpaquete'] = '';

       
        $data['id'] = '';

        $data['img_print'] = '';

        //$data['estado'] = '';
        //$data['id_producto'] = '';
        //$data['categoria'] = $this->productos->_lst_cbo_categoria();
       // $data['idcategoria'] = 0;

        //$data['id_producto_detail'] = '';
        //$data['estado_detail'] = '';

        $data['page_title'] = 'NUEVO';
        ## Template Admin Dashboard
        $data['module'] = 'cliente';
        $data['view_file'] = 'cliente_frm_view';
        //echo Modules::run('template/header_login',$data);
        echo Modules::run('template/admin_ajax',$data);
        //echo Modules::run('template/footer_admin',$data);
    }

    public function cu_create_cliente(){

        $this->form_validation->set_rules('rucdni', 'Rucdni', 'required|xss_clean');
        //$this->form_validation->set_rules('permiso', 'Permiso', 'required|xss_clean');
        //$this->form_validation->set_rules('id', 'Código', 'xss_clean');
        if ($this->form_validation->run() == true)
        {
            $id         = $this->input->post('id');
            $tipo   = $this->input->post('tipo_cliente');
            $rucdni   = $this->input->post('rucdni');
            $nrocliente     = $this->input->post('nrocliente');
            $fechaingreso     = $this->input->post('fechaingreso');
            $razonsocial    = $this->input->post('razonsocial');
            $apepaterno         = $this->input->post('apepaterno');
            $apematerno         = $this->input->post('apematerno');
            $nombres         = $this->input->post('nombres');
            $direccion         = $this->input->post('direccion');
            $estado         = $this->input->post('estado');
            $claveweb         = $this->input->post('claveweb');
            $idpaquete       = $this->input->post('idpaquete');

            $fechaingreso = date("Y-m-d", strtotime($fechaingreso));




            $arr_datos = array(
                'ID'      =>  $id,
                'TIPO_CLIENTE'      =>  $tipo,
                'DOCUMENTO'        =>  $rucdni,
                'NROCLIENTE'        =>  $nrocliente,
                'FECHA_CREACION'       =>  $fechaingreso,
                'RAZON_SOCIAL'      =>  $razonsocial,
                'APELLIDO_PATERNO'      =>  $apepaterno,
                'APELLIDO_MATERNO'      =>  $apematerno,
                'NOMBRES'      =>  $nombres,
                'DIRECCION'      =>  $direccion,
                'ESTADO'      =>  $estado,
                'CLAVE_WEB'    => $claveweb,
            );
            if(!empty($id)){
                /*
                    echo '<pre>';
                    echo $id;
                    print_r($arr_datos);
                    echo '</pre>';
                    //die();
                    print_r($imagen); 
                    die();
                */
                //$imagen = $this->recursos->upload_img_products('imagen','uploads/producto/'.$id_producto.'/',true);
                //if(is_array($imagen)){
                 $upd = $this->clientes->update_cliente($arr_datos,(int)$id);
                 if($upd) {
                    if(empty($idpaquete)){
                        $idpaquete = 4;
                    }
                     $arr_datos = array(
                    'ID_CLIENTE'      =>   $id,
                    'ID_PAQUETE'        =>  $idpaquete,
                    'ESTADO'            => 1,
                    );
                    $cant = $this->clientes->list_cliente_paquete_cant($id);
                   
                    if(count($cant) >0){
                        $upd = $this->clientes->update_cliente_paquete($arr_datos,(int)$id);
                   
                   }else{
                        if(empty($idpaquete)){
                         $idpaquete = 4;
                        }
                        $arr_datos = array(
                        'ID_CLIENTE'      =>   $id,
                        'ID_PAQUETE'        =>  $idpaquete,
                        'ESTADO'            => 1,
                        );
                        $ins_datos = $this->clientes->_insert_clientes_paquete($arr_datos); 
                    }
                    $this->session->set_flashdata('message', 'update');   
                 }else{

                    $this->session->set_flashdata('message', 'error');
                 }
                 
                 
                
                
                ## redirect('producto/repuestos/producto_edit/'.$id_producto,'refresh');
                redirect('cliente/dashboard/','refresh');
            }else{
                $ins_datos = $this->clientes->_insert_clientes($arr_datos);
                if($ins_datos){
                    if(empty($idpaquete)){
                        $idpaquete = 4;
                    }
                    $arr_datos = array(
                    'ID_CLIENTE'      =>   $ins_datos,
                    'ID_PAQUETE'        =>  $idpaquete,
                    'ESTADO'            => 1,
                    );
                    $ins_datos = $this->clientes->_insert_clientes_paquete($arr_datos);
                    //$imagen = $this->recursos->upload_img_products('imagen','uploads/producto/'.$ins_datos.'/',true);
                    /*if(is_array($imagen)){
                        $this->session->set_flashdata('message', 'error');
                    }else{
                        $this->session->set_flashdata('message', 'insert');
                        $arr_datos_temp = array(
                            'prod_img_grande'   => $imagen,
                            'prod_img_small'    => $imagen
                        );
                        $this->productos->_update_productos($arr_datos_temp,(int)$ins_datos);
                    }*/
                    $this->session->set_flashdata('message', 'insert');
                }else{
                    $this->session->set_flashdata('message', 'error');
                }
                ## redirect('producto/repuestos/producto_edit/'.$ins_datos,'refresh');
                redirect('cliente/dashboard/','refresh');
            }
        }else{
            $this->session->set_flashdata('message', 'error');
            print_r(validation_errors());
            //redirect('producto/repuestos','refresh');
        }
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
                'estado'   => 0,
            );
        }elseif($tipo == 1 and $tipo != null ){
            $this->session->set_flashdata('message', 'update');
            $additional_data = array(
                'estado'   => 1,
            );
        }else{
            $this->session->set_flashdata('message', 'delete');
            $additional_data = array(
                'estado'   => 2,
            );
        }

        $this->clientes->update_cliente($additional_data,$id);
        // $this->session->set_flashdata('message', 'delete');
        redirect(base_url().'cliente/dashboard','refresh');
    }

    public function cliente_edit($id = NULL){
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

        $dt_cliente = $this->clientes->_obtener_datos_clientes((int)$id);
        if(count($dt_cliente)!=0){
            ## Formulario
                $fechaingreso = date("Y-m-d", strtotime($dt_cliente['FECHA_CREACION']));
                $data['tipo_cliente'] = $dt_cliente['TIPO_CLIENTE'];
                

                $data['rucdni'] = array(
                    'name'  => 'rucdni',
                    'id'    => 'rucdni',
                    'class' => 'form-control',
                    'type'  => 'text',
                    'required' => 'required',
                    'value' => $dt_cliente['DOCUMENTO']
                );

                $data['nrocliente'] = array(
                    'name'  => 'nrocliente',
                    'id'    => 'nrocliente',
                    'class' => 'form-control',
                    'type'  => 'text',
                    'required' => 'required',
                    'value' => $dt_cliente['NROCLIENTE']
                );

                $data['fechaingreso'] = array(
                    'name'  => 'fechaingreso',
                    'id'    => 'fechaingreso',
                    'class' => 'form-control',
                    'type'  => 'date',
                    //'required' => 'required',
                    'value' => $fechaingreso
                );

                 $data['razonsocial'] = array(
                    'name'  => 'razonsocial',
                    'id'    => 'razonsocial',
                    'class' => 'form-control',
                    'type'  => 'text',
                    //'required' => 'required',
                    'value' => $dt_cliente['RAZON_SOCIAL']
                );

                  $data['apepaterno'] = array(
                    'name'  => 'apepaterno',
                    'id'    => 'apepaterno',
                    'class' => 'form-control',
                    'type'  => 'text',
                    //'required' => 'required',
                    'value' => $dt_cliente['APELLIDO_PATERNO']
                );

                   $data['apematerno'] = array(
                    'name'  => 'apematerno',
                    'id'    => 'apematerno',
                    'class' => 'form-control',
                    'type'  => 'text',
                    //'required' => 'required',
                    'value' => $dt_cliente['APELLIDO_MATERNO']
                );

                    $data['nombres'] = array(
                    'name'  => 'nombres',
                    'id'    => 'nombres',
                    'class' => 'form-control',
                    'type'  => 'text',
                    //'required' => 'required',
                    'value' => $dt_cliente['NOMBRES']
                );

                     $data['direccion'] = array(
                    'name'  => 'direccion',
                    'id'    => 'direccion',
                    'class' => 'form-control',
                    'type'  => 'text',
                    //'required' => 'required',
                    'value' => $dt_cliente['DIRECCION']
                );

                 $data['claveweb'] = array(
                'name'  => 'claveweb',
                'id'    => 'claveweb',
                'class' => 'form-control',
                'type'  => 'text',
                //'required' => 'required',
                'value' => $dt_cliente['CLAVE_WEB']
                 );

             
                
            ##
           
            $data['estado']      = $dt_cliente['ESTADO'];
            $data['id']          = $dt_cliente['ID'];
            $data['paquete'] = $this->clientes->list_paquetes();
             $data['idpaquete']  = '';
            $dt_cliente_paquete = $this->clientes->_obtener_datos_paquete_cliente((int)$dt_cliente['ID']);


            if(count($dt_cliente_paquete)!=0){
             $data['idpaquete'] = $dt_cliente_paquete['ID_PAQUETE'];
            
            }


            

            ## Listado de detalle de productos
                

            $data['page_title'] = 'Editar';
            ## Template Admin Dashboard
            $data['module'] = 'cliente';
            $data['view_file'] = 'cliente_frm_view';
            ## echo Modules::run('template/header_login',$data);
            echo Modules::run('template/admin_ajax',$data);
            ## echo Modules::run('template/footer_admin',$data);
        }elseif($id == '' or is_string($id)){
            redirect('cliente/dashboard','refresh');
        }
    }

}

?>