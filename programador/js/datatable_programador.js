$(document).ready(function() {
    $('#datos_docente').DataTable({
        "ajax": {
            "url": "programador-controlador.php",
            "dataSrc": "data"
        },
        "columns": [
            { "data": "id_programador" },
            { "data": "fecha" },
            { "data": "hora_inicio" },
            { "data": "hora_salida" },
            { "data": "id_salon" },
            { "data": "id_docente" },
            { "data": "id_materia" },
            {
                "data": "id_programador",
                "render": function(data) {
                    return `<button class="btn btn-primary w-100 btn-modify" onclick="editarModulo(${data})">Editar</button>`;
                }
            },
            {
                "data": "id_programador",
                "render": function(data) {
                    return `<button class="btn btn-danger w-100 btn-delete" onclick="borrarModulo(${data})">Borrar</button>`;
                }
            }
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
        }
    });
});