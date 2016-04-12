<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 */

class Proyectos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }


    public function listadoproyectos(){

        $query = $this->db->query("SELECT idinmueble, a.descripcion as departamento,  d.descripcion as destipoinmueble, b.descripcion as provincia, c.descripcion as distrito, titulo, inmueble.idTipoInmueble, idUrbanizacion,  banos, cocheras_p, cocheras_p, dormitorios, areaConstruida, descripcionEspanol, idTipoMoneda, activo, imagen1, imagen2, imagen3, imagen4, imagen5, imagen6, estado, idcodinmueble, idgradoconservacion, precio, idconservacion, imagen7, proximoproyecto, texto, text FROM inmueble, distrito a, distrito b, distrito c, tipoinmueble d WHERE substr(inmueble.idUrbanizacion,1,4) = a.id  and substr(inmueble.idUrbanizacion,1,5) = b.id  and substr(inmueble.idUrbanizacion,1,7) = c.id and d.idTipoInmueble = inmueble.idTipoInmueble and inmueble.idTipoInmueble = '17'");
        return $query->result();

        
    }

    public function _lst_inmuebles(){
        $this->db->select('*');
        $this->db->from('inmueble');        
        $this->db->order_by('idinmueble','asc');
        //$this->db->limit($start, $limit);
        $query = $this->db->get();
        $arrayResultado = $query->result();
        return $arrayResultado;
    }


    public function lst_venta(){

        $this->db->select('*');
        $this->db->from('inmueble');
        $this->db->where('idcodinmueble','Venta');//venta
        $this->db->order_by('idinmueble','asc');
        $query = $this->db->get();
        $arrayResultado = $query->result();
        return $arrayResultado;

    }

    public function lst_alquiler(){

        $this->db->select('*');
        $this->db->from('inmueble');
        $this->db->where('idcodinmueble','Alquiler');//alquiler
        $this->db->order_by('idinmueble','asc');
        $query = $this->db->get();
        $arrayResultado = $query->result();
        return $arrayResultado;

    }

    public function get_inmueble($porpagina,$segmento)
      {
        $query = $this->db->get('inmueble',$porpagina,$segmento);
        if( $query->num_rows > 0 )
          return $query->result();
        else
          return FALSE;
      }
    public function _insert_inmuebles($arrPosts){
            $this->db->insert('inmueble', $arrPosts);
            return $this->db->insert_id();
    }

     public function _update_inmuebles($arrPosts,$id){
            $this->db->where('idinmueble', $id);
            return $this->db->update('inmueble', $arrPosts);
    }

     public function _obtener_datos_inmuebles($id){
            $this->db->where('idinmueble',(int)$id);
            $this->db->limit(1);
            $resultado = $this->db->get('inmueble');
            return $resultado->row_array();
    }

    public function detalleinmueble($id){
        $this->db->select('idinmueble, titulo, idTipoInmueble, idUrbanizacion, y.descripcion as desdistrito, banos, cocheras_p, cocheras_p, dormitorios, areaConstruida, descripcionEspanol, idTipoMoneda, activo, imagen1, imagen2, imagen3, imagen4, imagen5, imagen6, estado, idcodinmueble, idgradoconservacion, precio, idconservacion, proximoproyecto');
        $this->db->from('inmueble');
        $this->db->join('distrito y', 'inmueble.idUrbanizacion = y.id','left');            
        $this->db->where('idinmueble',(int)$id);
        $query = $this->db->get();
        return $query->result();
    }

     public function _lst_cbo_tipoinmueble(){
        $qry='SELECT idTipoInmueble , descripcion FROM tipoinmueble ORDER BY descripcion desc';
        $result=$this->db->query($qry);
        $empresa['']='Seleccione tipo inmueble';
        foreach($result->result() as $row)
        {
            $empresa[$row->idTipoInmueble]=strtoupper($row->descripcion);
        };
        $result->free_result();
        return $empresa;
    }

     public function _lst_cbo_gradoconservacion(){
        $qry='SELECT id , descripcion FROM gradoconservacion ORDER BY descripcion desc';
        $result=$this->db->query($qry);
        $conservacion['']='Seleccione grado de conservación';
        foreach($result->result() as $row)
        {
            $conservacion[$row->id]=strtoupper($row->descripcion);
        };
        $result->free_result();
        return $conservacion;
    }

     public function _lst_cbo_departamento(){
        $qry='SELECT id , descripcion FROM distrito where id like "01%" and length(id) = 4 ORDER BY descripcion desc'; 
        $result=$this->db->query($qry);
        $departamentos['']='Seleccione departamento';
        foreach($result->result() as $row)
        {
            $departamentos[$row->id]=strtoupper($row->descripcion);
        };
        $result->free_result();
        return $departamentos;
    }

     public function _lst_cbo_provincia(){
        $qry='SELECT id , descripcion FROM distrito where length(id) = 5 ORDER BY descripcion desc'; 
        $result=$this->db->query($qry);
        $provincia['']='Seleccione provincia';
        foreach($result->result() as $row)
        {
            $provincia[$row->id]=strtoupper($row->descripcion);
        };
        $result->free_result();
        return $provincia;
    }

     public function _lst_cbo_distrito(){
        $qry='SELECT id , descripcion FROM distrito where length(id) = 7 ORDER BY descripcion desc'; 
        $result=$this->db->query($qry);
        $distrito['']='Seleccione provincia';
        foreach($result->result() as $row)
        {
            $distrito[$row->id]=strtoupper($row->descripcion);
        };
        $result->free_result();
        return $distrito;
    }
    ## LISTADO DE DEPARTAMENTOS
    public function departamentos()
    {
        $query = $this->db->query('SELECT * FROM distrito where id like "01%" and  LENGTH(id) = 4 ORDER BY descripcion desc');
        return $query->result();
    }

    ## LISTADO DE PROVINCIAS
    public function provincias($idDepa)
    {
        $query = $this->db->query("SELECT * FROM distrito WHERE id LIKE '%".$idDepa."%' AND CHARACTER_LENGTH(id) = 5");
        return $query->result();
    }

    ## LISTADO DE DISTRITOS
    public  function distritos($idProv)
    {
        $query = $this->db->query("SELECT * FROM distrito WHERE id LIKE '%".$idProv."%' AND CHARACTER_LENGTH(id) = 7");
        return $query->result();
    }
}
?>