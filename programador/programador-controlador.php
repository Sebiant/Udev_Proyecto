<?php
include '../conexion.php';

// Obtener la acción de la solicitud (puede ser 'crear', 'editar', 'eliminar', 'activar', o 'default')
$accion = isset($_GET['accion']) ? $_GET['accion'] : 'default';

switch ($accion) {
    case 'crear':
        // Lógica para crear un nuevo programador
        $fecha = $_POST['fecha'];
        $hora_inicio = $_POST['hora_inicio'];
        $hora_salida = $_POST['hora_salida'];
        $salon = $_POST['salon'];
        $docente = $_POST['docente'];
        $materia = $_POST['materia'];

        $sql = "INSERT INTO programadores (fecha, hora_inicio, hora_salida, salon, docente, materia, estado) 
                VALUES ('$fecha', '$hora_inicio', '$hora_salida', '$salon', '$docente', '$materia', 1)";

        if ($conn->query($sql) === TRUE) {
            echo json_encode(['status' => 'success', 'message' => 'Programador creado con éxito.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al crear el programador: ' . $conn->error]);
        }
        break;

    case 'editar':
        // Lógica para editar un programador existente
        $id_programador = $_POST['id_programador'];
        $fecha = $_POST['fecha'];
        $hora_inicio = $_POST['hora_inicio'];
        $hora_salida = $_POST['hora_salida'];
        $salon = $_POST['salon'];
        $docente = $_POST['docente'];
        $materia = $_POST['materia'];

        $sql = "UPDATE programadores 
                SET fecha='$fecha', hora_inicio='$hora_inicio', hora_salida='$hora_salida', salon='$salon', docente='$docente', materia='$materia' 
                WHERE id_programador='$id_programador'";

        if ($conn->query($sql) === TRUE) {
            echo json_encode(['status' => 'success', 'message' => 'Programador actualizado con éxito.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al actualizar el programador: ' . $conn->error]);
        }
        break;

    case 'eliminar':
        // Lógica para eliminar un programador existente
        $id_programador = $_POST['id_programador'];

        $sql = "DELETE FROM programadores WHERE id_programador='$id_programador'";

        if ($conn->query($sql) === TRUE) {
            echo json_encode(['status' => 'success', 'message' => 'Programador eliminado con éxito.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al eliminar el programador: ' . $conn->error]);
        }
        break;

    case 'activar':
        // Lógica para activar un programador existente
        $id_programador = $_POST['id_programador'];

        $sql = "UPDATE programadores SET estado = 1 WHERE id_programador='$id_programador'";

        if ($conn->query($sql) === TRUE) {
            echo json_encode(['status' => 'success', 'message' => 'Programador activado con éxito.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al activar el programador: ' . $conn->error]);
        }
        break;

    default:
        // Consulta para obtener los programadores
        $sql = "SELECT id_programador, fecha, hora_inicio, hora_salida, salon, docente, materia FROM programadores WHERE estado = 1"; // Filtrando solo los activos
        $result = $conn->query($sql);

        $data = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        header('Content-Type: application/json');
        echo json_encode(['data' => $data]);
        break;
}

$conn->close();
?>
