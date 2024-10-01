<?php
    include_once '../componentes/header.php';

?>

<div class="container">
        <h1 class="text-center">Cuenta Docente</h1>

        <div class="row">
            <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">Info Personal</h5>
                <p class="card-text">
                    <tr>
                        <th>Nombre: </th>
                        <td><?php echo $nombre; ?></td>
                        <th>Direccion: </th>
                        <td><?php echo $direccion; ?></td>
                        <th>Correo: </th>
                    </tr>
                </p>
                <a href="#" class="btn btn-primary">Aceptar</a>
                <a href="#" class="btn btn-primary">Rechazar</a>
            </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">En uso</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            </div>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">

                <div class="table-responsive">
                    <table id="datos_CuentaCobroDeDocente" class="table table-bordered table-striped">
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
                                <th>Notas</th>
                                <th>Tipo de pago</th>
                                <th>Metodo de pago</th>
                                <th>Modificar</th>
                            </tr>
                        </thead>
                        
                        </table>
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
            </select>
            <div class="mb-3">
            <label for="notas" class="form-label">Notas:</label>
            <textarea name="notas" id="notas" class="form-control"></textarea>
          </div>
          <div class="mb-3">
            <label for="tipo_pago" class="form-label">Tipo de pago:</label>
            <select name="tipo_pago" id="tipo_pago" class="form-control">
              <option value="hora">Hora</option>
              <option value="dia">Día</option>
              <option value="mes">Mes</option>
            </select> 
          </div>
          <div class="mb-3">
            <label for="metodo_pago" class="form-label">Método de pago:</label>
            <select name="metodo_pago" id="metodo_pago" class="form-control">
              <option value="efectivo">Efectivo</option>
              <option value="transferencia">Transferencia</option>
              <option value="cheque">Cheque</option>
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

    <!-- Modal de edición -->
    <div id="editModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Cuenta de cobro</h5>
                </div>
                <form id="editForm">
                    <div class="modal-body">
                        <input type="hidden" name="id_cuenta">
                        
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
            </select>
            <div class="mb-3">
                <label for="notas" class="form-label">Notas:</label>
                    <textarea name="notas" id="notas" class="form-control"></textarea>
            </div>
          <div class="mb-3">
                <label for="tipo_pago" class="form-label">Tipo de pago:</label>
                    <select name="tipo_pago" id="tipo_pago" class="form-control">
                        <option value="hora">Hora</option>
                            <option value="dia">Día</option>
                                <option value="mes">Mes</option>
            </select> 
                </div>
                <div class="mb-3">
                    <label for="metodo_pago" class="form-label">Método de pago:</label>
                        <select name="metodo_pago" id="metodo_pago" class="form-control">
                    <option value="efectivo">Efectivo</option>
                    <option value="transferencia">Transferencia</option>
                    <option value="cheque">Cheque</option>
            </select>
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
    <script src="js/consultas_cuenta-de-cobro-docente.js"></script>
    <script src="js/datatable_cuenta-de-cobro-docente.js"></script>



