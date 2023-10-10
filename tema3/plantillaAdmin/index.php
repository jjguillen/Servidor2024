<?php
    session_start();

    if (!isset($_SESSION['proyectos'])) {
        $_SESSION['proyectos'] = array();
    }
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Proyectos Servidor</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Panel Administración</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Acciones</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Proyectos
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="colllayout-sidenav-light.htmlapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">

                                    <a class="nav-link" data-bs-toggle="modal" data-bs-target="#addProd" href="#">Añadir proyecto</a>
                                    <a class="nav-link" href="">Borrar todos</a>
                                </nav>
                            </div>
                            
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Proyectos</h1>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Proyectos
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Fecha de inicio</th>
                                            <th>Fecha de fin</th>
                                            <th>Días transcurridos</th>
                                            <th>Porcentaje completado</th>
                                            <th>Importancia</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Fecha de inicio</th>
                                            <th>Fecha de fin</th>
                                            <th>Días transcurridos</th>
                                            <th>Porcentaje completado</th>
                                            <th>Importancia</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

<?php
        
        foreach($_SESSION['proyectos'] as $proyecto) {
            echo "<tr>";
            echo "  <td>".$proyecto['nombre']."</td>";
            echo "  <td>".$proyecto['fechaI']."</td>";
            echo "  <td>".$proyecto['fechaF']."</td>";
            echo "  <td>".$proyecto['dias']."</td>";
            echo "  <td>".$proyecto['porcentaje']."</td>";
            echo "  <td>".$proyecto['importancia']."</td>";
            echo "</tr>";
        }


?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

<!-- Modal -->
<div class="modal fade" id="addProd" tabindex="-1" aria-labelledby="addProdLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addProdLabel">Nuevo Proyecto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <p>
            <form id="formProyecto" action="controlador.php" method="POST">
                <div class="row g-3 align-items-center mb-2">
                    <div class="col-4">
                        <label for="nombre" class="col-form-label">Nombre</label>
                    </div>
                    <div class="col-8">
                        <input type="text" id="nombre" name="nombre" class="form-control" required>
                    </div>
                </div>
                <div class="row g-3 align-items-center mb-2">
                    <div class="col-4">
                        <label for="fechaI" class="col-form-label">Fecha de Inicio</label>
                    </div>
                    <div class="col-8">
                        <input type="date" id="fechaI" name="fechaI" class="form-control" required>
                    </div>
                </div>
                <div class="row g-3 align-items-center mb-2">
                    <div class="col-4">
                        <label for="fechaF" class="col-form-label">Fecha de Fin</label>
                    </div>
                    <div class="col-8">
                        <input type="date" id="fechaF" name="fechaF" class="form-control" >
                    </div>
                </div>
                <div class="row g-3 align-items-center mb-2">
                    <div class="col-4">
                        <label for="porcentaje" class="col-form-label">% Realizado</label>
                    </div>
                    <div class="col-8">
                        <input type="number" id="porcentaje" name="porcentaje" class="form-control" min="1" max="100" placeholder="(1-100)">
                    </div>
                </div>
                <div class="row g-3 align-items-center mb-2">
                    <div class="col-4">
                        <label for="importancia" class="col-form-label">Importancia (1 - 5) </label>
                    </div>
                    <div class="col-8">
                        <input type="range" id="importancia" name="importancia" class="form-control" min="1" max="5" required>
                    </div>
                </div>
            </form>
        </p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" name="formProyecto" form="formProyecto" class="btn btn-primary">Crear</button>
      </div>
    </div>
  </div>
</div>




        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>


</html>
