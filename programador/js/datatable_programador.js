$(document).ready(function() {
    $('#datos_docente').DataTable({
        "ajax": {
            "url": "programador-controlador.php",
            "dataSrc": ""
        },
        "columns": [
            { "data": "id_programador" },
            { "data": "fecha" },
            { "data": "hora_inicio" },
            { "data": "hora_salida" },
            { "data": "salon" },
            { "data": "docente" },
            { "data": "materia" },
            { "data": "modificar" },
            { "data": "borrar" }
        ],
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron registros",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        }
    });
});

