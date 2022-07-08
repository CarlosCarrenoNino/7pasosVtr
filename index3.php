<?php

date_default_timezone_set('America/Bogota');
$fechaHoy = date('d/m/Y');
$horaHoy = date('H');
$minutoHoy = date('i:s');
$HoraTotal = $horaHoy.':'.$minutoHoy;

session_start();

require('Conexion.php');

if(isset($_SESSION['UsuarioIngreso'])) {
    $Privilegio = $_SESSION["PrivilegioUsuario"];
    if ($Privilegio == "1" or $Privilegio == "22"){

    }else{
        echo '<script> window.location="logout.php"; </script>';
    }
}else{
    echo '<script> window.location="logout.php"; </script>';
}

?>
<!-- <script>
function TotalLlamadas(){ -->

    <?php
    /* $sql=("SELECT COUNT(REG_CDETALLE0) as llamadas FROM TBL_AREGACTIVIDAD_BOT_VTR WHERE REG_DFEC_PASO0_BOT='$fechaHoy'");
    $resul=sqlsrv_query($conn, $sql);
    $row=sqlsrv_fetch_array($resul);

    echo ($roW)['llamadas']; */
    ?>

<!-- /* }
</script> */ -->


<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="icon" href="icono_vtr.ico" type="image/x-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>BOT 7 PASOS</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        
        

        <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.min.css">

        <link rel="stylesheet" href="../assets/vendor/chartist/css/chartist.min.css">
        <link rel="stylesheet" href="../assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css">
        <link rel="stylesheet" href="../assets/vendor/toastr/toastr.min.css">

        <link rel="stylesheet" href="assets/css/main.css">
        <link rel="stylesheet" href="assets/css/color_skins.css">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.0/Chart.min.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.0/chart.min.js"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@latest/dist/Chart.min.js"> </script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.0/chart.esm.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.0/helpers.esm.min.js"></script>    -->
        
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
                <!-- <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a> -->
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <!-- <li><hr class="dropdown-divider" /></li> -->
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
                        <a href="index.php"><button class="btn btn-dark bg-black form-control blod" >Voz</button></a> 

                            <div class="sb-sidenav-menu-heading">MENÚ NO VOZ</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-bar"></i></div>
                                Graficas
                            </a>
                            
                            <label for="" class="blod"><b>Consultar:</b> </label>
                            <input type="date" class="form-control" id="Consultar_fecha" value="Consultar_fecha" name="Consultar_fecha"><br>
                            <button class="btn btn-dark bg-black form-control blod" id="Consultar_fecha1" name="Consultar_fecha1" onclick="Consultar2()">Consultar</button> <br>
                           
                            <button class="btn btn-dark bg-black form-control blod" onclick="Actualizar3()">Actualizar</button>

                            <div class="sb-sidenav-menu-heading">Interfaces</div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Usuarios
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="#">Supervisores</a>
                               </nav>
                               <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="login.php">Cerra sesion</a>
                               </nav>
                               
                            </div>
                            <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Páginas
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
                            <div class="sb-sidenav-menu-heading">Informes</div>
                            <!-- <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                
                            </a> -->
                            <a class="nav-link" href="bases_No_voz.php">
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
                <main class='card-mover'>
                    <div class="container-fluid px-1">
                        <br>
                        <!-- <h1 class="mt-4">BOT 7 Pasos</h1> -->
                        <!-- <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="bases.php">Informes</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol> -->

                        <!-- <div class="row">
                            <div class="col-xl-6">
                            
                            <button class="btn btn-secondary" onclick="CargarDatosGraficosConexion()">Conectados Hoy</button>
                                                
                            </div>

                            <div class="col-xl-6">
                                
                                <button class="btn btn-secondary" onclick="CargarDatosGraficosLlamadas()">Llamadas</button>
                                                    
                            </div>


                        </div> -->

                        

                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header bg-black">
                                        <i class="fas fa-chart-pie me-1"></i>
                                        Global:Conectados/Desconectados NO VOZ
                                    </div>
                                    <div class="card-body" id="conectadoshoy1">
                                    <canvas id="conectadoshoy" width="100%" height="70"></canvas>
                                    </div>
                                   
                                </div>
                                
                            </div>
                             <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header bg-black">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Llamadas VS Pasos NO VOZ
                                        <!-- <div>
                                            <input type="text" class="total" id="total" readonly  value="<?php echo $row['llamadas']; ?>">
                                        </div> -->
                                    </div>
                                    <div  class="card-body" id="llamadas1">
                                    <canvas id="llamadas" width="100%" height="70"></canvas>
                                    </div>
                                </div>
                            </div> 
                            

                                <!-- <div class="col-xl-6">
                                
                                <button class="btn btn-secondary" onclick="CargarDatosGraficosConexionXsupervisor()">Conectados X Supervisor</button>
                                                    
                                </div>
                        
                                <div class="col-xl-6">
                                
                                <button class="btn btn-secondary" onclick="CargarDatosGraficosdesco()">Desconectados x Supervisor</button>
                                                    
                                </div> -->
                            

                        </div>
                        <br>
                        
                        <div class="row">
                            <div class="col-xl-6">
                                    <div class="card mb-4">
                                        <div class="card-header bg-black">
                                            <i class="fas fa-chart-bar me-1"></i>
                                            Conectados X Supervisor NO VOZ
                                        </div>
                                        <div class="card-body" id="conexionsupervisor1">
                                        <canvas id="conexionsupervisor" width="100%" height="70"></canvas>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header bg-black">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Desconectados X Supervisor NO VOZ
                                    </div>
                                    <div class="card-body " id="desconectados1">
                                    <canvas id="desconectados" width="100%" height="70"></canvas>
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
        <<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>-->
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="assets/demo/chart-pie-demo.js"></script>
    </body>
</html>

<script>

function Consultar2(){

    $.ajax({
            url:"actualizacion_bot.php",
            type:"POST"
        })

CargarDatosGraficosConexion2();
CargarDatosGraficosConexionXsupervisor2();
CargarDatosGraficosdesco2();
CargarDatosGraficosLlamadas2();


function CargarDatosGraficosConexion2()
    {
        Consultar_fecha = $('#Consultar_fecha').val()
        $.ajax({
            url: 'controlador_grafico_conexion_fecha_no_voz.php',
            type: 'POST',
            data: {'Consultar_fecha': Consultar_fecha}
        }).done(function(resp){
            var data = JSON.parse(resp);
          if(resp.length>0)
          {
            var titulo = [];
            var cantidad = [];
            var data = JSON.parse(resp);
            for(var i=0; i<data.length; i++)
            {
              titulo.push(data[i][0]);
              cantidad.push(data[i][1]);

            }
            CrearGrafico2(titulo, cantidad, 'bar', 'CONECTADOS','conectadoshoy');
            /* document.getElementById("conectadoshoy").style.display = "block";
            document.getElementById("conexionsupervisor").style.display = "block";
            document.getElementById("llamadas").style.display = "block";  
            document.getElementById("desconectados").style.display = "block"; */
     
            
          }
          
          
                
        })

      /* return CrearGrafico();    */
    }

    function CargarDatosGraficosConexionXsupervisor2()
    {
        Consultar_fecha = $('#Consultar_fecha').val()
        $.ajax({
            url: 'controlador_grafico_conexionXsupervisor_fecha_no_voz.php',
            type: 'POST',
            data:{'Consultar_fecha':Consultar_fecha}
        }).done(function(resp){
            var data = JSON.parse(resp);
          if(resp.length>0)
          {
            var titulo = [];
            var cantidad = [];
            var data = JSON.parse(resp);
            for(var i=0; i<data.length; i++)
            {
              titulo.push(data[i][2]);
              cantidad.push(data[i][1]);

            }
            CrearGrafico2(titulo, cantidad, 'bar', 'CONECTADOS','conexionsupervisor');
            /* document.getElementById("conectadoshoy").style.display = "block";
            document.getElementById("conexionsupervisor").style.display = "block";
            document.getElementById("llamadas").style.display = "block";   
            document.getElementById("desconectados").style.display = "block"; */
       
            
          }
          
          
                
        })

      /* return CrearGrafico();    */
    }

    function CargarDatosGraficosdesco2()
    {
        Consultar_fecha = $('#Consultar_fecha').val()
        $.ajax({
            url: 'controlador_grafico_desconectdos_fecha_no_voz.php',
            type: 'POST',
            data:{'Consultar_fecha':Consultar_fecha}
        }).done(function(resp){
            var data = JSON.parse(resp);
          if(resp.length>0)
          {
            var titulo = [];
            var cantidad = [];
            var data = JSON.parse(resp);
            for(var i=0; i<data.length; i++)
            {
              titulo.push(data[i][2]);
              cantidad.push(data[i][1]);

            }
            CrearGrafico2(titulo, cantidad, 'bar', 'DESCONECTADO','desconectados');
            /* document.getElementById("conectadoshoy").style.display = "block";
            document.getElementById("conexionsupervisor").style.display = "block";
            document.getElementById("llamadas").style.display = "block";  
            document.getElementById("desconectados").style.display = "block"; */
        
            
          }
          
          
                
        })

      /* return CrearGrafico();    */
    }


    function CargarDatosGraficosLlamadas2()
    {
        Consultar_fecha = $('#Consultar_fecha').val()
        $.ajax({
            url: 'controlador_grafico_llamadas_fecha_no_voz.php',
            type: 'POST',
            data:{'Consultar_fecha':Consultar_fecha}
        }).done(function(resp){
          var data = JSON.parse(resp);
          if(data.length>0)
          {
            var titulo = [];
            var cantidad = [];
            var data = JSON.parse(resp);
            var SumaTotal=0;
            for(var i=0; i<data.length; i++)
            {
              titulo.push(data[i][0]);
              cantidad.push(data[i][1]);
              SumaTotal= SumaTotal + data[i][1];

            }
            CrearGrafico2(titulo, cantidad, 'bar', 'LLAMADAS'+' - '+SumaTotal,'llamadas');
           /*  document.getElementById("conectadoshoy").style.display = "block";
            document.getElementById("conexionsupervisor").style.display = "block";
            document.getElementById("llamadas").style.display = "block";
            document.getElementById("desconectados").style.display = "block"; */



            
            
          }
          
          
                
        })

      /* return CrearGrafico();    */
    }

    let  myChart;

    function CrearGrafico2(titulo, cantidad, tipo, encabezado, id)
    {
        $("#"+id+"1").html('<canvas id="'+id+'" width="100%" height="40"></canvas>');
        var opt = {
        events: false,
        scales:{
            yAxes:[{
                ticks:{
                    beginAtZero:false,
                    autoSkip: false,
                    maxRotation: 90, 
                    /* minRotation: 90, */
                    padding:0,
                    mirror: false  
                }
            }]
        },

        legend:{
                    display:true
                },
                
        tooltips: {
             /* callbacks:{
                        label:function(tooltipItem){
                            return tooltipItem.yLabel;
                        }
                      }  */
            enabled: false
        },
        hover: {
            animationDuration: 0,
        },
        animation: {
            duration: 1000,
            onComplete: function () {
                var chartInstance = this.chart,
                ctx = chartInstance.ctx;
                ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                ctx.textAlign = 'center';
                ctx.textBaseline = 'bottom';

                this.data.datasets.forEach(function (dataset, i) {
                    var meta = chartInstance.controller.getDatasetMeta(i);
                    meta.data.forEach(function (bar, index) {
                        var data = dataset.data[index];                            
                        ctx.fillText(data, bar._model.x, bar._model.y - 5);
                    });
                });
            }
        }
        };
        var  ctx = document.getElementById(id);
            if(myChart)
            {
                /*  myChart.destroy(); */
            }
                myChart = new Chart(ctx, {
                type: tipo,
                data: {
                    labels: titulo,
                    datasets: [{
                        label: encabezado,
                        data: cantidad,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(154, 184, 23, 0.2)',
                            'rgba(245, 40, 145, 0.2)',
                            'rgba(113, 40, 145, 0.2)',
                            'rgba(0, 255, 145, 0.2)',
                            'rgba(0, 123, 145, 0.2)',
                            'rgba(230, 202, 255, 0.2)',
                            'rgba(236, 17, 255, 0.2)',
                            'rgba(236, 230, 32, 0.2)',
                            'rgba(236, 230, 179, 0.2)',
                            'rgba(14, 213, 234, 0.2)',
                            'rgba(117, 234, 14, 0.2)',
                            'rgba(28, 40, 16, 0.2)',
                            'rgba(250, 99, 4, 0.2)',
                            'rgba(4, 250, 22, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(154, 184, 23, 1)',
                            'rgba(245, 40, 145, 1)',
                            'rgba(113, 40, 145, 1)',
                            'rgba(0, 255, 145, 1)',
                            'rgba(0, 123, 145, 1)',
                            'rgba(230, 202, 255, 1)',
                            'rgba(236, 17, 255, 1)',
                            'rgba(236, 230, 32, 1)',
                            'rgba(236, 230, 179, 1)',
                            'rgba(14, 213, 234, 1)',
                            'rgba(117, 234, 14, 1)',
                            'rgba(28, 40, 16, 1)',
                            'rgba(250, 99, 4, 1)',
                            'rgba(4, 250, 22, 1)'
                        ],
                        borderWidth: 2
                    }]
                },

                
                options: opt
            });

            
    }


}

function Actualizar3(){

    $.ajax({
            url:"actualizacion_bot.php",
            type:"POST"
        })

    CargarDatosGraficosConexion3();
    CargarDatosGraficosConexionXsupervisor3();
    CargarDatosGraficosdesco3();
    CargarDatosGraficosLlamadas3();


    function CargarDatosGraficosConexion3()
        {
            $.ajax({
                url: 'controlador_grafico_conexion_no_voz.php',
                type: 'POST'
            }).done(function(resp){
                var data = JSON.parse(resp);
              if(resp.length>0)
              {
                var titulo = [];
                var cantidad = [];
                var data = JSON.parse(resp);
                for(var i=0; i<data.length; i++)
                {
                  titulo.push(data[i][0]);
                  cantidad.push(data[i][1]);

                }
                CrearGrafico3(titulo, cantidad, 'bar', 'CONECTADOS','conectadoshoy');
                /* document.getElementById("conectadoshoy").style.display = "block";
                document.getElementById("conexionsupervisor").style.display = "block";
                document.getElementById("llamadas").style.display = "block";  
                document.getElementById("desconectados").style.display = "block"; */
         
                
              }
              
              
                    
            })

          /* return CrearGrafico();    */
        }

        function CargarDatosGraficosConexionXsupervisor3()
        {
            $.ajax({
                url: 'controlador_grafico_conexionXsupervisor_no_voz.php',
                type: 'POST'
            }).done(function(resp){
                var data = JSON.parse(resp);
              if(resp.length>0)
              {
                var titulo = [];
                var cantidad = [];
                var data = JSON.parse(resp);
                for(var i=0; i<data.length; i++)
                {
                  titulo.push(data[i][2]);
                  cantidad.push(data[i][1]);

                }
                CrearGrafico3(titulo, cantidad, 'horizontalBar', 'CONECTADOS','conexionsupervisor');
                /* document.getElementById("conectadoshoy").style.display = "block";
                document.getElementById("conexionsupervisor").style.display = "block";
                document.getElementById("llamadas").style.display = "block";   
                document.getElementById("desconectados").style.display = "block"; */
           
                
              }
              
              
                    
            })

          /* return CrearGrafico();    */
        }

        function CargarDatosGraficosdesco3()
        {
            $.ajax({
                url: 'controlador_grafico_desconectdos_no_voz.php',
                type: 'POST'
            }).done(function(resp){
                var data = JSON.parse(resp);
              if(resp.length>0)
              {
                var titulo = [];
                var cantidad = [];
                var data = JSON.parse(resp);
                for(var i=0; i<data.length; i++)
                {
                  titulo.push(data[i][2]);
                  cantidad.push(data[i][1]);

                }
                CrearGrafico3(titulo, cantidad, 'horizontalBar', 'DESCONECTADO','desconectados');
                /* document.getElementById("conectadoshoy").style.display = "block";
                document.getElementById("conexionsupervisor").style.display = "block";
                document.getElementById("llamadas").style.display = "block";  
                document.getElementById("desconectados").style.display = "block"; */
            
                
              }
              
              
                    
            })

          /* return CrearGrafico();    */
        }


        function CargarDatosGraficosLlamadas3()
        {
            $.ajax({
                url: 'controlador_grafico_llamadas_no_voz.php',
                type: 'POST'
            }).done(function(resp){
              var data = JSON.parse(resp);
              if(data.length>0)
              {
                var titulo = [];
                var cantidad = [];
                var data = JSON.parse(resp);
                for(var i=0; i<data.length; i++)
                {
                  titulo.push(data[i][0]);
                  cantidad.push(data[i][1]);

                }
                CrearGrafico3(titulo, cantidad, 'bar', 'LLAMADAS','llamadas');
               /*  document.getElementById("conectadoshoy").style.display = "block";
                document.getElementById("conexionsupervisor").style.display = "block";
                document.getElementById("llamadas").style.display = "block";
                document.getElementById("desconectados").style.display = "block"; */



                
                
              }
              
              
                    
            })

          /* return CrearGrafico();    */
        }

        let  myChart;

    function CrearGrafico3(titulo, cantidad, tipo, encabezado, id)
    {
        $("#"+id+"1").html('<canvas id="'+id+'" width="100%" height="40"></canvas>');
        var opt = {
        events: false,
        scales:{
            yAxes:[{
                ticks:{
                    beginAtZero:false,
                    autoSkip: false,
                    maxRotation: 90, 
                    /* minRotation: 90, */
                    padding:0,
                    mirror: false  
                }
            }]
        },

        legend:{
                    display:true
                },
                
        tooltips: {
             /* callbacks:{
                        label:function(tooltipItem){
                            return tooltipItem.yLabel;
                        }
                      }  */
            enabled: false
        },
        hover: {
            animationDuration: 0,
        },
        animation: {
            duration: 1000,
            onComplete: function () {
                var chartInstance = this.chart,
                ctx = chartInstance.ctx;
                ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                ctx.textAlign = 'center';
                ctx.textBaseline = 'bottom';

                this.data.datasets.forEach(function (dataset, i) {
                    var meta = chartInstance.controller.getDatasetMeta(i);
                    meta.data.forEach(function (bar, index) {
                        var data = dataset.data[index];                            
                        ctx.fillText(data, bar._model.x, bar._model.y - 5);
                    });
                });
            }
        }
        };
        var  ctx = document.getElementById(id);
            if(myChart)
            {
                /*  myChart.destroy(); */
            }
                myChart = new Chart(ctx, {
                type: tipo,
                data: {
                    labels: titulo,
                    datasets: [{
                        label: encabezado,
                        data: cantidad,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(154, 184, 23, 0.2)',
                            'rgba(245, 40, 145, 0.2)',
                            'rgba(113, 40, 145, 0.2)',
                            'rgba(0, 255, 145, 0.2)',
                            'rgba(0, 123, 145, 0.2)',
                            'rgba(230, 202, 255, 0.2)',
                            'rgba(236, 17, 255, 0.2)',
                            'rgba(236, 230, 32, 0.2)',
                            'rgba(236, 230, 179, 0.2)',
                            'rgba(14, 213, 234, 0.2)',
                            'rgba(117, 234, 14, 0.2)',
                            'rgba(28, 40, 16, 0.2)',
                            'rgba(250, 99, 4, 0.2)',
                            'rgba(4, 250, 22, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(154, 184, 23, 1)',
                            'rgba(245, 40, 145, 1)',
                            'rgba(113, 40, 145, 1)',
                            'rgba(0, 255, 145, 1)',
                            'rgba(0, 123, 145, 1)',
                            'rgba(230, 202, 255, 1)',
                            'rgba(236, 17, 255, 1)',
                            'rgba(236, 230, 32, 1)',
                            'rgba(236, 230, 179, 1)',
                            'rgba(14, 213, 234, 1)',
                            'rgba(117, 234, 14, 1)',
                            'rgba(28, 40, 16, 1)',
                            'rgba(250, 99, 4, 1)',
                            'rgba(4, 250, 22, 1)'
                        ],
                        borderWidth: 2
                    }]
                },

                
                options: opt
            });

            
    }

    
}    

console.log('sE EJECUTA ACTUALIZAR');
        $.ajax({
            url:"actualizacion_bot.php",
            type:"POST"
        })
    setInterval(() => {
        console.log('sE EJECUTA ACTUALIZAR');
        $.ajax({
            url:"actualizacion_bot.php",
            type:"POST"
        })
        
    }, 3000000);

</script>
