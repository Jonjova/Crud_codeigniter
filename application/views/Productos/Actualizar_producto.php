<?=$header?>
<?=$navbar?>
	
<main class="page-content">
    <div class="container-fluid ">
     <form method="POST"  action="<?php echo base_url('Producto_inventario/Actualizar');?>" enctype="multipart/form-data"> 	
		     <h4 class="modal-title w-100 font-weight-bold">Actualizar inventario</h4>
		      </div>
		      <input name="id_producto" type="hidden" value="<?=$b->id_producto?>">
		      <div class="modal-body mx-3">
		         <label > Nombre del producto</label>
		        <div class="input-group mb-3">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="inputGroup-sizing-default"> <i class="fas fa-folder"></i></span> 
				  </div>
				  <input type="text"  name="nombre" class="form-control" value="<?=$b->nombre_producto?>">
				</div>
		        <div class="md-form mb-3">
		         <i class="fas fa-list-ul "></i> <label data-error="wrong" data-success="right" for="form29">Categoria</label>
		        
		          <select class="form-control" name="categoria" equired="El campo de categoria es requerido">
		          	<option value="#" >--Seleccione Categoria--</option>
		          	<?php foreach ($categoria as $cat): ?>
		          	<option value="<?=$cat->id_categoria ?>" <?=$cat->id_categoria == $b->categoria ? 'selected' : '' ?>><?=$cat->nombre_cat;?></option>
		           <?php endforeach; ?>
		          </select>
		         
		        </div>

		        <div class="md-form mb-3">
		         <i class="fas fa-info-circle"></i> <label data-error="wrong" data-success="right" for="form32">Estado</label>
		         
		         <select name="estado"  class="form-control" required="El campo de estado es requerido">
		         	<option>--Seleccione Estado--</option>
		         	<?php foreach ($estado as $a): ?>
		         	<option value="<?=$a->id_estado?>"<?=$a->id_estado == $b->estado ? 'selected' : ''?>><?=$a->estado_producto?> </option>
		         <?php endforeach; ?>
		         </select>
		        </div>

		        <div class="md-form mb-3">
		          <i class="far fa-calendar-alt"></i> <label data-error="wrong" data-success="right" for="form8">Fecha de ingreso</label>
		         <input type="date"  name="fecha_ingreso" class="form-control" value="<?=$b->fecha_ingreso?>">
		        </div>
		          <div class="md-form mb-3">
			          <i class="far fa-calendar-alt"></i> <label data-error="wrong" data-success="right" for="form8">Foto perfil</label>

			   	    <input type="file" name="foto_producto" class="form-control" value="<?=$b->foto_producto?>">
			        </div>
		         <div class="md-form mb-3">
		        <button class="btn btn-outline-success" id="btn">Actualizar <i class="fas fa-paper-plane-o ml-1"></i></button>
		         
		      	</div>
		      </div>
	
 		</form> 
     
  </main>
  <!-- page-content" -->
</div> 
<?=$footer?>
