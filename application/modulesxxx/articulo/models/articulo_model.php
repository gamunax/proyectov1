<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Articulo_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	

	public function list_articulos(){
		$this->db->select('*');
        $this->db->from('ma_articulo');
        $this->db->order_by('id','desc');
        $query = $this->db->get();
        $arrayResultado = $query->result();
        return $arrayResultado;
	}

	public function _obtener_datos_articulos($id){
		 $this->db->where('id',(int)$id);
        $this->db->limit(1);
        $resultado = $this->db->get('ma_articulo');
        return $resultado->row_array();
	}

	

    public function update_articulo($arrPosts,$id){
        $this->db->where('id', $id);
        return $this->db->update('ma_articulo', $arrPosts);
    }

    

   
}
