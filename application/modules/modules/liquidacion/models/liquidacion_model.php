<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Liquidacion_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	

	public function max_nro_veces($emision, $remito){
        
        /*$query = $this->db->query("select max(nroveces) AS nroveces from di_asignaciones where emision ='$emision' and remito='$remito'");        
        return $query->result();
        */
        $this->db->select_max('nroveces');
        $this->db->where('emision', $emision);
        $this->db->where('remito', $remito);
        $resultado = $this->db->get('di_asignaciones');

        return $resultado->row_array();

        
    }

    public function buscar_remito($emision, $remito){
        
       /* $this->db->select('*');
        $this->db->from('envio');
        $this->db->where('emision',$emision);
        $this->db->where('remito',$remito);
        $query = $this->db->get();
        $arrayResultado = $query->result();
        return $arrayResultado;
        */
        $query = $this->db->query("SELECT a.EMISION, a.REMITO, c.CONSIGNADO, c.DIRECCION_ENTREGA AS DIRECCION, a.GLOSA, a.ESTADO AS IDESTADO, d.DESCRIPCION AS ESTADO, a.ID_MOTIVO AS MOTIVO FROM di_asignaciones a, envio c, ma_parametros d WHERE a.emision = c.emision and a.remito = c.remito and d.tabla= 'estado' and a.estado = d.codigo  and c.emision = '$emision' and c.remito = $remito  and a.NROVECES in (select max(NROVECES) from di_asignaciones b where a.emision = b.emision and a.remito = b.REMITO)");
        return $query->result();
    
      
    }

     public function buscarliquidacion($fecha, $salida, $operador){
        
        $query = $this->db->query("SELECT a.EMISION, a.REMITO, c.CONSIGNADO, c.DIRECCION_ENTREGA AS DIRECCION, a.GLOSA, a.ESTADO AS IDESTADO, d.DESCRIPCION AS ESTADO, a.ID_MOTIVO AS MOTIVO FROM di_asignaciones a, envio c, ma_parametros d WHERE a.emision = c.emision and a.remito = c.remito and d.tabla= 'estado' and a.estado = d.codigo  and a.FECHA_SALIDA = '$fecha' and a.salida = $salida and a.ID_OPERADOR = $operador and NROVECES in (select max(NROVECES) from di_asignaciones b where a.emision = b.emision and a.remito = b.REMITO)");
        return $query->result();
        
    }

    public function return_envio($emision, $remito){
        
        $query = $this->db->query("select a.EMISION, a.REMITO, a.FECHA_REGISTRO, a.CONSIGNADO, a.ID_UBIGEO, a.ID_DESTINO, b.DESCRIPCION as NOM_DESTINO, a.ID_OFICINA, e.DESCRIPCION as NOM_OFICINA, a.ORIGEN, a.ID_TARIFA, a.DIRECCION_ENTREGA, a.DNI, a.ID_CLIENTE, CASE c.TIPO_CLIENTE WHEN  'J' THEN c.RAZON_SOCIAL ELSE CONCAT(c.APELLIDO_PATERNO,' ',c.APELLIDO_MATERNO,' ',c.NOMBRES) END as NOM_CLIENTE,a.CELULAR, a.ID_ARTICULO, d.DESCRIPCION as NOM_ARTICULO, a.DOCUMENTO AS DOC_CLIENTE, a.NROCLIENTE, a.ID_SERVICIO, f.DESCRIPCION AS NOM_SERVICIO, a.TIPO_DOCUMENTO, a.PREFIJO_DOCUMENTO, a.NUMERO_DOCUMENTO, a.NRO_PIEZA, a.PESO_REAL,a.PESO_EXCESO, a.FLG_CARGO_ADJUNTO, a.NRO_CARGO_ADJUNTO, a.OBSERVACION, a.FLG_DECLARACION_JURADA, a.SERIE_DECLARACION, a.NUMERO_DECLARACION, a.MONTO_ARTICULO, a.IMPORTE_BASE, a.IMPORTE_IGV, a.IMPORTE_DESCUENTO, a.IMPORTE_EXCESO, g.DESCRIPCION as NOM_UBIGEO from envio a, ma_destinos b, ma_cliente c, ma_articulo d, ma_oficina e, ma_servicio f, ma_ubigeo_territorio g where a.id_destino = b.id AND a.ID_CLIENTE = c.ID and a.ID_ARTICULO = d.ID and a.ID_OFICINA = e.ID and a.ID_SERVICIO = f.ID and a.ID_UBIGEO = g.UBIGEO and a.emision = '$emision' and a.remito = '$remito'");
        return $query->result();
        
    }


     public function buscar_operador($codigo){
        $query = $this->db->query("SELECT CONCAT(APELLIDO_PATERNO, ' ', APELLIDO_MATERNO) AS APELLIDOS, NOMBRES, CELULAR, COD_OPERADOR, DNI, ESTADO, TIPO_OPERADOR, ID FROM ma_operador WHERE (COD_OPERADOR='$codigo' or '$codigo'='x')  AND ESTADO = 1 ORDER BY APELLIDO_PATERNO, APELLIDO_MATERNO, NOMBRES" );
        return $query->result();
    }

   





    public function buscar_destino($destino){

        $query = $this->db->query("SELECT A.UBIGEO, A.DESCRIPCION, B.DESCRIPCION NOM_CIUDAD, B.ID AS ID_DESTINO FROM ma_ubigeo_territorio A, ma_destinos B WHERE A.COD_DESTINO = B.COD_DESTINO AND A.ESTADO = 1 AND A.DESCRIPCION LIKE '%".$destino."%'");
        return $query->result();

    }




	public function _obtener_datos_clientes($id){
		 $this->db->where('id',(int)$id);
        $this->db->limit(1);
        $resultado = $this->db->get('ma_cliente');
        return $resultado->row_array();
	}

	 public function _insert_liquidacion($arrPosts){
            $this->db->insert('di_asignaciones', $arrPosts);
            return $this->db->insert_id();
    }

	

    public function update_cliente($arrPosts,$id){
        $this->db->where('id', $id);
        return $this->db->update('ma_cliente', $arrPosts);
    }

    

   
}
