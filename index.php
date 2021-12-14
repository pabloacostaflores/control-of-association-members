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
                    <li class="nav-item"><a class="nav-link active" href="index.php"><i class="fa fa-group"></i><span>Usuarios</span></a></li>
                    <?php if($sesion == 2){ ?>
                        <li class="nav-item"><a class="nav-link" href="movimientosFinancieros.php"><i class="fas fa-table"></i><span>Movimientos Financieros</span></a></li>
                    <?php } ?>
                    <li class="nav-item"><a class="nav-link" href="movimientosInventario.php"><i class="fa fa-dropbox"></i><span>Movimientos Inventario</span></a><a class="nav-link" href="tomas.php"><i class="fa fa-bitbucket"></i><span>Tomas</span></a><a class="nav-link" href="prestamos.php"><i class="fa fa-institution"></i><span>Prestamos</span></a><a class="nav-link" href="calendario.php"><i class="fa fa-calendar"></i><span>Calendario de Actividades</span></a></li>
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
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small" id="userNameField">Valerie Luna</span><img class="border rounded-circle img-profile" src="assets/img/avatars/menu.png"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="<?php echo "logout.php";?>"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Usuarios</h3>
                    <div id="content-3">
                        <div class="card shadow mb-3">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 fw-bold">Nuevo Cliente</p>
                            </div>
                            <div class="card-body">
                                <form method = "post">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="username"><strong>Nombre Completo</strong></label><input class="form-control" type="text" id="username-1" name="nombre" required=""></div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="email"><strong>Telefono</strong><br></label><input class="form-control" type="tel" id="email-1" name="telefono" required=""></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="No. Contrato"><strong>No. Contrato</strong><br></label><input class="form-control" type="text" id="first_name-1" name="IdContrato" pattern="[0-9]+" required=""></div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3"></div>
                                            <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-1" name="esSocio"><label class="form-check-label" for="formCheck-1">¿Es socio?</label></div>
                                            <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-2" name="esHeredero"><label class="form-check-label" for="formCheck-2">¿Es heredero?<br></label></div>
                                        </div>
                                    </div>
                                    <div class="row" style = "display:none;">
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="No. Contrato"><strong>coordenada x</strong><br></label><input class="form-control" type="text" id="coorx" name="coorx" required=""></div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="No. Contrato"><strong>coordenadas y</strong><br></label><input class="form-control" type="text" id="coory" name="coory" required=""></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="No. Contrato"><strong>Direccion:</strong><br></label>

                                            <div id="map" style="height: 500px; "></div>
                                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit" name ="aniadir">Añadir</button></div>
                                </form>
                                <?php 
                                include("ingresopersonas.php");
                            ?>
                            </div>
                        </div>
                        <div class="card shadow mb-3">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 fw-bold">Actualizar Telefono</p>
                            </div>
                            <div class="card-body">
                                <form method="post">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="username"><strong>Id Persona</strong></label><input class="form-control" type="text" id="username-2" name="idPersona" pattern="[0-9]+" required=""></div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="email"><strong>Nuevo Telefono</strong><br></label><input class="form-control" type="tel" id="email-2" name="nuevoTelefono" required=""></div>
                                        </div>
                                    </div>
                                    <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit" name="act">Actualizar</button></div>
                                </form>
                                <?php 
                                include("telefono.php");
                            ?>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Nuevo Administrator o Tesorero</p>
                        </div>
                        <div class="card-body">
                            <form method="post">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="username"><strong>Id de Persona</strong></label><input class="form-control" type="text" id="username-3" name="idPersonaNuevo" pattern="[0-9]+" required=""></div>
                                    </div>
                                    <div class="col"><label class="form-label" for="username"><strong>Cargo</strong></label>
                                    <br>
                                    <label><select name="cargos" class= "dropdown-item">
                                                <?php
                                                include("assets/php/conexion.php");
                                                $sql = "SELECT * FROM cargo order by idCargo";
                                                $result = mysqli_query($conn, $sql);
                                                while($row = mysqli_fetch_array($result)){
                                                    $id = $row['idCargo'];
                                                    $nombre = $row['NombreCargo'];
                                                ?> 
                                                <option value="<?php echo $id; ?>"><?php echo $nombre; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select></label>
                                
                                        <div class="mb-3"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="first_name"><strong>Contraseña</strong><br></label><input class="form-control" type="password" id="first_name-2" name="contra" required="" pattern="[0-9]+" minlength="8"></div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="last_name"><strong>Repite tu contraseña</strong><br></label><input class="form-control" type="password" id="last_name-2" name="repiteContra" required="" pattern="[0-9]+" minlength="8"></div>
                                    </div>
                                </div>
                                <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit" name="add" >Añadir</button></div>
                            </form>
                            <?php 
                                include("admin.php");
                            ?>
                        </div>
                    </div>

                    <div class="card shadow" style="display: none; margin-bottom: 25px; " id="mapUsuario"> <!--Aqui va el mapa-->
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Direccion cliente</p>
                        </div>
                        <div class="card-body">
                            <div id="mapclient" style="height: 500px; ">
                            </div>
                        </div>
                        <div class="mb-3"><button class="btn btn-primary btn-sm" id = "closebtn" style = "float: right; margin-right: 10px; margin-bottom: 10px;">Cerrar</button></div>
                        <div style="clear: both;"></div>
                    </div>

                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Usuarios Registrados</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                    <div id="dataTable_length-1" class="dataTables_length" aria-controls="dataTable"><label class="form-label">Mostrar<form method="post" action="#"><select name="limit-records" id="limit-records" class="d-inline-block form-select form-select-sm">
                                                <option selected="selected">No seleccionado</option>
                                                <?php foreach([25,50,100,500] as $limit) : ?>
                                                    <option <?php if( isset($_POST["limit-records"]) && $_POST["limit-records"] == $limit) echo "selected" ?> value="<?= $limit; ?>"><?= $limit; ?></option>
                                                <?php endforeach; ?>
                                            </select>&nbsp;</form></label></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-md-end dataTables_filter" id="dataTable_filter-1"><label class="form-label"><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Buscar"></label></div>
                                </div>
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0 " id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Id Persona</th>
                                            <th><strong>Nombre</strong><br></th>
                                            <th><strong>Puesto</strong><br></th>
                                            <th><strong>Telefono</strong><br></th>
                                            <th><strong>Direccion</strong><br></th>
                                            <th>Es Socio</th>
                                            <th>Es Heredero</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <div class="pagination">
                                    <tbody>
                                    <?php
                                        include("assets/php/conexion.php");
                                        //Probando paginacion
                                        $limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 10;
                                        $page = isset($GET["page"]) ? $GET["page"] : 1;
                                        $start = ($page - 1) * $limit;

                                        $sql2 = "SELECT p.idPersona, p.Nombre, c.NombreCargo, p.Telefono, p.coordX, p.coordY, p.EsSocio, p.EsHeredero FROM cargo c, administrador a, persona p WHERE (a.Persona_idPersona = p.idPersona and a.Cargo_idCargo = c.idCargo) LIMIT $start, $limit";
                                        $result2 = mysqli_query($conn, $sql2);

                                        $num = $conn -> query("SELECT COUNT(p.idPersona) as id FROM cargo c, administrador a, persona p WHERE a.Persona_idPersona = p.idPersona and a.Cargo_idCargo = c.idCargo;");
                                        $custNums = $num -> fetch_all(MYSQLI_ASSOC);
                                        $total = $custNums[0]['id'];
                                        $pages = ceil($total / $limit);

                                        $Previous = $page - 1;
                                        $Next = $page + 1;
                                        
                                        while($mostrar = mysqli_fetch_array($result2)){
                                            $cargo = $mostrar['NombreCargo'];
                                        ?>
                                        <tr>
                                            <?php if($mostrar['EsSocio'] == 1){
                                                $socio = "Si";
                                            }else{
                                                $socio = "No";
                                            } ?>
                                            <?php if($mostrar['EsHeredero'] == 1){
                                                $here = "Si";
                                            }else{
                                                $here = "No";
                                            } ?>
                                            <td><?php echo $mostrar['idPersona']?></td>
                                            <td><?php echo $mostrar['Nombre']?></td>
                                            <td><?php echo $cargo?></td>
                                            <td><?php echo $mostrar['Telefono']?></td>
                                            <td>
                                                <button id="map<?php echo $mostrar['idPersona']; ?>" class="btn btn-primary btn-sm">Ver</button>
                                                <script>
                                                    document.getElementById("map<?php echo $mostrar['idPersona']; ?>").addEventListener("click", function(){
                                                        document.getElementById("mapUsuario").style.display = "block";
                                                        var coordX = <?php echo $mostrar['coordX']; ?>;
                                                        var coordY = <?php echo $mostrar['coordY']; ?>;
                                                        var map2 = new google.maps.Map(document.getElementById('mapclient'), {
                                                            zoom: 19,
                                                            center: {lat: coordX, lng: coordY}
                                                        });
                                                        var marker = new google.maps.Marker({
                                                            position: {lat: coordX, lng: coordY},
                                                            map: map2
                                                        });
                                                    });
                                                </script>
                                            </td>
                                            <td><?php echo $socio?></td>
                                            <td><?php echo $here?></td>
                                            <td><button style="background: red;">X</button> </td>
                                        </tr>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                        include("assets/php/conexion.php");
                                        $sql = "SELECT * FROM persona WHERE idPersona NOT IN (SELECT Persona_idPersona FROM administrador) LIMIT $start, $limit";
                                        $result = mysqli_query($conn, $sql);
                                        while($mostrar = mysqli_fetch_array($result)){
                                            $cargo = "Sin cargo";
                                        ?>
                                        <tr>
                                            <?php if($mostrar['EsSocio'] == 1){
                                                $socio = "Si";
                                            }else{
                                                $socio = "No";
                                            } ?>
                                            <?php if($mostrar['EsHeredero'] == 1){
                                                $here = "Si";
                                            }else{
                                                $here = "No";
                                            } ?>
                                            <td><?php echo $mostrar['idPersona']?></td>
                                            <td><?php echo $mostrar['Nombre']?></td>
                                            <td><?php echo $cargo?></td>
                                            <td><?php echo $mostrar['Telefono']?></td>
                                            <td>
                                                <button id="map<?php echo $mostrar['idPersona']; ?>" class="btn btn-primary btn-sm">Ver</button>
                                                <script>
                                                    document.getElementById("map<?php echo $mostrar['idPersona']; ?>").addEventListener("click", function(){
                                                        document.getElementById("mapUsuario").style.display = "block";
                                                        var coordX = <?php echo $mostrar['coordX']; ?>;
                                                        var coordY = <?php echo $mostrar['coordY']; ?>;
                                                        var map2 = new google.maps.Map(document.getElementById('mapclient'), {
                                                            zoom: 19,
                                                            center: {lat: coordX, lng: coordY}
                                                        });
                                                        var marker = new google.maps.Marker({
                                                            position: {lat: coordX, lng: coordY},
                                                            map: map2
                                                        });
                                                    });
                                                </script>
                                            </td>

                                            <td><?php echo $socio?></td>
                                            <td><?php echo $here?></td>
                                            <td><button style="background: red;">X</button> </td>
                                        </tr>
                                            <?php
                                        }
                                        ?>
                                        
                                    </tbody>
                                    </div>
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
                                            <li class="page-item disabled"><a class="page-link" href="index.php?page=<?$Previous; ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                            <?php for($i = 1; $i <= $pages; $i++) : ?>
                                                <li class="page-item"><a class="page-link" href="index.php?page= <?= $i;?>"><?= $i; ?></a></li>
                                            <?php endfor; ?>
                                            <li class="page-item"><a class="page-link" href="index.php?page=<?$Next; ?>" aria-label="Next"><span aria-hidden="true">»</span></a></li>
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
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
        <?php
            include("assets/php/conexion.php");
            $id = $_SESSION['idPersona'];
            $sql = "SELECT Nombre FROM persona WHERE idPersona = (SELECT Persona_idPersona FROM administrador WHERE idAdministrador = '$id')";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            $nombre = $row['Nombre'];
            ?> 
        document.getElementById("userNameField").innerHTML = "<?php echo $nombre; ?>";

        var map, pastCoord = 1, currCoord;
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: 19.3437198, lng: -99.3629543 },
                zoom: 17
            });
            
            // This event listener calls addMarker() when the map is clicked.
            google.maps.event.addListener(map, "click", (event) => {
                document.getElementById("coorx").value = event.latLng.lat();
                document.getElementById("coory").value = event.latLng.lng();
                addMarker(event.latLng);
            });
            var marker = new google.maps.Marker({
                position: { lat: 19.3437198, lng: -99.3629543 },
                map: map,
                icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
                title: "ORGANIZACION",
            });
            //add marker function
            function addMarker(coords) {
                if(pastCoord != 1){
                    pastCoord.setMap(null);
                }
                var currCoord = new google.maps.Marker({
                    position: coords,
                    map: map,
                    animation: google.maps.Animation.DROP,
                });
                pastCoord = currCoord;
            }
        }
        document.getElementById("closebtn").addEventListener("click", function(){
            document.getElementById("mapUsuario").style.display = "none";
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#limit-records").change(function(){
                $('form').submit();
            })
        })
    </script>
    <script>
        // Basic example
        $(document).ready(function () {
            $('#dataTable').DataTable({
                "pagingType": "simple_numbers" // "simple" option for 'Previous' and 'Next' buttons only
            });
            $('.dataTables_length').addClass('bs-select');
        });
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCp0oPxwXimtvim2A34gQu5pqMcYH5WXSs&callback=initMap"
        async defer></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>