$(document).ready(function() {
    var table = $('#datos_institucion').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "docentes-controlador.php?accion=consultar",
            type: "POST",
            dataSrc: 'data'
        },
        columns: [
            { "data": "id_institucion" },
            { "data": "nombre" },
            { "data": "direccion" },
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
    
    $('#datos_institucion').on('click', '.btn-modify', function() {
        var data = table.row($(this).parents('tr')).data();
        var id_institucion = data.id_institucion;

        $.ajax({
            url: 'db/consultas/instituciones/consultas.php',
            type: 'POST',
            data: { id_institucion: id_institucion },
            success: function(response) {
                var institucion = response.data[0];
                $('#editForm [name="id_institucion"]').val(id_institucion);
                $('#editForm [name="nombres"]').val(institucion.nombres);
                $('#editForm [name="direccion"]').val(institucion.direccion);
                $('#editModal').modal('show');
            },
            error: function() {
                alert('Error al obtener los datos de la institucion.');
            }
        });
    });
    $('#editForm').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: 'db/consultas/instituciones/consultas.php?accion=editar',
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


    $('#datos_institucion').on('click', '.btn-delete', function() {
        var data = table.row($(this).parents('tr')).data();
        var id_institucion = data.id_institucion;

        if (confirm('¿Estás seguro de que quieres desactivar a este docente?')) {
            $.ajax({
                url: 'db/consultas/instituciones/consultas.php?accion=eliminar',
                type: 'POST',
                data: { id_institucion: id_institucion },
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
