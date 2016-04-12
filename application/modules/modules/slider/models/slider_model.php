<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Slider_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	

	public function _lst_banners_general(){
		$this->db->select('*');
                $this->db->from('cay_slider');
                $this->db->order_by('slide_id','desc');
                $query = $this->db->get();
                $arrayResultado = $query->result();
                return $arrayResultado;
	}

        public function _lst_banners_collections($id){
                $this->db->select('*');
                $this->db->from('cay_detalle_slider');
                $this->db->where('dslide_idslider',$id);
                $this->db->order_by('dslide_id','desc');
                $query = $this->db->get();
                $arrayResultado = $query->result();
                return $arrayResultado;
        }
        
        public function _insert_slider($arrPosts){
            $this->db->insert('cay_slider', $arrPosts);
            return $this->db->insert_id();
        }

        public function _update_slider($arrPosts,$id){
            $this->db->where('slide_id', $id);
            return $this->db->update('cay_slider', $arrPosts);
        }

        public function obtener_datos_slider($id){
            $this->db->where('slide_id',(int)$id);
            $this->db->limit(1);
            $resultado = $this->db->get('cay_slider');
            return $resultado->row_array();
        }

        ## Collections
        public function _insert_slider_collections($arrPosts){
            $this->db->insert('cay_detalle_slider', $arrPosts);
            return $this->db->insert_id();
        }

        public function _update_slider_collection($arrPosts,$id){
            $this->db->where('dslide_id', $id);
            return $this->db->update('cay_detalle_slider', $arrPosts);
        }

        public function obtener_datos_slider_collection($id){
            $this->db->where('dslide_id',(int)$id);
            $this->db->limit(1);
            $resultado = $this->db->get('cay_detalle_slider');
            return $resultado->row_array();
        }


}
