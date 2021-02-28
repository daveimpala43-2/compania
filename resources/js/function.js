$(document).ready( function () {
    $('#empleados').dataTable(
        {
            "language": {
                "lengthMenu": "Mostar _MENU_ Empleados en la pantalla",
                "zeroRecords": "No se encontro información :'c",
                "info": "Esta en la pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No hay informacion",
                "paginate":{
                    "next": "Siguiente",
                    "previous": "Anterior",
                },
                "search": "Buscar"
            }
        }
    );
} );

$(document).ready( function () {
    $('#compañia').dataTable(
        {
            "language": {
                "lengthMenu": "Mostar _MENU_ Compañias en la pantalla",
                "zeroRecords": "No se encontro información :'c",
                "info": "Esta en la pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No hay informacion",
                "paginate":{
                    "next": "Siguiente",
                    "previous": "Anterior",
                },
                "search": "Buscar"
            }
        }
    );
} );