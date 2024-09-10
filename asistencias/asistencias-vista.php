<?php
include '../conexion.php';

$sql = "SELECT id_docente, nombres, apellidos FROM docentes";
$result = $conn->query($sql);

include_once '../componentes/header.php';
?>
    <div class="container">
        <h1 class="text-center">Gestión de Asistencias</h1>

        <div class="row">
            <div class="col-2 offset-10">
                <div class="text-center">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modalAsistencias" id="botonCrear">
                        <i class="bi bi-plus-circle"></i> Crear
                    </button>
                </div>
            </div>
        </div>
        <br><br>

        <h2>Crear Asistencia</h2>
    </div>

    <div class="table-responsive container">
        <table id="datos_asistencia" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID Asistencia</th>
                    <th>Fecha</th>
                    <th>Horas Trabajadas</th>
                    <th>Docente</th>
                    <th>Borrar</th>
                </tr>
            </thead>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalAsistencias" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Docentes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="asistenciaForm">
                        <label for="fecha">Fecha:</label>
                        <input type="date" id="fecha" name="fecha" required>
                        <br><br>
                        <label for="horas_trabajadas">Horas Trabajadas:</label>
                        <input type="number" id="horas_trabajadas" name="horas_trabajadas" required>
                        <br><br>
                        <label for="id_docente">Docente:</label>
                        <select id="docente" name="id_docente" required>
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
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Crear</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <?php
    include_once '../componentes/footer.php';
    ?>
    <script src="js/consultas_asistencias.js"></script>
    <script src="js/datatable_asistencias.js"></script>


