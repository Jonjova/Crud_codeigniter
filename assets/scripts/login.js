(function($){
	console.log('hola');
	var root = 'http://localhost/jonjova/';//nesecito hacer este root para traer el controlador
		$("#frm_login").submit(function(ev) {//id de formulario 
			$("#alert").html("");//esto quita el mensaje de error si todo esta bien
			$.ajax({
				url: root + '/logear/validate',//es importante llamar la variable 
				type:'POST',
				data: $(this).serialize(),
				success: function(data){//
					var json = JSON.parse(data);
					console.log(json);
					window.location.replace(json.url);//devuelve una url con json	
				},

				error: function(xhr){
					
					if(xhr.status == 400){
						$("input").blur(function(ev) {
							
							$("#email > input").removeClass('is-invalid').addClass('is-valid');
							
						});
						$("input").blur(function(ev) {
							$("#password > input").removeClass('is-invalid');
						});
						var json = JSON.parse(xhr.responseText);
						if(json.email.length !=0){
							$("#email > div").html(json.email);
							$("#email > input").addClass('is-invalid');
						}
						if(json.password.length !=0){
							$("#password > div").html(json.password);
							$("#password > input").addClass('is-invalid');
						}			
					}else if(xhr.status = 401){
						var json = JSON.parse(xhr.responseText);
						//console.log(json);
						$("#alert").html('<div class="alert alert-danger" role="alert">'+ json.msg+
 
'</div>');
					}
				},	
		});
			ev.preventDefault();
	});	

})(jQuery)