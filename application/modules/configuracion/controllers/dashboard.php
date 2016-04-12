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
        $this->load->model('configuracion_model', 'configuraciones', TRUE);
    }

     public function index()
    {
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

        
        //$data['paquetes_general'] = $this->reimpresion->list_paquetes();
        ## Inicio de Sesión
        $data['page_title'] = 'Configuracion del sistema';

        ## Template Admin Dashboard
        $data['module'] = 'configuracion';
        $data['view_file'] = 'index_view';
        echo Modules::run('template/header_login',$data);
        echo Modules::run('template/admin',$data);
        echo Modules::run('template/footer_admin',$data);
    }

    public function listar_impresion(){
        $data = $this->configuraciones->list_impresion_sticker();
        echo json_encode($data);
    }

    public function abrir_config(){
        $data = $this->configuraciones->abrir_config_bd();

        echo json_encode($data);
    }

    public function guardar_master(){
        $ruc = $_GET['ruc'];
        $igv = $_GET['igv'];
        $tipocambio = $_GET['tipocambio'];
        $impresion = $_GET['impresion'];
        $id = $_GET['id'];

         $arr_datos = array(
            
            'RUC'        =>  $ruc,
            'IGV'        =>  $igv,
            'TIPOCAMBIO'      =>  $tipocambio,
            'IMPRESION'        =>  $impresion,
            
        );

       
          if(!empty($id)){//ENTRA CUANDO ID TIENE VALOR

                 $upd = $this->configuraciones->update_configuracion($arr_datos,(int)$id);
                 if($upd) {
                    $this->session->set_flashdata('message', 'update');   
                 }else{
                    $this->session->set_flashdata('message', 'error');
                 }
                 
                 
                
                
                ## redirect('producto/repuestos/producto_edit/'.$id_producto,'refresh');
                redirect('configuracion/dashboard/','refresh');
            }else{
                $ins_datos = $this->configuraciones->_insert_configuraciones($arr_datos);
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
                redirect('configuracion/dashboard/','refresh');
            }
    }
 

}

?>