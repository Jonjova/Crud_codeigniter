<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model
{
	
	 public function iniciar_session($user,$pass)
	{
		$query = $this->db->get_where('usuario', array('nombre_usuario' =>$user ,'contra' =>$pass),1);
		if(!$query->result()){
			return false;
		}
		return $query->row();
		
	}

	public function registrar_user($datos)
	{
		$this->db->insert('usuario',$datos);	
	}

	
}
?>