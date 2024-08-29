<?php
// Incluir el archivo de conexión
include '../../conexion.php';

// Obtener la acción de la solicitud (puede ser 'crear', 'editar', 'eliminar', 'consultar' o 'default')
$accion = isset($_GET['accion']) ? $_GET['accion'] : 'default';

switch ($accion) {
    case 'crear':
        // Código para crear un nuevo registro
        $tipo_documento = $_POST['tipo_documento'];
        $numero_documento = $_POST['numero_documento'];
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $especialidad = $_POST['especialidad'];
        $descripcion_especialidad = $_POST['descripcion_especialidad'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $email = $_POST['email'];
        $declara_renta = isset($_POST['declara_renta']) ? 1 : 0; // Convertir a TINYINT
        $retenedor_iva = isset($_POST['retenedor_iva']) ? 1 : 0; // Convertir a TINYINT

        $sql = "INSERT INTO docentes (tipo_documento, numero_documento, nombres, apellidos, especialidad, descripcion_especialidad, telefono, direccion, email, declara_renta, retenedor_iva) 
                VALUES ('$tipo_documento', '$numero_documento', '$nombres', '$apellidos', '$especialidad', '$descripcion_especialidad', '$telefono', '$direccion', '$email', $declara_renta, $retenedor_iva)";

        if ($conn->query($sql) === TRUE) {
            echo "Nuevo registro creado exitosamente.";
        } else {
            echo "Error al crear el registro: " . $conn->error;
        }
        break;

    case 'editar':
        // Código para editar un registro existente
        $id_docente = $_POST['id_docente'];
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        // Agregar más campos según sea necesario

        $sql = "UPDATE docentes SET nombres='$nombres', apellidos='$apellidos' WHERE id_docente='$id_docente'";

        if ($conn->query($sql) === TRUE) {
            echo "Registro actualizado exitosamente.";
        } else {
            echo "Error al actualizar el registro: " . $conn->error;
        }
        break;

    case 'eliminar':
        // Código para "eliminar" un registro (en realidad, cambia su estado)
        $id_docente = $_POST['id_docente'];

        $sql = "UPDATE docentes SET estado=0 WHERE id_docente='$id_docente'";

        if ($conn->query($sql) === TRUE) {
            echo "Registro desactivado exitosamente.";
        } else {
            echo "Error al desactivar el registro: " . $conn->error;
        }
        break;

    default:
        // Consulta SQL para obtener todos los datos de la tabla 'docentes'
        $sql = "SELECT * FROM docentes";
        $result = $conn->query($sql);

        // Crear un array para almacenar los resultados
        $data = [];

        // Verificar si hay resultados y agregarlos al array
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $row['declara_renta'] = $row['declara_renta'] ? "Sí" : "No";
                $row['retenedor_iva'] = $row['retenedor_iva'] ? "Sí" : "No";
                $data[] = $row;
            }
        }

        // Devolver los datos en formato JSON
        header('Content-Type: application/json');
        echo json_encode($data);
        break;
}
$conn->close();
?>
