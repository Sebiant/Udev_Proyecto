<?php
include '../conexion.php';

$accion = isset($_GET['accion']) ? $_GET['accion']:'default';

switch ($accion){
    case 'insertar':
        $nombre = $_POST['nombre'];
        
}