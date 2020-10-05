<?=$header?>

<?=$navbar?>
  <!-- sidebar-wrapper  -->
  <main class="page-content">
    <div class="container-fluid ">
      <h1 class="text-center">Registro de productos</h1>
     	<br>
     </div>	
      <div class="row">
        <div class="form-group col-md-12" >
	    <form method="post" action="<?php echo base_url('Producto_inventario/scheckdelete');?>"  enctype="multipart/form-data">    
	        <div class="container">
	     
				 <table class="content-table" id="datosproducto" id-data="notificationsTableId">
				  <thead class=" text-white">
				    <tr>
				      <th >Nombre del producto</th>			      
				      <th >Categoria</th>
				    
				      <th >Estado</th>
				      <th >Fecha</th>
				      <th>Foto</th>
				      <th >Editar</th>
				      <th >Eliminar</th>
				      <th hidden="">Pdf</th>	      
				      <th>
				      <input type="checkbox"  id="selectall"></input>
				       <button type="submit" class="boton btn btn-default" onclick="return confirm('Estas seguro?')" value="eliminar" ><i class="far fa-trash-alt"></i></button> 
				      </th>
				    </tr>
				  </thead>
				  
				  <tbody>
				  	<?php foreach ($datos as $j): ?>
				    <tr >
				      <td><?=$j->nombre_producto ?></td>
				      <td><?=$j->nombre_cat ?></td>
				     
				      <td ><?=$j->estado_producto ?></td>
				      <td><?=$j->fecha_ingreso ?></td>
				      <td><img  src="<?php echo base_url()?>upload/<?=$j->foto_producto?>" width="40px" height="15px" class="lightbox">
				      </td>

				      <td align="center">
				      	<a href="<?php echo base_url();?>Producto_inventario/obtener_actualizar?id_producto=<?php echo $j->id_producto?>" ><i class="fas fa-edit fa-lg"></i></a>
				      </td>	
				      <td align="center">
				      	
				      	 <a href="" id="AlertaEliminarCliente" data-id="<?php echo $j->id_producto?>"><i class="fas fa-backspace  fa-lg colo"></i></a>

				      </td>
				      <td hidden=""><a name="id_producto" href="<?php echo base_url();?>Producto_inventario/verProducto?id_producto=<?php echo $j->id_producto?>" ><i class=" fas fa-eye fa-lg "></i></a></td>
				      <td align="center">  <input type="checkbox" class="selectedId" name="id_producto[]" value="<?=$j->id_producto?>" /></td>
				    </tr>
				 <?php endforeach; ?>
				  </tbody>
				 
				</table>  
				 
			</div>

		</form>	
			<!--Pdf -->
			<br>
			
			<!--aqui termina pdf enlace-->
		<div class="text-center">
		  <a href="" class="btn btn-outline-primary btn-rounded mb-4" data-toggle="modal" data-target="#modalContactForm">Agregar</a>     
		</div>
		<div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
			<form method="POST" id="formulario" action="<?php echo base_url('Producto_inventario/insertar');?>" class="needs-validation" novalidate enctype="multipart/form-data"> 	
			      <div class="modal-header text-center">
			        <h4 class="modal-title w-100 font-weight-bold">Inventario</h4>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body mx-3">
			        <div class="md-form mb-3">
			          <i class="fas fa-folder"></i> <label  for="validationCustom01" data-success="right"> Nombre del producto</label>
			          <input type="text" id="nombre" name="nombre" class="form-control " id-data="validationCustom01" required>    
			        </div>
				      <div class="valid-feedback">
		       		Bien hecho!
		      		</div>
			        <div class="md-form mb-3">
			         <i class="fas fa-list-ul"></i> <label data-error="wrong" data-success="right" for="form29">Categoria</label>
			          <select class="custom-select" id-data="validationCustom02" required name="categoria" id-data="validationCustom02" >
			          	<option selected disabled  value="" id="categoria">--Seleccione Categoria--</option>
			          	<?php foreach ($categoria as $cat): ?>
			          	<option value="<?=$cat->id_categoria ?>" ><?=$cat->nombre_cat;?></option>
			           <?php endforeach; ?>
			          </select>
			           
			        </div>
			        <div class="md-form mb-3">
			         <i class="fas fa-info-circle"></i> <label data-error="wrong" data-success="right" for="form32">Estado</label>  
			         <select name="estado"  class="custom-select" id-data="validationCustom03" required>
			         	<option selected disabled  value="" id="estado">--Seleccione Estado--</option>
			         	<?php foreach ($estado as $a): ?>
			         	<option value="<?=$a->id_estado?>"><?=$a->estado_producto?> </option>
			         <?php endforeach; ?>
			         </select>
			        </div>
			        <div class="md-form mb-3">
			          <i class="far fa-calendar-alt"></i> <label data-error="wrong" data-success="right" for="form8">Fecha de ingreso</label>
			         <input type="date" id="fecha" name="fecha" class="form-control "  id-data="validationCustom04" required>		         
			        </div>
			        <div class="md-form mb-3">
			          <i class="far fa-calendar-alt"></i> <label data-error="wrong" data-success="right" for="form8">Foto perfil</label>
			         <input type="file"  id="foto_producto" name="foto_producto" class="form-control"  id-data="validationCustom05" required >       
			        </div>
			        <div class="md-form mb-4">
					
			        </div>
			      <div class="modal-footer d-flex justify-content-center">
			        <button class="btn btn-outline-success" id="btn">Enviar <i class="fas fa-paper-plane-o ml-1"></i></button>
			      </div>
		   </form>  
		   <!--<form id="uploadForm" enctype="multipart/form-data">
					    <label>Escoge un archivo :</label>
					    <input type="file" name="foto_producto" id="fileInput">
					    <input type="submit" name="submit" value="SUBIR"/>
						<div class="progress">
					    <div class="progress-bar"></div>
					    --><!-- Display upload status -->
						<!--<div id="uploadStatus"></div>
					</div>
					</form>-->
	    </div>
	  </div>
</div>

        </div>
        
      </div>
      <!--<h5>More templates</h5>-->    
  </main>
  <!-- page-content" -->

<?=$footer?>

<script type="text/javascript">
	var url = '<?php echo base_url();?>';
	console.log(new Date('2018-06-25'));
</script>


