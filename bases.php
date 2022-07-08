<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>BASES |BOT  7 PASOS</title>
        <link rel="icon" href="icono_vtr.ico" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-black">
            <!-- Navbar Brand-->
            <img src="vtricono.png" alt="icono vtr"><a class="navbar-brand ps-3" href="index.php">Reporteador 7 Pasos</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
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
<!--                     <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
 -->                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                       <!--  <li><hr class="dropdown-divider" /></li> -->
                        <!-- <li><a class="dropdown-item" href="login.php">Cerrar Sesión</a></li> -->
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav"><br>
                        <a href="index1.php"><button class="btn btn-dark bg-black form-control blod" >No Voz</button></a> 

                            <div class="sb-sidenav-menu-heading">MENÚ VOZ</div>
                            <a class="nav-link" href="bases.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                Bases
                            </a>
                            <div class="sb-sidenav-menu-heading">Interfaces</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Usuarios
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="index.php">Supevisores</a>
                                    
                                </nav>
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="login.php">Cerra sesion</a>
                               </nav>
                            </div>
                            <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a> -->
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Autenticación
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.php">Login</a>
                                            <a class="nav-link" href="register.php">Registrar</a>
                                            <a class="nav-link" href="password.php">Ha Olvidado su Contraseña</a>
                                        </nav>
                                    </div> -->
                                    <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.php">401 Page</a>
                                            <a class="nav-link" href="404.php">404 Page</a>
                                            <a class="nav-link" href="500.php">500 Page</a>
                                        </nav>
                                    </div> -->
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">INFORMES</div>
                            <!-- <a class="nav-link" href="">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                               
                            </a> -->
                            <a class="nav-link" href="bases.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Descargar Informes
                            </a>
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
                        <!-- <h1 class="mt-4">Informes</h1> -->
                        <!-- <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Supervisores</a></li>
                            <li class="breadcrumb-item active">Bases</li>
                        </ol> -->

                        <div class="row">
                            <div class="col-xl-10">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h2 style="color:black;">Descargar Informes</h2>
                                        <table border="1" class="table m-b-0 table-hover" id="">
                                            <thead class="thead-danger">
                                                <tr>
                                                    <td>BASES </td>
                                                    <td>FECHA INICIO</td>
                                                    <td>FECHA FIN</td>
                                                    <td>DESCARGAR</td>
                                                </tr>
                                            </thead>
                                            
                                            <tbody id="table-tbody-supervisor-descargas-post">
                                                <form action="generar_informe_conectados_vos.php" method="post">
                                                    <tr>
                                                        <td>Descargar Conectados</td>
                                                        <td><input required type="date" name="fecha-inicio-conectados"></td>
                                                        <td><input required type="date" name="fecha-fin-conectados"></td>
                                                        <td><button type="submit" class="btn btn-link" id="buttom-conectados" name="buttom-conectados" ><img src="descarga1.png" alt="icono descarga"></button></td>
                                                    </tr>
                                                    
                                                </form>
                                                <form action="generar_informe_conectadosXsupervisor_vos.php" method="post">
                                                
                                                    <tr>
                                                        <td>Descargar Conectados x Supervisor</td>
                                                        <td><input required type="date" value="fecha-inicio-supervisor" name="fecha-inicio-supervisor"></td>
                                                        <td><input required type="date" value="fecha-fin-supervisor" name="fecha-fin-supervisor"></td>
                                                        <td><button type="submit" class="btn btn-link" id="buttom-supervisor" name="buttom-supervisor" ><img src="descarga1.png" alt="icono descarga"></button></button></td>
                                                    </tr>
                                                    
                                                </form>
                                                <form action="generar_informe_llamadas.php" method="post">
                                                    
                                                    <tr>
                                                        <td>Descargar Llamadas</td>
                                                        <td><input required type="date" value="fecha-inicio-llamadas" name="fecha-inicio-llamadas"></td>
                                                        <td><input required type="date" value="fecha-fin-llamadas" name="fecha-fin-llamadas"></td>
                                                        <td><button type="submit" class="btn btn-link" id="buttom-llamadas" name="buttom-llamadas" ><img src="descarga1.png" alt="icono descarga"></button></button></td>

                                                    </tr>
                                                </form>
                                                <!-- <form action="generar_informe_uso.php" method="post">
                                                    
                                                    <tr>
                                                        <td>Descargar Uso BOT</td>
                                                        <td><input required type="date" value="fecha-inicio-USO" name="fecha-inicio-USO"></td>
                                                        <td><input required type="date" value="fecha-fin-USO" name="fecha-fin-USO"></td>
                                                        <td><button type="submit" class="btn btn-link" id="buttom-USO" name="buttom-USO" ><img src="descarga1.png" alt="icono descarga"></button></button></td>

                                                    </tr>
                                                </form> -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Carlos Niño DESARROLLADOR RPA 2021</div>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
