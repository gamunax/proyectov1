<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Tarifa_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	

	public function list_tarifas(){
		$this->db->select('*');
        $this->db->from('ma_tarifas');
        $this->db->order_by('id','desc');
        $query = $this->db->get();
        $arrayResultado = $query->result();
        return $arrayResultado;
	}

	public function _obtener_datos_tarifas($id){
		 $this->db->where('id',(int)$id);
        $this->db->limit(1);
        $resultado = $this->db->get('ma_tarifas');
        return $resultado->row_array();
	}

    public function _lst_cbo_servicios(){
      $qry='SELECT id , descripcion FROM ma_servicio ORDER BY descripcion desc';
        $result=$this->db->query($qry);
        
        $servicio['']='Seleccione un servicio';
        foreach($result->result() as $row)
        {
            $servicio[$row->id]=strtoupper($row->descripcion);
        };
        $result->free_result();
        return $servicio;
    }

	 public function _insert_tarifas($arrPosts){
            $this->db->insert('ma_tarifas', $arrPosts);
            return $this->db->insert_id();
    }
	

    public function update_tarifa($arrPosts,$id){
        $this->db->where('id', $id);
        return $this->db->update('ma_tarifas', $arrPosts);
    }

    

   
}
