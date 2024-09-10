<?php
    include_once '../componentes/header.php';
?>

<div class="container fondo"> 
    <h1 class="text-center">Crud Modulos</h1>
    <div class="row">
         <div class="col-3 offset-10">
           <div class="text-center"></div>
           <!-- Button trigger modal -->
                          <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modalModulos" id="botonCrear">
                            <i class="bi bi-plus-circle-fill"></i> Crear
                          </button>
         </div>
    </div>
    <br />
    <br />

          <div class="table-responsive">

            <table id="datos_programa" class="table table-bordered-striped">

                <thead>
                      <tr>
                          <th>Id Modulo</th>
                          <th>fecha inicio</th>
                          <th>fecha final</th>
                          <th>Estado</th>
                          <th>Editar</th>
                          <th>Borrar</th>
                      </tr>
                </thead>
            </table>
          </div>
    </div>
<!-- Modal-->
<div class="modal fade" id="modalModulos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Formulario modulos</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <form method="POST" id="formulario" enctype="multipart/form-data">
          <div class="modal-content">
              <label for="idModulo">Ingrese el id del modulo</label>
                <input type="text" name="idModulo" id="idModulo" class="form-control">
                <br />

                <label for="fechainicio">Ingrese la fecha de inicio del modulo</label>
                <input type="text" name="fechainicio" id="fechainicio" class="form-control">
                <br />

                <label for="fechafin">Ingrese la fecha de finalizacion del modulo</label>
                <input type="text" name="fechafin" id="fechafin" class="form-control">
                <br />
                  
          </div> 

          <div class="modal-footer">
            <input type="hidden" name="id" id="idModulo">
            <input type="hidden" name="operacion" id="operacion">
            <input type="submit" name="action" id="action" class="btn btn-succes" value="crear">

       
      </div>
            
      </form>

      </div>
     
    </div>
  </div>
</div>
<?php
    include_once '../componentes/footer.php';
?>