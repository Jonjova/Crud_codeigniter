<?php

if (!function_exists('getCreateUserRules')) {
		function getCreateUserRules(){

			return array(
		        array(
		                'field' => 'nombre_usuario',
		                'label' => 'Nombre Usuario',
		                'rules' => 'required|max_length[40]',
		                'errors' => array(
		                        'required' => 'El %s es requerido.',
		                        'max_length' => 'El %s es demaciado grande.',
		        	),
		       ),         
		        array(
		                'field' => 'correo',
		                'label' => 'Correo',
		                'rules' => 'required|valid_email',
		                'errors' => array(
		                        'required' => 'La %s es requerida.',
		                        'valid_email' => 'E %s Tiene que contener una direccion valida.',
		                ),
		        ),
		);
	}
}

?>