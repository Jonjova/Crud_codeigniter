<?php defined('BASEPATH') OR exit('No direct script access allowed');


class dashboard extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Usuario_model','um',true);
	}
	public function index(){
		if($this->session->userdata('is_logged')){
		$datos = array('header' => $this->load->view('layout/header',null,true),
		  'footer' =>$this->load->view('Dlayout/footer',null,true)	  			   
		 );	
		$this->load->view('dashboard',$datos);
		}else{
			echo '<a href="http://localhost/jonjova/logear/index">Inicia session</a>';
			show_404();
		}
	}
}

?>