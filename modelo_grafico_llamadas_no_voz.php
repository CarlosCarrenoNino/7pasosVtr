<?php
    //date_default_timezone_set('America/Bogota');
     //$fechaHoy=date('d/m/Y'); 
     
     //echo $fechaHoy;
     
     /* $fechaHoy = explode("/", date('d/m/Y'));
    
    list($dia, $mes, $year)=$fechaHoy;

    $fechaHoy1=$dia.'/'.$mes.'/'.$year; 

    echo $fechaHoy1;  */ 
    /* $fechaHoy1 = date_format($fechaHoy, "d/m/Y");

    echo $fechaHoy1; */
    

    class Modelo_grafico
    {
        private $Connection;
        function __construct()
        {
            
            require('Conexion.php');
            $this->Connection = $conn;
        }

        function TraerDatosGraficosLlamadasNoVOZ()
        {
            date_default_timezone_set('America/Bogota');
            $fechaHoy=date('Y/m/d'); 
            $sql = "SELECT 'Paso ' + REG_CDETALLE0 as Pasos,  count(REG_CRUT_LABOR) as llamadas from TBL_AREGACTIVIDAD_BOT_VTR 
            WHERE  REG_DFEC_PASO0_BOT = '$fechaHoy' and REG_CDETALLE1= 'NO VOZ' group by REG_CDETALLE0";
            $arreglo = array();

            if($consulta = sqlsrv_query($this->Connection, $sql))
            {
                while($consulta_VU = sqlsrv_fetch_array($consulta))
                {
                    $arreglo[]=$consulta_VU;
                }
                return $arreglo;
                $this->Connection->cerrar();
            }
        }
    }
?>