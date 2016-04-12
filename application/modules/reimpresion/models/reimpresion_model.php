<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Reimpresion_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	

	public function list_paquetes(){
		$this->db->select('*');
        $this->db->from('ma_paquete_tarifario');
        $this->db->order_by('id','desc');
        $query = $this->db->get();
        $arrayResultado = $query->result();
        return $arrayResultado;
	}

    public function list_paquete($idpaquete){
         $query = $this->db->query("select d.ID AS ID_PAQUETE_DET, a.ID AS ID_ZONA, a.DESCRIPCION as NOM_ZONA, b.ID AS ID_TARIFA,b.CODIGO as COD_TARIFA, b.DESCRIPCION AS NOM_TARIFA, c.ID as ID_PAQUETE, c.DESCRIPCION as NOM_PAQUETE, b.TFA_BASE, b.TFA_EXCESO from ma_zona a, ma_tarifas b, ma_paquete_tarifario c, ma_paquete_tarifario_det d where a.ID = d.ID_ZONA and b.ID = D.ID_TARIFA and c.ID = D.ID_PAQUETE AND c.ESTADO = 1 and c.ID = $idpaquete");
        return $query->result();
        
        
    }

    public function list_zonas(){
        $this->db->select('*');
        $this->db->from('ma_zona');
        $this->db->order_by('id','desc');
        $query = $this->db->get();
        $arrayResultado = $query->result();
        return $arrayResultado;
    }

    public function list_tarifas(){
        $this->db->select('*');
        $this->db->from('ma_tarifas');
        $this->db->order_by('id','desc');
        $query = $this->db->get();
        $arrayResultado = $query->result();
        return $arrayResultado;
    }

     public function list_change_tarifas($id){
        $this->db->select('*');
        $this->db->from('ma_tarifas');
        $this->db->where('id', $id);
        $this->db->order_by('id','desc');
        $query = $this->db->get();
        $arrayResultado = $query->result();
        return $arrayResultado;
    }

    public function _update_detalle_paquetes($arrPosts, $id){
            $this->db->where('id', $id);
            return $this->db->update('ma_paquete_tarifario_det', $arrPosts);
        }

     public function _insert_detalle_paquetes($arrPosts){
            $this->db->insert('ma_paquete_tarifario_det', $arrPosts);
            return $this->db->insert_id();
        }
    public function _delete_detalle_paquetes($id){
            $this->db->where('id', $id);
            $this->db->delete('ma_paquete_tarifario_det');
        }

	public function _obtener_datos_paquetes($id){
		 $this->db->where('id',(int)$id);
        $this->db->limit(1);
        $resultado = $this->db->get('ma_paquete_tarifario');
        return $resultado->row_array();
	}

	 public function _insert_paquetes($arrPosts){
            $this->db->insert('ma_paquete_tarifario', $arrPosts);
            return $this->db->insert_id();
    }
	

    public function update_paquete($arrPosts,$id){
        $this->db->where('id', $id);
        return $this->db->update('ma_paquete_tarifario', $arrPosts);
    }

    

   
}
