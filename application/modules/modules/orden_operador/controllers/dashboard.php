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
        $this->load->model('orden_operador_model', 'orden_operadores', TRUE);
    }

     public function index()
    {
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

        
        $data['orden_operadores_general'] = $this->orden_operadores->list_orden_operadores();
        ## Inicio de Sesión
        $data['page_title'] = 'Dashboard';

        ## Template Admin Dashboard
        $data['module'] = 'orden_operador';
        $data['view_file'] = 'index_view';
        
        echo Modules::run('template/header_login',$data);
        echo Modules::run('template/admin',$data);
        echo Modules::run('template/footer_admin',$data);
    }


    public function list_oficinas(){
        $data = $this->orden_operadores->list_oficinas();
        echo json_encode($data);
    }


    public function create_orden_operador(){
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

        ## Formulario
        // $data['codigo'] = array(
        //     'name'  => 'codigo',
        //     'id'    => 'codigo',
        //     'class' => 'form-control',
        //     'type'  => 'text',
        //     'required' => 'required',
        //     'value' => $this->form_validation->set_value('codigo')
        // );

        // $data['descripcion'] = array(
        //     'name'  => 'descripcion',
        //     'id'    => 'descripcion',
        //     'class' => 'form-control',
        //     'type'  => 'text',
        //     'required' => 'required',
        //     'value' => $this->form_validation->set_value('descripcion')
        // );

        

         $data['emision'] = array(
            'name'  => 'emision',
            'id'    => 'emision',
            'class' => 'form-control',
            'type'  => 'text',
            'required' => 'required',
            'value' => $this->form_validation->set_value('emision')
        );

         $data['inios'] = array(
            'name'  => 'inios',
            'id'    => 'inios',
            'class' => 'form-control',
            'type'  => 'text',
            'required' => 'required',
            'value' => $this->form_validation->set_value('inios')
        );

        $data['finos'] = array(
            'name'  => 'finos',
            'id'    => 'finos',
            'class' => 'form-control',
            'type'  => 'text',
            'required' => 'required',
            'value' => $this->form_validation->set_value('finos')
        );

        $data['fechaasig'] = array(
            'name'  => 'fechaasig',
            'id'    => 'fechaasig',
            'class' => 'form-control',
            'type'  => 'date',
            //'required' => 'required',
            'value' => $this->form_validation->set_value('fechaasig')
        );

        $data['cantidad'] = array(
            'name'  => 'cantidad',
            'id'    => 'cantidad',
            'class' => 'form-control',
            'type'  => 'text',
            'required' => 'required',
            'value' => $this->form_validation->set_value('cantidad')
        );

        $data['consumo'] = array(
            'name'  => 'consumo',
            'id'    => 'consumo',
            'class' => 'form-control',
            'type'  => 'text',
            'required' => 'required',
            'value' => $this->form_validation->set_value('consumo')
        );

        
        $data['operador'] = $this->orden_operadores->_lst_cbo_operadores();
        $data['idoperador'] = '';
                      
        $data['id'] = '';
           
    

      
        //$data['estado'] = '';
        //$data['id_producto'] = '';
        //$data['categoria'] = $this->productos->_lst_cbo_categoria();
       // $data['idcategoria'] = 0;

        //$data['id_producto_detail'] = '';
        //$data['estado_detail'] = '';

        $data['page_title'] = 'NUEVO';
        ## Template Admin Dashboard
        $data['module'] = 'orden_operador';
        $data['view_file'] = 'orden_operador_frm_view';
        //echo Modules::run('template/header_login',$data);
        echo Modules::run('template/admin_ajax',$data);
        //echo Modules::run('template/footer_admin',$data);
    }

    public function cu_create_orden_operador(){


        $this->form_validation->set_rules('emision', 'Emision', 'required|xss_clean');
       
        //$this->form_validation->set_rules('permiso', 'Permiso', 'required|xss_clean');
        //$this->form_validation->set_rules('id', 'Código', 'xss_clean');
        if ($this->form_validation->run() == true)
        {
            $id         = $this->input->post('id');
            $idoperador     = $this->input->post('idoperador');
            $emision     = $this->input->post('emision');
            $inios     = $this->input->post('inios');
            $finos   = $this->input->post('finos'); 
            $fechaasig     = $this->input->post('fechaasig');
            $cantidad     = $this->input->post('cantidad');
            $consumo     = $this->input->post('consumo');

            

            $arr_datos = array(
                // 'ID'      =>  $id,
                'ID_OPERADOR'        =>  $idoperador,
                'EMI_ORDEN'        =>  $emision,
                'INI_ORDEN'        =>  $inios,
                'FIN_ORDEN'        =>  $finos,
                'FECHAASIG'      =>  $fechaasig,
                'CANTIDAD'        =>  $cantidad,
                'CONSUMO'        =>  $consumo,
                
            );

            //print_r($arr_datos);
            //die();
            
            if(!empty($id)){//ENTRA CUANDO ID TIENE VALOR
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
                 $upd = $this->orden_operadores->update_orden_operador($arr_datos,(int)$id);
                 if($upd) {
                    $this->session->set_flashdata('message', 'update');   
                 }else{
                    $this->session->set_flashdata('message', 'error');
                 }
                 
                 
                
                
                ## redirect('producto/repuestos/producto_edit/'.$id_producto,'refresh');
                redirect('orden_operador/dashboard/','refresh');
            }else{
                $ins_datos = $this->orden_operadores->_insert_orden_operadores($arr_datos);
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
                redirect('orden_operador/dashboard/','refresh');
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

        $this->orden_operadores->update_tarifa($additional_data,$id);
        // $this->session->set_flashdata('message', 'delete');
        redirect(base_url().'orden_operador/dashboard','refresh');
    }

    public function orden_operador_edit($id = NULL){
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

        $dt_orden_operador = $this->orden_operadores->_obtener_datos_orden_operadores((int)$id);
        if(count($dt_orden_operador)!=0){
            ## Formulario


   // ----------------------------------------------------------------         


        
        $data['operador'] = $this->orden_operadores->_lst_cbo_operadores();
        $data['idoperador'] = $dt_orden_operador['ID_OPERADOR'];

                      
        $data['id'] = $dt_orden_operador['ID'];

        $data['emision'] = array(
            'name'  => 'emision',
            'id'    => 'emision',
            'class' => 'form-control',
            'type'  => 'text',
            'required' => 'required',
            'value' =>$dt_orden_operador['EMI_ORDEN']
        );

         $data['inios'] = array(
            'name'  => 'inios',
            'id'    => 'inios',
            'class' => 'form-control',
            'type'  => 'text',
            'required' => 'required',
            'value' => $dt_orden_operador['INI_ORDEN']
        );

        $data['finos'] = array(
            'name'  => 'finos',
            'id'    => 'finos',
            'class' => 'form-control',
            'type'  => 'text',
            'required' => 'required',
            'value' => $dt_orden_operador['FIN_ORDEN']
        );

        $data['fechaasig'] = array(
            'name'  => 'fechaasig',
            'id'    => 'fechaasig',
            'class' => 'form-control',
            'type'  => 'date',
            //'required' => 'required',
            'value' => $dt_orden_operador['FECHAASIG']
        );

        $data['cantidad'] = array(
            'name'  => 'cantidad',
            'id'    => 'cantidad',
            'class' => 'form-control',
            'type'  => 'text',
            'required' => 'required',
            'value' =>$dt_orden_operador['CANTIDAD']
        );

        $data['consumo'] = array(
            'name'  => 'consumo',
            'id'    => 'consumo',
            'class' => 'form-control',
            'type'  => 'text',
            'required' => 'required',
            'value' => $dt_orden_operador['CONSUMO']

        );        


            ## Listado de detalle de productos
                

            $data['page_title'] = 'Editar';
            ## Template Admin Dashboard
            $data['module'] = 'orden_operador';
            $data['view_file'] = 'orden_operador_frm_view';
            ## echo Modules::run('template/header_login',$data);
            echo Modules::run('template/admin_ajax',$data);
            ## echo Modules::run('template/footer_admin',$data);
        }elseif($id == '' or is_string($id)){
            redirect('orden_operador/dashboard','refresh');
        }
    }

}

?>