<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Operador_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	

	public function list_operadores(){
		 $query = $this->db->query("SELECT CONCAT(APELLIDO_PATERNO, ' ', APELLIDO_MATERNO) AS APELLIDOS, NOMBRES, CELULAR, COD_OPERADOR, DNI, ESTADO, TIPO_OPERADOR, ID FROM ma_operador");
		return $query->result();
		
				
		/*$this->db->select('*');
        $this->db->from('ma_operador');
        $this->db->order_by('id','desc');
        $query = $this->db->get();
        $arrayResultado = $query->result();
        return $arrayResultado;
        */
	}

	public function _obtener_datos_operadores($id){
		 $this->db->where('id',(int)$id);
        $this->db->limit(1);
        $resultado = $this->db->get('ma_operador');
        return $resultado->row_array();
	}

	public function _insert_operadores($arrPosts){
            $this->db->insert('ma_operador', $arrPosts);
            return $this->db->insert_id();
    }
	

    public function update_operador($arrPosts,$id){
        $this->db->where('id', $id);
        return $this->db->update('ma_operador', $arrPosts);
    }

    

   
}
