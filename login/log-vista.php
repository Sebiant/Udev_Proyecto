<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../css/bootstrap.rtl.css">
    <link rel="stylesheet" href="../css/bootstrap.css">

</head>
<body>

<div class="container mt-5 d-flex justify-content-center">
    <div class="card" style="width: 25rem;">
        <div class="card-body">
            <h2 class="text-center mb-4">Iniciar Sesión</h2>
            
            <form id="loginForm" enctype="multipart/form-data" method="post" action="log-controlador.php">
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo electrónico:</label>
                    <input type="email" id="correo" name="correo" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="contraseña" class="form-label">Contraseña:</label>
                    <input type="password" id="contraseña" name="contraseña" class="form-control" required>
                </div>
                
                <button type="submit" id="login_button" name="login_button" class="btn btn-primary w-100">Iniciar Sesión</button>
                
                <button type="button" id="register_button" class="btn btn-link w-100 mt-2" data-bs-toggle="modal" data-bs-target="#registroModal">Registro</button>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="registroModal" aria-labelledby="registroModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registroModalLabel">Registro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="registerForm" enctype="multipart/form-data" method="post" action="log-controlador.php">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="registro-nombre" class="form-label">Nombre de usuario:</label>
                        <input type="text" id="registro-nombre" name="nombre_usuario" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="registro-email" class="form-label">Correo electrónico:</label>
                        <input type="email" id="registro-email" name="correo" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="registro-password" class="form-label">Contraseña:</label>
                        <input type="password" id="registro-password" name="contraseña" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="register_button_modal" class="btn btn-primary">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include_once '../componentes/footer.php';
?>
