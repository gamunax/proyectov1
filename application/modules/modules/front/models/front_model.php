<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 */
class Front_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    

        ## LISTADO DE PROVINCIAS
    

   


  
    public function return_tracking($emision, $remito){
        
        $query = $this->db->query("select a.emision, a.remito, a.fecha_asigna, a.fecha_salida, a.id_operador, concat(o.apellido_paterno,' ',o.apellido_materno,' ', o.nombres) as nom_operador,  a.estado, p.descripcion as nom_estado, a.id_motivo, a.glosa, a.ubicacion from (SELECT @rownum:=0) r, di_asignaciones a, ma_parametros p, ma_operador o where a.estado = p.codint and a.id_operador = o.id and p.tabla='estado' and emision = '$emision' and remito = '$remito' order by a.id");
        return $query->result();
        
    }


  
}
