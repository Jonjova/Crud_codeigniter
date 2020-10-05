
	
	</body>
	 <!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>-->

	 <!--Escript bootstrap diseños popper-->
	 <script  type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
	 <script type="text/javascript" src="<?php echo base_url('assets/js/sidebar.js');?>"></script>
    <script  type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
    
    <!--Escript de sweetalert -->
	<script  type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<!--Escripts de validacion de formularios -->
	<script  type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
	<script type="text/javascript" type="text/javascript" src="<?php echo base_url('assets/scripts/form_productos.js');?>"></script>

	<!--Escript de eliminar -->
	<script type="text/javascript" src="<?php echo base_url('assets/scripts/eliminarPro.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/seleccionarTodo.js"></script>
	  
	<!--ejemplo en proceso eliminar con un progressbar  -->
	<script type="text/javascript" src="<?php echo base_url('assets/scripts/subirAnimado.js');?>"></script>

	  <!--Todos los js que necesita el datatables -->
	<script src="<?php echo base_url('assets/datatables/jquery.dataTables.min.js');?>"></script>
 	<script src="<?php echo base_url('assets/datatables/dataTables.buttons.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/datatables/jszip.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/datatables/pdfmake.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/datatables/vfs_fonts.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/datatables/buttons.html5.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/datatables/buttons.print.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/datatables/llamadatatables.js');?>">
 	</script>
	<!--aqui terminan los script-->

	<!--Custom files de Bootstrap-->
	<script type="text/javascript" src="<?php echo base_url('assets/scripts/customStyles.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/scripts/filename.js');?>"></script>

<!--Este elemento mientras cargas el contenido hace un efecto de preloader-->
  <script type="text/javascript">
  window.onload = function () {
    var contenedor = document.getElementById('contenedor_carga');

    contenedor.style.visibility = 'hidden';
    contenedor.style.opacity = '0';
  }
</script>
<!--aqui termina el preloader-->

<!--Modal foto del producto-->
<script type="text/javascript" src="<?php echo base_url('assets/scripts/modalFotopro.js');?>"></script>

<!--mensajes de confirmacion Guardar actualizar eliminar -->
<script  type="text/javascript" src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<!--Mensajes de actualización -->
<?php if ($this->session->flashdata('Actualizado') != null):?>
<script type="text/javascript">
		

  alertify.success('<?php echo  $this->session->flashdata('Actualizado')?>');
</script>
<?php endif; ?>


<?php if ($this->session->flashdata('Cancelado') != null):?>
<script type="text/javascript">
		

  alertify.error('<?php echo  $this->session->flashdata('Cancelado')?>');
</script>
<?php endif; ?>


<!--aqui terminan los mensajes de actualizar-->
<?php if($this->session->flashdata('guardado') != null): ?>

<script type="text/javascript">
	swal({
		 title: "<?php echo  $this->session->flashdata('guardado')?>",
		 icon: "success",
	});
</script>
<?php endif; ?>


<!--verificacion de Datos de check -->

<?php if($this->session->flashdata('error1') != null): ?>

<script type="text/javascript">
	swal({
		 title: "<?php echo  $this->session->flashdata('error1')?>",
		 icon: "error",
	});
</script>
<?php endif; ?>

<?php if($this->session->flashdata('elminados') != null): ?>

<script type="text/javascript">
	swal({
		 title: "<?php echo  $this->session->flashdata('elminados')?>",
		 icon: "success",
	});
</script>
<?php endif; ?>


	</html>

