<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

 <link rel="stylesheet" href="//cdn.datatables.net/2.1.5/css/dataTables.dataTables.min.css"> 
 <link rel="stylesheet" href="<link rel=stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
 <link rel="stylesheet" href="stylesheet" href="css/estilos.css">

    <title>Modulos udev</title>
  </head>
  <body>
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

    <script src="//cdn.datatables.net/2.1.5/js/dataTables.min.js"></script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

   
  </body>
</html>