<?php
include 'db/conexion.php';

$sql = "SELECT id_docente, nombres, apellidos FROM docentes WHERE estado = 1";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Asistencias</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.rtl.css">
    <link rel="stylesheet" href="css/bootstrap.css">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>
<body>

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

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS Files -->
    <script src="js/asistencias/consulta.js"></script>
    <script src="js/asistencias/datatable.js"></script>
</body>
</html>
