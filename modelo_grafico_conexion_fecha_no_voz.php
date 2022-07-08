<?php

    class Modelo_grafico
    {
        private $Connection;
        function __construct()
        {
            
            require('Conexion.php');
            $this->Connection = $conn;
            /* require('index.php'); */

        }

        function TraerDatosGraficosConexion($FECHA1)
        {
            date_default_timezone_set('America/Bogota');
            
            $sql = "SELECT 'Posiciones Estado ' + CON_CESTADO_BOT as ESTADO,count(CON_CNOMPC_BOT)as USUARIOS, CON_DFECREG_BOT FROM TBL_ACONTROLLOG_BOT_VTR 
            JOIN TBL_AREG_ASESOR_VTR ON REPLACE(REPLACE(TBL_AREG_ASESOR_VTR.REG_CUSUARIO_ASESOR, char(13), ''), char(10), '') = REPLACE(REPLACE(TBL_ACONTROLLOG_BOT_VTR.CON_CSECPC_BOT, char(13), ''), char(10), '')
            WHERE CON_DFECREG_BOT ='$FECHA1' and  (CON_CESTADO_BOT = 'Activo' or CON_CESTADO_BOT = 'Inactivo') and REG_DETALLE_2= 'NO VOZ' group by CON_CESTADO_BOT,CON_DFECREG_BOT";
                
            /* $sql = "SELECT 'Posiciones Estado ' + CON_CESTADO_BOT as ESTADO,count(CON_CNOMPC_BOT)as USUARIOS, CON_DFECREG_BOT FROM TBL_ACONTROLLOG_BOT_VTR 
            WHERE CON_DFECREG_BOT ='$FECHA1' and  (CON_CESTADO_BOT = 'Activo' or CON_CESTADO_BOT = 'Inactivo') group by CON_CESTADO_BOT,CON_DFECREG_BOT";
             */

            $TOTAL = "SELECT count(REG_CUSUARIO_ASESOR) as Usuarios from TBL_AREG_ASESOR_VTR where REG_DETALLE_2='NO VOZ'";

            $arreglo = array();

            if($consulta = sqlsrv_query($this->Connection, $TOTAL))
            {
                while($consulta_VU = sqlsrv_fetch_array($consulta))
                {
                    $arreglo[]=$consulta_VU;
                }
            }
    
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