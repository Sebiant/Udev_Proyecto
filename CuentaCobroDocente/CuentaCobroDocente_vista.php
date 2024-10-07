<?php
    include_once '../componentes/header.php';
    include_once '../conexion.php';

    // Consulta para obtener las materias desde la base de datos
    $sql = "SELECT nombres FROM docentes";  // Asumiendo que tienes una tabla llamada 'materias'
    $resultado = $conn->query($sql);
?>

<div class="container">
    <h1 class="text-center">Cuenta Docente</h1>
    
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Materias</h5>
                    <p class="card-text">
                        <div class="card">
                            <ul class="list-group list-group-flush">
                                <?php
                                // Iterar sobre los resultados de la consulta y generar los elementos de la lista
                                if ($resultado->num_rows > 0) {
                                    while ($fila = $resultado->fetch_assoc()) {
                                        echo '<li class="list-group-item">' . $fila['nombres'] . '</li>';
                                    }
                                } else {
                                    echo '<li class="list-group-item">No hay materias disponibles</li>';
                                }
                                ?>
                            </ul>
                        </div>
                    </p>
                    <a href="#" class="btn btn-primary">Aceptar</a>
                    <a href="#" class="btn btn-primary">Rechazar</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Clases Programadas</h5>
                    <p class="card-text">
                    <ul class="list-group">
                        <li class="list-group-item">Matemáticas - lunes 14 oct - 10:00am - Sistemas</li>
                        <?php

                         // Consulta para obtener las materias desde la base de datos
    $sql = "SELECT nombre FROM materias";  // Asumiendo que tienes una tabla llamada 'materias'
    $resultado = $conn->query($sql);
                                // Iterar sobre los resultados de la consulta y generar los elementos de la lista
                                if ($resultado->num_rows > 0) {
                                    while ($fila = $resultado->fetch_assoc()) {
                                        echo '<li class="list-group-item">' . $fila['nombre'] . '</li>';
                                    }
                                } else {
                                    echo '<li class="list-group-item">No hay materias disponibles</li>';
                                }
                                ?>
                    </ul>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="card">

        <div class="row">
            <div class="col-12">

                <div class="table-responsive">
                    <table id="datos_CuentaCobroDocente" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Fecha</th>
                                <th>pago_excepcional</th>
                                <th>valor_hora</th>
                                <th>horas_trabajadas</th>
                                <th>monto</th>
                                <th>Docente</th>
                                <th>Estado</th>
                                <th>Materias</th>
                                <th>Modificar</th>
                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalCuentaDocente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar cuenta de cobro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formCuenta">

                    <div class="mb-3">
                        <input type="hidden" name="accion" value="crear" id="accion">
                        <input type="hidden" name="id_cuenta" id="id_cuenta">

                        <div class="mb-3">
                            <label for="fecha" class="form-label">Fecha:</label>
                            <input type="date" name="fecha" id="fecha" class="form-control">
                        </div>
                        <div class="mb-3">

                            <label for="pago_excepcional" class="form-label">Pago excepcional:</label>
                            <input type="number" name="pago_excepcional" id="pago_excepcional" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="valor_hora" class="form-label">Valor hora</label>
                            <input type="number" name="valor_hora" id="valor_hora" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="horas_trabajadas" class="form-label">Horas trabajadas:</label>
                            <input type="number" name="horas_trabajadas" id="horas_trabajadas" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="monto" class="form-label">Monto:</label>
                            <input type="number" name="monto" id="monto" class="form-control">
                        </div>
                        <div class="form-check mb-3">
                            <label for="estado" class="form-label">Estado:</label>
                            <select name="estado" id="estado" class="form-control">
                                <option value="pendiente">Pendiente</option>
                                <option value="pagado">Pagado</option>
                                <option value="cancelado">Cancelado</option>
                                <option value="rechazada_por_institucion">rechazado por institucion</option>
                                <option value="rechazada_por_docente">rechazada por docente</option>
                            </select>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" onclick="crearInstitucion()">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

<?php
include_once '../componentes/footer.php';
?>
<script src="js/consultas_cuenta-de-cobro-docente.js"></script>
<script src="js/datatable_CuentaCobroDocente.js"></script>