<?php
    session_start();
    $sesion = $_SESSION['idCargo'];

    if(!isset($sesion)){
        header("location: login.php");
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Table - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15" style="background: url(&quot;assets/img/amimitl.png&quot;) center / contain no-repeat;width: 40px;height: 40px;transform: scale(1.37);"></div>
                    <div class="sidebar-brand-text mx-3"><span>Amimitl</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"></li>
                    <li class="nav-item"><a class="nav-link" href="index.php"><i class="fa fa-group"></i><span>Usuarios</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="movimientosFinancieros.php"><i class="fas fa-table"></i><span>Movimientos Financieros</span></a><a class="nav-link" href="movimientosInventario.php"><i class="fa fa-dropbox"></i><span>Movimientos Inventario</span></a><a class="nav-link" href="tomas.php"><i class="fa fa-bitbucket"></i><span>Tomas</span></a><a class="nav-link active" href="prestamos.php"><i class="fa fa-institution"></i><span>Prestamos</span></a><a class="nav-link" href="calendario.php"><i class="fa fa-calendar"></i><span>Calendario de Actividades</span></a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="me-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small">Valerie Luna</span><img class="border rounded-circle img-profile" src="assets/img/avatars/menu.png"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="<?php echo "logout.php";?>"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Prestamo</h3>
                    <div id="content-3">
                        <div class="card shadow mb-3">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 fw-bold">Registrar prestamo</p>
                            </div>
                            <div class="card-body">
                                <form method="post">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="username"><strong>Objecto a prestar</strong><br></label>
                                            <br>
                                            <label><select name="obj" class= "dropdown-item">
                                                <?php
                                                include("assets/php/conexion.php");
                                                $sql = "SELECT * FROM objeto";
                                                $result = mysqli_query($conn, $sql);
                                                while($row = mysqli_fetch_array($result)){
                                                    $id = $row['idObjeto'];
                                                    $nombre = $row['Descripcion'];
                                                ?> 
                                                <option value="<?php echo $id; ?>"><?php echo $nombre; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select></label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="email"><strong>Cantidad</strong><br></label><input class="form-control" type="number" id="email-1" name="cantidad" min="1" required=""></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="No. Contrato"><strong>Id Prestatario</strong><br></label><input class="form-control" type="text" id="first_name-1" name="IdContrato" required="" pattern="[0-9]+"></div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3"></div>
                                        </div>
                                    </div>
                                    <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit" name ="pres">Añadir</button></div>
                                </form>
                                <?php 
                                include("presta.php");
                            ?>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Prestamos</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                    <div id="dataTable_length-1" class="dataTables_length" aria-controls="dataTable"><label class="form-label">Mostrar<select class="d-inline-block form-select form-select-sm">
                                                <option value="10" selected="">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>&nbsp;</label></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-md-end dataTables_filter" id="dataTable_filter-1"><label class="form-label"><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Buscar"></label></div>
                                </div>
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Id Prestamo</th>
                                            <th>Objecto</th>
                                            <th>Registrado por</th>
                                            <th>Prestado a</th>
                                            <th>Cantidad</th>
                                            <th>Fecha</th>
                                            <th>Devuelto</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        include("assets/php/conexion.php");
                                        $sql = "SELECT * FROM prestamos";
                                        $result = mysqli_query($conn, $sql);
                                        while($mostrar = mysqli_fetch_array($result)){
                                        ?>
                                        <tr>
                                            <?php
                                            $id = $mostrar['Objeto_idObjeto'];
                                            $sql2 = "SELECT Descripcion FROM objeto WHERE idObjeto ='$id'";
                                            $result2 = mysqli_query($conn, $sql2);
                                            //Sacar el nombre del objeto
                                            while($mostrar2 = mysqli_fetch_array($result2)){
                                                $nombre = $mostrar2['Descripcion'];
                                            }
                                            ?>
                                            <?php
                                            //Sacar el nombre del prestatario
                                            $id2 = $mostrar['Prestatario_idPrestatario'];
                                            $sql3 = "SELECT Nombre FROM prestatario WHERE idPrestatario ='$id2'";
                                            ?>
                                            <td><?php echo $mostrar['idPrestamos']?></td>
                                            <td><?php echo $nombre?></td>
                                            <td><?php echo $mostrar['Administrador_idAdministrador']?></td>
                                            <td><?php echo $mostrar['Persona_idPersona']?></td>
                                            <td><?php echo $mostrar['Cantidad']?></td>
                                            <td><?php echo $mostrar['Fecha']?></td>
                                            <td><?php echo $mostrar['Devuelto']?></td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr></tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-6 align-self-center">
                                    <p id="dataTable_info-1" class="dataTables_info" role="status" aria-live="polite">Mostrando 1 al 10 de 27</p>
                                </div>
                                <div class="col-md-6">
                                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination">
                                            <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Amimitl 2021</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>