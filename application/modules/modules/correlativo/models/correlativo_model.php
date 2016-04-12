<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Correlativo_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	

	public function list_correlativos(){
		// $this->db->select('*');
  //       $this->db->from('ma_tarifas');
  //       $this->db->order_by('id','desc');
  //       $query = $this->db->get();
  //       $arrayResultado = $query->result();
  //       return $arrayResultado;
        $query = $this->db->query("select b.ID, a.DESCRIPCION as NOM_OFICINA, b.TIPO_DOC, c.DESCRIPCION as NOM_TIPODOC, b.SERIE, b.NUMERO from ma_oficina a, ma_correlativo_oficina b, ma_parametros c where a.ID = b.ID_OFICINA and b.TIPO_DOC = c.CODIGO and c.TABLA = 'tipodoc'");
        return $query->result();
	}


    public function _lst_cbo_oficinas(){
      $qry='select id, descripcion from ma_oficina';
        $result=$this->db->query($qry);
        
        $oficina['']='Seleccione una oficina';
        foreach($result->result() as $row)
        {
            $oficina[$row->id]=strtoupper($row->descripcion);
        };
        $result->free_result();
        return $oficina;
    }

    public function _lst_cbo_tipodocs(){
      $qry="select codigo as id, descripcion from ma_parametros where tabla='tipodoc'";
        $result=$this->db->query($qry);
        
        $tipodoc['']='Seleccione Documento';
        foreach($result->result() as $row)
        {
            $tipodoc[$row->id]=strtoupper($row->descripcion);
        };
        $result->free_result();
        return $tipodoc;
    }


	public function _obtener_datos_correlativos($id){
		 $this->db->where('id',(int)$id);
        $this->db->limit(1);
        $resultado = $this->db->get('ma_correlativo_oficina');
        return $resultado->row_array();
	}

	 public function _insert_correlativos($arrPosts){
            $this->db->insert('ma_correlativo_oficina', $arrPosts);
            return $this->db->insert_id();
    }
	

    public function update_correlativo($arrPosts,$id){
        $this->db->where('id', $id);
        return $this->db->update('ma_correlativo_oficina', $arrPosts);
    }

    

   
}
