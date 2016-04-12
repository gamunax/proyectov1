<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 */
class Reporte_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    

        ## LISTADO DE PROVINCIAS
    

   public function return_reportexremito($fecha1, $fecha2, $estado,$documento){

        //if ($documento=='undefined') {

          // $query = $this->db->query("select a.EMISION, a.REMITO, a.FECHA_REGISTRO, a.ID_CLIENTE, case when c.TIPO_CLIENTE = 'J' THEN c.RAZON_SOCIAL ELSE concat(c.APELLIDO_PATERNO,' ', c.APELLIDO_MATERNO, ' ', c.NOMBRES) END NOM_CLIENTE, c.NROCLIENTE, a.CONSIGNADO, a.DIRECCION_ENTREGA, d.DESCRIPCION from envio a, di_asignaciones b, ma_cliente c,ma_parametros d where a.EMISION = b.EMISION and a.REMITO = b.REMITO and a.ID_CLIENTE = c.ID and a.FECHA_REGISTRO >= '$fecha1' and a.FECHA_REGISTRO <= '$fecha2' and b.ESTADO = d.CODIGO and b.ESTADO='$estado'");
        
       /* }
        else{

*/
             $query = $this->db->query("select a.EMISION, a.REMITO, a.FECHA_REGISTRO, a.ID_CLIENTE, case when c.TIPO_CLIENTE = 'J' THEN c.RAZON_SOCIAL ELSE concat(c.APELLIDO_PATERNO,' ', c.APELLIDO_MATERNO, ' ', c.NOMBRES) END NOM_CLIENTE, c.NROCLIENTE, a.CONSIGNADO, a.DIRECCION_ENTREGA, d.DESCRIPCION from envio a, di_asignaciones b, ma_cliente c,ma_parametros d where a.EMISION = b.EMISION and a.REMITO = b.REMITO and a.ID_CLIENTE = c.ID and a.FECHA_REGISTRO >= '$fecha1' and a.FECHA_REGISTRO <= '$fecha2' and b.ESTADO = d.CODIGO and b.ESTADO='$estado' and (c.DOCUMENTO='$documento' or '$documento'= '%') and d.tabla='estado'");

            
        
  //      }
        
        
        return $query->result();

    }


   public function buscar_estado(){
        
        $query = $this->db->query("select CODIGO, DESCRIPCION from ma_parametros WHERE TABLA='estado'");
        return $query->result();
    }

  
}
