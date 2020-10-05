
	$(document).ready(function() {
		$("tr td #AlertaEliminarCliente").click(function(id) {
			id.preventDefault();
			var nombre = $(this).parents('tr').find('td:first').text();
			var id = $(this).attr('data-id');
			var self = this;
				 swal({
				 title: 'Estas seguro que quieres eliminar el registro de '+nombre+'?',
				  text: "El registro será eliminado permanentemente!",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((willDelete) => {
				  if (willDelete) {
				   
					$.ajax({
						url: url +'Producto_inventario/delete?id_producto=',
						type: 'POST',
						data: {'id_producto':id},
						success: function (data){
							 $(self).parents('tr').remove();
							//$('#prueba').DataTable().ajax.reload();
							 swal("¡Su archivo ha sido eliminado!", {
						      icon: "success",
						    });	  
						}	
					});
				  } else {
				    swal("Su archivo esta seguro!");
				  }
				});
		});	
	});