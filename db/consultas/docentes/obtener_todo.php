<?php
// Incluir el archivo de conexión
include '../../conexion.php';

// Consulta SQL para obtener todos los datos de la tabla 'docentes'
$sql = "SELECT * FROM docentes";

// Ejecutar la consulta y almacenar el resultado
$result = $conn->query($sql);

// Verificar si hay resultados y mostrarlos
if ($result->num_rows > 0) {
    // Recorrer los resultados y mostrarlos
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id_docente"] . "<br>";
        echo "Tipo de Documento: " . $row["tipo_documento"] . "<br>";
        echo "Nombres: " . $row["nombres"] . "<br>";
        echo "Apellidos: " . $row["apellidos"] . "<br>";
        echo "Especialidad: " . $row["especialidad"] . "<br>";
        echo "Descripción de Especialidad: " . $row["descripcion_especialidad"] . "<br>";
        echo "Teléfono: " . $row["telefono"] . "<br>";
        echo "Dirección: " . $row["direccion"] . "<br>";
        echo "Email: " . $row["email"] . "<br>";
        echo "Declara Renta: " . ($row["declara_renta"] ? "Sí" : "No") . "<br>";
        echo "Retenedor IVA: " . ($row["retenedor_iva"] ? "Sí" : "No") . "<br>";
        echo "<hr>";
    }
} else {
    echo "No se encontraron resultados.";
}

// Cerrar la conexión
$conn->close();
?>
