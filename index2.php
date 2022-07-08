

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
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
        <script src="https://cdn.jsdelivr.net/npm/chart.js@latest/dist/Chart.min.js"> </script>
    <title>Graficos</title>
  </head>
  <body>
      <div class="col-lg-12" style="padding-top: 20px">
            <div class="card">
                    <div class="card-header">
                            Grafico 
                    </div>
                    

                    <div class="col-md-4">
                    <h2>Bar Apilado</h2>

                    <canvas id="BarApilado"></canvas>

                    <script>
                        
                        var ctx = document.getElementById('BarApilado').getContext('2d');
                        var myChart = new Chart(ctx,{
                            type:'bar',
                            data:
                                {
                                    labels:['Gutierrez Obando Maria Alejandra', 'SUPERVISOR PRUEBA VTR'],
                                    datasets:[{ label:'CONECTADOS',
                                        data:['10', '12'],
                                        backgroundColor:"rgba(400, 99, 132, 0.5)",
                                        borderColor:"rgba(400, 99, 132, 1)",
                                    }, {
                                        label:'DESCONECTADOS',
                                        data:['15', '26'],
                                        backgroundColor:"rgba(345, 99, 132, 0.2)",
                                        borderColor:"rgba(345, 99, 132, 1)",
                                    }]
                                },
                             
                            options:{
                                scales:{
                                    yAxes:[{
                                        stacked:true,
                                        beginAtZero:true
                                    }]
                                }
                            },
                        });     

                    </script>

                    </div>
    
            </div> 
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="assets/demo/chart-pie-demo.js"></script>        
        <?php



$MG = new Modelo_grafico();
$consulta = $MG -> TraerDatosGraficosConexionXsupervisor();
echo $consulta;

    class Modelo_grafico
    {
        private $Connection;
        function __construct()
        {
            
            require('Conexion.php');
            $this->Connection = $conn;
        }

        function TraerDatosGraficosConexionXsupervisor()
        {
            date_default_timezone_set('America/Bogota');
            $fechaHoy=date('Y/m/d'); 
            $sql = "SELECT COUNT(CASE WHEN CON_CESTADO_BOT = 'Activo' THEN 1 END) AS ACTIVOS,COUNT(CASE WHEN CON_CESTADO_BOT = 'Inactivo' THEN 1 END) AS INACTIVOS,TBL_AREG_ASESOR_VTR.REG_CJEFE_INMEDIATO
            FROM TBL_AREG_ASESOR_VTR
            JOIN TBL_ACONTROLLOG_BOT_VTR ON TBL_AREG_ASESOR_VTR.REG_CUSUARIO_ASESOR = TBL_ACONTROLLOG_BOT_VTR.CON_CSECPC_BOT
            JOIN TBL_AREG_SUPERVISOR_VTR ON TBL_AREG_ASESOR_VTR.REG_CJEFE_INMEDIATO = TBL_AREG_SUPERVISOR_VTR.REG_CNOMBRE_SUPERVISOR
            WHERE (CON_DFECREG_BOT='$fechaHoy') AND (TBL_AREG_ASESOR_VTR.REG_DETALLE_2='VOZ')
            GROUP BY TBL_AREG_ASESOR_VTR.REG_CJEFE_INMEDIATO";


            $arreglo= array();
            
            if($consulta = sqlsrv_query($this->Connection, $sql))
            {
                while($consulta_VU = sqlsrv_fetch_array($consulta))
                {
                    $REG_CJEFE_INMEDIATO = $consulta_VU['REG_CJEFE_INMEDIATO'];
                    $TOTAL = "SELECT count(REG_CUSUARIO_ASESOR) AS USUARIOS from TBL_AREG_ASESOR_VTR WHERE REG_CJEFE_INMEDIATO = '$REG_CJEFE_INMEDIATO' group by REG_CJEFE_INMEDIATO";
                    if($consulta2 = sqlsrv_query($this->Connection, $TOTAL))
                    {
                        $consulta_VU2 = sqlsrv_fetch_array($consulta2);
                    }
                    echo print_r($consulta_VU);
                    echo "<br>";
                    array_push($consulta_VU, $consulta_VU2);
                    echo print_r($consulta_VU);
                    echo "<br>";
                    echo print_r($consulta_VU2);
                    echo "<br>";
                    echo "<br>";
                    $arreglo[]=$consulta_VU;//.$consulta_VU2;
                }
                //return $arreglo;
                $this->Connection->cerrar();
            }
        }
    }
?>
  </body>
</html>

   



    
    