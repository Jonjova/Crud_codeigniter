<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pinventario_model extends CI_Model
{
	
	public function Mostrar_inventarios() 
	{
		
		$var = $this->db->QUERY('CALL sp_getInventarios(); ');
		return $var->result();

	}

	//Aqui llenaremos un select para luego mostrarlo en el formulario.
	public function Select_cat()
	{
	//Aqui buscara todo lo que este dentro de la tabla 'categoria'.
	$Categoria=$this->db->get('categoria');
	return $Categoria->result();
	}

	public function estado_producto()
	{
		$estado = $this->db->get('estado');
		return $estado->result();
	}

	public function getId()
	{
		
		$estado = $this->db->get('producto');
		return $estado->result();
	}

	public function producto_insertar($producto)
	{
		
		$this->db->insert('producto',$producto);
	}

	public function Producto_actualizar($datos,$id)
	{
		$this->db->where('id_producto',$id['id_producto']); 
		$this->db->update('producto',$datos);
		
	}

	//Recuperamos los datos ingresados de la tabla.
	public function Obtener_inventario($id_producto)
	{
		$this->db->select('*');
		//Traemos los datos a la tabla correspondiente.
		$this->db->from('producto');
		$this->db->where('id_producto=',$id_producto);
		$datos = $this->db->get();
		return $datos->row();

	}

	public function eliminar($id)
	{
		
        $this->db->delete('producto', array('id_producto' => $id));
        
	}

	public function capturarImagen($id)
	{
		$this->db->select('foto_producto');
		$this->db->where('id_producto',$id);
		$this->db->from('producto');
		$resutado = $this->db->get();
		return $resutado->row();
	}

	public function imagenCheck($id)
	{
	    
        $this->db->select('foto_producto');
		$this->db->where_in('id_producto',$id);
		$query = $this->db->get('producto');
		$data = $query->result_array();
	    if($data != null){
	        return $data;
	    } else {
	        return false;
	    }
	
	}

	public function elminarCheck($dato = array())
	{
		//$this->db->delete('producto', array('id_producto' => $id_check));
      foreach($dato as $id_producto){
         $this->db->delete('producto', array('id_producto' => $id_producto));
      }
	}

} 		
?>