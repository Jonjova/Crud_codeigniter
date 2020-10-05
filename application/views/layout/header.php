<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Pagina principal</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css');?>" >
<style type="text/css">
	.zoom{
    transition: 0.5s ease;
    -moz-transition: 0.5s ease; /* Firefox */
    -webkit-transition: 0.5s ease; /* Chrome - Safari */
    -o-transition: 0.5s ease; /* Opera */
  }
  .zoom:hover{
    transform : scale(12);
    -moz-transform : scale(12); /* Firefox */
    -webkit-transform : scale(12); /* Chrome - Safari */
    -o-transform : scale(12); /* Opera */
    -ms-transform : scale(12); /* IE9 */
  }
</style>
<!--Modal foto del producto-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/modalFotopro.css">
<!--Diseños de tablas-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/tablasDiseño.css">

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/preloader.css">
<link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css">
 <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
 <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
 
 <!--estilo de pedidos-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/estiloStandar.css');?>">

<!--DataTable-->
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
 <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">

 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
 
 <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>

  
 <script  type="text/javascript" src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script  type="text/javascript" src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

 <script type="text/javascript">
  window.onload = function () {
    var contenedor = document.getElementById('contenedor_carga');

    contenedor.style.visibility = 'hidden';
    contenedor.style.opacity = '0';
  }
</script>
<!--<script src="assets/js/jq.progress-bar.js"></script>-->

</head>