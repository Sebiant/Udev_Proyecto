$(document).ready(function() {
    var table = $('#datos_CuentaCobroDeDocente').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "cuenta-de-cobro-docente_controlador.php",
            type: "POST",
            dataSrc: 'data'
        },
        columns: [
            { "data": "id_cuenta" },
            { "data": "fecha" },
            { "data": "pago_excepcional" },
            { "data": "valor_hora" },
            { "data": "horas_trabajadas" },
            { "data": "monto" },
            { "data": "id_docente" },
            { "data": "estado" },
            { "data": "Notas"},
            { "data": "tipo_de_pago" },
            { "data": "metodo_pago"},
            
            {
                data: null,
                defaultContent: '<button class="btn btn-primary w-100 btn-modify">Modificar</button>',
                orderable: false
            },
            {
                data: null,
                defaultContent: '<button class="btn btn-danger w-100 btn-delete">Borrar</i></button>',
                orderable: false
            }
        ]
    });
    
    $('#datos_CuentaCobroDeDocente').on('click', '.btn-modify', function() {
        var data = table.row($(this).parents('tr')).data();
        var idCuenta = data.id_cuenta;

        $.ajax({
            url: 'cuenta-de-cobro-docente_controlador.php?accion=modificar',
            type: 'POST',
            data: { id_cuenta: idCuenta},
            success: function(response) {
                var cuenta = response.data[0];
                $('#editForm [name="id_cuenta"]').val(cuenta.id_cuenta);
                $('#editForm [name="nombres"]').val(cuenta.fecha);
                $('#editForm [name="pago_excepcional"]').val(cuenta.pago_excepcional);
                $('#editForm [name="valor_hora"]').val(cuenta.valor_hora);
                $('#editForm [name="horas_trabajadas"]').val(cuenta.horas_trabajadas);
                $('#editForm [name="monto"]').val(cuenta.monto);
                $('#editForm [name="id_docente"]').val(cuenta.id_docente);
                $('#editForm [name="estado"]').prop('checked', cuenta.estado === "Sí");
                $('#editModal').modal('show');
            },
            error: function() {
                alert('Error al obtener los datos de la cuenta.');
            }
        });
    });
    $('#editForm').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: 'cuenta-de-cobro-docente_controlador.php?accion=editar',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                alert('Cuenta actualizada exitosamente.');
                table.ajax.reload();
                $('#editModal').modal('hide');
            },
            error: function() {
                alert('Error al actualizar la cuenta.');
            }
        });
    });


    
});
