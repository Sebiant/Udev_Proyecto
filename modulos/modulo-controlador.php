<?php
include '../conexion.php';

// Obtener la acción de la solicitud ('crear', 'editar', 'eliminar', 'consultar' o 'default')
$accion = isset($_GET['accion']) ? $_GET['accion'] : 'default';

switch ($accion) {
    case 'crear':
        $fecha_inicio = $_POST['fecha_inicio'];
        $fecha_final = $_POST['fecha_final'];
        $estado = isset($_POST['estado']) ? 1 : 0;

        $sql = "INSERT INTO modulos (fecha_inicio, fecha_final, estado) 
                VALUES ('$fecha_inicio', '$fecha_final', '$estado')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Nuevo módulo creado exitosamente.";
        } else {
            echo "Error al crear el módulo: " . $conn->error;
        }
        break;

    case 'editar':
        $id_modulo = $_POST['id_modulo'];

        // Obtener el registro existente del módulo
        $sql_select = "SELECT * FROM modulos WHERE id_modulo='$id_modulo'";
        $result = $conn->query($sql_select);

        if ($result->num_rows > 0) {
            $modulo = $result->fetch_assoc();

            // Actualizar los campos si se proporcionan nuevos valores
            $fecha_inicio = isset($_POST['fecha_inicio']) ? $_POST['fecha_inicio'] : $modulo['fecha_inicio'];
            $fecha_final = isset($_POST['fecha_final']) ? $_POST['fecha_final'] : $modulo['fecha_final'];
            $estado = isset($_POST['estado']) ? 1 : $modulo['estado'];

            $sql_update = "UPDATE modulos SET 
                            fecha_inicio='$fecha_inicio', 
                            fecha_final='$fecha_final', 
                            estado='$estado'
                            WHERE id_modulo='$id_modulo'";

            if ($conn->query($sql_update) === TRUE) {
                echo "Módulo actualizado exitosamente.";
            } else {
                echo "Error al actualizar el módulo: " . $conn->error;
            }
        } else {
            echo "No se encontró el módulo.";
        }
        break;

    case 'eliminar':
        $id_modulo = $_POST['id_modulo'];

        $sql = "UPDATE modulos SET estado=0 WHERE id_modulo='$id_modulo'";

        if ($conn->query($sql) === TRUE) {
            echo "Módulo desactivado exitosamente.";
        } else {
            echo "Error al desactivar el módulo: " . $conn->error;
        }
        break;

    case 'activar':
        $id_modulo = $_POST['id_modulo'];

        $sql = "UPDATE modulos SET estado=1 WHERE id_modulo='$id_modulo'";

        if ($conn->query($sql) === TRUE) {
            echo "Módulo activado exitosamente.";
        } else {
            echo "Error al activar el módulo: " . $conn->error;
        }
        break;

    default:
        $sql = "SELECT * FROM modulos";
        $result = $conn->query($sql);

        $data = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $row['estado'] = $row['estado'] ? "activo" : "inactivo";
                $data[] = $row;
            }
        }

        header('Content-Type: application/json');
        echo json_encode(['data' => $data]);
        break;
}

$conn->close();
?>
