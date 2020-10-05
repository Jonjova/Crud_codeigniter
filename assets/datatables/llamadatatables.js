$(document).ready(function() {
    var printCounter = 0;
 
    // Append a caption to the table before the DataTables initialisation
    $('#datosproducto').append('<caption style="caption-side: bottom">A fictional company\'s staff table.</caption>');
 
    $('#datosproducto').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy',
            {
                extend: 'excel',
                messageTop: 'La información en esta tabla es propiedad de Sirius Cybernetics Corp.'
            },
            {
                extend: 'pdf',
                messageBottom: null
            },
            {
                extend: 'print',
                messageTop: function () {
                    printCounter++;
 
                    if ( printCounter === 1 ) {
                        return 'Esta es la primera vez que imprime este documento.';
                    }
                    else {
                        return 'Has impreso este documento '+printCounter+' veces';
                    }
                },
                messageBottom: null
            }
        ]
    } );
} );