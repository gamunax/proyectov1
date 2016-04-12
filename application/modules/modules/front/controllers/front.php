<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
*************************************************************
Página/Clase    : Modules/Controller/Front
Propósito       : Front-end
Notas           : N/A
Modificaciones  : N/A
******** Datos Creación *********
Autor           : Jan Pierre SM
Fecha y hora    : 02/11/2015
*************************************************************
*/
class Front extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('front_model','front');
        $this->load->library(array('session','form_validation','cart'));
        $this->load->helper(array('url','form'));
        $this->load->database('default');
    }

    ## HOME
    public function index()
    {
        //$data['title'] = "Cayman";
       // $data['slider'] = $this->front->sliderJson();
       /* $data['title'] = "Marmat";
        $data['url'] = '';
        $data['activeindex'] = "active";
        $data['activenosotros'] = "";
        $data['activenuestroservicios'] = "";
        $data['activecontacto'] = "";
        $data['activedetalleinmueble'] = "";
        $data['activeproyectos'] = "";
        $data['activetienesuninmueble'] = "";
        $data['activenecesitasinmueble'] = "";
        $data['slider'] = $this->front->sliderJson();
        $this->load->view('layout/header_front');
        $this->load->view('layout/head_front_home',$data);*/

        $this->load->view('index_view');
        //$this->load->view('layout/footer_view');
        /*$this->load->view('layout/footer_home_front_view');*/
    }
    
    public function nosotros()
    {   
        //$data['title'] = "Cayman";
       // $data['slider'] = $this->front->sliderJson();
        
        
        
        $this->load->view('nosotros');
        
    }

    public function mostrar_tracking($emision, $remito){
        
        $data = $this->front->return_tracking($emision, $remito);
        echo json_encode($data);
    }



    public function tracking()
    {   
        
        
        
        $this->load->view('tracking_envio');
        
    }


    public function nuestroservicios()
    {
        //$data['title'] = "Cayman";
       // $data['slider'] = $this->front->sliderJson();
         $data['activeindex'] = "";
        $data['activenosotros'] = "";
        $data['activenuestroservicios'] = "active";
        $data['activecontacto'] = "";
        $data['activedetalleinmueble'] = "";
        $data['activeproyectos'] = "";
        $data['activetienesuninmueble'] = "";
        $data['activenecesitasinmueble'] = "";
        $data['url'] = 'NUESTROS SERVICIOS';
        $this->load->view('layout/header_front',  $data);
        $this->load->view('layout/head_front_view');
        $this->load->view('nuestroservicios');
        $this->load->view('layout/footer_view');
    }
    public function contactenos()
    {
        //$data['title'] = "Cayman";
       // $data['slider'] = $this->front->sliderJson();
         
        /*$this->load->view('layout/head_front_view');*/
        
        $this->load->view('contactenos');
        


        /*$this->load->view('layout/footer_home_front_view');*/
    }

    public function buscar($av, $dep, $prov, $dis, $gradocon, $area, $tipoinmueble, $tipomoneda, $preciodesde, $preciohasta, $dormitorio, $bano, $cochera, $descripcion, $caracteristica){
           if(empty($av)){
                $av = "%";
                
            }
            if($dep == 'A'){
                $dep = "%";
                
            }
            if($prov == 'A'){
                $prov = "%";
                
            }
            if($dis == 'A'){
                 $dis = "%";
            }
            if($gradocon = 'A'){
                $gradocon = "%";
                
            }
            if($area == 'A'){
                $area = "%";
                
            }
            if($tipoinmueble == 'A'){
                $tipoinmueble = "%";
                
            }
            if($tipomoneda == 'A'){
                $tipomoneda = "%";
                
            }
            if($preciodesde == 'A'){
                $preciodesde = 0;
                
            }
            if($preciohasta == 'A'){
                $preciohasta = 99999999;
                
            }
            if($dormitorio == 'A'){
                $dormitorio = "%";
                
            }
            if($bano == 'A'){
                $bano = "%";
                
            }
            if($cochera == 'A'){
                $cochera = "%";
                
            }
            if($descripcion == 'A'){
                $descripcion = "%";
                
            }
            if($caracteristica == 'A'){
                $caracteristica = "%";
                
            }
        $data = $this->front->resultado($av, $dep, $prov, $dis, $gradocon, $area, $tipoinmueble, $tipomoneda, $preciodesde, $preciohasta, $dormitorio, $bano, $cochera, $descripcion, $caracteristica);

         echo json_encode($data);
    }

    public function detalleinmueble($id){
        
         $data['activeindex'] = "";
         $data['headerfondonos2'] ="headerfondonos2";
        $data['activenosotros'] = "";
        $data['activenuestroservicios'] = "";
        $data['activecontacto'] = "";
        $data['activedetalleinmueble'] = "active";
        $data['activeproyectos'] = "";
        $data['activetienesuninmueble'] = "";
        $data['activenecesitasinmueble'] = "";
        $dt_inmueble= $this->front->detalleinmueble((int)$id);
        $data['id']  = $dt_inmueble['idinmueble'];
        $data['titulo'] = $dt_inmueble['titulo'];
        $data['tipo'] = $dt_inmueble['idcodinmueble'];
        $data['descripcion'] =  $dt_inmueble['descripcionEspanol'];
        $data['tipomoneda'] = $dt_inmueble['idTipoMoneda'];
        $data['precio'] = $dt_inmueble['precio'];
        $data['distrito'] = $dt_inmueble['desdistrito'];
        $data['area'] = $dt_inmueble['areaConstruida'];
        $data['habitacion'] = $dt_inmueble['dormitorios'];
        $data['banos'] = $dt_inmueble['banos'];
        $data['cocheras'] = $dt_inmueble['cocheras_p'];
        $data['imagen1'] = $dt_inmueble['imagen1'];
        $data['imagen2'] = $dt_inmueble['imagen2'];
        $data['imagen3'] = $dt_inmueble['imagen3'];
        $data['imagen4'] = $dt_inmueble['imagen4'];
        $data['imagen5'] = $dt_inmueble['imagen5'];
        $data['imagen6'] = $dt_inmueble['imagen6'];
        $data['detalle'] = $this->front->detalleinmueble2((int)$id);
        $data['url'] = '';
        /*$this->load->view('layout/head_front_view');*/
        $this->load->view('layout/header_front', $data);
        $this->load->view('layout/head_front_view',  $data);
        $this->load->view('detalleinmueble');
        $this->load->view('layout/footer_view');
        //echo json_encode($dt_inmueble);



    }

    public function departamentos(){
        $data = $this->front->departamentos();
         echo json_encode($data);
    }

    public function caracteristicas(){
        $data = $this->front->caracteristicas();
         echo json_encode($data);
    }



    public function mostrardistritos($distrito){
        $data = $this->front->mostrardistrito($distrito);
         echo json_encode($data);   
    }

    public function tipoinmueble(){
        $data = $this->front->tipoinmueble();
         echo json_encode($data);
    }

     public function provincias($dep){
        $data = $this->front->provincias($dep);
         echo json_encode($data);
    }

    public function distritos($prov){
        $data = $this->front->distritos($prov);
         echo json_encode($data);   
    }

     public function necesitaunsinmueble()
    {
        //$data['title'] = "Cayman";
       // $data['slider'] = $this->front->sliderJson();

        $data['activeindex'] = "";
        $data['activenosotros'] = "";
        $data['activenuestroservicios'] = "";
        $data['activecontacto'] = "";
        $data['activedetalleinmueble'] = "";
        $data['activeproyectos'] = "";
        $data['activetienesuninmueble'] = "";
        $data['activetienesuninmueble'] = "active";
        $data['url'] = 'NECESITAS UN INMUEBLE';
        /*$this->load->view('layout/head_front_view');*/
        $this->load->view('layout/header_front', $data);
        $this->load->view('layout/head_front_view');
        $this->load->view('necesitaunsinmueble');
        $this->load->view('layout/footer_view');
        /*$this->load->view('layout/footer_home_front_view');*/
    }

      public function proyectos()
    {
        //$data['title'] = "Cayman";
       // $data['slider'] = $this->front->sliderJson();

         $data['activeindex'] = "";
        $data['activenosotros'] = "";
        $data['activenuestroservicios'] = "";
        $data['activecontacto'] = "";
        $data['activedetalleinmueble'] = "";
        $data['activeproyectos'] = "";
        $data['activetienesuninmueble'] = "";
         $data['activeproyectos'] = "active";
        $data['url'] = 'PROYECTOS';
        /*$this->load->view('layout/head_front_view');*/
        $this->load->view('layout/header_front', $data);
        $this->load->view('layout/head_front_view');
        $this->load->view('proyectos');
        $this->load->view('layout/footer_view');
        /*$this->load->view('layout/footer_home_front_view');*/
    }

    public function resultadoproyectos(){
         $data = $this->front->_lst_proyectos();
         echo json_encode($data);
    }

     public function resultadoproyectos2(){
         $data = $this->front->_lst_proyectos2();
         echo json_encode($data);
    }
      public function tienesuninmueble()
    {
        //$data['title'] = "Cayman";
       // $data['slider'] = $this->front->sliderJson();

        $data['activeindex'] = "";
        $data['activenosotros'] = "";
        $data['activenuestroservicios'] = "";
        $data['activecontacto'] = "";
        $data['activedetalleinmueble'] = "";
        $data['activeproyectos'] = "";
        $data['activetienesuninmueble'] = "";
         $data['activeproyectos'] = "";
         $data['activetienesuninmueble'] = "active";
        $data['url'] = 'TIENE UN INMUEBLE';
        /*$this->load->view('layout/head_front_view');*/
        $this->load->view('layout/header_front',  $data);
        $this->load->view('layout/head_front_view');
        $this->load->view('tienesuninmueble');
         $this->load->view('layout/footer_view');
        /*$this->load->view('layout/footer_home_front_view');*/
    }


    
    
}