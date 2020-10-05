<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$datos = array('header' => $this->load->view('layout/header',null,true),
					   'navbar'=> $this->load->view('layout/navbar',null,true),
					   'footer'=> $this->load->view('layout/footer',null,true)
		 );

		$this->load->view('Bienvenidos',$datos);
		
	}

	public function probar(){
		$this->load->view("prueba");
	}

	
}
