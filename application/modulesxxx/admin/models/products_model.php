<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Products_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	

	public function last_products($id){
		$this->db->select('*');
        $this->db->from('cay_producto');
        $this->db->limit((int) $id);
        $this->db->order_by('prod_id','desc');
        $query = $this->db->get();
        $arrayResultado = $query->result();
        return $arrayResultado;
	}

	public function lst_noticias_id($id){
		$this->db->where('id',(int)$id);
		$this->db->select('*');
        $this->db->from('noticia');
        $this->db->limit(1);
        $query = $this->db->get();
        $arrayResultado = $query->result();
        return $arrayResultado;
	}

	public function rand_noticia(){
		$this->db->select('*');
        $this->db->from('noticia');
        $this->db->limit(5);
        $this->db->order_by('id', 'RANDOM');
        $query = $this->db->get();
        $arrayResultado = $query->result();
        return $arrayResultado;
	}

    public function _update_page($arrPosts,$id){
        $this->db->where('pag_id', $id);
        return $this->db->update('cay_page', $arrPosts);
    }

    public function _obtener_datos_page($tipo){
        $this->db->where('pag_tipo',$tipo);
        $this->db->where('pag_estado',1);
        $this->db->limit(1);
        $resultado = $this->db->get('cay_page');
        return $resultado->row_array();
    }

    #Orden
    public function _lst_contacto(){
        $this->db->select('*');
        $this->db->from('cay_page');
        $this->db->where('pag_tipo','contacto');
        $this->db->order_by('pag_id','desc');
        $query = $this->db->get();
        $arrayResultado = $query->result();
        return $arrayResultado;
    }

    public function _obtener_datos_contacto($id,$form){
        $this->db->where('pag_id',(int)$id);
        $this->db->where('pag_tipo',$form);
        $this->db->limit(1);
        $resultado = $this->db->get('cay_page');
        return $resultado->row_array();
    }
}
