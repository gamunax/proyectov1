<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 */

class Categoria_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }


    public function _lst_categoria(){
        $this->db->select('*');
        $this->db->from('cay_categoria');
        $this->db->order_by('cat_nombre','desc');
        $query = $this->db->get();
        $arrayResultado = $query->result();
        return $arrayResultado;
    }

    public function _lst_cbo_categoria(){
        $qry='SELECT cat_id,cat_nombre FROM cay_categoria ORDER BY cat_nombre desc';
        $result=$this->db->query($qry);
        $empresa['0']='Nivel Superior Categoria';
        foreach($result->result() as $row)
        {
            $empresa[$row->cat_id]=$row->cat_nombre;
        };
        $result->free_result();
        return $empresa;
    }

    public function _insert_categoria($arrPosts){
        $this->db->insert('cay_categoria', $arrPosts);
        return $this->db->insert_id();
    }

    public function _update_categoria($arrPosts,$id){
        $this->db->where('cat_id', $id);
        return $this->db->update('cay_categoria', $arrPosts);
    }

    public function _listado_categoria($id){
        $this->db->where('cat_padre',(int)$id);
        $this->db->from('cay_categoria');
        $this->db->order_by('cat_nombre','desc');
        $query = $this->db->get();
        $arrayResultado = $query->result();
        return $arrayResultado;
    }

    public function _obtener_datos_categoria($id){
        $this->db->where('cat_id',(int)$id);
        $this->db->limit(1);
        $resultado = $this->db->get('cay_categoria');
        return $resultado->row_array();
    }



}
