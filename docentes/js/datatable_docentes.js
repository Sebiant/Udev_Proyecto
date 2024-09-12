$(document).ready(function() {
    var table = $('#datos_docente').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "docentes-controlador.php",
            type: "POST",
            dataSrc: 'data'
        },
        columns: [
            { "data": "id_docente" },
            { "data": "tipo_documento" },
            { "data": "numero_documento" },
            { "data": "nombres" },
            { "data": "apellidos" },
            { "data": "especialidad" },
            { "data": "descripcion_especialidad" },
            { "data": "telefono" },
            { "data": "direccion" },
            { "data": "email" },
            { "data": "declara_renta" },
            { "data": "retenedor_iva" },
            { "data": "estado" },
            {
                data: null,
                defaultContent: '<button class="btn btn-primary w-100 btn-modify">Modificar</button>',
                orderable: false
            },
            {
                data: null,
                defaultContent: '<button class="btn btn-danger w-100 btn-delete">Borrar</button>',
                orderable: false
            }
        ]
    });
    
    $('#datos_docente').on('click', '.btn-modify', function() {
        var data = table.row($(this).parents('tr')).data();
        var idDocente = data.id_docente;

        $.ajax({
            url: 'docentes-controlador.php',
            type: 'POST',
            data: { id_docente: idDocente },
            success: function(response) {
                var docente = response.data[0];

                $('#editForm [name="id_docente"]').val(docente.id_docente);
                $('#editForm [name="tipo_documento"]').val(docente.tipo_documento);
                $('#editForm [name="numero_documento"]').val(docente.numero_documento);
                $('#editForm [name="nombres"]').val(docente.nombres);
                $('#editForm [name="apellidos"]').val(docente.apellidos);
                $('#editForm [name="especialidad"]').val(docente.especialidad);
                $('#editForm [name="descripcion_especialidad"]').val(docente.descripcion_especialidad);
                $('#editForm [name="telefono"]').val(docente.telefono);
                $('#editForm [name="direccion"]').val(docente.direccion);
                $('#editForm [name="email"]').val(docente.email);
                $('#editForm [name="declara_renta"]').prop('checked', docente.declara_renta === "Sí");
                $('#editForm [name="retenedor_iva"]').prop('checked', docente.retenedor_iva === "Sí");
                $('#editModal').modal('show');
            },
            error: function() {
                alert('Error al obtener los datos del docente.');
            }
        });
    });
    $('#editForm').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: 'docentes-controlador.php?accion=editar',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                alert('Docente actualizado exitosamente.');
                table.ajax.reload();
                $('#editModal').modal('hide');
            },
            error: function() {
                alert('Error al actualizar el docente.');
            }
        });
    });


    $('#datos_docente').on('click', '.btn-delete', function() {
        var data = table.row($(this).parents('tr')).data();
        var idDocente = data.id_docente;

        if (confirm('¿Estás seguro de que quieres desactivar a este docente?')) {
            $.ajax({
                url: 'docentes-controlador.php?accion=eliminar',
                type: 'POST',
                data: { id_docente: idDocente },
                success: function(response) {
                    table.ajax.reload();
                    alert('Docente desactivado exitosamente.');
                },
                error: function() {
                    alert('Error al desactivar el docente.');
                }
            });
        }
    });
});
