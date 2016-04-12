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
        $this->load->model('correlativo_model', 'correlativos', TRUE);
    }

     public function index()
    {
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

        
        $data['correlativos_general'] = $this->correlativos->list_correlativos();
        ## Inicio de Sesión
        $data['page_title'] = 'Dashboard';

        ## Template Admin Dashboard
        $data['module'] = 'correlativo';
        $data['view_file'] = 'index_view';
        // $data['oficinas']=$this->correlativos->list_oficinas();
        // $this->load->view('correlativo_frm_view',$data);
        
        echo Modules::run('template/header_login',$data);
        echo Modules::run('template/admin',$data);
        echo Modules::run('template/footer_admin',$data);
    }


    public function list_oficinas(){
        $data = $this->correlativos->list_oficinas();
        echo json_encode($data);
    }


    public function create_correlativo(){
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

        $data['serie'] = array(
            'name'  => 'serie',
            'id'    => 'serie',
            'class' => 'form-control',
            'type'  => 'text',
            'required' => 'required',
            'value' => $this->form_validation->set_value('serie')
        );

        $data['numero'] = array(
            'name'  => 'numero',
            'id'    => 'numero',
            'class' => 'form-control',
            'type'  => 'text',
            'required' => 'required',
            'value' => $this->form_validation->set_value('numero')
        );

        
        $data['oficina'] = $this->correlativos->_lst_cbo_oficinas();
        $data['idoficina'] = '';

        $data['tipodoc'] = $this->correlativos->_lst_cbo_tipodocs();
        $data['idtipodoc'] = '';
                      
        $data['id'] = '';
           
    

      
        //$data['estado'] = '';
        //$data['id_producto'] = '';
        //$data['categoria'] = $this->productos->_lst_cbo_categoria();
       // $data['idcategoria'] = 0;

        //$data['id_producto_detail'] = '';
        //$data['estado_detail'] = '';

        $data['page_title'] = 'NUEVO';
        ## Template Admin Dashboard
        $data['module'] = 'correlativo';
        $data['view_file'] = 'correlativo_frm_view';
        //echo Modules::run('template/header_login',$data);
        echo Modules::run('template/admin_ajax',$data);
        //echo Modules::run('template/footer_admin',$data);
    }

    public function cu_create_correlativo(){


        $this->form_validation->set_rules('serie', 'Serie', 'required|xss_clean');
       
        //$this->form_validation->set_rules('permiso', 'Permiso', 'required|xss_clean');
        //$this->form_validation->set_rules('id', 'Código', 'xss_clean');
        if ($this->form_validation->run() == true)
        {
            $id         = $this->input->post('id');
            $serie     = $this->input->post('serie');
            $numero   = $this->input->post('numero'); 
            $idoficina     = $this->input->post('idoficina');
            $idtipodoc     = $this->input->post('idtipodoc');

            

            $arr_datos = array(
                // 'ID'      =>  $id,
                'SERIE'        =>  $serie,
                'NUMERO'        =>  $numero,
                'ID_OFICINA'      =>  $idoficina,
                'TIPO_DOC'        =>  $idtipodoc,
                
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
                 $upd = $this->correlativos->update_correlativo($arr_datos,(int)$id);
                 if($upd) {
                    $this->session->set_flashdata('message', 'update');   
                 }else{
                    $this->session->set_flashdata('message', 'error');
                 }
                 
                 
                
                
                ## redirect('producto/repuestos/producto_edit/'.$id_producto,'refresh');
                redirect('correlativo/dashboard/','refresh');
            }else{
                $ins_datos = $this->correlativos->_insert_correlativos($arr_datos);
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
                redirect('correlativo/dashboard/','refresh');
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

        $this->correlativos->update_tarifa($additional_data,$id);
        // $this->session->set_flashdata('message', 'delete');
        redirect(base_url().'correlativo/dashboard','refresh');
    }

    public function correlativo_edit($id = NULL){
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

        $dt_correlativo = $this->correlativos->_obtener_datos_correlativos((int)$id);
        if(count($dt_correlativo)!=0){
            ## Formulario


   // ----------------------------------------------------------------         

        $data['serie'] = array(
            'name'  => 'serie',
            'id'    => 'serie',
            'class' => 'form-control',
            'type'  => 'text',
            'required' => 'required',
            'value' => $dt_correlativo['SERIE']
        );

        $data['numero'] = array(
            'name'  => 'numero',
            'id'    => 'numero',
            'class' => 'form-control',
            'type'  => 'text',
            'required' => 'required',
            'value' => $dt_correlativo['NUMERO']
        );

        
        $data['oficina'] = $this->correlativos->_lst_cbo_oficinas();
        $data['idoficina'] = $dt_correlativo['ID_OFICINA'];

        $data['tipodoc'] = $this->correlativos->_lst_cbo_tipodocs();
        $data['idtipodoc'] =  $dt_correlativo['TIPO_DOC'];
                      
        $data['id'] = $dt_correlativo['ID'];


            ## Listado de detalle de productos
                

            $data['page_title'] = 'Editar';
            ## Template Admin Dashboard
            $data['module'] = 'correlativo';
            $data['view_file'] = 'correlativo_frm_view';
            ## echo Modules::run('template/header_login',$data);
            echo Modules::run('template/admin_ajax',$data);
            ## echo Modules::run('template/footer_admin',$data);
        }elseif($id == '' or is_string($id)){
            redirect('correlativo/dashboard','refresh');
        }
    }

}

?>