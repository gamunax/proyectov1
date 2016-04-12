<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Tipoacceso_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	

	public function list_tipoaccesos(){
		$this->db->select('*');
        $this->db->from('ma_tipo_acceso');
        $this->db->order_by('id','desc');
        $query = $this->db->get();
        $arrayResultado = $query->result();
        return $arrayResultado;
	}

	public function _obtener_datos_tipoaccesos($id){
		 $this->db->where('id',(int)$id);
        $this->db->limit(1);
        $resultado = $this->db->get('ma_tipo_acceso');
        return $resultado->row_array();
	}

	

    public function update_tipoacceso($arrPosts,$id){
        $this->db->where('id', $id);
        return $this->db->update('ma_tipo_acceso', $arrPosts);
    }

    

   
}
