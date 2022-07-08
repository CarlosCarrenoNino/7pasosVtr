<?php

date_default_timezone_set('America/Bogota');
$fechaHoy = date('d/m/Y');
$fechaHoy = date('Y/m/d');
$horaHoy = date('H');
$minutoHoy = date('i:s');
$HoraTotal = $horaHoy.':'.$minutoHoy;

session_start();

require('Conexion.php');

if(isset($_SESSION['UsuarioIngreso'])) {
    $Privilegio = $_SESSION["PrivilegioUsuario"];
    if ($Privilegio == "1" or $Privilegio == "23"){

    }else{
        echo '<script> window.location="logout.php"; </script>';
    }
}else{
    echo '<script> window.location="logout.php"; </script>';
}

?>
  




<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="icon" href="icono_vtr.ico" type="image/x-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>REGISTROS ASESORES | BOT 7 PASOS</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css"> 

        <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/vendor/chartist/css/chartist.min.css">
        <link rel="stylesheet" href="../assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css">
        <link rel="stylesheet" href="../assets/vendor/toastr/toastr.min.css">
        <link rel="stylesheet" href="assets/css/main.css">
        <link rel="stylesheet" href="assets/css/color_skins.css">
        <link rel="stylesheet" href="assets/css/color_skins.css">
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.0/Chart.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-black">
            <!-- Navbar Brand-->
            <img src="vtricono.png" alt="icono vtr"><a class="navbar-brand ps-3" href="actualizar_eliminar_asesor.php">Asesores 7 Pasos</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="actualizar_eliminar_asesor"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <!-- <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form> -->
            <!-- Navbar--> 
            <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
                <li class="nav-item dropdown"><img src="atentoicono.png" alt="icono vtr">
                    
                </li>
            </ul>
                <a style="color:#fff;" class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <!-- <li><hr class="dropdown-divider" /></li> -->
                    <li><a class="dropdown-item" href="login.php">Cerrar Sesión</a></li>
                </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav"><br>
                        
                            <div class="sb-sidenav-menu-heading">MENÚ actualizar asesores</div>
                            <a class="nav-link" href="login.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Cerrar Sesión
                            </a>
                            <hr style="color:black;">
                            <!-- <label for="" class="blod"><b>Consultar:</b> </label>
                            <input type="date" class="form-control" id="Consultar_fecha" value="Consultar_fecha" name="Consultar_fecha"><br>
                            <button class="btn btn-dark bg-black form-control blod" id="Consultar_fecha1" name="Consultar_fecha1" onclick="Consultar()">Consultar</button> <br>
                             -->
                            
                            <div class="sb-sidenav-menu-heading">Usuarios</div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Crear Usuarios
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>

                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="regisgros_usuarios.php">Nuevo Usuario</a>
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="actualizar_eliminar_usuarios.php">Editar o Elininar Usuario</a>
                            </nav>
                                


                            </div>
                            <hr style="color:black;">
                            <div class="sb-sidenav-menu-heading">Supervisores</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts1">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Crear Supervisores
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>

                            <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                

                            <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="registros_supervisor.php">Ingresar Supervisor</a>
                            </nav> 
                            <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="actualizar_eliminar_supervisor.php">Editar o Eliminar Supervisor</a>
                            </nav> 



                            </div>
                            <hr style="color:black;">
                            <div class="sb-sidenav-menu-heading">Asesores</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts2">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Crear Asesores
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                
                                
                            <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="registros_asesor.php">Ingresar Asesor</a>
                            </nav> 
                            <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="actualizar_eliminar_asesor.php">Editar o Eliminar Asesor</a>
                            </nav>
                               
                            </div>
                            <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Páginas
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a> -->
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    
                                </nav>
                            </div>
                            <!-- <div class="sb-sidenav-menu-heading">Informes</div>
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                
                            </a>
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                Descargar Bases
                            </a> -->
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Conectado a:</div>
                        BOT 7 PASOS
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <br>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card mb-4">
                                    
                                    <div class="card-body">
                                        <h5 id="nuevo1" style="color:black;">Asesores</h5>
                                        
                                        <div id="RecargarInTabla">
                                            <table id="table_id" class="display">
                                                    <thead>
                                                        <style>
                                                            th, tr{
                                                                text-align: center;
                                                            }
                                                        </style>
                                                            <tr>
                                                                <th style="background-color: black;">ID JEFE</th>
                                                                <th style="background-color: black;">RED</th>
                                                                <th style="background-color: black;">NOMBRE</th>
                                                                <th style="background-color: black;">CEDULA</th>
                                                                <th style="background-color: black;">OPERACIÓN</th>
                                                                <th style="background-color: black;">CARGO</th>
                                                                <th style="background-color: black;">JEFE</th>
                                                                <!-- <th style="background-color: black;">CORDINADOR</th> -->
                                                                <th style="background-color: black;">ANDES</th>
                                                                <th style="background-color: black;">SEGMENTO</th>
                                                                <th style="background-color: black;">CANCELAR</th>
                                                                <th hidden="hidden"></th>
                                                                <th hidden="hidden"></th>   

                                                            </tr>
                                                    </thead>
                                                <tbody>
                                                    <?php
                                                    $sql="SELECT * FROM TBL_AREG_ASESOR_VTR";
                                                    $row=sqlsrv_query($conn, $sql);

                                                    

                                                    while($resultado=sqlsrv_fetch_array($row)){
                                                        
                                                        $IDJEFE=$resultado['REG_NID_SUPERVISOR'];
                                                        $USUARIO=$resultado['REG_CUSUARIO_ASESOR'];
                                                        $NOMBRE=$resultado['REG_CNOMBRE_ASESOR'];
                                                        $CEDULA=$resultado['REG_CCEDULA_ASESOR'];
                                                        $OPERACIÓN=$resultado['REG_COPERACION_ASESOR'];
                                                        $CARGO=$resultado['REG_CCARGO'];
                                                        $JEFEINMEDIATO=$resultado['REG_CJEFE_INMEDIATO'];
                                                        /* $CORDI=$resultado['REG_DETALLE_0']; */
                                                        $ANDES=$resultado['REG_DETALLE_1'];
                                                        $SEGMENTO=$resultado['REG_DETALLE_2'];

                                                        
                                                        
                                                        ?>
                                                                        <tr>
                                                                            <td style="color: black;"><?php echo $IDJEFE;?></td>
                                                                            <td style="color: black;"><?php echo $USUARIO;?></td>
                                                                            <td style="color: black;"><?php echo $NOMBRE;?></td>
                                                                            <td style="color: black;"><?php echo $CEDULA;?></td>
                                                                            <td style="color: black;"><?php echo $OPERACIÓN;?></td>
                                                                            <td style="color: black;"><?php echo $CARGO;?></td>
                                                                            <td style="color: black;"><?php echo $JEFEINMEDIATO;?></td>
                                                                            <!-- <td style="color: black;"><?php echo $CORDI;?></td> -->
                                                                            <td style="color: black;"><?php echo $ANDES;?></td>
                                                                            <td style="color: black;"><?php echo $SEGMENTO;?></td>

                                                                            
                                                                                <!-- <form action ="editar_credencial.php" method="POST"> -->
                                                                                            <td hidden="hidden"><input type="text" hidden="hidden" name="id_new" id="id_new1" value="<?php echo $resultado['REG_NID_ASESOR']; ?>"></td>
                                                                                            <td hidden="hidden"><b><input type = "text" hidden="hidden" name ="estado" class="form-control" row="12" value="Cancelado"> </b></td>
                                                                                            <td>
                                                                                            <a href="delete_asesor.php?REG_NID_ASESOR=<?php echo $resultado['REG_NID_ASESOR'] ?>" class="btn btn-dark" >
                                                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                                                            <line x1="4" y1="7" x2="20" y2="7" />
                                                                                            <line x1="10" y1="11" x2="10" y2="17" />
                                                                                            <line x1="14" y1="11" x2="14" y2="17" />
                                                                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                                                            </svg>
                                                                                            </a>
                                                                                            <hr>
                                                                                            <a href="editar_asesor.php?REG_NID_ASESOR=<?php echo $resultado['REG_NID_ASESOR'] ?>" class="btn btn-dark" >
                                                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                                            <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4"></path>
                                                                                            <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4"></path>
                                                                                            </svg>
                                                                                            </a>
                                                                                            </td>
                                                                               <!--  </form> -->
                                                                    
                                                                        </tr>
                                                    <?php }
                                                    ?>

                                                                        
                                
                                                </tbody>
                                            </table>
                                        </div>  

                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div> 
                    
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Carlos Niño DESARROLLADOR RPA 2021 Privacy Policy Terms & Conditions</div>
                            <!-- <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div> -->
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
        <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="assets/bundles/libscripts.bundle.js"></script> <!--** Termina Cargando **-->
        <script src="assets/bundles/vendorscripts.bundle.js"></script> <!--** Termina Cargando **-->
        <script src="assets/bundles/chartist.bundle.js"></script> <!--** Muestra Mensaje De Bienvenidad  **-->
        <script src="assets/bundles/knob.bundle.js"></script> <!--** Muestra Mensaje De Bienvenidad  **-->
        <script src="../assets/vendor/toastr/toastr.js"></script> <!--** Muestra Mensaje De Bienvenidad  **-->
        <script src="assets/bundles/mainscripts.bundle.js"></script> <!--** Termina Cargando **-->
        <script src="assets/js/index.js"></script> <!--** Muestra Mensaje De Bienvenidad  **-->
        <script src="js/main.js"></script>
  

     

    <script>
            $(document).ready( function () {
            $('#table_id').DataTable();
            } );
            $(document).ready(function() {
                // Basic
                $('.dropify').dropify();

                // Translated
                $('.dropify-fr').dropify({
                    messages: {
                        default: 'Arrastra y suelta un archivo aquí o haz clic',
                        replace: 'Arrastre y suelte un archivo o haga clic para reemplazar',
                        remove: 'Suprimir',
                        error: 'Lo sentimos, el archivo es demasiado grande.'
                    }
                });

                // Used events
                var drEvent = $('#input-file-events').dropify();

                drEvent.on('dropify.beforeClear', function(event, element) {
                    return confirm("Deseas Eliminarlo..? \"" + element.file.name + "\" ?");
                });

                drEvent.on('dropify.afterClear', function(event, element) {
                    alert('Archivo Borrado');
                });

                drEvent.on('dropify.errors', function(event, element) {
                    console.log('Error');
                });

                var drDestroy = $('#input-file-to-destroy').dropify();
                drDestroy = drDestroy.data('dropify')
                $('#toggleDropify').on('click', function(e) {
                    e.preventDefault();
                    if (drDestroy.isDropified()) {
                        drDestroy.destroy();
                    } else {
                        drDestroy.init();
                    }
                })
            });
    </script>

    <script>

        $(document).ready(function(){
            $("#progress").hide();
            $("#CargarBase").hide();
            $("#CargueUser").hide();


        })

        $("#carga").click(function(){
            $("#progress").show();
        })

        $("#BaseMasiva").click(function(){
            $("#UnUsuario").hide();
            $("#BaseMasiva").hide();
            $("#CargarBase").show();
            $("#CargueUser").show();

        })


        $("#CargueUser").click(function(){
            $("#CargarBase").hide();
            $("#CargueUser").hide();
            $("#BaseMasiva").show();
            $("#UnUsuario").show();

        })


            $(document).ready(function() {
                $('#myTable').DataTable();
                $(document).ready(function() {
                    var table = $('#example').DataTable({
                        "columnDefs": [{
                            "visible": false,
                            "targets": 2
                        }],
                        "order": [
                            [2, 'asc']
                        ],
                        "displayLength": 25,
                        "drawCallback": function(settings) {
                            var api = this.api();
                            var rows = api.rows({
                                page: 'current'
                            }).nodes();
                            var last = null;
                            api.column(2, {
                                page: 'current'
                            }).data().each(function(group, i) {
                                if (last !== group) {
                                    $(rows).eq(i).before('<tr class="group"><td colspan="1">' + group + '</td></tr>');
                                    last = group;
                                }
                            });
                        }
                    });
                    // Order by the grouping
                    $('#example tbody').on('click', 'tr.group', function() {
                        var currentOrder = table.order()[0];
                        if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                            table.order([2, 'desc']).draw();
                        } else {
                            table.order([2, 'asc']).draw();
                        }
                    });
                });
            });

    </script>


    


</html>

<script>
     $(document).ready(function(){

        setInterval(
            function(){
                $('#seccionRecargarIndicadores').load('RecargarIndicadores.php')
            },2000
        
        )
       
     });
</script> 
<script>
     $(document).ready(function(){

        setInterval(
            function(){
                $('#RecargarInTabla').load('RecargarInTabla.php')
            },60000
        
        )
       
     });
</script> 


