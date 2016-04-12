<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 */
class Front_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function caracteristicas()
    {
        $query = $this->db->query("SELECT * FROM caracteristicas");
        return $query->result();
    }

      ## LISTADO DE DEPARTAMENTOS
    public function departamentos()
    {
        $query = $this->db->query("SELECT * FROM distrito where LENGTH(id) = 4 and id like '01%'");
        return $query->result();
    }

        ## LISTADO DE PROVINCIAS
    public function provincias($idDepa)
    {
        $query = $this->db->query("SELECT * FROM distrito WHERE id LIKE '%".$idDepa."%' AND LENGTH(id) = 5");
        return $query->result();
    }
     public function detalleinmueble($id){
        $this->db->select('idinmueble, titulo, title, idTipoInmueble, idUrbanizacion, y.descripcion as desdistrito, banos, cocheras_p, cocheras_p, dormitorios, areaConstruida, descripcionEspanol, descripcionIngles, idTipoMoneda, activo, imagen1, imagen2, imagen3, imagen4, imagen5, imagen6, estado, idcodinmueble, idgradoconservacion, precio, idconservacion');
        $this->db->from('inmueble');
        $this->db->join('distrito y', 'inmueble.idUrbanizacion = y.id','left');            
        $this->db->where('idinmueble',(int)$id);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row_array();
    }
     public function detalleinmueble2($id){
        $this->db->select('idinmueble, titulo, title, idTipoInmueble, idUrbanizacion, y.descripcion as desdistrito, banos, cocheras_p, cocheras_p, dormitorios, areaConstruida, descripcionEspanol, descripcionIngles, idTipoMoneda, activo, imagen1, imagen2, imagen3, imagen4, imagen5, imagen6, estado, idcodinmueble, idgradoconservacion, precio, idconservacion');
        $this->db->from('inmueble');
        $this->db->join('distrito y', 'inmueble.idUrbanizacion = y.id','left');            
        $this->db->where('idinmueble',(int)$id);
        $this->db->limit(1);
        $query = $this->db->get();
        $arrayResultado = $query->result();
        return $arrayResultado;
    }

     public function _lst_proyectos(){
        $this->db->select('idinmueble, titulo, title, idTipoInmueble, idUrbanizacion, y.descripcion as desdistrito, banos, cocheras_p, cocheras_p, dormitorios, areaConstruida, SUBSTRING(descripcionEspanol,1,110) as descripcionEspanol, SUBSTRING(descripcionIngles,1,110) as descripcionIngles, idTipoMoneda, activo, imagen1, imagen2, imagen3, imagen4, imagen5, imagen6, imagen7, estado, idcodinmueble, idgradoconservacion, precio, idconservacion, texto, text', FALSE);
        $this->db->from('inmueble');
        $this->db->join('distrito y', 'inmueble.idUrbanizacion = y.id','left');            
        $this->db->where('idTipoInmueble','17');
        $this->db->where('proximoproyecto','checked');
        
        $query = $this->db->get();
        $arrayResultado = $query->result();
        return $arrayResultado;
    }

     public function _lst_proyectos2(){
        $this->db->select('idinmueble, titulo, title, idTipoInmueble, idUrbanizacion, y.descripcion as desdistrito, banos, cocheras_p, cocheras_p, dormitorios, areaConstruida, SUBSTRING(descripcionEspanol,1,110) as descripcionEspanol, SUBSTRING(descripcionIngles,1,110) as descripcionIngles , idTipoMoneda, activo, imagen1, imagen2, imagen3, imagen4, imagen5, imagen6, imagen7, estado, idcodinmueble, idgradoconservacion, precio, idconservacion, texto, text', FALSE);
        $this->db->from('inmueble');
        $this->db->join('distrito y', 'inmueble.idUrbanizacion = y.id','left');            
        $this->db->where('idTipoInmueble','17');
        
        $query = $this->db->get();
        $arrayResultado = $query->result();
        return $arrayResultado;
    }



    ## LISTADO DE DISTRITOS
    public  function distritos($idProv)
    {
        $query = $this->db->query("SELECT * FROM distrito WHERE id LIKE '%".$idProv."%' AND LENGTH(id) = 7 order by descripcion");
        return $query->result();
    }

    public function mostrardistrito($distrito){
        $query = $this->db->query("SELECT * FROM distrito WHERE id LIKE '%".$distrito."%' AND LENGTH(id) = 7");
        return $query->result();   
    }

    public  function tipoinmueble()
    {
        $query = $this->db->query("SELECT * FROM tipoinmueble order by prioridad");
        return $query->result();
    }

    
    public function resultado($av, $departamento, $provincia, $distrito, $grado, $area, $tipoinmueble, $tipomoneda, $preciodesde, $preciohasta, $dormitorios, $banos, $cochera,  $descripcion, $caracteristica){

        if($av == 'Alquiler'){
           $this->db->select('idinmueble, titulo, idTipoInmueble, idUrbanizacion, y.descripcion as desdistrito, banos, cocheras_p, cocheras_p, dormitorios, areaConstruida, SUBSTRING(descripcionEspanol,1,120) as descripcionEspanol, idTipoMoneda, activo, imagen1, imagen2, imagen3, imagen4, imagen5, imagen6, estado, idcodinmueble, idgradoconservacion, precio, idconservacion, title, SUBSTRING(descripcionIngles,1,120) as descripcionIngles, idcaracteristica ', FALSE);
            $this->db->from('inmueble');
            $this->db->join('distrito y', 'inmueble.idUrbanizacion = y.id','left');            
            $this->db->where('precio >= ', $preciodesde);
            $this->db->where('precio <= ', $preciohasta);
            $this->db->where('estado', '1');
            $this->db->where('idcodinmueble', 'Alquiler');
            if($tipoinmueble == '%'){
               null;
            }else{
                $this->db->where('idtipoinmueble',$tipoinmueble);


            }
            if($departamento == '%'){
               null;
            }else{
                
                 $this->db->like('idurbanizacion' , $departamento, 'after' );
             
               
            }
            if($provincia == '%'){
               null;
            }else{
                $this->db->like('idurbanizacion', $provincia, 'after');
            }
            if($distrito == '%'){
               null;
            }else{
                $this->db->like('idurbanizacion', $distrito, 'after');
            }
            if($dormitorios == '%'){
               null;
            }else{
                $this->db->where('dormitorios', $dormitorios);
            }
            if($banos == '%'){
               null;
            }else{
                $this->db->where('banos', $banos);
            }
            if($cochera == '%'){
               null;
            }else{
                $this->db->where('cocheras_p', $cochera);
            }
            if($tipomoneda == '%'){
               null;
            }else{
                $this->db->where('idtipomoneda', $tipomoneda);
            }
            if($descripcion == '%'){
               null;
            }else{
                $this->db->where('descripcionEspanol', $descripcion);
            }
            if($caracteristica == '%'){
               null;
            }else{
                $this->db->where('idcaracteristica', $caracteristica);
            }
            if($area == '%'){
               null;
            }else{
                if($area == '1'){
                    $this->db->where('areaConstruida >=', 50);    
                    $this->db->where('areaConstruida <=', 100);
                }elseif($area == '2'){
                    $this->db->where('areaConstruida >=', 101);    
                    $this->db->where('areaConstruida <=', 150);
                }elseif($area == '3'){
                    $this->db->where('areaConstruida >=', 151);    
                    $this->db->where('areaConstruida <=', 200);
                }elseif($area == '4'){
                    $this->db->where('areaConstruida >=', 201);    
                    $this->db->where('areaConstruida <=', 350);
                }elseif($area == '5'){
                    $this->db->where('areaConstruida >=', 351);    
                }
            }
            
            
            /*
         
            $this->db->like('dormitorios', $dormitorios, 'after');
            $this->db->like('banos', $banos, 'after');
            $this->db->like('cocheras_p', $cochera, 'after');
            $this->db->like('idtipomoneda', $idtipomoneda, 'after');
            $this->db->like('descripcionEspanol', $descripcion);
            */
      
        
         
        }else{
           $this->db->select('idinmueble, titulo, idTipoInmueble, idUrbanizacion, y.descripcion as desdistrito, banos, cocheras_p, cocheras_p, dormitorios, areaConstruida, descripcionEspanol, idTipoMoneda, activo, imagen1, imagen2, imagen3, imagen4, imagen5, imagen6, estado, idcodinmueble, idgradoconservacion, precio, idconservacion, title, descripcionIngles, idcaracteristica');
            $this->db->from('inmueble');
            $this->db->join('distrito y', 'inmueble.idUrbanizacion = y.id','left');            
            $this->db->where('precio >= ', $preciodesde);
            $this->db->where('precio <= ', $preciohasta);
            $this->db->where('estado', '1');
            $this->db->where('idcodinmueble', 'Compra');
            if($tipoinmueble == '%'){
               null;
            }else{
                $this->db->where('idtipoinmueble',$tipoinmueble);


            }
            if($departamento == '%'){
               null;
            }else{
                
                 $this->db->like('idurbanizacion' , $departamento, 'after' );
             
               
            }
            if($provincia == '%'){
               null;
            }else{
                $this->db->like('idurbanizacion', $provincia, 'after');
            }
            if($distrito == '%'){
               null;
            }else{
                $this->db->like('idurbanizacion', $distrito, 'after');
            }
            if($dormitorios == '%'){
               null;
            }else{
                $this->db->where('dormitorios', $dormitorios);
            }
            if($banos == '%'){
               null;
            }else{
                $this->db->where('banos', $banos);
            }
            if($cochera == '%'){
               null;
            }else{
                $this->db->where('cocheras_p', $cochera);
            }
            if($tipomoneda == '%'){
               null;
            }else{
                $this->db->where('idtipomoneda', $tipomoneda);
            }
            if($descripcion == '%'){
               null;
            }else{
                $this->db->where('descripcionEspanol', $descripcion);
            }
             if($caracteristica == '%'){
               null;
            }else{
                $this->db->where('idcaracteristica', $caracteristica);
            }
            if($area == '%'){
               null;
            }else{
                if($area == '1'){
                    $this->db->where('areaConstruida >=', 50);    
                    $this->db->where('areaConstruida <=', 100);
                }elseif($area == '2'){
                    $this->db->where('areaConstruida >=', 101);    
                    $this->db->where('areaConstruida <=', 150);
                }elseif($area == '3'){
                    $this->db->where('areaConstruida >=', 151);    
                    $this->db->where('areaConstruida <=', 200);
                }elseif($area == '4'){
                    $this->db->where('areaConstruida >=', 201);    
                    $this->db->where('areaConstruida <=', 350);
                }elseif($area == '5'){
                    $this->db->where('areaConstruida >=', 351);    
                }
            }
            
        }

        $query = $this->db->get();
        
        return $query->result();
    }


  
    ## LISTADO SLIDER
    public function sliderJson()
    {
        $this->db->select('*');
        $this->db->from('cay_detalle_slider');
        $this->db->where('dslide_idslider', 1);
        $this->db->where('dslide_estado', 1);
        $query = $this->db->get();
        return $query->result();
    }

  
}
