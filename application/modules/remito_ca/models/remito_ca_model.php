<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Remito_ca_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	

	public function list_remitosca(){
        $query = $this->db->query("SELECT ID, EMISION, REMITO_INICIAL, REMITO_FINAL, ESTADO FROM ma_remitos_ca WHERE ESTADO = 1");
        return $query->result();        
		
	}

	public function _obtener_datos_remitos($id){
		 $this->db->where('id',(int)$id);
        $this->db->limit(1);
        $resultado = $this->db->get('ma_remitos_ca');
        return $resultado->row_array();
	}

	 public function _insert_remitos($arrPosts){
            $this->db->insert('ma_remitos_ca', $arrPosts);
            return $this->db->insert_id();
    }
	

    public function update_remito($arrPosts,$id){
        $this->db->where('id', $id);
        return $this->db->update('ma_remitos_ca', $arrPosts);
    }

    

   
}
