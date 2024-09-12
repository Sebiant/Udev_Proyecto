document.getElementById('asistenciaForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const formData = new FormData(this);

    console.log('Acción: Crear');
    console.log('Datos del Formulario:', ...formData.entries());

    fetch('asistencias-controlador.php?accion=crear', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log('Recargando la página...');
        location.reload();
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
