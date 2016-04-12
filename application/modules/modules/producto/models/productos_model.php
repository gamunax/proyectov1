<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 */

class Productos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }


    public function _lst_productos($tipo){
        $this->db->select('*');
        $this->db->from('cay_producto');
        $this->db->where('prod_tipo',$tipo);
        $this->db->order_by('prod_id','desc');
        $query = $this->db->get();
        $arrayResultado = $query->result();
        return $arrayResultado;
    }

    public function _lst_tecnico(){
        $this->db->select('*');
        $this->db->from('cay_page');
        $this->db->where('pag_tipo','form');
        $this->db->order_by('pag_id','desc');
        $query = $this->db->get();
        $arrayResultado = $query->result();
        return $arrayResultado;
    }

    public function _obtener_datos_tecnico($id,$form){
        $this->db->where('pag_id',(int)$id);
        $this->db->where('pag_tipo',$form);
        $this->db->limit(1);
        $resultado = $this->db->get('cay_page');
        return $resultado->row_array();
    }

    public function _lst_cbo_categoria(){
        $qry='SELECT cat_id,cat_nombre FROM cay_categoria WHERE  cat_estado = 1 ORDER BY cat_nombre desc';
        $result=$this->db->query($qry);
        $empresa['']='SELECCIONE CATEGORIA';
        foreach($result->result() as $row)
        {
            $empresa[$row->cat_id]=strtoupper($row->cat_nombre);
        };
        $result->free_result();
        return $empresa;
    }


    ## Productos
        public function _insert_productos($arrPosts){
            $this->db->insert('cay_producto', $arrPosts);
            return $this->db->insert_id();
        }

        public function _update_productos($arrPosts,$id){
            $this->db->where('prod_id', $id);
            return $this->db->update('cay_producto', $arrPosts);
        }

        public function _obtener_datos_productos($id){
            $this->db->where('prod_id',(int)$id);
            $this->db->limit(1);
            $resultado = $this->db->get('cay_producto');
            return $resultado->row_array();
        }

    ## Detalle de productos
        public function _lst_productos_details($idproducto){
            $this->db->select('*');
            $this->db->where('gale_producto_id',$idproducto);
            $this->db->where('gale_estado',1);
            $this->db->or_where('gale_estado',0);
            $this->db->from('cay_galeria_producto');
            $this->db->order_by('gale_id','desc');
            $query = $this->db->get();
            $arrayResultado = $query->result();
            return $arrayResultado;
        }

        public function _insert_productos_detail($arrPosts){
            $this->db->insert('cay_galeria_producto', $arrPosts);
            return $this->db->insert_id();
        }

        public function _update_productos_detail($arrPosts,$id){
            $this->db->where('gale_id', $id);
            return $this->db->update('cay_galeria_producto', $arrPosts);
        }

    #Orden
    public function _lst_orden(){
        $this->db->select('*');
        $this->db->from('cay_page');
        $this->db->where('pag_tipo','orden');
        $this->db->order_by('pag_id','desc');
        $query = $this->db->get();
        $arrayResultado = $query->result();
        return $arrayResultado;
    }

    public function _obtener_datos_orden($id,$form){
        $this->db->where('pag_id',(int)$id);
        $this->db->where('pag_tipo',$form);
        $this->db->limit(1);
        $resultado = $this->db->get('cay_page');
        return $resultado->row_array();
    }
}
