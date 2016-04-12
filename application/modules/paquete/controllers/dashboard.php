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
        $this->load->model('paquete_model', 'paquetes', TRUE);
    }

     public function index()
    {
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

        
        $data['paquetes_general'] = $this->paquetes->list_paquetes();
        ## Inicio de Sesión
        $data['page_title'] = 'Dashboard';

        ## Template Admin Dashboard
        $data['module'] = 'paquete';
        $data['view_file'] = 'index_view';
        echo Modules::run('template/header_login',$data);
        echo Modules::run('template/admin',$data);
        echo Modules::run('template/footer_admin',$data);
    }

     public function tarifamontos()
    {
        $idtar = $this->input->post('idtar');
        $tarifas = $this->paquetes->list_change_tarifas($idtar);
        foreach($tarifas as $tar):
           echo $tar->TFA_BASE.'|'.$tar->TFA_EXCESO;
         //   echo array('base'=>$tar->TFA_BASE, 'exceso'=>$tar->TFA_EXCESO);
        endforeach;
        
    }

    public function create_paquete(){
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

      

        $data['descripcion'] = array(
            'name'  => 'descripcion',
            'id'    => 'descripcion',
            'class' => 'form-control',
            'type'  => 'text',
            'required' => 'required',
            'value' => $this->form_validation->set_value('descripcion')
        );

        

        

        $data['estado'] = '';
        $data['idtarifa'] = '';    
        $data['tarifades'] = $this->paquetes->list_tarifas();
        $data['zonades'] = $this->paquetes->list_zonas();
     

       
       $data['tari'] = '';
        $data['id'] = '';
           
    

      
        //$data['estado'] = '';
        //$data['id_producto'] = '';
        //$data['categoria'] = $this->productos->_lst_cbo_categoria();
       // $data['idcategoria'] = 0;

        //$data['id_producto_detail'] = '';
        //$data['estado_detail'] = '';

        $data['page_title'] = 'NUEVO';
        ## Template Admin Dashboard
        $data['module'] = 'paquete';
        $data['view_file'] = 'paquete_frm_view';
        //echo Modules::run('template/header_login',$data);
        echo Modules::run('template/admin_ajax',$data);
        //echo Modules::run('template/footer_admin',$data);
    }

    public function cu_create_paquete(){

        $this->form_validation->set_rules('descripcion', 'Descripcion', 'required|xss_clean');
       
        //$this->form_validation->set_rules('permiso', 'Permiso', 'required|xss_clean');
        //$this->form_validation->set_rules('id', 'Código', 'xss_clean');
        if ($this->form_validation->run() == true)
        {
            $id         = $this->input->post('id');
            
            
            $descripcion = $this->input->post('descripcion');
            $estado      = $this->input->post('estado');

            $arr_datos = array(
                
                'DESCRIPCION'      =>  $descripcion,
                'ESTADO'       =>  $estado,
                
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
                 $upd = $this->paquetes->update_paquete($arr_datos,(int)$id);
                 if($upd) {
                    $this->session->set_flashdata('message', 'update');   
                 }else{
                    $this->session->set_flashdata('message', 'error');
                 }

                ## AGREGANDO NUEVAS Y ACTUALIZANDO PAQUETES
                $nro = $this->input->post('nroItemPaquete');
                for($i=1; $i <= $nro; $i++):
                    $cid = $this->input->post('cid'.$i);
                    $idgen         = $this->input->post('idgen'.$i);
                    $col_del = $this->input->post('col-del-'.$i);
                    if($cid != ''):
                        
                        if($col_del == '1')
                        {
                            $this->paquetes->_delete_detalle_paquetes($idgen);
                        }
                        else
                        {
                            ## ACTUALIZAR
                            
                            $data = array(
                                'ID_TARIFA'        =>  $this->input->post('cc'.$i),
                                'ID_ZONA'   =>  $this->input->post('czona'.$i)

                            );
                            
                            $this->paquetes->_update_detalle_paquetes($data, $idgen);
                        }
                    else:
                        ## NUEVO
                        $data = array(
                            'ID_PAQUETE'       =>  $id,
                            'ID_ZONA'        =>  $this->input->post('czona'.$i),
                            'ID_TARIFA'   =>   $this->input->post('cc'.$i)
                            
                        );
                        $this->paquetes->_insert_detalle_paquetes($data);
                    endif;
                endfor;
   
                 
                    
                
                
                ## redirect('producto/repuestos/producto_edit/'.$id_producto,'refresh');
                redirect('paquete/dashboard/','refresh');
            }else{
                $ins_datos = $this->paquetes->_insert_paquetes($arr_datos);
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

                ## AGREGANDO DETALLE
                $nro = $this->input->post('nroItemPaquete');
                for($i=1; $i <= $nro; $i++):
                
                    
                        $data = array(
                            'ID_PAQUETE'       =>  $ins_datos,
                            'ID_ZONA'        =>  $this->input->post('czona'.$i),
                            'ID_TARIFA'   =>   $this->input->post('cc'.$i)
                            
                        );
                        $this->paquetes->_insert_detalle_paquetes($data);
                    
                endfor;
                

                ## redirect('producto/repuestos/producto_edit/'.$ins_datos,'refresh');
                redirect('paquete/dashboard/','refresh');
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

        $this->tarifas->update_paquete($additional_data,$id);
        // $this->session->set_flashdata('message', 'delete');
        redirect(base_url().'paquete/dashboard','refresh');
    }

    public function paquete_edit($id = NULL){
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

        $dt_paquete = $this->paquetes->_obtener_datos_paquetes((int)$id);
        if(count($dt_paquete)!=0){
            ## Formulario

               
                $data['descripcion'] = array(
                    'name'  => 'descripcion',
                    'id'    => 'descripcion',
                    'class' => 'form-control',
                    'type'  => 'text',
                    'required' => 'required',
                    'value' => $dt_paquete['DESCRIPCION']
                );
                
            ##
            $data['estado']      = $dt_paquete['ESTADO'];
            $data['id']          = $dt_paquete['ID'];

            $data['tarifas']     = $this->paquetes->list_paquete((int)$id);
            $data['idtarifa'] = ''; 
            $data['tarifades'] = $this->paquetes->list_tarifas();
            $data['zonades'] = $this->paquetes->list_zonas();

            $data['tari'] = '';

            ## Listado de detalle de productos
                

            $data['page_title'] = 'Editar';
            ## Template Admin Dashboard
            $data['module'] = 'paquete';
            $data['view_file'] = 'paquete_frm_view';
            ## echo Modules::run('template/header_login',$data);
            echo Modules::run('template/admin_ajax',$data);
            ## echo Modules::run('template/footer_admin',$data);
        }elseif($id == '' or is_string($id)){
            redirect('paquete/dashboard','refresh');
        }
    }

}

?>