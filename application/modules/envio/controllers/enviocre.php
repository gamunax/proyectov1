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
class Enviocre extends MX_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('envio_model', 'envios', TRUE);
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
        $data['page_title'] = 'Ventas Crédito';

        ## Template Admin Dashboard
        $data['module'] = 'envio';
        $data['view_file'] = 'enviocredito/index_view';
        echo Modules::run('template/header_login',$data);
        echo Modules::run('template/admin',$data);
        echo Modules::run('template/footer_admin',$data);
    }

    public function buscar_cliente($documento){
        $data = $this->envios->buscar_cliente($documento);
        echo json_encode($data);
    }

    public function validar_os($emios, $nroos){
        $data = $this->envios->validar_os($emios, $nroos);
        echo json_encode($data);
    }

    public function buscar_cliente_paquete($id){
        $data = $this->envios->buscar_cliente_paquete($id);
        echo json_encode($data);
    }

    public function impresionflg(){
        $data = $this->envios->sticker_flg();
        echo json_encode($data);
    }
   

    public function buscar_servicio(){
        $data = $this->envios->buscar_servicio();
        echo json_encode($data);
    }

    public function buscar_tarifa(){
        $data = $this->envios->buscar_tarifa();
        echo json_encode($data);
    }

     public function buscar_tarifa_id($id){
        $data = $this->envios->buscar_tarifa_id($id);
        echo json_encode($data);
    }

    public function buscar_articulo(){
        $data = $this->envios->buscar_articulo();
        echo json_encode($data);
    }
    

     public function buscar_destino(){
        if($_GET['value'] != ""){
            $destino = $_GET['value'];
            $data = $this->envios->buscar_destino($destino);
            echo json_encode($data);
        }
    }

    public function buscar_paquete_tarifa_det($id_paquete, $id_zona){
        $data = $this->envios->buscar_paquete_tarifario_det($id_paquete, $id_zona);
        echo json_encode($data);
    }
    

    public function envio_insertar(){

        

        $array  = json_decode(file_get_contents("php://input"),true);
        $fecha_actual = date("Y-m-d H:i:s");
        
       // $fecha_actual = date('d/m/Y',strtotime($fecha_actual));
        //$nuevafecha = strtotime ( '-1 day' , strtotime ( $fecha_actual ) ) ;
        //$fecha_actual = date ( 'Y-m-j' , $nuevafecha );
        $dt_remito = $this->envios->generar_remito_lima(40);
        $emision   = $dt_remito['EMISION'];
        $remitos = $emision . "#";
        foreach ($array as $value) {
                
                $ope = $this->envios->mostraridoperador(3);
                
                $idoperador = $ope['ID_OPERADOR'];
               // $remito    = $dt_remito['REMITO_INI'] + 1;
                $arr_datos = array(
                'EMISION'      =>  $emision,
                //'REMITO'      =>  $remito,
                'FECHA_REGISTRO' =>  $fecha_actual,
                'CONSIGNADO'    =>  $value['consignado'],
                'ID_UBIGEO'     =>  $value['ubigeo'],
                'ID_OFICINA'    =>  3,
                'ID_OPERADOR'   =>   $idoperador,
                'ORIGEN'        =>  'LIM',
                'ID_DESTINO'    =>  $value['id_destino'],
                'ID_TARIFA'     =>  $value['idtarifa'],
                'DIRECCION_ENTREGA' => $value['direccionentrega'],
                'DNI'           =>  $value['dni'],
                'CELULAR'       =>   $value['celular'],
                'ID_ARTICULO'   =>  $value['idarticulo'],
                'ID_CLIENTE'    =>  $value['idcliente'],
                'DOCUMENTO'     =>  $value['rucdni'],
                'NROCLIENTE'    =>  $value['codigo'],
                'ID_SERVICIO'   =>  $value['idservicio'],
                'TIPO_DOCUMENTO' => $value['tipodocumento'],
                'PREFIJO_DOCUMENTO'=> $value['prefijo'],
                'NUMERO_DOCUMENTO' => $value['numero'],
                'NRO_PIEZA'     =>  $value['pieza'],
                'PESO_REAL'     =>  $value['pesoreal'],
                'PESO_EXCESO'   =>  $value['pesoexceso'],
                'FLG_CARGO_ADJUNTO' => $value['cargoadjunto'],
                'OBSERVACION' => $value['observacion'],
                'NRO_CARGO_ADJUNTO' => $value['nrocargoadjunto'],
                'SERIE_DECLARACION' => $value['seriejurada'],
                'NUMERO_DECLARACION' => $value['numerojurada'],
                'MONTO_ARTICULO' => $value['montoarticulo'],
                'IMPORTE_BASE'  =>   $value['montobase'],
                'IMPORTE_IGV'   =>   $value['igv'],
                'IMPORTE_DESCUENTO' => $value['descuento'],
                'IMPORTE_EXCESO' => $value['montoexceso'] ,
                'IMPORTE_EMBALAJE' => $value['montoembalaje'],
                'IMPORTE_OTROS_COBROS' =>   $value['montootroscobros'],
                'IMPORTE_SUBTOTAL' => $value['valorventa'],
                'IMPORTE_TOTAL' =>  $value['precioventa']
                
            );
            $ins_datos = $this->envios->_insert_envio($arr_datos);
            $remitos = (string)$remitos . (string)$ins_datos . "-";
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
                $data = $remitos;//"OK";
            }else{
                $this->session->set_flashdata('message', 'error');
                $data = "fallo";
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

    public function create_envio(){
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

        $data['page_title'] = 'REGISTRAR ENVIO CREDITO';
        ## Template Admin Dashboard
        $data['module'] = 'envio';
        $data['view_file'] = 'enviocredito/index_view';
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