<?php

    class Modelo_grafico
    {
        private $Connection;
        function __construct()
        {
            //require('conexion_falabella.php');
            require('Conexion.php');
            $this->Connection = $conn;//new Connection();
            /* $this->Connection->Connect2(); */
        }

        function TraerDatosGraficosConexionXsupervisor($FECHA1)
        {
            date_default_timezone_set('America/Bogota');
            $fechaHoy=date('Y/m/d'); 
            $sql = "SELECT COUNT(CASE WHEN CON_CESTADO_BOT = 'Activo' THEN 1 END) AS ACTIVOS,COUNT(CASE WHEN CON_CESTADO_BOT = 'Inactivo' THEN 1 END) AS INACTIVOS,TBL_AREG_ASESOR_VTR.REG_CJEFE_INMEDIATO
            FROM TBL_AREG_ASESOR_VTR
            JOIN TBL_ACONTROLLOG_BOT_VTR ON REPLACE(REPLACE(TBL_AREG_ASESOR_VTR.REG_CUSUARIO_ASESOR, char(13), ''), char(10), '') = REPLACE(REPLACE(TBL_ACONTROLLOG_BOT_VTR.CON_CSECPC_BOT, char(13), ''), char(10), '')
            JOIN TBL_AREG_SUPERVISOR_VTR ON TBL_AREG_ASESOR_VTR.REG_CJEFE_INMEDIATO = TBL_AREG_SUPERVISOR_VTR.REG_CNOMBRE_SUPERVISOR
            WHERE (CON_DFECREG_BOT='$FECHA1') AND (TBL_AREG_ASESOR_VTR.REG_DETALLE_2='NO VOZ')
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
                    array_push($consulta_VU, $consulta_VU2);
                    $arreglo[]=$consulta_VU;
                }
                return $arreglo;
                $this->Connection->cerrar();
            }
        }
    }
?>