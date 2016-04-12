<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Envio_model extends CI_Model {
	
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


    public function validar_os($emios, $nroos){
        $query = $this->db->query("select EMI_ORDEN, NRO_ORDEN, DOCUMENTO, NROCLIENTE from orden_servicio where EMI_ORDEN ='$emios' and NRO_ORDEN = '$nroos' and estado = 1 ");
        return $query->result();
    }

    public function sticker_flg(){

        $query = $this->db->query("SELECT IMPRESION FROM master");
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
        $resultado = $this->db->get('ma_cliente');
        return $resultado->row_array();
	}

	 public function _insert_envio($arrPosts){
            $this->db->insert('envio', $arrPosts);
            return $this->db->insert_id();
    }

	

    public function update_cliente($arrPosts,$id){
        $this->db->where('id', $id);
        return $this->db->update('ma_cliente', $arrPosts);
    }

    

   
}
