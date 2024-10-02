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
            { "data": "id_salon" },
            { "data": "id_docente" },
            { "data": "id_materia" },
            { "data": "modificar" },
            { "data": "borrar" }
        ],
    });
});

