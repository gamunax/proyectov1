<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Oficina_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	

	public function list_oficinas(){
		$this->db->select('*');
        $this->db->from('ma_oficina');
        $this->db->order_by('id','desc');
        $query = $this->db->get();
        $arrayResultado = $query->result();
        return $arrayResultado;
	}

	public function _obtener_datos_oficinas($id){
		 $this->db->where('id',(int)$id);
        $this->db->limit(1);
        $resultado = $this->db->get('ma_oficina');
        return $resultado->row_array();
	}

	 public function _insert_oficinas($arrPosts){
            $this->db->insert('ma_oficina', $arrPosts);
            return $this->db->insert_id();
    }
	

    public function update_oficina($arrPosts,$id){
        $this->db->where('id', $id);
        return $this->db->update('ma_oficina', $arrPosts);
    }

    

   
}
