
    <?php
    include_once '../componentes/header.php';
    ?>
<div class="container">
        <h1 class="text-center">Docentes</h1>

        <div class="row">
            <div class="col-2 offset-10">
                <div class="text-center">
                    <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary w-100 " data-bs-toggle="modal" data-bs-target="#modalDocentes" id="botonCrear">
                            <i class="bi bi-plus-circle"></i> Crear
                        </button>
                </div>

            </div>
        </div>
        <br />
        <br />

        <div class="table-responsive">
            <table id="datos_docente" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>T.D</th>
                        <th>Documento</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Especialidad</th>
                        <th>Descripción</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Email</th>
                        <th>Renta</th>
                        <th>IVA</th>
                        <th>Modificar</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalDocentes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar Docentes</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="formDocente">
                <div class="mb-3">
          <input type="hidden" name="accion" value="crear" id="accion">
          <input type="hidden" name="id_docente" id="id_docente">

          <div class="mb-3">
            <label for="tipo_documento" class="form-label">Tipo de Documento:</label>
            <input type="text" name="tipo_documento" id="tipo_documento" class="form-control">
          </div>
          <div class="mb-3">
            <label for="numero_documento" class="form-label">Número de Documento:</label>
            <input type="text" name="numero_documento" id="numero_documento" class="form-control">
          </div>
          <div class="mb-3">
            <label for="nombres" class="form-label">Nombres:</label>
            <input type="text" name="nombres" id="nombres" class="form-control">
          </div>
          <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos:</label>
            <input type="text" name="apellidos" id="apellidos" class="form-control">
          </div>
          <div class="mb-3">
            <label for="especialidad" class="form-label">Especialidad:</label>
            <input type="text" name="especialidad" id="especialidad" class="form-control">
          </div>
          <div class="mb-3">
            <label for="descripcion_especialidad" class="form-label">Descripción Especialidad:</label>
            <input type="text" name="descripcion_especialidad" id="descripcion_especialidad" class="form-control">
          </div>
          <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono:</label>
            <input type="text" name="telefono" id="telefono" class="form-control">
          </div>
          <div class="mb-3">
            <label for="direccion" class="form-label">Dirección:</label>
            <input type="text" name="direccion" id="direccion" class="form-control">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" id="email" class="form-control">
          </div>
          <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" name="declara_renta" id="declara_renta">
            <label class="form-check-label" for="declara_renta">Declara Renta</label>
          </div>
          <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" name="retenedor_iva" id="retenedor_iva">
            <label class="form-check-label" for="retenedor_iva">Retenedor IVA</label>
          </div>
        </form>
      </div>
        </div>
        <div class="modal-footer">
            <input type="hidden" name="id_docente" id="id_docente">
            <input type="hidden" name="operacion" id="operacion">
            <button type="submit" class="btn btn-success" onclick="crearDocente()">Guardar</button>
        </div>
        </div>
        </div>
    </div>
    </div>

    <!-- Modal de edición -->
    <div id="editModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Docente</h5>
                </div>
                <form id="editForm">
                    <div class="modal-body">
                        <input type="hidden" name="id_docente">
                        <div class="form-group">
                            <label for="tipo_documento">Tipo de Documento</label>
                            <input type="text" class="form-control" name="tipo_documento">
                        </div>
                        <div class="form-group">
                            <label for="numero_documento">Número de Documento</label>
                            <input type="text" class="form-control" name="numero_documento">
                        </div>
                        <div class="form-group">
                            <label for="nombres">Nombres</label>
                            <input type="text" class="form-control" name="nombres">
                        </div>
                        <div class="form-group">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" class="form-control" name="apellidos">
                        </div>
                        <div class="form-group">
                            <label for="especialidad">Especialidad</label>
                            <input type="text" class="form-control" name="especialidad">
                        </div>
                        <div class="form-group">
                            <label for="descripcion_especialidad">Descripción de la Especialidad</label>
                            <input type="text" class="form-control" name="descripcion_especialidad">
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="text" class="form-control" name="telefono">
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <input type="text" class="form-control" name="direccion">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label for="declara_renta">Declara Renta</label>
                            <input type="checkbox" name="declara_renta">
                        </div>
                        <div class="form-group">
                            <label for="retenedor_iva">Retenedor IVA</label>
                            <input type="checkbox" name="retenedor_iva">
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

