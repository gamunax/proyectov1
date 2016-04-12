<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Cliente_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	

	public function list_clientes(){


        $query = $this->db->query("SELECT ID, TIPO_CLIENTE, DOCUMENTO, NROCLIENTE, CASE WHEN TIPO_CLIENTE = 'J' THEN RAZON_SOCIAL ELSE CONCAT(APELLIDO_PATERNO, ' ', APELLIDO_MATERNO, ' ', NOMBRES) END RAZON_SOCIAL, DIRECCION, ESTADO FROM ma_cliente  ORDER BY ID ASC");
        
        return $query->result();

		
	}

    public function list_cliente_paquete_cant($idcliente){


      

        $this->db->where('id_cliente',(int)$idcliente);
        $this->db->limit(1);
        $resultado = $this->db->get('ma_cliente_paquete');
        return $resultado->row_array();
    }

    public function list_paquetes(){

        $qry='SELECT ID, DESCRIPCION, ESTADO  FROM ma_paquete_tarifario ORDER BY DESCRIPCION desc';
        $result=$this->db->query($qry);
        $paquete['']='Seleccione paquete';
        foreach($result->result() as $row)
        {
            $paquete[$row->ID]=strtoupper($row->DESCRIPCION);
        };
        $result->free_result();
        return $paquete;

    }

	public function _obtener_datos_clientes($id){
		 $this->db->where('id',(int)$id);
        $this->db->limit(1);
        $resultado = $this->db->get('ma_cliente');
        return $resultado->row_array();
	}

    public function _obtener_datos_paquete_cliente($id){
         $this->db->where('id_cliente',(int)$id);
        $this->db->limit(1);
        $resultado = $this->db->get('ma_cliente_paquete');
        return $resultado->row_array();
    }

	public function _insert_clientes($arrPosts){
            $this->db->insert('ma_cliente', $arrPosts);
            return $this->db->insert_id();
    }

    public function _insert_clientes_paquete($arrPosts){
            $this->db->insert('ma_cliente_paquete', $arrPosts);
            return $this->db->insert_id();
    }

    public function update_cliente($arrPosts,$id){
        $this->db->where('id', $id);
        return $this->db->update('ma_cliente', $arrPosts);
    }

    public function update_cliente_paquete($arrPosts,$id){
        $this->db->where('id_cliente', $id);
        return $this->db->update('ma_cliente_paquete', $arrPosts);
    }

    

   
}
