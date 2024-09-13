<?php
include '../conexion.php';

$accion = isset($_GET['accion']) ? $_GET['accion']:'default';

switch ($accion) {
    case 'crear':
        $nombre_salon = $_POST['nombre_salon'];
        $capacidad = $_POST['capacidad'];
        $descripcion = $_POST['descripcion'];
        $id_institucion = $_POST['id_institucion'];
        $estado = isset($_POST['estado']) ? 1 : 0;

        sql = "INSERT INTO salones (nombre_salon, capacidad, descripcion, id_institucion, estado) VALUES ('$nombre_salon','$capacidad','$descripcion','$id_institucion','$estado')

        if ($conn ->query($sql)===TRUE){
            echo "Nuevo registro creado exitosamente.";
        } else {
            echo "Error al crear el registro: ". $conn->error;
        }
            break;
    case 'editar' :

}

    


        
