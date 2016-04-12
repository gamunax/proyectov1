<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Rest_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    

    public function return_envio($emision, $remito){
        
        //$query = $this->db->query("select * from envio a, ma_destinos b where a.id_destino = b.id and a.emision = '$emision' and a.remito = '$remito'");
        $query = $this->db->query("select a.EMISION, a.REMITO, a.FECHA_REGISTRO, a.CONSIGNADO, a.ID_UBIGEO,  a.ID_DESTINO, b.DESCRIPCION as NOM_DESTINO, a.ID_OFICINA, e.DESCRIPCION as NOM_OFICINA, a.ORIGEN, a.ID_TARIFA, a.DIRECCION_ENTREGA, a.DNI, a.ID_CLIENTE, CASE c.TIPO_CLIENTE WHEN  'J' THEN c.RAZON_SOCIAL ELSE CONCAT(c.APELLIDO_PATERNO,' ',c.APELLIDO_MATERNO,' ',c.NOMBRES) END as NOM_CLIENTE,a.CELULAR, a.ID_ARTICULO, d.DESCRIPCION as NOM_ARTICULO, a.DOCUMENTO AS DOC_CLIENTE, a.NROCLIENTE, a.ID_SERVICIO, f.DESCRIPCION AS NOM_SERVICIO, a.TIPO_DOCUMENTO, a.PREFIJO_DOCUMENTO, a.NUMERO_DOCUMENTO, a.NRO_PIEZA, a.PESO_REAL,a.PESO_EXCESO, a.FLG_CARGO_ADJUNTO, a.NRO_CARGO_ADJUNTO, a.OBSERVACION, a.FLG_DECLARACION_JURADA, a.SERIE_DECLARACION, a.NUMERO_DECLARACION, a.MONTO_ARTICULO, a.IMPORTE_BASE, a.IMPORTE_IGV, a.IMPORTE_DESCUENTO, a.IMPORTE_EXCESO, g.DESCRIPCION as NOM_UBIGEO from envio a, ma_destinos b, ma_cliente c, ma_articulo d, ma_oficina e, ma_servicio f, ma_ubigeo_territorio g where a.id_destino = b.id AND a.ID_CLIENTE = c.ID and a.ID_ARTICULO = d.ID and a.ID_OFICINA = e.ID and a.ID_SERVICIO = f.ID and a.ID_UBIGEO = g.ubigeo and a.emision = '$emision' and a.remito = '$remito'");
        return $query->result();
        
    }

   

    

   
}