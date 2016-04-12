<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Envio_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	

	public function list_clientes(){
		$this->db->select('*');
        $this->db->from('ma_cliente');
        $this->db->order_by('id','desc');
        $query = $this->db->get();
        $arrayResultado = $query->result();
        return $arrayResultado;
	}

	public function _obtener_datos_clientes($id){
		 $this->db->where('id',(int)$id);
        $this->db->limit(1);
        $resultado = $this->db->get('ma_cliente');
        return $resultado->row_array();
	}

	

    public function update_cliente($arrPosts,$id){
        $this->db->where('id', $id);
        return $this->db->update('ma_cliente', $arrPosts);
    }

    

   
}
