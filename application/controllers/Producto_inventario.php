<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto_inventario extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pinventario_model','pm',true);
		$this->load->model('Usuario_model','um',true);
	}

	public function index()
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

	public function otro()
	{
		$this->load->view('prueba');
	}

	public function obtener_ver()
	{
		
		$dato['b'] = $this->pm->Obtener_inventario($_REQUEST['id_producto']);
		$dato['categoria'] = $this->pm->Select_cat();
		$dato['estado'] = $this->pm->estado_producto();
		$this->load->view('ViwewFileLocation',$dato);
	}

	public function verProducto()
	{
		require_once ('vendor/autoload.php');
		// Create an instance of the class:
		$mpdf = new \Mpdf\Mpdf();
		$stylesheet = file_get_contents('assets/css/pdf.css'); // external css
		$mpdf->WriteHTML($stylesheet,1);
		$dato = $this->obtener_ver();
		$html = $this->load->view('ViwewFileLocation','',true,$dato);
		// Write some HTML code:
		$mpdf->WriteHTML($html,2);

		// Output a PDF file directly to the browser
		$mpdf->Output();
	}

		
	public function getLayout()
	{
		   $datos =  array( 'navbar' =>$this->load->view('Dlayout/navbar',null,true),
					    'footer' =>$this->load->view('Dlayout/footer',null,true),
					    'header' =>$this->load->view('layout/header',null,true),		   
					    
		 );
	   
		$datos['categoria'] = $this->pm->Select_cat();
		$datos['estado'] = $this->pm->estado_producto();
		$datos['datos'] = $this->pm->Mostrar_inventarios();
		$this->load->view('Productos/Registro_productos',$datos);
	}

	public function obtener_actualizar()
	{
		$dato =	array('navbar' =>$this->load->view('Dlayout/navbar',null,true),
					    'footer' =>$this->load->view('Dlayout/footer',null,true),
					    'header' =>$this->load->view('layout/header',null,true),
					  
		 );
			$dato['b'] = $this->pm->Obtener_inventario($_REQUEST['id_producto']);
			$dato['categoria'] = $this->pm->Select_cat();
			$dato['estado'] = $this->pm->estado_producto();
			$this->load->view('Productos/Actualizar_producto',$dato);

	}

	public function subir_archivo()
	{
		$mi_archivo = $_FILES['foto_producto']['name'];
        $config['upload_path'] = "upload/";
        $config['allowed_types'] = "jpg|png|jpeg";
       // $config['max_size'] = "";
        //$config['max_width'] = "";
        //$config['max_height'] = "";
        $config['file_name'] = $mi_archivo;
        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload('foto_producto')) {
            //*** ocurrio un error
          
            echo $this->upload->display_errors();
            return;
        }

       var_dump($this->upload->data());
	}

	public function insertar()
	{

		$date = $this->input->post('fecha');
		$datos = array('nombre_producto' =>$this->input->post('nombre'), 
					   'categoria' =>$this->input->post('categoria'),
					   'estado' =>$this->input->post('estado'),
					   'fecha_ingreso' =>  date('Y-m-d', strtotime($date)),
					   'foto_producto' => $_FILES['foto_producto']['name'] 
		 );

		$this->pm->producto_insertar($datos);
		$datos = $this->subir_archivo();
		$this->session->set_flashdata('guardado','Tus datos han sido guardados correctamente');
		redirect('/Producto_inventario/');
		 // var_dump($datos);
	}

	public function Actualizar()
	{
		//$file = $_FILES['foto_producto']['name'];
		$date = $this->input->post('fecha_ingreso');
		$datos = array('nombre_producto' =>$this->input->post('nombre'), 
					   'categoria' =>$this->input->post('categoria'),
					   'estado' =>$this->input->post('estado'),
					   'fecha_ingreso' =>  date('Y-m-d', strtotime($date)),
	    
		 );
		$id['id_producto'] = $this->input->post('id_producto'); 
		$this->pm->Producto_actualizar($datos,$id);
		$dato['foto_producto'] = $_FILES['foto_producto']['name'];

		if ($_FILES['foto_producto']['name'] != null) {
		$id['id_producto'] = $this->input->post('id_producto');	
		$foto = $this->pm->capturarImagen($_POST['id_producto']);
		unlink("upload/".$foto->foto_producto);	 
		$this->pm->Producto_actualizar($dato,$id);
		$this->subir_archivo();
		
		}else{
		echo "no hay datos";
		}

		$this->session->set_flashdata('Actualizado', 'Actualizado');
		//print_r($datos);
		redirect('Producto_inventario');
	}


	 public function delete()
	 {
     
    $foto = $this->pm->capturarImagen($_POST['id_producto']);
	
	 	if (isset($_POST['id_producto']) && $foto) {
	 		unlink("upload/".$foto->foto_producto);
	 		$this->pm->eliminar($_REQUEST['id_producto']);
	 	}
	 	//print_r($foto);
      redirect('Producto_inventario');
  	 }
  	 
  	 public function scheckdelete()
  	 {
		$foto = $this->pm->imagenCheck($_POST['id_producto']);
		$path = "upload/";
		$datos = $_POST['id_producto'];
		
		if ($foto && $path && $datos != '') {
				foreach ($foto as $deletRow) {

			    unlink($path.$deletRow['foto_producto']);

			}
			if (isset($datos)) {
			
		 	$this->pm->elminarCheck($_REQUEST['id_producto']);
		 	$this->session->set_flashdata('elminados', 'Los datos han sido eliminados correctamente.');
		 	}
		}else{
			$this->session->set_flashdata('error1', 'Debes de seleccionar un dato.');
		}
		
		//print_r($foto);
		return redirect('Producto_inventario');	
  	 }

  	 public function animarsubir()
  	 {
  	 	
		 $upload = 'err'; 
		if(!empty($_FILES['foto_producto'])){ 
		     
		    // Configuración de carga de archivos 
		    $targetDir = "upload/"; 
		    $allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg', 'gif'); 
		     
		    $fileName = basename($_FILES['foto_producto']['name']); 
		    $targetFilePath = $targetDir.$fileName; 
		     
		    // Compruebe si el tipo de archivo es válido
		    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
		    if(in_array($fileType, $allowTypes)){ 
		        // Subir archivo al servidor 
		        if(move_uploaded_file($_FILES['foto_producto']['tmp_name'], $targetFilePath)){ 
		            $upload = 'ok'; 
		        } 
		    } 
		} 
		echo $upload; 
  	 }

}

?>