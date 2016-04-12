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
        $this->load->model('proyectos_model', 'proyectos', TRUE);
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->database();
        $this->load->library('pagination');
        $this->load->library('table');
        $this->load->library('recursos');
	}

	 public function index()
    {
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

        //$data['lst_categoria'] = $this->categoria->_lst_categoria(4);
        $data['proyectos_general'] = $this->proyectos->listadoproyectos();


                   
        ## Inicio de Sesión
        $data['page_title'] = 'Dashboard';

        ## Template Admin Dashboard
        $data['module'] = 'proyectos';
        $data['view_file'] = 'index_view';
        echo Modules::run('template/header_login',$data);
        echo Modules::run('template/admin',$data);
        echo Modules::run('template/footer_admin',$data);
    }

     public function provincias()
    {
        $idDepa = $this->input->post('idDepa');
        $provincias = $this->proyectos->provincias($idDepa);
        foreach($provincias as $provincia):
            echo '<option value="'.$provincia->id.'">'.$provincia->descripcion.'</option>';
        endforeach;
    }

    
   

    public function distritos()
    {
        console.log('entro');
        $idProv = $this->input->post('idProv');
        $distritos = $this->proyectos->distritos($idProv);
        foreach($distritos as $distrito):
            echo '<option value="'.$distrito->id.'">'.$distrito->descripcion.'</option>';
        endforeach;
    }


    public function create_proyecto(){
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

        

        ## Formulario
       $data['proximoproyecto'] = array(
            'name'  => 'proximoproyecto',
            'id'    => 'proximoproyecto',
            'class' => 'form-control',
            'type'  => 'checkbox',
            //'required' => 'required',
            'value' => $this->form_validation->set_value('proximoproyecto')
        );

        $data['titulo'] = array(
            'name'  => 'titulo',
            'id'    => 'titulo',
            'class' => 'form-control',
            'type'  => 'text',
            //'required' => 'required',
            'value' => $this->form_validation->set_value('titulo')
        );

           $data['title'] = array(
            'name'  => 'title',
            'id'    => 'title',
            'class' => 'form-control',
            'type'  => 'text',
            //'required' => 'required',
            'value' => $this->form_validation->set_value('title')
        );

        $data['nombre'] = array(
            'name'  => 'nombre',
            'id'    => 'nombre',
            'class' => 'form-control',
            'type'  => 'text',
            //'required' => 'required',
            'value' => $this->form_validation->set_value('nombre')
        );
        $data['texto'] = array(
            'name'  => 'texto',
            'id'    => 'texto',
            'class' => 'form-control',
            'type'  => 'text',
            //'required' => 'required',
            'value' => $this->form_validation->set_value('texto')
        );
        $data['text'] = array(
            'name'  => 'text',
            'id'    => 'text',
            'class' => 'form-control',
            'type'  => 'text',
            //'required' => 'required',
            'value' => $this->form_validation->set_value('text')
        );

        $data['precioventa'] = array(
            'name'  => 'precioventa',
            'id'    => 'precioventa',
            'class' => 'form-control',
            'type'  => 'text',
            //'required' => 'required',
            'value' => $this->form_validation->set_value('precioventa')
        );

         $data['descripcion'] = array(
            'name'  => 'descripcion',
            'id'    => 'descripcion',
            'class' => 'form-control',
            'type'  => 'text',
            //'required' => 'required',
            'value' => $this->form_validation->set_value('descripcion')
        );


         $data['descripcionIngles'] = array(
            'name'  => 'descripcionIngles',
            'id'    => 'descripcionIngles',
            'class' => 'form-control',
            'type'  => 'text',
            //'required' => 'required',
            'value' => $this->form_validation->set_value('descripcionIngles')
        );


         $data['dormitorios'] = array(
            'name'  => 'dormitorios',
            'id'    => 'dormitorios',
            'class' => 'form-control',
            'type'  => 'text',
            //'required' => 'required',
            'value' => $this->form_validation->set_value('dormitorios')
        );

        $data['banos'] = array(
            'name'  => 'banos',
            'id'    => 'banos',
            'class' => 'form-control',
            'type'  => 'text',
           // 'required' => 'required',
            'value' => $this->form_validation->set_value('banos')
        );

        $data['areaconstruida'] = array(
            'name'  => 'areaconstruida',
            'id'    => 'areaconstruida',
            'class' => 'form-control',
            'type'  => 'text',
            //'required' => 'required',
            'value' => $this->form_validation->set_value('areaconstruida')
        );

        $data['cocheras'] = array(
            'name'  => 'cocheras',
            'id'    => 'cocheras',
            'class' => 'form-control',
            'type'  => 'text',
           // 'required' => 'required',
            'value' => $this->form_validation->set_value('cocheras')
        );
         $data['imagen1'] = array(
            'name'  => 'imagen1',
            'id'    => 'imagen1',
            'ui-jq' => 'filestyle',
            
            'data-classButton' => 'btn btn-default' ,
            'data-classInput' => 'form-control inline v-middle input-s',
            'type'  => 'file',
            'value' => $this->form_validation->set_value('imagen1'),
        );

        $data['imagen2'] = array(
            'name'  => 'imagen2',
            'id'    => 'imagen2',
            
            
            'data-classButton' => 'btn btn-default' ,
            'data-classInput' => 'form-control inline v-middle input-s',
            'type'  => 'file',
            'value' => $this->form_validation->set_value('imagen2'),
        );
         $data['imagen3'] = array(
            'name'  => 'imagen3',
            'id'    => 'imagen3',
            
            
            'data-classButton' => 'btn btn-default' ,
            'data-classInput' => 'form-control inline v-middle input-s',
            'type'  => 'file',
            'value' => $this->form_validation->set_value('imagen3'),
        );
          $data['imagen4'] = array(
            'name'  => 'imagen4',
            'id'    => 'imagen4',
            
            
            'data-classButton' => 'btn btn-default' ,
            'data-classInput' => 'form-control inline v-middle input-s',
            'type'  => 'file',
            'value' => $this->form_validation->set_value('imagen4'),
        );
           $data['imagen5'] = array(
            'name'  => 'imagen5',
            'id'    => 'imagen5',
            
            
            'data-classButton' => 'btn btn-default' ,
            'data-classInput' => 'form-control inline v-middle input-s',
            'type'  => 'file',
            'value' => $this->form_validation->set_value('imagen5'),
        );
            $data['imagen6'] = array(
            'name'  => 'imagen6',
            'id'    => 'imagen6',
            
            
            'data-classButton' => 'btn btn-default' ,
            'data-classInput' => 'form-control inline v-middle input-s',
            'type'  => 'file',
            'value' => $this->form_validation->set_value('imagen6'),
        );
        $data['imagen7'] = array(
            'name'  => 'imagen7r',
            'id'    => 'imagen7',
            
            
            'data-classButton' => 'btn btn-default' ,
            'data-classInput' => 'form-control inline v-middle input-s',
            'type'  => 'file',
            'value' => $this->form_validation->set_value('imagen7'),
        );

        



        $data['estado'] = '';
            
        

    
        $data['tipoinmueble'] = $this->proyectos->_lst_cbo_tipoinmueble();
        $data['gradoconservacion'] = $this->proyectos->_lst_cbo_gradoconservacion();
        $data['idconservacion'] = '';
        $data['idtipoinmueble'] = '';
        $data['departamentos'] = $this->proyectos->departamentos();

        $data['provincia'] = '';
        $data['distrito'] = '';
        $data['idinmueble'] = '';
        $data['idUrbanizacion'] = '';
        $data['idtipomoneda'] = '';

           
    

        $data['img_print'] = '';

        //$data['estado'] = '';
        //$data['id_producto'] = '';
        //$data['categoria'] = $this->productos->_lst_cbo_categoria();
       // $data['idcategoria'] = 0;

        //$data['id_producto_detail'] = '';
        //$data['estado_detail'] = '';

        $data['page_title'] = 'NUEVO';
        ## Template Admin Dashboard
        $data['module'] = 'proyectos';
        $data['view_file'] = 'proyecto_frm_view';
        //echo Modules::run('template/header_login',$data);
        echo Modules::run('template/admin_ajax',$data);
        //echo Modules::run('template/footer_admin',$data);
    }

    public function cu_create_proyecto(){

        //$this->form_validation->set_rules('codigo', 'Codigo', 'required|xss_clean');
        $this->form_validation->set_rules('titulo', 'Titulo', 'required|xss_clean');
        /*$this->form_validation->set_rules('nombre', 'Nombre', 'required|xss_clean');
        $this->form_validation->set_rules('estado', 'Estado', 'required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'required|xss_clean');
        */
        
        //$this->form_validation->set_rules('permiso', 'Permiso', 'required|xss_clean');
        //$this->form_validation->set_rules('id', 'Código', 'xss_clean');
        if ($this->form_validation->run() == true)
        {
            $idmueble           = $this->input->post('idinmueble');
            //$codigo             = $this->input->post('codigo');
            $idtipoinmueble     = $this->input->post('idtipoinmueble');
            $titulo             = $this->input->post('titulo');
            $title              = $this->input->post('title');
            $proximoproyecto    = $this->input->post('proximoproyecto') ;
            $idurbanizaciondis  = $this->input->post('distritos');
            $idtipomoneda       = $this->input->post('idtipomoneda');
            $idconservacion  = $this->input->post('idconservacion');
            $dormitorios        = $this->input->post('dormitorios');
            $areaconstruida     = $this->input->post('areaconstruida');    
            $cocheras           = $this->input->post('cocheras');    
            $banos              = $this->input->post('banos');
            $descripcion        = $this->input->post('descripcion');
            $descripcioningles        = $this->input->post('descripcionIngles');
            $estado             = $this->input->post('estado');
            $precio             = $this->input->post('precioventa');
            $texto             = $this->input->post('texto');
            $text             = $this->input->post('text');
    
            $alquiler_venta       = 'Proyectos';
            //echo "<script>alert($proximoproyecto)</script>";
            if (null != $proximoproyecto ){
                $proximoproyecto = 'checked';
            }else{
                $proximoproyecto = '';
            }

            $arr_datos = array(
                //'codigo'            =>  $codigo,
                'idtipoinmueble'    =>  $idtipoinmueble,
                'titulo'            =>  $titulo,
                'title'             =>  $title,
                'proximoproyecto'   =>  $proximoproyecto,
                'idurbanizacion'    =>  $idurbanizaciondis,
                'idtipomoneda'      =>  $idtipomoneda,
                'dormitorios'       =>  $dormitorios,
                'areaconstruida'    =>  $areaconstruida,
                'banos'             =>  $banos,
                'descripcionespanol'=>  $descripcion,
                'descripcionIngles'       =>  $descripcioningles,
                'estado'            =>  $estado,
                'idconservacion'    =>  $idconservacion,
                'precio'            =>   $precio,
               
                'cocheras_p'        =>  $cocheras,
                'idcodinmueble'     =>  $alquiler_venta,
                'texto'             =>  $texto,
                'text'              =>  $text,
                
            );

            
            if(!empty($idmueble)){
                
                  $this->session->set_flashdata('message', 'update');
              $this->proyectos->_update_inmuebles($arr_datos,(int)$idmueble);    
              //agregando imagenes
              for($i=1; $i <= 7; $i++):  
                $imagen = $this->recursos->upload_img_products('imagen'.$i,'uploads/inmueble/'.$idmueble.'/',true);
               
                    if(!is_array($imagen)){
                       $arr_datos = array(
                                'imagen'.$i   => $imagen
                            );
                       $this->session->set_flashdata('message', 'update');
                            $this->proyectos->_update_inmuebles($arr_datos, (int)$idmueble);

                    }
                    
                  
                
            endfor;
                 
                
                
                ## redirect('producto/repuestos/producto_edit/'.$id_producto,'refresh');
                redirect('proyectos/dashboard','refresh');
            }else{

                 $ins_datos = $this->proyectos->_insert_inmuebles($arr_datos);

                if($ins_datos){
                   for($i=1; $i <= 6; $i++):  
                     $imagen = $this->recursos->upload_img_products('imagen'.$i,'uploads/inmueble/'.$ins_datos.'/',true);
              
                    if(!is_array($imagen)){
                       $arr_datos = array(
                                'imagen'.$i   => $imagen
                            );
                            $this->session->set_flashdata('message', 'update');
                            $this->proyectos->_update_inmuebles($arr_datos, (int)$ins_datos);

                    }
                    
                  
                
                endfor;
                    }else{
                        $this->session->set_flashdata('message', 'error');
                    }
                    /*echo '<pre>';
                        echo $id_producto;
                        print_r($data);
                        echo '</pre>';
                        */
                        //die();
                        
                      
                    ## redirect('producto/repuestos/producto_edit/'.$ins_datos,'refresh');
                     redirect('proyectos/dashboard','refresh');



               
            }
        }else{
            $this->session->set_flashdata('message', 'error');
            print_r(validation_errors());
            //redirect('producto/repuestos','refresh');
        }
    }

    

    public function delete($id, $tipo = null){
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

        $this->proyectos->_update_inmuebles($additional_data,$id);
        // $this->session->set_flashdata('message', 'delete');
         redirect(base_url().'proyectos/dashboard','refresh');
    }

    public function proyecto_edit($id = NULL){
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'admin')
        {
            $this->session->set_flashdata('usuario_incorrecto', 'sesion_login');
            redirect('login/inicio','refresh');
        }

        $dt_inmueble = $this->proyectos->_obtener_datos_inmuebles((int)$id);

        if(count($dt_inmueble)!=0){


            ## Formulario
                 ## Formulario
                   

                    $data['titulo'] = array(
                        'name'  => 'titulo',
                        'id'    => 'titulo',
                        'class' => 'form-control',
                        'type'  => 'text',
                    
                        'value' => $dt_inmueble['titulo']
                    );

                     $data['title'] = array(
                        'name'  => 'title',
                        'id'    => 'title',
                        'class' => 'form-control',
                        'type'  => 'text',
                      
                        'value' => $dt_inmueble['title']
                    );
                      $data['texto'] = array(
                        'name'  => 'texto',
                        'id'    => 'texto',
                        'class' => 'form-control',
                        'type'  => 'text',
                      
                        'value' => $dt_inmueble['texto']
                    );
                       $data['text'] = array(
                        'name'  => 'text',
                        'id'    => 'text',
                        'class' => 'form-control',
                        'type'  => 'text',
                      
                        'value' => $dt_inmueble['text']
                    );

                     if($dt_inmueble['proximoproyecto'] == 'checked'){

                          $data['proximoproyecto'] = array(
                            'name'  => 'proximoproyecto',
                            'id'    => 'proximoproyecto',
                            'class' => 'form-control',
                            'type'  => 'checkbox',
                            'checked' => $dt_inmueble['proximoproyecto'],
                            'value' => '1'
                            
                        );
                    }else{
                        $data['proximoproyecto'] = array(
                            'name'  => 'proximoproyecto',
                            'id'    => 'proximoproyecto',
                            'class' => 'form-control',
                            'type'  => 'checkbox',
                            'value' => '1'
                            
                            
                        );
                    }

                   

                    $data['precioventa'] = array(
                        'name'  => 'precioventa',
                        'id'    => 'precioventa',
                        'class' => 'form-control',
                        'type'  => 'text',
                   
                        'value' => $dt_inmueble['precioVenta']
                    );

                     $data['descripcion'] = array(
                        'name'  => 'descripcion',
                        'id'    => 'descripcion',
                        'class' => 'form-control',
                        'type'  => 'text',
                        
                        'value' => $dt_inmueble['descripcionEspanol']
                    );

                       $data['descripcionIngles'] = array(
                        'name'  => 'descripcionIngles',
                        'id'    => 'descripcionIngles',
                        'class' => 'form-control',
                        'type'  => 'text',
                      
                        'value' => $dt_inmueble['descripcionIngles']
                    );

                    //$data['idcodinmueble'] = $dt_inmueble['idcodinmueble'];

                     $data['dormitorios'] = array(
                        'name'  => 'dormitorios',
                        'id'    => 'dormitorios',
                        'class' => 'form-control',
                        'type'  => 'text',
                  
                        'value' => $dt_inmueble['dormitorios']
                    );

                    $data['banos'] = array(
                        'name'  => 'banos',
                        'id'    => 'banos',
                        'class' => 'form-control',
                        'type'  => 'text',
                     
                        'value' => $dt_inmueble['banos']
                    );

                     $data['cocheras'] = array(
                        'name'  => 'cocheras',
                        'id'    => 'cocheras',
                        'class' => 'form-control',
                        'type'  => 'text',
                    
                        'value' => $dt_inmueble['cocheras_p']
                    );

                    $data['areaconstruida'] = array(
                        'name'  => 'areaconstruida',
                        'id'    => 'areaconstruida',
                        'class' => 'form-control',
                        'type'  => 'text',
                      
                        'value' => $dt_inmueble['areaConstruida']
                    );
         $data['imagen1'] = array(
            'name'  => 'imagen1',
            'id'    => 'imagen1',
            
            
            'data-classButton' => 'btn btn-default' ,
            'data-classInput' => 'form-control inline v-middle input-s',
            'type'  => 'file',
            'value' => $this->form_validation->set_value('imagen1'),
        );
         $data['imagen2'] = array(
            'name'  => 'imagen2',
            'id'    => 'imagen2',
            
            
            'data-classButton' => 'btn btn-default' ,
            'data-classInput' => 'form-control inline v-middle input-s',
            'type'  => 'file',
            'value' => $this->form_validation->set_value('imagen2'),
        );

         $data['imagen3'] = array(
            'name'  => 'imagen3',
            'id'    => 'imagen3',
            
            
            'data-classButton' => 'btn btn-default' ,
            'data-classInput' => 'form-control inline v-middle input-s',
            'type'  => 'file',
            'value' => $this->form_validation->set_value('imagen3'),
        );
          $data['imagen4'] = array(
            'name'  => 'imagen4',
            'id'    => 'imagen4',
            
            
            'data-classButton' => 'btn btn-default' ,
            'data-classInput' => 'form-control inline v-middle input-s',
            'type'  => 'file',
            'value' => $this->form_validation->set_value('imagen4'),
        );
           $data['imagen5'] = array(
            'name'  => 'imagen5',
            'id'    => 'imagen5',
            
            
            'data-classButton' => 'btn btn-default' ,
            'data-classInput' => 'form-control inline v-middle input-s',
            'type'  => 'file',
            'value' => $this->form_validation->set_value('imagen5'),
        );
            $data['imagen6'] = array(
            'name'  => 'imagen6',
            'id'    => 'imagen6',
            
            
            'data-classButton' => 'btn btn-default' ,
            'data-classInput' => 'form-control inline v-middle input-s',
            'type'  => 'file',
            'value' => $this->form_validation->set_value('imagen6'),
        );
        $data['imagen7'] = array(
            'name'  => 'imagen7',
            'id'    => 'imagen7',
            
            
            'data-classButton' => 'btn btn-default' ,
            'data-classInput' => 'form-control inline v-middle input-s',
            'type'  => 'file',
            'value' => $this->form_validation->set_value('imagen7'),
        );

                   


            $data['img_print'] = $dt_inmueble['imagen1'];
            $data['img_print2'] = $dt_inmueble['imagen2'];
            $data['img_print3'] = $dt_inmueble['imagen3'];
            $data['img_print4'] = $dt_inmueble['imagen4'];
            $data['img_print5'] = $dt_inmueble['imagen5'];
            $data['img_print6'] = $dt_inmueble['imagen6'];
            $data['img_footer'] = $dt_inmueble['imagen7'];

            ##
            $urba =  $dt_inmueble['idUrbanizacion'];       
            $data['estado']         = $dt_inmueble['estado'];
            $data['idinmueble']     = $dt_inmueble['idinmueble'];
            $data['idconservacion']     = $dt_inmueble['idconservacion'];
            $data['tipoinmueble']   = $this->proyectos->_lst_cbo_tipoinmueble();
            $data['gradoconservacion']   = $this->proyectos->_lst_cbo_gradoconservacion();
            $data['idtipoinmueble'] = $dt_inmueble['idTipoInmueble'];            
            //$data['departamento']   = $this->inmuebles->_lst_cbo_departamento();
            $data['departamentos'] = $this->proyectos->departamentos();
            //$data['provincia']      = $this->inmuebles->_lst_cbo_provincia();
            //$data['distrito']       = $this->inmuebles->_lst_cbo_distrito();
            $data['departamento'] = substr($dt_inmueble['idUrbanizacion'],0,4);
            $data['provincias'] = $this->proyectos->provincias(substr($dt_inmueble['idUrbanizacion'],0,4));
            $data['provincia'] = substr($dt_inmueble['idUrbanizacion'],0,5);
            $data['distritos'] = $this->proyectos->distritos(substr($dt_inmueble['idUrbanizacion'],0,5));
            $data['distrito'] = substr($dt_inmueble['idUrbanizacion'],0,7);
            $data['cod'] = $dt_inmueble['codigo'];
            
            
            
            
            $data['idtipomoneda']   = $dt_inmueble['idTipoMoneda'];
/*
            echo '<pre>';
                    echo $id_producto;
                    print_r($data);
                    echo '</pre>';
                    //die();
                    
                    die();
*/
            ## Listado de detalle de productos
                

            $data['page_title'] = 'Editar';
            ## Template Admin Dashboard
            $data['module'] = 'proyectos';
            $data['view_file'] = 'proyecto_frm_view';
            ## echo Modules::run('template/header_login',$data);
            echo Modules::run('template/admin_ajax',$data);
            ## echo Modules::run('template/footer_admin',$data);
        }elseif($id == '' or is_string($id)){
            redirect('proyectos/dashboard','refresh');
        }
    }

    

}

?>