<?php
    include_once '../componentes/header.php';
    include '../conexion.php';

    $sql = "SELECT id_docente, nombres, apellidos FROM docentes";
    $result = $conn->query($sql);
?>

<style>
    /* Contenedor principal */
    .container {
        display: flex;
        flex-direction: column; /* Para que el header esté arriba */
        align-items: stretch;
        padding: 20px;
    }

    /* Header */
    .header {
        background-color: #f9f9f9;
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    /* Main section */
    .main {
        display: flex;
        justify-content: space-between; /* Para acomodar a la izquierda y derecha */
        margin-bottom: 20px;
    }

    /* Sección central */
    .center {
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        flex: 1; /* Asegura que los elementos se expandan de manera uniforme */
        margin-right: 10px; /* Espaciado entre los elementos */
    }

    /* Elimina el margen derecho del último elemento */
    .center:last-child {
        margin-right: 0;
    }

    /* Sección izquierda y derecha */
    .left, .right {
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    /* Sección izquierda */
    .left {
        flex: 2; /* Ajusta el tamaño de la sección izquierda */
        margin-right: 20px;
    }

    /* Sección derecha */
    .right {
        flex: 1; /* Ajusta el tamaño de la sección derecha */
    }

    /* Table responsive */
    .table-responsive {
        margin-top: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table, th, td {
        border: 1px solid #ddd;
    }

    th, td {
        padding: 10px;
        text-align: center;
    }

    th {
        background-color: #007bff;
        color: white;
    }
</style>

<div class="container">
    <h2>Programar Clases</h2>
    <form id="programadorForm">
        <div class="main">
            <div class="left">
                <h2>Materias</h2>
                <div class="table-responsive">
                    <table id="datos_materias" class="table table-bordered-striped">
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
            <div class="right">
                <h2>Docentes Disponibles</h2>
                <div class="table-responsive">
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
        <div class="modal-footer">  
            <button type="submit" class="btn btn-success">Crear</button>
        </div>
    </form>
    <br>
    <div class="header">
        <h2>Clases programadas</h2>
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

<?php
    include_once '../componentes/footer.php';
?>
<script src="js/datatable_programador.js"></script>
