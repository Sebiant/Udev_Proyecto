$(document).ready(function() {
    var table = $('#datos_asistencia').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "asistencias-controlador.php?accion=default",
            "type": "GET"
        },
        "columns": [
            { "data": "id_asistencia" },
            { "data": "fecha" },
            { "data": "horas_trabajadas" },
            { 
                "data": null,
                "render": function(data, type, row) {
                    return row.nombres + ' ' + row.apellidos;
                }
            },
            { 
                "data": null, 
                "render": function(data, type, row) {
                    return `<button type='button' class='btn btn-danger btn-delete' data-id='${row.id_asistencia}'>Eliminar</button>`;
                }
            }
        ]
    });

    $('#datos_asistencia').on('click', '.btn-delete', function() {
        var idAsistencia = $(this).data('id');

        if (confirm('¿Estás seguro de que quieres eliminar esta asistencia?')) {
            $.ajax({
                url: 'asistencias-controlador.php?accion=eliminar',
                type: 'POST',
                data: { id_asistencia: idAsistencia },
                success: function(response) {
                    table.ajax.reload();
                    alert('Asistencia eliminada exitosamente.');
                },
                error: function() {
                    alert('Error al eliminar la asistencia.');
                }
            });
        }
    });
});
