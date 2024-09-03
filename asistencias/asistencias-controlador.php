<?php
include '../conexion.php';

$accion = isset($_GET['accion']) ? $_GET['accion'] : 'default';

switch ($accion) {
    case 'crear':
        $fecha = $_POST['fecha'];
        $horas_trabajadas = $_POST['horas_trabajadas'];
        $id_docente = $_POST['id_docente'];

        $sql = "INSERT INTO asistencias (fecha, horas_trabajadas, id_docente) 
                VALUES ('$fecha', '$horas_trabajadas', '$id_docente')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Nuevo registro creado exitosamente.";
        } else {
            echo "Error al crear el registro: " . $conn->error;
        }
        break;

    case 'editar':

    break;

    case 'eliminar':
        $id_asistencia = $_POST['id_asistencia'];

        $sql = "DELETE FROM asistencias WHERE id_asistencia = '$id_asistencia'";

        if ($conn->query($sql) === TRUE) {
            echo "Registro eliminado exitosamente.";
        } else {
            echo "Error al eliminar el registro: " . $conn->error;
        }
        break;

    case 'activar':

        break;

    default:
        $sql = "SELECT a.id_asistencia, a.fecha, a.horas_trabajadas, d.nombres, d.apellidos 
        FROM asistencias a 
        JOIN docentes d ON a.id_docente = d.id_docente";
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
