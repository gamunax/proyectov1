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
        $this->load->model('oficina_model', 'oficinas', TRUE);
    }

     public function index()
    {
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

        //$data['lst_categoria'] = $this->categoria->_lst_categoria(4);
        $data['oficinas_general'] = $this->oficinas->list_oficinas();
        ## Inicio de Sesión
        $data['page_title'] = 'Dashboard';

        ## Template Admin Dashboard
        $data['module'] = 'oficina';
        $data['view_file'] = 'index_view';
        echo Modules::run('template/header_login',$data);
        echo Modules::run('template/admin',$data);
        echo Modules::run('template/footer_admin',$data);
    }

    public function create_oficina(){
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

        ## Formulario

        $data['descripcion'] = array(
            'name'  => 'descripcion',
            'id'    => 'descripcion',
            'class' => 'form-control',
            'type'  => 'text',
            'required' => 'required',
            'value' => $this->form_validation->set_value('descripcion')
        );

       $data['direccion'] = array(
            'name'  => 'direccion',
            'id'    => 'direccion',
            'class' => 'form-control',
            'type'  => 'text',
            'required' => 'required',
            'value' => $this->form_validation->set_value('direccion')
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
        $data['module'] = 'oficina';
        $data['view_file'] = 'oficina_frm_view';
        //echo Modules::run('template/header_login',$data);
        echo Modules::run('template/admin_ajax',$data);
        //echo Modules::run('template/footer_admin',$data);
    }

    public function cu_create_oficina(){

        $this->form_validation->set_rules('descripcion', 'Descripcion', 'required|xss_clean');
        if ($this->form_validation->run() == true)
        {
            $id         = $this->input->post('id');
            $descripcion   = $this->input->post('descripcion');
            $direccion   = $this->input->post('direccion');   
            $estado     = $this->input->post('estado');
            
            

            $arr_datos = array(
                'ID'      =>  $id,
                'DESCRIPCION'    =>  $descripcion,
                'DIRECCION'    =>  $direccion,
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
                 $upd = $this->oficinas->update_oficina($arr_datos,(int)$id);
                 if($upd) {
                    $this->session->set_flashdata('message', 'update');   
                 }else{
                    $this->session->set_flashdata('message', 'error');
                 }
                 
                 
                
                
                ## redirect('producto/repuestos/producto_edit/'.$id_producto,'refresh');
                redirect('oficina/dashboard/','refresh');
            }else{
                $ins_datos = $this->oficinas->_insert_oficinas($arr_datos);
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
                redirect('oficina/dashboard/','refresh');
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

        $this->oficinas->update_oficina($additional_data,$id);
        // $this->session->set_flashdata('message', 'delete');
        redirect(base_url().'oficina/dashboard','refresh');
    }

    public function oficina_edit($id = NULL){
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

        $dt_oficina = $this->oficinas->_obtener_datos_oficinas((int)$id);
        if(count($dt_oficina)!=0){
            ## Formulario

                 $data['descripcion'] = array(
                    'name'  => 'descripcion',
                    'id'    => 'descripcion',
                    'class' => 'form-control',
                    'type'  => 'text',
                    'required' => 'required',
                    'value' => $dt_oficina['DESCRIPCION']
                );


                $data['direccion'] = array(
                    'name'  => 'direccion',
                    'id'    => 'direccion',
                    'class' => 'form-control',
                    'type'  => 'text',
                    'required' => 'required',
                    'value' => $dt_oficina['DIRECCION']
                );

             
                
            ##
            $data['estado']      = $dt_oficina['ESTADO'];
            $data['id']          = $dt_oficina['ID'];
            


            ## Listado de detalle de productos
                

            $data['page_title'] = 'Editar';
            ## Template Admin Dashboard
            $data['module'] = 'oficina';
            $data['view_file'] = 'oficina_frm_view';
            ## echo Modules::run('template/header_login',$data);
            echo Modules::run('template/admin_ajax',$data);
            ## echo Modules::run('template/footer_admin',$data);
        }elseif($id == '' or is_string($id)){
            redirect('oficina/dashboard','refresh');
        }
    }

}

?>