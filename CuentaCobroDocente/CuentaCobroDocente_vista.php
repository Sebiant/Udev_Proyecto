<?php
    include_once '../componentes/header.php';
    include_once '../conexion.php';

    $conn -> query("SET lc_time_names = 'es_ES'");
    // Consulta para obtener las cuentas de cobro desde la base de datos
    $sql = "SELECT d.nombres, d.apellidos, date_format(c.fecha, '%M') AS fecha, SUM(a.horas_trabajadas) AS horas_totales 
        FROM docentes d
        JOIN cuentas_cobro c ON d.id_docente = c.id_docente
        JOIN asistencias a ON d.id_docente = a.id_docente
        WHERE d.id_docente = 1";
    $resultado = $conn->query($sql);

?>

<div class="container">
    <h1 class="text-center">Cuenta Docente</h1>
    
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Cuenta de cobro actual</h5>
                    <p class="card-text">
                        <div class="card">
                            <ul class="list-group list-group-flush">
                                <?php
                                // Iterar sobre los resultados de la consulta y generar los elementos de la lista
                                if ($resultado->num_rows > 0) {
                                    $fila = $resultado->fetch_assoc();
                                     
                                    $valor_hora = 20000;
                                    $total = $fila['horas_totales'] * $valor_hora;
                                        ?>

                                            <h5>Nombre: <?php echo $fila ['nombres'].' '.$fila['apellidos'];?></h5>
                                            <h5>Mes: <?php echo $fila ['fecha'];?></h5>
                                            <h5>Horas:<?php echo  $fila['horas_totales'];?></h5>
                                            <h5>Total: <?php echo $total;?></h5>

                                       <?php
                                    
                                } else {
                                    echo '<li class="list-group-item">No hay datos disponibles</li>';
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
                    <?php
    // Consulta para obtener las materias desde la base de datos
        $sql = "SELECT DATE_FORMAT(p.fecha, '%M') AS fecha, p.hora_inicio, p.hora_salida, m.id_materia, s.id_salon
            FROM programador p
            JOIN materias m ON p.id_materia = m.id_materia
            JOIN salones s ON p.id_salon = s.id_salon";

        $resultado = $conn->query($sql);

        // Verificar si hubo error en la consulta
    if (!$resultado) {
        die("Error en la consulta SQL: " . $conn->error);
    }

            ?>

                <div class="container">

                    
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Fecha</th>
                                    <th>Hora Inicio</th>
                                    <th>Hora Salida</th>
                                    <th>Materia</th>
                                    <th>Salón</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Iterar sobre los resultados de la consulta y generar las filas de la tabla
                                if ($resultado->num_rows > 0) {
                                    while ($fila = $resultado->fetch_assoc()) {
                                        echo '<tr>';
                                        echo '<td>' . $fila['fecha'] . '</td>';
                                        echo '<td>' . $fila['hora_inicio'] . '</td>';
                                        echo '<td>' . $fila['hora_salida'] . '</td>';
                                        echo '<td>' . $fila['id_materia'] . '</td>';
                                        echo '<td>' . $fila['id_salon'] . '</td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    echo '<tr><td colspan="5" class="text-center">No hay materias disponibles</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

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