<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel = "stylsheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.dataTables.min.css">

    <link rel = "stylesheet" href="https://cdn.jsdelivr.net/npm/bosstrap-icon@1.5.0/font/boostrap-icons.css">

    <link rel = "stylesheet" href="css/boostrap.css">
    <title>Instituciones</title>
  </head>
  <body>
    <div class="container">
        <h1 class="text-center">Instituciones</h1>

        <div class="row">
            <div class="col-2 offset-10">
                <div class="text-center">
                    <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary w-100 " data-bs-toggle="modal" data-bs-target="#modalInstitucion" id="botonCrear">
                            <i class="bi bi-plus-circle"></i> Crear
                        </button>
                </div>

            </div>
        </div>
        <br />
        <br />

        <div class="table-responsive">
            <table id="datos_institucion" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Direccion</th>
                        <th>Estado</th>
                        <th>Editar</th>
                        <th>Borrar</th>
                    </tr>
                </thead>

            </table>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="modalInstitucion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Instituto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" id="formulario"></form>
        <div class="modal-content">
            <label for="nombre">Ingrese el nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control">
            <br />

            <label for="direccion">Ingrese la direccion</label>
            <input type="text" name="direccion" id="direccion" class="form-control">
            <br />

        </div>

        <div class="modal-footer">
            <input type="hidden" name="id_instituto" id="id_instituto">
            <input type="hidden" name="operacion" id="operacion">
            <input type="submit" name="action" id="action" class="btn btn-success" value ="Crear">
      </div>
      </div>
    </div>
  </div>
</div>
    <div id="editModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Institucion</h5>
                </div>
                <form id="editForm">
                    <div class="modal-body">
                        <input type="hidden" name="id_instituto">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="Nombre">
                        </div>
                        <div class="form-group">
                            <label for="direccion">Direccion</label>
                            <input type="text" class="form-control" name="numero_documento">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </form>
            </div> 
        </div>
  </div>

 <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity= "sha384-H+K7U5CnXl1h5ywQ6nKM/YUxl9F3hi+ofewM6Dct7/q5ebf1gRPlivXoF5Pj2JYh2" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
  </body>
</html>
