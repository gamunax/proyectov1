<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 */

class Usuarios_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function _lst_usuarios(){
    	$this->db->select('*');
        $this->db->from('ma_usuario');        
        $this->db->order_by('nombre','desc');
        $query = $this->db->get();
        $arrayResultado = $query->result();
        return $arrayResultado;
    }
    public function _insert_usuarios($arrPosts){
            $this->db->insert('ma_usuario', $arrPosts);
            return $this->db->insert_id();
    }

     public function _update_usuarios($arrPosts,$id){
            $this->db->where('id', $id);
            return $this->db->update('ma_usuario', $arrPosts);
    }

     public function _obtener_datos_usuarios($id){
            $this->db->where('id',(int)$id);
            $this->db->limit(1);
            $resultado = $this->db->get('ma_usuario');
            return $resultado->row_array();
        }
}
?>