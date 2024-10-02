<?php
    include_once '../componentes/header.php';
    include '../conexion.php';

    $sql = "SELECT id_docente, nombres, apellidos FROM docentes";
    $result = $conn->query($sql);
?>

<div class="container mt-4">
    <h2 class="text-center mb-4">Programar Clases</h2>
    <form id="programadorForm">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5>Materias</h5>
                        <div class="table-responsive">
                            <table id="datos_materias" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID materia</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Frecuencia</th>
                                        <th>Modalidad</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5>Docentes Disponibles</h5>
                        <div class="form-group">
                            <label for="docente">Selecciona un docente</label>
                            <select id="docente" name="id_docente" class="form-control" required>
                                <option value="">-- Selecciona un docente --</option>
                                <?php
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<option value="' . $row['id_docente'] . '">' . $row['nombres'] . " " . $row['apellidos'] . '</option>';
                                    }
                                } else {
                                    echo '<option value="">No hay docentes disponibles</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4 d-flex justify-content-end">
            <button type="submit" class="btn btn-success">Crear</button>
        </div>
    </form>

    <h2 class="text-center mb-4">Clases Programadas</h2>

    <div class="card mt-4">
        <div class="card-body">
            <div class="table-responsive">
                <table id="datos_docente" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID Programador</th>
                            <th>Fecha</th>
                            <th>Hora de Inicio</th>
                            <th>Hora de Salida</th>
                            <th>Salón</th>
                            <th>Docente</th>
                            <th>Materia</th>
                            <th>Modificar</th>
                            <th>Borrar</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
    include_once '../componentes/footer.php';
?>
<script src="js/datatable_programador.js"></script>
