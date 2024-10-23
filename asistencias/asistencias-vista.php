<?php

include_once '../componentes/header.php';
?>
<div class="container">
    <h1 class="text-center">Gestión de Asistencias</h1>

    <div class="row">
        <div class="col-2 offset-10">
            <div class="text-center">
              
            </div>
        </div>
    </div>
    <br><br>

    <div class="row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Asistencias</h5>
                    <div class="table-responsive">
                        <table id="datos_asistencia" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Horas Trabajadas</th>
                                    <th>Docente</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Programador</h5>
                    <div class="table-responsive">
                        <table id="datos_programador" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Inicio</th>
                                    <th>Salida</th>
                                    <th>Sala</th>
                                    <th>Docente</th>
                                    <th>Materia</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once '../componentes/footer.php';
?>
<script src="js/consultas_asistencias.js"></script>
<script src="js/datatable_asistencias.js"></script>
<script src="js/datatable_programador.js"></script>
