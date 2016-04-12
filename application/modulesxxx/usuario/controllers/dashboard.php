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
        $this->load->model('usuarios_model', 'usuarios', TRUE);
	}

	 public function index()
    {
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

        //$data['lst_categoria'] = $this->categoria->_lst_categoria(4);
        $data['usuarios_general'] = $this->usuarios->_lst_usuarios();
        ## Inicio de Sesión
        $data['page_title'] = 'Dashboard';

        ## Template Admin Dashboard
        $data['module'] = 'usuario';
        $data['view_file'] = 'index_view';
        echo Modules::run('template/header_login',$data);
        echo Modules::run('template/admin',$data);
        echo Modules::run('template/footer_admin',$data);
    }

    public function create_usuario(){
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

        ## Formulario
        $data['cod_usuario'] = array(
            'name'  => 'cod_usuario',
            'id'    => 'cod_usuario',
            'class' => 'form-control',
            'type'  => 'text',
            'required' => 'required',
            'value' => $this->form_validation->set_value('cod_usuario')
        );

        $data['clave'] = array(
            'name'  => 'clave',
            'id'    => 'clave',
            'class' => 'form-control',
            'type'  => 'text',
            'required' => 'required',
            'value' => $this->form_validation->set_value('clave')
        );

        $data['nombre'] = array(
            'name'  => 'nombre',
            'id'    => 'nombre',
            'class' => 'form-control',
            'type'  => 'text',
            'required' => 'required',
            'value' => $this->form_validation->set_value('nombre')
        );

        $data['estado'] = '';
            
        

     

        $data['permiso'] = '';
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
        $data['module'] = 'usuario';
        $data['view_file'] = 'usuario_frm_view';
        //echo Modules::run('template/header_login',$data);
        echo Modules::run('template/admin_ajax',$data);
        //echo Modules::run('template/footer_admin',$data);
    }

    public function cu_create_usuario(){

        $this->form_validation->set_rules('cod_usuario', 'Usuario', 'required|xss_clean');
        $this->form_validation->set_rules('clave', 'Clave', 'required|xss_clean');
        $this->form_validation->set_rules('nombre', 'Nombre', 'required|xss_clean');
        $this->form_validation->set_rules('estado', 'Estado', 'required|xss_clean');
        //$this->form_validation->set_rules('permiso', 'Permiso', 'required|xss_clean');
        //$this->form_validation->set_rules('id', 'Código', 'xss_clean');
        if ($this->form_validation->run() == true)
        {
            $id         = $this->input->post('id');
            $cod_usuario   = $this->input->post('cod_usuario');
            $clave   = sha1($this->input->post('clave'));
            $nombre     = $this->input->post('nombre');
            $estado     = $this->input->post('estado');
            $permiso    = $this->input->post('permiso');
            

            $arr_datos = array(
                'COD_USUARIO'      =>  $cod_usuario,
                'CLAVE'      =>  $clave,
                'NOMBRE'        =>  $nombre,
                'ESTADO'        =>  $estado,
                'PERFIL'       =>  $permiso,
                
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
                 $upd = $this->usuarios->_update_usuarios($arr_datos,(int)$id);
                 if($upd) {
                    $this->session->set_flashdata('message', 'update');   
                 }else{
                    $this->session->set_flashdata('message', 'error');
                 }
                 
                 
                
                
                ## redirect('producto/repuestos/producto_edit/'.$id_producto,'refresh');
                redirect('usuario/dashboard/','refresh');
            }else{
                $ins_datos = $this->usuarios->_insert_usuarios($arr_datos);
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
                redirect('usuario/dashboard/','refresh');
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

        $this->usuarios->_update_usuarios($additional_data,$id);
        // $this->session->set_flashdata('message', 'delete');
        redirect(base_url().'usuario/dashboard','refresh');
    }

    public function usuario_edit($id = NULL){
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

        $dt_usuario = $this->usuarios->_obtener_datos_usuarios((int)$id);
        if(count($dt_usuario)!=0){
            ## Formulario
                $data['cod_usuario'] = array(
                    'name'  => 'cod_usuario',
                    'id'    => 'cod_usuario',
                    'class' => 'form-control',
                    'type'  => 'text',
                    'required' => 'required',
                    'value' => $dt_usuario['COD_USUARIO']
                );

                $data['clave'] = array(
                    'name'  => 'clave',
                    'id'    => 'clave',
                    'class' => 'form-control',
                    'type'  => 'text',
                    'required' => 'required',
                    'value' => $dt_usuario['CLAVE']
                );

                $data['nombre'] = array(
                    'name'  => 'nombre',
                    'id'    => 'nombre',
                    'class' => 'form-control',
                    'type'  => 'text',
                    'required' => 'required',
                    'value' => $dt_usuario['NOMBRE']
                );

             
                
            ##
            $data['estado']      = $dt_usuario['ESTADO'];
            $data['id']          = $dt_usuario['ID'];
            $data['permiso']     = $dt_usuario['PERFIL'];


            ## Listado de detalle de productos
                

            $data['page_title'] = 'Editar';
            ## Template Admin Dashboard
            $data['module'] = 'usuario';
            $data['view_file'] = 'usuario_frm_view';
            ## echo Modules::run('template/header_login',$data);
            echo Modules::run('template/admin_ajax',$data);
            ## echo Modules::run('template/footer_admin',$data);
        }elseif($id == '' or is_string($id)){
            redirect('usuario/dashboard','refresh');
        }
    }

}

?>