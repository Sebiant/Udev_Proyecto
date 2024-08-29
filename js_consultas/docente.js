function crearEditarDocente() {
    const formData = new FormData(document.getElementById('formDocente'));
    const accion = document.getElementById('accion').value;

    // Log de depuración
    console.log('Acción:', accion);
    console.log('Datos del Formulario:', ...formData.entries());

    fetch(`db/consultas/docentes/consultas.php?accion=${accion}`, {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        consultarDocentes();
    })
    .catch(error => console.error('Error:', error));
}


function consultarDocentes() {
    fetch('db/consultas/docentes/consultas.php?accion=default')
        .then(response => response.json())
        .then(data => {
            console.log('Datos de Docentes:', data); // Log de depuración

            const resultadosDiv = document.getElementById('resultados');
            resultadosDiv.innerHTML = '';

            data.forEach(docente => {
                const docenteDiv = document.createElement('div');
                docenteDiv.innerHTML = `
                    ID: ${docente.id_docente} - Nombre: ${docente.nombres} ${docente.apellidos} - Documento: ${docente.numero_documento}
                    <button onclick="editarDocente(${docente.id_docente})">Editar</button>
                `;
                resultadosDiv.appendChild(docenteDiv);
            });
        })
        .catch(error => console.error('Error:', error));
}

function editarDocente(id) {
    fetch('db/consultas/docentes/consultas.php?accion=default')
        .then(response => response.json())
        .then(data => {
            console.log('Datos de Docentes:', data); // Log de depuración

            const docente = data.find(doc => doc.id_docente == id);
            console.log('Docente a Editar:', docente); // Log de depuración

            if (docente) {
                document.getElementById('accion').value = 'editar';
                document.getElementById('id_docente').value = docente.id_docente;
                document.getElementById('tipo_documento').value = docente.tipo_documento;
                document.getElementById('numero_documento').value = docente.numero_documento;
                document.getElementById('nombres').value = docente.nombres;
                document.getElementById('apellidos').value = docente.apellidos;
                document.getElementById('especialidad').value = docente.especialidad;
                document.getElementById('descripcion_especialidad').value = docente.descripcion_especialidad;
                document.getElementById('telefono').value = docente.telefono;
                document.getElementById('direccion').value = docente.direccion;
                document.getElementById('email').value = docente.email;
                document.getElementById('declara_renta').checked = docente.declara_renta == "Sí";
                document.getElementById('retenedor_iva').checked = docente.retenedor_iva == "Sí";
            }
        })
        .catch(error => console.error('Error:', error));
}


function eliminarDocente() {
    const id_docente = document.getElementById('id_docente_eliminar').value;

    console.log('ID Docente a Eliminar:', id_docente); // Log de depuración

    fetch('db/consultas/docentes/consultas.php?accion=eliminar', {
        method: 'POST',
        body: new URLSearchParams({ id_docente })
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        consultarDocentes();
    })
    .catch(error => console.error('Error:', error));
}

function activarDocente() {
    const id_docente = document.getElementById('id_docente_eliminar').value;

    console.log('ID Docente a Activar:', id_docente); // Log de depuración

    fetch('db/consultas/docentes/consultas.php?accion=activar', {
        method: 'POST',
        body: new URLSearchParams({ id_docente })
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        consultarDocentes();
    })
    .catch(error => console.error('Error:', error));
}
