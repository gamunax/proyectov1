<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Parametros_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	

	public function list_parametros(){
		$this->db->select('*');
        $this->db->from('ma_parametros');
        $this->db->order_by('tabla','asc');
        $query = $this->db->get();
        $arrayResultado = $query->result();
        return $arrayResultado;
	}

	public function _obtener_datos_parametros($tabla, $codigo){
		 $this->db->where('tabla', $tabla);
         $this->db->where('codigo', $codigo);
        $this->db->limit(1);
        $resultado = $this->db->get('ma_parametros');
        return $resultado->row_array();
	}

	 public function _insert_parametros($arrPosts){
            $this->db->insert('ma_parametros', $arrPosts);
            return $this->db->insert_id();
    }
	

    public function update_parametro($arrPosts,$tabla, $codigo){
        $this->db->where('tabla', $tabla);
        $this->db->where('codigo', $codigo);
        return $this->db->update('ma_parametros', $arrPosts);
    }

    

   
}
