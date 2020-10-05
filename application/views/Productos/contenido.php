<!-- sidebar-wrapper  -->
  <main class="page-content">
    <div class="container-fluid ">
      <h1 class="text-center">Registro de de productos</h1>
     	<br>
      <div class="row">
        <div class="form-group col-md-12" >
        	<h4 class="alert alert-dark estilo_titulo" style="margin-right: 620px;">Exportar</h4>
        <div class="container ">
			 <table class="table table-hover display" id="datosproducto">
			  <thead class="bg-dark text-white">
			    <tr>
			      <th >Nombre del producto</th>			      
			      <th >Categoria</th>
			      <th >Estado</th>
			      <th >Fecha de ingreso</th>
			      <th >Editar</th>
			      <th >Eliminar</th>
			    </tr>
			  </thead>
			  
			  <tbody>
			  	<?php foreach ($datos as $j): ?>
			    <tr>
			      <td><?=$j->nombre_producto ?></td>
			      <td><?=$j->nombre_cat ?></td>
			      <td><?=$j->estado_producto ?></td>
			      <td><?=$j->fecha_ingreso ?></td>
			      <td>
			      	<a href="<?php echo base_url();?>Producto_inventario/obtener_actualizar?id_producto=<?php echo $j->id_producto?>" ><i class="fas fa-edit fa-lg"></i></a>
			      </td>	
			      <td>
			      	<a href="#" name="id_producto" type="submit" id="delete" data-id="<?=$j->id_producto?>"><i class="far fa-trash-alt fa-lg colo"></i></a>
			      </td>
			    </tr>
			 <?php endforeach; ?>
			  </tbody>
			 
			</table>
		</div>