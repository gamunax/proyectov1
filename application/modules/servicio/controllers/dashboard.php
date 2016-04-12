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
        $this->load->model('servicio_model', 'servicios', TRUE);
    }

     public function index()
    {
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

        //$data['lst_categoria'] = $this->categoria->_lst_categoria(4);
        $data['servicios_general'] = $this->servicios->list_servicios();
        ## Inicio de Sesión
        $data['page_title'] = 'Dashboard';

        ## Template Admin Dashboard
        $data['module'] = 'servicio';
        $data['view_file'] = 'index_view';
        echo Modules::run('template/header_login',$data);
        echo Modules::run('template/admin',$data);
        echo Modules::run('template/footer_admin',$data);
    }

    public function create_servicio(){
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

        $data['flgcollect'] = array(
            'name'  => 'flgcollect',
            'id'    => 'flgcollect',
            'class' => 'form-control',
            'type'  => 'checkbox',
            'value' => '1'
        );

         $data['flgnormal'] = array(
            'name'  => 'flgnormal',
            'id'    => 'flgnormal',
            'class' => 'form-control',
            'type'  => 'checkbox',
            'value' => '1'
        );


        $data['flgespecial'] = array(
        'name'  => 'flgespecial',
        'id'    => 'flgespecial',
        'class' => 'form-control',
        'type'  => 'checkbox',        
        'value' => '1'
        );

        $data['flgvalorado'] = array(
        'name'  => 'flgvalorado',
        'id'    => 'flgvalorado',
        'class' => 'form-control',
        'type'  => 'checkbox',
        'value' => '1'
        );

        

        $data['estado'] = '';
        $data['tiposervicio'] = '';
            
        

     

       
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
        $data['module'] = 'servicio';
        $data['view_file'] = 'servicio_frm_view';
        //echo Modules::run('template/header_login',$data);
        echo Modules::run('template/admin_ajax',$data);
        //echo Modules::run('template/footer_admin',$data);
    }

    public function cu_create_servicio(){

        $this->form_validation->set_rules('descripcion', 'Descripcion', 'required|xss_clean');
        if ($this->form_validation->run() == true)
        {
            $id             = $this->input->post('id');
            $descripcion    = $this->input->post('descripcion');
            $estado         = $this->input->post('estado');
            $tiposervicio   = $this->input->post('tiposervicio');
            $flg_collect    = $this->input->post('flgcollect');
            $flg_especial   = $this->input->post('flgespecial');
            $flg_valorado   = $this->input->post('flgvalorado');
            $flg_normal   = $this->input->post('flgnormal');

            
           

            $arr_datos = array(
                'descripcion'    =>  $descripcion,
                'estado'        =>  $estado,
                'tipo_servicio' => $tiposervicio,
                'flg_collect' => $flg_collect,
                'flg_especial' => $flg_especial,
                'flg_valorado' => $flg_valorado,
                'flg_normal' => $flg_normal,
                
                
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
                 $upd = $this->servicios->update_servicio($arr_datos,(int)$id);
                 if($upd) {
                    $this->session->set_flashdata('message', 'update');   
                 }else{
                    $this->session->set_flashdata('message', 'error');
                 }
                 
                 
                
                
                ## redirect('producto/repuestos/producto_edit/'.$id_producto,'refresh');
                redirect('servicio/dashboard/','refresh');
            }else{
                $ins_datos = $this->servicios->_insert_servicios($arr_datos);
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
                redirect('servicio/dashboard/','refresh');
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

        $this->servicios->update_servicio($additional_data,$id);
        // $this->session->set_flashdata('message', 'delete');
        redirect(base_url().'servicio/dashboard','refresh');
    }

    public function servicio_edit($id = NULL){
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

        $dt_servicio = $this->servicios->_obtener_datos_servicios((int)$id);
        if(count($dt_servicio)!=0){
            ## Formulario

                
            $data['descripcion'] = array(
                'name'  => 'descripcion',
                'id'    => 'descripcion',
                'class' => 'form-control',
                'type'  => 'text',
                'required' => 'required',
                'value' => $dt_servicio['DESCRIPCION']
            );

            if($dt_servicio['FLG_COLLECT'] == '1'){
                $checked = "checked";

                $data['flgcollect'] = array(
                    'name'  => 'flgcollect',
                    'id'    => 'flgcollect',
                    'class' => 'form-control',
                    'type'  => 'checkbox',
                    'checked'=> $checked,
                    'value' => '1'
                    
                );
            }else{
                $data['flgcollect'] = array(
                    'name'  => 'flgcollect',
                    'id'    => 'flgcollect',
                    'class' => 'form-control',
                    'type'  => 'checkbox',
                    'value' => '1'
                    
                    
                );

            }

             if($dt_servicio['FLG_NORMAL'] == '1'){
                $checked = "checked";

                $data['flgnormal'] = array(
                    'name'  => 'flgnormal',
                    'id'    => 'flgnormal',
                    'class' => 'form-control',
                    'type'  => 'checkbox',
                    'checked'=> $checked,
                    'value' => '1'
                    
                );
            }else{
                $data['flgnormal'] = array(
                    'name'  => 'flgnormal',
                    'id'    => 'flgnormal',
                    'class' => 'form-control',
                    'type'  => 'checkbox',
                    'value' => '1'
                    
                    
                );

            }

             if($dt_servicio['FLG_ESPECIAL'] == '1'){
                 $checked = "checked";

                $data['flgespecial'] = array(
                    'name'  => 'flgespecial',
                    'id'    => 'flgespecial',
                    'class' => 'form-control',
                    'type'  => 'checkbox',
                    'checked'=> $checked,
                    'value' => '1'
                );
            }else{
                $data['flgespecial'] = array(
                    'name'  => 'flgespecial',
                    'id'    => 'flgespecial',
                    'class' => 'form-control',
                    'type'  => 'checkbox',
                    'value' => '1'

                    
                    
                );

            }

             if($dt_servicio['FLG_VALORADO'] == '1'){
                 $checked = "checked";
                $data['flgvalorado'] = array(
                    'name'  => 'flgvalorado',
                    'id'    => 'flgvalorado',
                    'class' => 'form-control',
                    'type'  => 'checkbox',
                    'checked'=> $checked,
                    'value' => '1'
                );
            }else{
                $data['flgvalorado'] = array(
                    'name'  => 'flgvalorado',
                    'id'    => 'flgvalorado',
                    'class' => 'form-control',
                    'type'  => 'checkbox',
                    'value' => '1'
                    
                    
                );

            }


            $data['tiposervicio'] = $dt_servicio['TIPO_SERVICIO'];  
            ##
            $data['estado']      = $dt_servicio['ESTADO'];
            $data['id']          = $dt_servicio['ID'];
            


            ## Listado de detalle de productos
                

            $data['page_title'] = 'Editar';
            ## Template Admin Dashboard
            $data['module'] = 'servicio';
            $data['view_file'] = 'servicio_frm_view';
            ## echo Modules::run('template/header_login',$data);
            echo Modules::run('template/admin_ajax',$data);
            ## echo Modules::run('template/footer_admin',$data);
        }elseif($id == '' or is_string($id)){
            redirect('servicio/dashboard','refresh');
        }
    }

}

?>