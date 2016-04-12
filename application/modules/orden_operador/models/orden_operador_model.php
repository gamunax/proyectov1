<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Orden_operador_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	

	public function list_orden_operadores(){
		// $this->db->select('*');
  //       $this->db->from('ma_tarifas');
  //       $this->db->order_by('id','desc');
  //       $query = $this->db->get();
  //       $arrayResultado = $query->result();
  //       return $arrayResultado;
        $query = $this->db->query("select b.ID,concat(APELLIDO_PATERNO,' ',APELLIDO_MATERNO,NOMBRES) as OPERADOR,EMI_ORDEN,INI_ORDEN,FIN_ORDEN,FECHAASIG,CANTIDAD,CONSUMO from ma_operador a,orden_servicio_operador b where a.ID=ID_OPERADOR");
        return $query->result();
	}


    public function _lst_cbo_operadores(){
      $qry="select id,concat(APELLIDO_PATERNO, ' ', APELLIDO_MATERNO, ' ', NOMBRES) as descripcion  from ma_operador order by APELLIDO_PATERNO";
        $result=$this->db->query($qry);
        
        $operador['']='Seleccione un operador';
        foreach($result->result() as $row)
        {
            $operador[$row->id]=strtoupper($row->descripcion);
        };
        $result->free_result();
        return $operador;
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


	public function _obtener_datos_orden_operadores($id){
		 $this->db->where('id',(int)$id);
        $this->db->limit(1);
        $resultado = $this->db->get('orden_servicio_operador');
        return $resultado->row_array();
	}

	 public function _insert_orden_operadores($arrPosts){
            $this->db->insert('orden_servicio_operador', $arrPosts);
            return $this->db->insert_id();
    }
	

    public function update_orden_operador($arrPosts,$id){
        $this->db->where('id', $id);
        return $this->db->update('orden_servicio_operador', $arrPosts);
    }

    

   
}
