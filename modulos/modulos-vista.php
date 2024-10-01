<?php
include_once '../componentes/header.php';
?>
<div class="container">
    <h1 class="text-center">Módulos</h1>

    <div class="row">
        <div class="col-2 offset-10">
            <div class="text-center">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modalModulos" id="botonCrear">
                    <i class="bi bi-plus-circle"></i> Crear
                </button>
            </div>
        </div>
    </div>
    <br />
    <br />

    <div class="table-responsive">
        <table id="datos_modulo" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id Modulo</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Final</th>
                    <th>Estado</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalModulos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Módulo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formModulo">
                    <div class="mb-3">
                        <input type="hidden" name="accion" value="crear" id="accion">
                        <input type="hidden" name="id_modulo" id="id_modulo">

                        <div class="mb-3">
                            <label for="fecha_inicio" class="form-label">Fecha Inicio:</label>
                            <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="fecha_final" class="form-label">Fecha Final:</label>
                            <input type="date" name="fecha_final" id="fecha_final" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="estado" class="form-label">Estado:</label>
                            <select name="estado" id="estado" class="form-control">
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id_modulo" id="id_modulo">
                <input type="hidden" name="operacion" id="operacion">
                <button type="submit" class="btn btn-success" onclick="crearModulo()">Guardar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal de edición -->
<div id="editModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Módulo</h5>
            </div>
            <form id="editForm">
                <div class="modal-body">
                    <input type="hidden" name="id_modulo">
                    <div class="form-group">
                        <label for="fecha_inicio">Fecha Inicio</label>
                        <input type="date" class="form-control" name="fecha_inicio">
                    </div>
                    <div class="form-group">
                        <label for="fecha_final">Fecha Final</label>
                        <input type="date" class="form-control" name="fecha_final">
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select class="form-control" name="estado">
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include_once '../componentes/footer.php';
?>
<script src="js/consultas_modulo.js"></script>
<script src="js/datatable_modulo.js"></script>
