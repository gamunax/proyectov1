<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Ubigeo_territorio_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	



    public function listarubigeo(){
        
        $query = $this->db->query("SELECT a.ID, a.UBIGEO, a.DESCRIPCION, a.COD_DESTINO, b.DESCRIPCION as NOM_DESTINO, a.ID_ZONA, c.DESCRIPCION AS NOM_ZONA, a.ID_TIPO_ACCESO, d.DESCRIPCION as NOM_TIPO_ACCESO, case when a.estado = 1 then 'Activo' else 'inactivo' end AS ESTADO FROM ma_ubigeo_territorio a, ma_destinos b, ma_zona c, ma_tipo_acceso d where a.COD_DESTINO = b.COD_DESTINO and a.ID_ZONA = c.ID and a.ID_TIPO_ACCESO = d.ID ORDER BY a.DESCRIPCION" );
        return $query->result();
    
      
    }

   

     public function buscar_operador($codigo){
        $query = $this->db->query("SELECT CONCAT(APELLIDO_PATERNO, ' ', APELLIDO_MATERNO) AS APELLIDOS, NOMBRES, CELULAR, COD_OPERADOR, DNI, ESTADO, TIPO_OPERADOR, ID FROM ma_operador WHERE (COD_OPERADOR='$codigo' or '$codigo'='x')  AND ESTADO = 1 ORDER BY APELLIDO_PATERNO, APELLIDO_MATERNO, NOMBRES" );
        return $query->result();
    }


   
}
