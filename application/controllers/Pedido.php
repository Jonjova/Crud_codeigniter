<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Pedido extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();

	}

	public function Index()
	{
		

		if ($this->session->userdata('currently_logged_in') or false) {
		$this->getLayout();
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

	public function getLayout()
	{
		   $datos =  array( 'navbar' =>$this->load->view('Dlayout/navbar',null,true),
					    'footer' =>$this->load->view('Dlayout/footer',null,true),
					    'header' =>$this->load->view('layout/header',null,true),		   
					    
		 );
	   
		
		$this->load->view('Pedido/registros',$datos);
	}

}
?>