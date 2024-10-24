<?php
include_once '../DB/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Verificar si el formulario enviado es el de inicio de sesión o el de registro
    if (isset($_POST['login_button'])) {
        // Iniciar sesión
        $correo = $_POST['correo'];
        $contraseña = $_POST['contraseña'];

        // Consulta para verificar las credenciales
        $query = "SELECT * FROM usuarios WHERE correo = ? LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            // Verificar la contraseña
            if (password_verify($contraseña, $user['contraseña'])) {
                // Iniciar sesión con éxito
                session_start();
                $_SESSION['id_usuario'] = $user['id_usuario'];
                $_SESSION['nombre_usuario'] = $user['nombre_usuario'];

                header("Location: ../home.php"); // Redirige a la página de inicio
                exit();
            } else {
                // Contraseña incorrecta
                echo "<script>alert('Contraseña incorrecta'); window.location.href = '../login.php';</script>";
            }
        } else {
            // No se encontró el correo
            echo "<script>alert('Correo electrónico no encontrado'); window.location.href = '../login.php';</script>";
        }

    } elseif (isset($_POST['register_button_modal'])) {
        // Registro de usuario
        $nombre_usuario = $_POST['nombre_usuario'];
        $correo = $_POST['correo'];
        $contraseña = $_POST['contraseña'];

        // Verificar si el correo ya está registrado
        $query = "SELECT * FROM usuarios WHERE correo = ? LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            // Registrar el nuevo usuario
            $contraseña_hash = password_hash($contraseña, PASSWORD_BCRYPT); // Encriptar la contraseña

            $query = "INSERT INTO usuarios (nombre_usuario, correo, contraseña) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sss", $nombre_usuario, $correo, $contraseña_hash);

            if ($stmt->execute()) {
                echo "<script>alert('Registro exitoso'); window.location.href = '../login.php';</script>";
            } else {
                echo "<script>alert('Error al registrar el usuario'); window.location.href = '../login.php';</script>";
            }
        } else {
            echo "<script>alert('El correo ya está registrado'); window.location.href = '../login.php';</script>";
        }
    }
} else {
    header("Location: ../login.php");
    exit();
}
?>
