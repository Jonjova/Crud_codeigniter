<?=$header?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
<?=$navbar?>
 <div id="contenedor_carga">
    <div id="cargar"></div>
  </div>
<input class="flip" id="checkbox" type="checkbox"/>
<div class="checkbox">
  <label for="checkbox"></label>
</div>
<div class="wrapper">
  
  <h1>Buen día.</h1>
  <div class="card">
    

    <div class="side front">
      <div class="dot"></div>
      <div class="dot active"></div>
      <div class="dot"></div>
    
      <p>Buenos días.</p> 
      
    </div>
    
    <div class="side back">
      <div class="dot active"></div>
      <p>Buenas noches.</p>

    </div>
  </div>
 
</div>

<div class="shameless-plug">
  <p>Mis redes sociales.</p><a href="https://twitter.com/jonjova" target="_blank">
    <div class="icon" data-icon="ei-sc-twitter" data-size="s"></div></a><a href="https://github.com/jonjova" target="_blank">
    <div class="icon" data-icon="ei-sc-github" data-size="s"></div></a><a href="https://henry.codes" target="_blank">
    <div class="icon" data-icon="ei-link" data-size="s"></div></a>
     <a class="btn btn-danger" href="<?php echo base_url('Producto_inventario/otro');?>">otro</a>
</div>



<!-- partial -->
  <script src='https://cdn.jsdelivr.net/npm/evil-icons@1.9.0/assets/evil-icons.min.js'></script><script  src="<?php echo base_url();?>assets/js/script.js"></script>
<?=$footer?>
