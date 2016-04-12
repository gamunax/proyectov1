<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Configuracion_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	

    public function list_impresion_sticker(){
        $query = $this->db->query("select CODIGO, DESCRIPCION from ma_parametros where tabla = 'impresion' and estado = 1");
        return $query->result();
    }

    public function abrir_config_bd(){
        $this->db->select('*');
        $this->db->from('master');
        $query = $this->db->get();
        $arrayResultado = $query->result();
        return $arrayResultado;
    
    }


	 public function _insert_configuraciones($arrPosts){
            $this->db->insert('master', $arrPosts);
            return $this->db->insert_id();
    }
	

    public function update_configuracion($arrPosts,$id){
        $this->db->where('id', $id);
        return $this->db->update('master', $arrPosts);
    }

    

   
}
