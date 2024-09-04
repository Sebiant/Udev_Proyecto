function crearInstitucion() {
    const formData = new FormData(document.getElementById('formInstitucion'));

    console.log('Acción: Crear');
    console.log('Datos del Formulario:', ...formData.entries());

    fetch('db/consultas/instituciones/consultas.php?accion=crear', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        //alert(data);
        console.log('Recargando la página...');
        location.reload();
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function editarInstitucion() {
    const formData = new FormData(document.getElementById('formInstitucion'));
    formData.append('id_institucion', document.getElementById('id_institucion').value);
    console.log('Acción: Editar');
    console.log('Datos del Formulario:', ...formData.entries());

    fetch('db/consultas/instituciones/consultas.php?accion=editar', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        //alert(data);
        console.log('Recargando la página...');
        location.reload();
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function activarInstitucion() {
    const id_institucion = document.getElementById('id_institucion_eliminar').value;

    console.log('ID Institucion a Activar:', id_institucion);

    fetch('db/consultas/instituciones/consultas.php?accion=activar', {
        method: 'POST',
        body: new URLSearchParams({ id_institucion })
    })
    .then(response => response.text())
    .then(data => {
        //alert(data);
        console.log('Recargando la página...');
        location.reload();
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
