$(document).ready(function () {

    jQuery.validator.addMethod("lettersonly", function(value, element) {
      return this.optional(element) || /[a-z]+$/i.test(value);
    }, "Solo letras");

		$("#btn").on("click", function() {
			$("#formulario").validate({
				rules: 
				{
					nombre: {required: true, minlength: 2, maxlength: 50, lettersonly: true },
					categoria: {required: true},
					estado: {required: true },
					fecha: {required: true},
					foto_producto: {required: true},
				},
				messages:
				{
					nombre: {required: 'El campo de nombre es requerido', lettersonly: 'Sólo letras', minlength: 'El mínimo permitido son 2 caracteres', maxlength: 'El máximo permitido son 50 caracteres'},
					categoria: {required: 'El campo de categoria es requerido'},
					estado: {required: 'El campo de estado es requerido'},
					fecha: {required: 'El campo de fecha es requerido'},
					foto_producto: {required: 'El campo de foto es requerido'}
				}
			});
			
		});
	});