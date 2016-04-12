<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Login_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function login_user($username,$password)
	{
		$this->db->where('cod_usuario',$username);
		$this->db->where('clave',$password);
		$this->db->where('estado',1);

		$query = $this->db->get('ma_usuario');
		
		
		if($query->num_rows() == 1)
		{
			return $query->row();
		}else{
			$this->session->set_flashdata('usuario_incorrecto','error_login');
			redirect('login/inicio','refresh');
		}
	}

}
