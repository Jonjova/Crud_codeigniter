<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class logear extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Usuario_model','um',true);
		$this->load->helper(array('auth/login_rules'));
		$this->load->helper(array('users/users_rules'));
	}

	public function index()
	{
		if ($this->session->userdata('currently_logged_in') or false) {
			$datos =  array('navbar' =>$this->load->view('Dlayout/navbar',null,true),
					    'footer' =>$this->load->view('Dlayout/footer',null,true),
					    'header' =>$this->load->view('layout/header',null,true),
					   
		 );
			$this->load->view('dashboard',$datos);
		}else{
				if ($this->session->userdata('currently_logged_in') or true) {
					$datos = array('header' => $this->load->view('layout/header',null,true),
				'footer' => $this->load->view('layout/footer',null,true)
							  		   
				 );
					
				$this->load->view('login/login_user',$datos);
				//var_dump(getLoginRules());
				}	
		}
		
	}

	public function validate()
	{
		$datos = array('header' => $this->load->view('layout/header',null,true),
					   'footer' => $this->load->view('layout/footer',null,true),
			//mostrar los estilos de header		  			   
		 );
		$this->form_validation->set_error_delimiters('', '');//el delimitador es para no mostrar las muletias que trae por defecto codeigniter
		$rules = getLoginRules();
		$this->form_validation->set_rules($rules);//Validacion con libreria form_validation
		if ($this->form_validation->run() === FALSE) { 
			$errors = array('email' => form_error('email'), 
							'password' => form_error('password'), 
		);
			echo json_encode($errors);//recibe lo que deseamos convertir en notación JSON y devuelve una cadena de texto con el JSON producido. 
			$this->output->set_status_header(400);//enviar códigos de estado en la cabecera del protocolo HTTP. 
		} else {
			$user = $this->input->post('email');
			$pass = sha1($this->input->post('password'));
			if(!$res = $this->um->iniciar_session($user,$pass)){//condicion de verificacion
				echo json_encode(array('msg' => 'Verfique sus credenciales'));
				$this->output->set_status_header(401);//si no se cumple status 401
				exit;
			}
			//si todo este bien 
			$data = array('id_usuario' => $res->id_usuario,
						  'rango' => $res->rango,
						  'status' => $res->status,
						  'nombre_usuario' => $res->nombre_usuario,
						  'is_logged'=> true,
						  'currently_logged_in' => 1 
			 );
			$this->session->set_userdata($data);
			$this->session->set_flashdata('msg','Bienvenido al sistema '.$data['nombre_usuario']);
			echo json_encode( array('url' => base_url('dashboard')));
			
		}
		
	}
	public function logout(){
		$vars = array('id_usuario','rango','status','nombre_usuario','is_logged');
		$this->session->unset_userdata($vars);
		$this->session->sess_destroy();
		redirect('/logear/');
	}

	public function registro()
	{
	
		$datos = array('nombre_usuario' => $_POST['nombre_usuario'], 
					   'correo' => $_POST['correo'] , 
					   'contra' => sha1($_POST['contra']),
					   'confirmar_contra' => sha1($_POST['confirmar_contra']), 
							);
		$this->um->registrar_user($datos);
		$this->session->set_flashdata('msg2','Tus datos han sido guardados correctamente.');
		redirect('/logear/');
	}
}


?>