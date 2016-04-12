    <?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class orden_servicio_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	

	public function buscar_cliente($documento){
        
        $query = $this->db->query("SELECT ID, TIPO_CLIENTE, DOCUMENTO, NROCLIENTE, CASE WHEN TIPO_CLIENTE = 'J' THEN RAZON_SOCIAL ELSE CONCAT(APELLIDO_PATERNO, ' ', APELLIDO_MATERNO, ' ', NOMBRES) END RAZON_SOCIAL, DIRECCION, ESTADO FROM ma_cliente  WHERE ESTADO = 1 AND (DOCUMENTO='$documento' or '$documento'='x') ORDER BY ID ASC");
        
        return $query->result();
        /*$this->db->select('*');
        $this->db->from('ma_cliente');
        $this->db->order_by('id','desc');
        $query = $this->db->get();
        $arrayResultado = $query->result();
        return $arrayResultado;
        */
    }

    public function buscar_cliente_paquete($id){
        
        $query = $this->db->query("SELECT ID, ID_CLIENTE, ID_PAQUETE, DESCRIPCION FROM ma_cliente_paquete where ID_CLIENTE = $id AND ESTADO = 1");
        
        return $query->result();
      
    }

    public function mostraridoperador($idoficina){

        $this->db->where('id', $idoficina);
        $this->db->limit(1);
        $resultado = $this->db->get('ma_oficina');
         return $resultado->row_array();
        
    }

    public function buscar_servicio(){
        


        $query = $this->db->query("SELECT ID, DESCRIPCION, FLG_COLLECT, FLG_ESPECIAL, FLG_VALORADO, TIPO_SERVICIO, ESTADO FROM ma_servicio WHERE ESTADO = 1  ORDER BY ID ASC");
        return $query->result();
    }

    public function return_os($fecha1, $fecha2, $estado,$documento){

   
             // $query = $this->db->query("select a.EMISION, a.REMITO, a.FECHA_REGISTRO, a.ID_CLIENTE, case when c.TIPO_CLIENTE = 'J' THEN c.RAZON_SOCIAL ELSE concat(c.APELLIDO_PATERNO,' ', c.APELLIDO_MATERNO, ' ', c.NOMBRES) END NOM_CLIENTE, c.NROCLIENTE, a.CONSIGNADO, a.DIRECCION_ENTREGA, d.DESCRIPCION from envio a, di_asignaciones b, ma_cliente c,ma_parametros d where a.EMISION = b.EMISION and a.REMITO = b.REMITO and a.ID_CLIENTE = c.ID and a.FECHA_REGISTRO >= '$fecha1' and a.FECHA_REGISTRO <= '$fecha2' and b.ESTADO = d.CODIGO and b.ESTADO='$estado' and (c.DOCUMENTO='$documento' or '$documento'= '%') and d.tabla='estado'");
        $query = $this->db->query("select orden_servicio.ID, NRO_ORDEN, c.DOCUMENTO, c.NROCLIENTE, orden_servicio.ESTADO, c.RAZON_SOCIAL, FECHA_ORDEN, CANT_ENVIOS, GLOSA, CASE TIPO_SERVICIO WHEN 'L' THEN 'Local' WHEN 'N' THEN 'Nacional' WHEN 'I' THEN 'Internacional'  END  AS TIPO_SERVICIO from orden_servicio, ma_cliente c where orden_servicio.documento = c.documento and orden_servicio.nrocliente = c.nrocliente and FECHA_ORDEN >= '$fecha1' and FECHA_ORDEN <= '$fecha2' and (orden_servicio.ESTADO = '$estado' or '$estado' = '%') and (c.DOCUMENTO='$documento' or '$documento'= '%')");
        
        
        return $query->result();

    }

    public function mostraros($id){
         $query = $this->db->query("select orden_servicio.ID, EMI_ORDEN,NRO_ORDEN, c.TIPO_CLIENTE, c.DOCUMENTO, orden_servicio.ESTADO, c.NROCLIENTE, c.RAZON_SOCIAL, FECHA_ORDEN, CANT_ENVIOS, GLOSA, CASE TIPO_SERVICIO WHEN 'L' THEN 'Local' WHEN 'N' THEN 'Nacional' WHEN 'I' THEN 'Internacional'  END  AS TIPO_SERVICIO_DES, TIPO_SERVICIO from orden_servicio, ma_cliente c where orden_servicio.documento = c.documento and orden_servicio.nrocliente = c.nrocliente and orden_servicio.id = $id");
        return $query->result();
    }

    public function generar_remito_lima($iddestino){
          
          $this->db->where('id_destino', $iddestino);
          $this->db->limit(1);
         $resultado = $this->db->get('ma_remito');
         return $resultado->row_array();
    }

    public function buscar_tarifa(){
        
        $query = $this->db->query("SELECT ID, CODIGO, DESCRIPCION, TFA_BASE, TFA_EXCESO, ESTADO FROM ma_tarifas WHERE ESTADO = 1 ORDER BY DESCRIPCION");
        return $query->result();
    }

    public function buscar_tarifa_id($id){
        
        $query = $this->db->query("SELECT ID, CODIGO, DESCRIPCION, TFA_BASE, TFA_EXCESO, ESTADO FROM ma_tarifas WHERE ID = $id AND ESTADO = 1 ORDER BY DESCRIPCION");
        return $query->result();
    }

    public function buscar_articulo(){
        
        $query = $this->db->query("SELECT ID, ABREVIATURA, DESCRIPCION, ESTADO FROM ma_articulo WHERE ESTADO = 1 ORDER BY DESCRIPCION");
        return $query->result();
    }





    public function buscar_destino($destino){

        $query = $this->db->query("SELECT A.UBIGEO, A.DESCRIPCION, B.DESCRIPCION NOM_CIUDAD, B.ID AS ID_DESTINO, A.ID_ZONA FROM ma_ubigeo_territorio A, ma_destinos B WHERE A.COD_DESTINO = B.COD_DESTINO AND A.ESTADO = 1 AND A.DESCRIPCION LIKE '%".$destino."%'");
        return $query->result();

    }

    public function buscar_paquete_tarifario_det($idpaquete, $idzona){

        $query = $this->db->query("SELECT * FROM ma_paquete_tarifario_det where ID_PAQUETE = $idpaquete and ID_ZONA = $idzona");
        return $query->result();

    }





	public function _obtener_datos_clientes($id){
		 $this->db->where('id',(int)$id);
        $this->db->limit(1);
        $resultado = $this->db->get('orden_servicio');
        return $resultado->row_array();
	}

	 public function _insert_orden_servicio($arrPosts){
            $this->db->insert('orden_servicio', $arrPosts);
            return $this->db->insert_id();
    }

	

    public function update_orden_servicio($arrPosts,$id){
        $this->db->where('id', $id);
        return $this->db->update('orden_servicio', $arrPosts);
    }

    

   
}
