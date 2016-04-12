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
        $this->load->model('liquidacion_model', 'liquidaciones', TRUE);
    }

     public function index()
    {
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

        //$data['lst_categoria'] = $this->categoria->_lst_categoria(4);
        //$data['clientes_general'] = $this->clientes->list_clientes();
        ## Inicio de Sesión
        $data['page_title'] = 'Dashboard';

        ## Template Admin Dashboard
        $data['module'] = 'liquidacion';
        $data['view_file'] = 'index_view';
        echo Modules::run('template/header_login',$data);
        echo Modules::run('template/admin',$data);
        echo Modules::run('template/footer_admin',$data);
    }

    public function buscar_remito($remito){
        $flag_cargo_adjunto = substr($remito, 0,1);
        $emision = substr($remito, 1,2);
        $remito = (int) substr($remito, 3);
        $data = $this->liquidaciones->buscar_remito($emision, $remito);
        echo json_encode($data);
    }

    public function buscar_remito_seg($emision, $remito){
        
        $data = $this->liquidaciones->return_envio($emision, $remito);
        echo json_encode($data);
    }


     public function buscarliquidacion(){
        $fecha = $_GET['fecha'];
        $salida = $_GET['salida'];
        $operador = $_GET['operador'];

        $data = $this->liquidaciones->buscarliquidacion($fecha, $salida, $operador);
        echo json_encode($data);
    }





     public function buscar_operador($codigo){
        $data = $this->liquidaciones->buscar_operador($codigo);
        echo json_encode($data);
    }

    public function liquidacion_insertar(){

        

        $array  = json_decode(file_get_contents("php://input"),true);
        $fecha_actual = date("Y-m-d");

        
        
        
        foreach ($array as $value) {
                $dt_remito = $this->liquidaciones->max_nro_veces($value['EMISION'], $value['REMITO']);
                //$fecha_salida = date("Y-m-d", strtotime($value['fechasalida']));
                //$emision   = $dt_remito['EMISION'];
               // $remito    = $dt_remito['REMITO_INI'] + 1;
                $nroveces = $dt_remito['nroveces'] + 1;
                $accion = $value['idevento'];
                if($accion == 'enter'){
                    $arr_datos = array(
                    'EMISION'      =>  $value['EMISION'],
                    'REMITO'      =>  $value['REMITO'],
                    'NROVECES'      => $nroveces,
                    'FECHA_ASIGNA' => $fecha_actual,
                    'SALIDA' => $value['salida'],
                    'FECHA_SALIDA' => $value['fechasalida'],
                    'ID_OPERADOR' =>  $value['idoperador'],
                    'ESTADO' => $value['ESTADO'],
                    'UBICACION' => 'LIM'
                
                    );
                    $ins_datos = $this->liquidaciones->_insert_liquidacion($arr_datos);
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
                        $data = "OK";
                    }else{
                        $this->session->set_flashdata('message', 'error');
                        $data = "fallo";
                    }
                }
        }

      
        /*$arr_datos = array(
                'COD_USUARIO'      =>  $cod_usuario,
                'CLAVE'      =>  $clave,
                'NOMBRE'        =>  $nombre,
                'ESTADO'        =>  $estado,
                'PERFIL'       =>  $permiso,
                
        );*/

        
        echo json_encode($data);
        ## redirect('producto/repuestos/producto_edit/'.$ins_datos,'refresh');
        //redirect('envio/dashboard/','refresh');

    }

    public function create_liquidacion(){
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

       
        //$data['estado'] = '';
        //$data['id_producto'] = '';
        //$data['categoria'] = $this->productos->_lst_cbo_categoria();
       // $data['idcategoria'] = 0;

        //$data['id_producto_detail'] = '';
        //$data['estado_detail'] = '';

        $data['page_title'] = 'REGISTRAR LIQUIDACION DE ENVIOS';
        ## Template Admin Dashboard
        $data['module'] = 'liquidacion';
        $data['view_file'] = 'index_view';
        echo Modules::run('template/header_login',$data);
        echo Modules::run('template/admin',$data);
        echo Modules::run('template/footer_admin',$data);
        
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

    public function cliente_edit($id = NULL){
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

        $dt_cliente = $this->clientes->_obtener_datos_clientes((int)$id);
        if(count($dt_cliente)!=0){
            ## Formulario

                $data['tipo'] = array(
                    'name'  => 'tipo',
                    'id'    => 'tipo',
                    'class' => 'form-control',
                    'type'  => 'text',
                    'required' => 'required',
                    'value' => $dt_cliente['TIPO_CLIENTE']
                );

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
                    'required' => 'required',
                    'value' => $dt_cliente['FECHA_CREACION']
                );

                 $data['razonsocial'] = array(
                    'name'  => 'razonsocial',
                    'id'    => 'razonsocial',
                    'class' => 'form-control',
                    'type'  => 'text',
                    'required' => 'required',
                    'value' => $dt_cliente['RAZON_SOCIAL']
                );

                  $data['apepaterno'] = array(
                    'name'  => 'apepaterno',
                    'id'    => 'apepaterno',
                    'class' => 'form-control',
                    'type'  => 'text',
                    'required' => 'required',
                    'value' => $dt_cliente['APELLIDO_PATERNO']
                );

                   $data['apematerno'] = array(
                    'name'  => 'apematerno',
                    'id'    => 'apematerno',
                    'class' => 'form-control',
                    'type'  => 'text',
                    'required' => 'required',
                    'value' => $dt_cliente['APELLIDO_MATERNO']
                );

                    $data['nombres'] = array(
                    'name'  => 'nombres',
                    'id'    => 'nombres',
                    'class' => 'form-control',
                    'type'  => 'text',
                    'required' => 'required',
                    'value' => $dt_cliente['NOMBRES']
                );

                     $data['direccion'] = array(
                    'name'  => 'direccion',
                    'id'    => 'direccion',
                    'class' => 'form-control',
                    'type'  => 'text',
                    'required' => 'required',
                    'value' => $dt_cliente['DIRECCION']
                );

             
                
            ##
            $data['estado']      = $dt_cliente['ESTADO'];
            $data['id']          = $dt_cliente['ID'];
            


            ## Listado de detalle de productos
                

            $data['page_title'] = 'Editar';
            ## Template Admin Dashboard
            $data['module'] = 'cliente';
            $data['view_file'] = 'cliente_frm_view';
            ## echo Modules::run('template/header_login',$data);
            echo Modules::run('template/admin_ajax',$data);
            ## echo Modules::run('template/footer_admin',$data);
        }elseif($id == '' or is_string($id)){
            redirect('usuario/dashboard','refresh');
        }
    }

}

?>