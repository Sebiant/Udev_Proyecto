<?php
    include_once '../componentes/header.php';
    include '../conexion.php';

    $sql = "SELECT id_docente, nombres, apellidos FROM docentes";
    $result = $conn->query($sql);
?>

<style>
    .container {
        display: flex;
        flex-direction: column;
        height: 100vh;
    }
    .header {
        flex: 0 0 30%; /* Ajusta el tamaño si es necesario */
        background-color: #4CAF50;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 10px;
    }
    .main {
        flex: 1;
        display: flex;
    }
    .left {
        flex: 1;
        background-color: #2196F3;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .right {
        flex: 1;
        background-color: #f44336;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    select {
        padding: 10px;
        font-size: 1em;
    }
</style>

<div class="container">
    <div class="main">
        <div class="left">Recuadro Izquierdo</div>
        <div class="right">
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
    </div>  
    <div class="header">
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
