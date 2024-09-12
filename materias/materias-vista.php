<?php
    include_once '../componentes/header.php';
?>

<div class="container fondo"> 
    <h1 class="text-center">Crud Materias</h1>
    <div class="row">
         <div class="col-3 offset-10">
           <div class="text-center"></div>
           <!-- Button trigger modal -->
                          <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modalMaterias" id="botonCrear">
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
                          <th>ID materia</th>
                          <th>Nombre</th>
                          <th>Descripcion</th>
                          <th>Frecuencia</th>
                          <th>Modalidad</th>
                          <th>Estado</th>
                      </tr>
                </thead>
            </table>
          </div>
    </div>
<!-- Modal-->
<div class="modal fade" id="modalMaterias" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Formulario materias</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <form method="POST" id="formulario" enctype="multipart/form-data">
          <div class="modal-content">
              <label for="idMateria">Ingrese el id de la materia</label>
                <input type="text" name="idmateria" id="idMateria" class="form-control">
                <br />

                <label for="nombre">Ingrese el nombre de la materia</label>
                <input type="text" name="nombre" id="nombre" class="form-control">
                <br />

                <label for="descripcion">Ingrese una descripcion de la materia</label>
                <input type="text" name="descripcion" id="descripcion" class="form-control">
                <br />

                <label for="frecuencia">Ingrese la frecuencia de la materia</label>
                <input type="text" name="frecuencia" id="frecuencia" class="form-control">
                <br />

                <label for="modalidad">Ingrese la modalidad de la materia</label>
                <input type="text" name="modalidad" id="modalidad" class="form-control">
                <br />
                  
          </div> 

          <div class="modal-footer">
            <input type="hidden" name="idMateria" id="idMateria">
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