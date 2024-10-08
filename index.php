<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/bootstrap.rtl.css">
    <link rel="stylesheet" href="css/bootstrap.css">

</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="#">Menu</a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="docentes/docentes-vista.php">Docentes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cuentas-de-cobro/cuentas-de-cobro-vista.php">Cuentas de Cobro</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="asistencias/asistencias-vista.php">Asistencias</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="instituciones/instituciones-vista.php">Instituciones</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="salones/salones-vista.php">Salones</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="programador/programador-vista.php">Programador</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="modulos/modulos-vista.php">Módulos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="materias/materias-vista.php">Materias</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="programas/programas-vista.php">Programas</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="js/consultas_docente.js"></script>
    <script src="js/datatable_docentes.js"></script>

</body>
</html>