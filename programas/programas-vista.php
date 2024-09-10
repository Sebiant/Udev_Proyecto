<?php
    include_once '../componentes/header.php';
?>
    <div class="container fondo"> 
    <h1 class="text-center">Crud Programas</h1>
    <div class="row">
         <div class="col-3 offset-10">
           <div class="text-center"></div>
           <!-- Button trigger modal -->
                          <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modalPrograma" id="botonCrear">
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
                          <th>Id Programa</th>
                          <th>Tipo</th>
                          <th>Nombre</th>
                          <th>Duracion</th>
                          <th>Cant Modulos</th>
                          <th>Descripcion</th>
                          <th>Estado</th>
                          <th>Editar</th>
                          <th>Borrar</th>
                      </tr>
                </thead>
            </table>
          </div>
    </div>
<!-- Modal-->
<div class="modal fade" id="modalPrograma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Formulario Programas</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <form method="POST" id="formulario" enctype="multipart/form-data">
          <div class="modal-content">
              <label for="ideprograma">Ingrese el id del programa</label>
                <input type="text" name="idPrograma" id="idPrograma" class="form-control">
                <br />

                <label for="Tipo">Ingrese el tipo del programa</label>
                <input type="text" name="tipoPrograma" id="tipoPrograma" class="form-control">
                <br />

                <label for="Nombre">Ingrese el nombre del programa</label>
                <input type="text" name="nombre" id="nombre" class="form-control">
                <br />

                <label for="duracion">Ingrese la duracion del programa</label>
                <input type="text" name="duracion" id="duracion" class="form-control">
                <br />

                <label for="cantidad">Ingrese la cantidad de modulos del programa</label>
                <input type="text" name="cantidad" id="cantidad" class="form-control">
                <br />

                <label for="Nombre">Ingrese una descripcion del programa</label>
                <input type="text" name="descripcion" id="descripcion" class="form-control">
                <br />
                  
          </div> 

          <div class="modal-footer">
            <input type="hidden" name="idPrograma" id="idPrograma">
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