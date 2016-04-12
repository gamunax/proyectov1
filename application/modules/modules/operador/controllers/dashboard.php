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
        $this->load->model('operador_model', 'operadores', TRUE);
    }

     public function index()
    {
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

        //$data['lst_categoria'] = $this->categoria->_lst_categoria(4);
        $data['operadores_general'] = $this->operadores->list_operadores();
        ## Inicio de Sesión
        $data['page_title'] = 'Dashboard';

        ## Template Admin Dashboard
        $data['module'] = 'operador';
        $data['view_file'] = 'index_view';
        echo Modules::run('template/header_login',$data);
        echo Modules::run('template/admin',$data);
        echo Modules::run('template/footer_admin',$data);
    }

    public function create_operador(){
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

        ## Formulario
        $data['codoperador'] = array(
            'name'  => 'codoperador',
            'id'    => 'codoperador',
            'class' => 'form-control',
            'type'  => 'text',
            'required' => 'required',
            'value' => $this->form_validation->set_value('codoperador')
        );

        $data['apellidopaterno'] = array(
            'name'  => 'apellidopaterno',
            'id'    => 'apellidopaterno',
            'class' => 'form-control',
            'type'  => 'text',
            'required' => 'required',
            'value' => $this->form_validation->set_value('apellidopaterno')
        );

        $data['apellidomaterno'] = array(
        'name'  => 'apellidomaterno',
        'id'    => 'apellidomaterno',
        'class' => 'form-control',
        'type'  => 'text',
        'required' => 'required',
        'value' => $this->form_validation->set_value('apellidomaterno')
        );

        $data['nombres'] = array(
        'name'  => 'nombres',
        'id'    => 'nombres',
        'class' => 'form-control',
        'type'  => 'text',
        'required' => 'required',
        'value' => $this->form_validation->set_value('nombres')
        );


        $data['dni'] = array(
        'name'  => 'dni',
        'id'    => 'dni',
        'class' => 'form-control',
        'type'  => 'text',
        'required' => 'required',
        'value' => $this->form_validation->set_value('dni')
        );

        $data['celular'] = array(
        'name'  => 'celular',
        'id'    => 'celular',
        'class' => 'form-control',
        'type'  => 'text',
        'required' => 'required',
        'value' => $this->form_validation->set_value('celular')
        );

        $data['tipooperador'] = array(
        'name'  => 'tipooperador',
        'id'    => 'tipooperador',
        'class' => 'form-control',
        'type'  => 'text',
        'required' => 'required',
        'value' => $this->form_validation->set_value('tipooperador')
        );
       
        

        $data['estado'] = '';
            
        

     

       
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
        $data['module'] = 'operador';
        $data['view_file'] = 'operador_frm_view';
        //echo Modules::run('template/header_login',$data);
        echo Modules::run('template/admin_ajax',$data);
        //echo Modules::run('template/footer_admin',$data);
    }

    public function cu_create_operador(){

        $this->form_validation->set_rules('apellidopaterno', 'Apellidopaterno', 'required|xss_clean');
        if ($this->form_validation->run() == true)
        {
            $id              = $this->input->post('id');
            $codoperador     = $this->input->post('codoperador');
            $apellidopaterno = $this->input->post('apellidopaterno');
            $apellidomaterno = $this->input->post('apellidomaterno');
            $nombres         = $this->input->post('nombres');
            $dni             = $this->input->post('dni');
            $celular         = $this->input->post('celular');
            $tipooperador    = $this->input->post('tipooperador');
            $estado          = $this->input->post('estado');
            
            

            $arr_datos = array(
                'COD_OPERADOR' => $codoperador,
                'APELLIDO_PATERNO' => $apellidopaterno,
                'APELLIDO_MATERNO' => $apellidomaterno,
                'NOMBRES'          => $nombres,
                'DNI'              => $dni,
                'CELULAR'          => $celular,
                'TIPO_OPERADOR'    => $tipooperador,
                'ESTADO'        =>  $estado,
                
                
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
                 $upd = $this->operadores->update_operador($arr_datos,(int)$id);
                 if($upd) {
                    $this->session->set_flashdata('message', 'update');   
                 }else{
                    $this->session->set_flashdata('message', 'error');
                 }
                 
                 
                
                
                ## redirect('producto/repuestos/producto_edit/'.$id_producto,'refresh');
                redirect('operador/dashboard/','refresh');
            }else{
                $ins_datos = $this->operadores->_insert_operadores($arr_datos);
                if($ins_datos){
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
                redirect('operador/dashboard/','refresh');
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

        $this->operadores->update_operador($additional_data,$id);
        // $this->session->set_flashdata('message', 'delete');
        redirect(base_url().'operador/dashboard','refresh');
    }

    public function operador_edit($id = NULL){
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

        $dt_operador = $this->operadores->_obtener_datos_operadores((int)$id);
        if(count($dt_operador)!=0){
            ## Formulario

                

            $data['codoperador'] = array(
                'name'  => 'codoperador',
                'id'    => 'codoperador',
                'class' => 'form-control',
                'type'  => 'text',
                'required' => 'required',
                'value' => $dt_operador['COD_OPERADOR']
            );

            $data['apellidopaterno'] = array(
                'name'  => 'apellidopaterno',
                'id'    => 'apellidopaterno',
                'class' => 'form-control',
                'type'  => 'text',
                'required' => 'required',
                'value' => $dt_operador['APELLIDO_PATERNO']
            );
            $data['apellidomaterno'] = array(
                'name'  => 'apellidomaterno',
                'id'    => 'apellidomaterno',
                'class' => 'form-control',
                'type'  => 'text',
                'required' => 'required',
                'value' => $dt_operador['APELLIDO_MATERNO']
            );
            $data['nombres'] = array(
                'name'  => 'nombres',
                'id'    => 'nombres',
                'class' => 'form-control',
                'type'  => 'text',
                'required' => 'required',
                'value' => $dt_operador['NOMBRES']
            );
            $data['dni'] = array(
                'name'  => 'dni',
                'id'    => 'dni',
                'class' => 'form-control',
                'type'  => 'text',
                'required' => 'required',
                'value' => $dt_operador['DNI']
            );
            $data['celular'] = array(
                'name'  => 'celular',
                'id'    => 'celular',
                'class' => 'form-control',
                'type'  => 'text',
                'required' => 'required',
                'value' => $dt_operador['CELULAR']
            );
            $data['tipooperador'] = array(
                'name'  => 'tipooperador',
                'id'    => 'tipooperador',
                'class' => 'form-control',
                'type'  => 'text',
                'required' => 'required',
                'value' => $dt_operador['TIPO_OPERADOR']
            );

              
                 

                
            ##
            $data['estado']      = $dt_operador['ESTADO'];
            $data['id']          = $dt_operador['ID'];
            


            ## Listado de detalle de productos
                

            $data['page_title'] = 'Editar';
            ## Template Admin Dashboard
            $data['module'] = 'operador';
            $data['view_file'] = 'operador_frm_view';
            ## echo Modules::run('template/header_login',$data);
            echo Modules::run('template/admin_ajax',$data);
            ## echo Modules::run('template/footer_admin',$data);
        }elseif($id == '' or is_string($id)){
            redirect('operador/dashboard','refresh');
        }
    }

}

?>