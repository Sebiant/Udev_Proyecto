document.getElementById('asistenciaForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevenir el envío predeterminado del formulario

    const formData = new FormData(this);

    console.log('Acción: Crear');
    console.log('Datos del Formulario:', ...formData.entries());

    fetch('db/consultas/asistencias/consultas.php?accion=crear', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log('Recargando la página...');
        location.reload(); // Recargar la página para ver los cambios
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
