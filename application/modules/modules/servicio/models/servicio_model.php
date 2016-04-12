<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Servicio_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	

	public function list_servicios(){
		$this->db->select('*');
        $this->db->from('ma_servicio');
        $this->db->order_by('id','desc');
        $query = $this->db->get();
        $arrayResultado = $query->result();
        return $arrayResultado;
        
	}

	 public function _insert_servicios($arrPosts){
            $this->db->insert('ma_servicio', $arrPosts);
            return $this->db->insert_id();
    }

	public function _obtener_datos_servicios($id){
		 $this->db->where('id',(int)$id);
        $this->db->limit(1);
        $resultado = $this->db->get('ma_servicio');
        return $resultado->row_array();
	}

	

    public function update_servicio($arrPosts,$id){
        $this->db->where('id', $id);
        return $this->db->update('ma_servicio', $arrPosts);
    }

    

   
}
