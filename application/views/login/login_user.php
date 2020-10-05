<?=$header?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/dis_login.css');?>">
<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">

<style type="text/css">
  .error{
    width: 100%;
margin-top: 0.25rem;
font-size: 80%;
color: #dc3545; 
  }
</style>


  <div id="contenedor_carga">
    <div id="cargar"></div>
  </div>
      <div class="sidenav">
        <div class="alert alert-secondary" role="alert" style="top: -20px;">
                     <a href="<?php echo base_url('Principal/index');?>" ><h6  class="text-center">Regresar al inicio</h1></a>
              </div>
         <div class="login-main-text">
            <h2>Jonjova<br> Iniciar sesión</h2>
            <p>Logueate o registrate desde el boton de acceso.</p>
         </div>
      </div>
   
  <div class="page">
  <span class="loader" data-text="Loading...">Loading...</span>
</div>
<div class="tab-content" id="pills-tabContent">

  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"><div class="main">
         
     <!---Un breve mensaje de confirmación que los datos se han guardado correctamente-->
          <div class="col-md-6 col-sm-12">
            <?php if ($data = $this->session->flashdata('msg2')): ?>
          
          <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong ><?=$data?>!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <?php endif; ?> 

    <!-- Formulario de usario y contraseña -->     
            <div class="login-form">
               <form method="POST" action="<?php echo base_url('logear/validate')?>" id="frm_login">
                  <div class="form-group" id="email">
                     <label>Usuario</label>
                     <input  type="text" name="email" class="form-control" placeholder="Correo electronico" > <div class="invalid-feedback"></div>
                  </div>
                  <div class="form-group" id="password">
                     <label>Contraseña</label>
                     <input type="password" name="password" class="form-control" placeholder="Contraseña">
                    <div class="invalid-feedback"></div>
                  </div>
                  
                  
                   <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                     <li class="nav-item">
                      <button type="submit" class="btn btn-black">Iniciar</button>
                      </li>
                    <li> <a  class="nav-link " id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Registrar</a></li> 
                </ul>
                <div class="form-group" id="alert"></div>
               </form>

            </div>
         </div>
      </div>
    </div>

      <!--Registro de usaurios-->
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
    

      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
               <form method="POST" action="<?php echo base_url('logear/registro');?>" id="formulario" class="needs-validation" novalidate>
                  <div class="form-group"  >
                       <label for="validationCustom01" data-success="right">Nombre </label>
                       <input name="nombre_usuario" type="text"  placeholder="Nombre" id="nombre_usuario" data-pbVal="25" class="form-control " id-data="validationCustom01" required>
                       <div class="valid-feedback">Bien hecho!</div>
                    <div class="invalid-feedback"></div>
                  </div>
                   <div class="form-group" >
                     
                     <label  for="validationCustom02" data-success="right">Email</label>
                     <input name="correo" type="text" class="form-control" placeholder="Correo electronico" id="correo"  data-pbVal="25" id-data="validationCustom02" required>
                  </div>
                  <div class="form-group" >
                     <label for="validationCustom03" data-success="right">Contraseña</label>
                     <input name="contra" type="password" class="form-control" placeholder="Contraseña" id="contra"  data-pbVal="25" id-data="validationCustom03" required>
                      <div class="invalid-feedback"></div>
                  </div>
                  <div class="form-group" >
                     <label for="validationCustom04" data-success="right">Confirma tu contraseña</label>
                     <input name="confirmar_contra" type="password" class="form-control" placeholder="Contraseña" id="confirmar_contra"  data-pbVal="25" id-data="validationCustom04" required>
                     <div class="invalid-feedback"></div>
                  </div>
                    
                    
                  <div class="form-group">
                    <div id="progressbar"></div>
                   
                  </div>
                  <button type="submit" class="btn btn-secondary" id="btn" >Registrar</button>
                   <a href="<?php echo base_url();?>logear/index?>">Inicia session</a>
                
               </form>

            </div>
         </div>
      </div>
  </div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
</div>

<?=$footer?>

<script type="text/javascript">
  $(function(){

/* Incluimos un método para validar el campo nombre */
jQuery.validator.addMethod("nombre", function(value, element) {
return this.optional(element) || /^[a-záéóóúàèìòùäëïöüñ\s]+$/i.test(value);
}); 

/* Capturar el click del botón */
$("#btn").on("click", function()
   {
    /* Validar el formulario */
    $("#formulario").validate
         ({
             rules: /* Accedemos a los campos a través de su nombre: email, nombre, edad */
             {
               correo: {required: true, email: true, minlength: 5, maxlength: 80},
               nombre_usuario: {required: true, minlength: 2, maxlength: 50},
               contra: {required: true},
               confirmar_contra: {equalTo: "#contra"}
             },
             messages: /* Accedemos a los campos a través de su nombre: email, nombre, edad */
             {
               correo: {required: 'El campo es requerido', email: 'El formato de email es incorrecto', minlength: 'El mínimo permitido son 5 caracteres', maxlength: 'El máximo permitido son 80 caracteres'},
               nombre_usuario: {required: 'El campo es requerido', nombre_usuario: 'Sólo letras', minlength: 'El mínimo permitido son 2 caracteres', maxlength: 'El máximo permitido son 50 caracteres'},
               contra: {required: 'El campo es requerido', digits: 'Sólo dígitos', minlength: 'El mínimo permitido son 6 caracteres', maxlength: 'El máximo permitido son 3 caracteres'},
               confirmar_contra: {equalTo:'Por favor ingrese la misma contraseña'}
             }
         });
   });

});


</script>

 <!--Mensaje para verificar datos en correo electronico-->
       <?php if ($data2 = $this->session->flashdata('msg3')): ?>
          
         <script type="text/javascript">
           $(document).ready(function() {
            
                     alert(<?=$data2?>);

           });
         </script>
        
       <?php endif; ?> 

<script type="text/javascript">
 $(function() {
$( "#progressbar" ).progressbar({
  value: 0
});

//Register this function to fire whenever a value changes in one of the input elements
$("form input").change(function() {
    var pbVal = 0;
    //For each input element, count the value on the data-pbVal element and add it to the total
    $("form input").each(function(index) {
        if($(this).val().length > 0) {
            pbVal += $(this).data('pbVal');
        }
    });
    $( "#progressbar" ).progressbar( "option", "value", pbVal );
        return false;
    });
});
</script>



    

