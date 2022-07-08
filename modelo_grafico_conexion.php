<?php

    class Modelo_grafico
    {
        private $Connection;
        function __construct()
        {
            
            require('Conexion.php');
            $this->Connection = $conn;
            
        }

        function TraerDatosGraficosConexion()

        {   
            date_default_timezone_set('America/Bogota');
            $fechaHoy = date('Y/m/d');

            $sql="SELECT 'Posiciones Estado ' + CON_CESTADO_BOT as ESTADO,count(CON_CNOMPC_BOT)as USUARIOS, CON_DFECREG_BOT FROM TBL_ACONTROLLOG_BOT_VTR 
            JOIN TBL_AREG_ASESOR_VTR ON REPLACE(REPLACE(TBL_AREG_ASESOR_VTR.REG_CCEDULA_ASESOR, char(13), ''), char(10), '') = REPLACE(REPLACE(TBL_ACONTROLLOG_BOT_VTR.CON_CDETALLE1, char(13), ''), char(10), '')
            WHERE CON_DFECREG_BOT ='$fechaHoy' and  (CON_CESTADO_BOT = 'Activo' or CON_CESTADO_BOT = 'Inactivo') and REG_DETALLE_2= 'VOZ' group by CON_CESTADO_BOT,CON_DFECREG_BOT";

            /* $sql = "SELECT 'Posiciones Estado ' + CON_CESTADO_BOT as ESTADO,count(CON_CNOMPC_BOT)as USUARIOS, CON_DFECREG_BOT FROM TBL_ACONTROLLOG_BOT_VTR 
            JOIN TBL_AREG_ASESOR_VTR ON REPLACE(REPLACE(TBL_AREG_ASESOR_VTR.REG_CUSUARIO_ASESOR, char(13), ''), char(10), '') = REPLACE(REPLACE(TBL_ACONTROLLOG_BOT_VTR.CON_CSECPC_BOT, char(13), ''), char(10), '')
            WHERE CON_DFECREG_BOT ='$fechaHoy' and  (CON_CESTADO_BOT = 'Activo' or CON_CESTADO_BOT = 'Inactivo') and REG_DETALLE_2= 'VOZ' group by CON_CESTADO_BOT,CON_DFECREG_BOT";
 */
            /* $sql = "SELECT 'Posiciones Estado ' + CON_CESTADO_BOT as ESTADO,count(CON_CNOMPC_BOT)as USUARIOS, CON_DFECREG_BOT FROM TBL_ACONTROLLOG_BOT_VTR 
            JOIN TBL_AREG_ASESOR_VTR ON REPLACE(REPLACE(TBL_AREG_ASESOR_VTR.REG_CCEDULA_ASESOR, char(13), ''), char(10), '') = REPLACE(REPLACE(TBL_ACONTROLLOG_BOT_VTR.CON_CDETALLE1, char(13), ''), char(10), '')
            OR REPLACE(REPLACE(TBL_AREG_ASESOR_VTR.REG_DETALLE_1, char(13), ''), char(10), '') = REPLACE(REPLACE(TBL_ACONTROLLOG_BOT_VTR.CON_CSECPC_BOT, char(13), ''), char(10), '')
            WHERE CON_DFECREG_BOT ='$fechaHoy' and  (CON_CESTADO_BOT = 'Activo' or CON_CESTADO_BOT = 'Inactivo') and (REG_DETALLE_2= 'VOZ') group by CON_CESTADO_BOT,CON_DFECREG_BOT";
              */ 
 
            /* $sql = "SELECT 'Posiciones Estado ' + CON_CESTADO_BOT,count(CON_CDETALLE1) as Usuarios, CON_DFECREG_BOT From TBL_ACONTROLLOG_BOT_VTR 
            where CON_DFECREG_BOT ='$fechaHoy' and (CON_CESTADO_BOT = 'Activo' or CON_CESTADO_BOT = 'Inactivo') 
            group by CON_CESTADO_BOT,CON_DFECREG_BOT"; */


            $TOTAL = "SELECT count(REG_CUSUARIO_ASESOR) as Usuarios from TBL_AREG_ASESOR_VTR where REG_DETALLE_2='VOZ'";

            $arreglo= array();
            
            if($consulta = sqlsrv_query($this->Connection, $TOTAL))
            {
                while($consulta_VU = sqlsrv_fetch_array($consulta))
                {
                    $arreglo[]=$consulta_VU;
                }
            }
            $stmp = sqlsrv_prepare($this->Connection, $sql);

            /* if($consulta = sqlsrv_query($this->Connection, $sql)) */
            if($consulta = sqlsrv_execute($stmp)) 
            {
                while($consulta_VU = sqlsrv_fetch_array($stmp))
                {
                    $arreglo[]=$consulta_VU;
                } 
                return $arreglo;
                $this->Connection->cerrar();
            }
            else{
                die('Consulta faliida');
            }
        }
    }
?>