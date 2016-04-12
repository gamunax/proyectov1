<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Login_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function login_user($ruc,$password)
	{
		$this->db->where('documento',$ruc);
		$this->db->where('clave_web',$password);
		$this->db->where('estado',1);

		$query = $this->db->get('ma_cliente');
		
		
		if($query->num_rows() == 1)
		{
			return $query->row();
		}else{
			$this->session->set_flashdata('cliente_incorrecto','error_login');
			redirect('extranet/inicio','refresh');
		}
	}

}
