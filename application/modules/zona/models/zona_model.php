<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Zona_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	

	public function list_zonas(){
		$this->db->select('*');
        $this->db->from('ma_zona');
        $this->db->order_by('id','desc');
        $query = $this->db->get();
        $arrayResultado = $query->result();
        return $arrayResultado;
	}

	public function _obtener_datos_zonas($id){
		 $this->db->where('id',(int)$id);
        $this->db->limit(1);
        $resultado = $this->db->get('ma_zona');
        return $resultado->row_array();
	}


	public function _insert_zonas($arrPosts){
            $this->db->insert('ma_zona', $arrPosts);
            return $this->db->insert_id();
    }

	

    public function update_zona($arrPosts,$id){
        $this->db->where('id', $id);
        return $this->db->update('ma_zona', $arrPosts);
    }

    

   
}
