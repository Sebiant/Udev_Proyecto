$(document).ready(function() {
    $('#datos_modulo').DataTable({
        "ajax": {
            "url": "modulo-controlador.php",
            "type": "GET",
            "data": { "accion": "default" },
            "dataSrc": "data"
        },
        "columns": [
            { "data": "id_modulo" },
            { "data": "fecha_inicio" },
            { "data": "fecha_fin" },
            { "data": "estado" },
            {
                "data": "id_modulo",
                "render": function(data, type, row) {
                    return `<button class="btn btn-primary w-100 btn-modify" onclick="editarModulo(${data})">Editar</button>`;
                }
            },
            {
                "data": "id_modulo",
                "render": function(data, type, row) {
                    return `<button class="btn btn-danger w-100 btn-delete" onclick="borrarModulo(${data})">Borrar</button>`;
                }
            }
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
        }
    });
});

function editarModulo(id) {
    alert('Editar módulo con ID: ' + id);
    // Aquí puedes agregar la lógica para editar el módulo
}

function borrarModulo(id) {
    if (confirm('¿Está seguro de que desea eliminar este módulo?')) {
        $.ajax({
            url: 'modulo_controller.php?accion=eliminar',
            type: 'POST',
            data: { id_modulo: id },
            success: function(response) {
                alert(response);
                $('#tabla-modulos').DataTable().ajax.reload();
            }
        });
    }
}