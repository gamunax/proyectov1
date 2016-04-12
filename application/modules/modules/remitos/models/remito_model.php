<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Remito_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	

	public function list_remitos(){
        $query = $this->db->query("SELECT ma_remito.ID, ma_remito.EMISION, ma_remito.REMITO_INI, ma_remito.REMITO_FIN, ma_oficina.descripcion AS DESC_OFICINA, ma_destinos.DESCRIPCION AS DESC_DESTINO, ma_remito.ESTADO, ma_remito.TIPO FROM ma_remito, ma_oficina, ma_destinos WHERE ma_remito.ID_OFICINA = ma_oficina.ID AND ma_remito.ID_DESTINO = ma_destinos.ID");
        return $query->result();        
		
	}

	public function _obtener_datos_remitos($id){
		 $this->db->where('id',(int)$id);
        $this->db->limit(1);
        $resultado = $this->db->get('ma_remito');
        return $resultado->row_array();
	}

	 public function _insert_remitos($arrPosts){
            $this->db->insert('ma_remito', $arrPosts);
            return $this->db->insert_id();
    }
	

    public function update_remito($arrPosts,$id){
        $this->db->where('id', $id);
        return $this->db->update('ma_remito', $arrPosts);
    }

    

   
}
