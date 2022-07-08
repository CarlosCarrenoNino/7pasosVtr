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

        function TraerDatosGraficosDesconectados($FECHA1)
        {
            date_default_timezone_set('America/Bogota');
            
            $sql = "SELECT CON_CESTADO_BOT,count(CON_CSECPC_BOT)as usuarios,TBL_AREG_ASESOR_VTR.REG_CJEFE_INMEDIATO  
            FROM TBL_AREG_ASESOR_VTR   
            JOIN TBL_ACONTROLLOG_BOT_VTR ON TBL_AREG_ASESOR_VTR.REG_CUSUARIO_ASESOR = TBL_ACONTROLLOG_BOT_VTR.CON_CSECPC_BOT  
            JOIN TBL_AREG_SUPERVISOR_VTR ON TBL_AREG_ASESOR_VTR.REG_CJEFE_INMEDIATO = TBL_AREG_SUPERVISOR_VTR.REG_CNOMBRE_SUPERVISOR   
            WHERE (CON_CESTADO_BOT='Inactivo') AND (CON_DFECREG_BOT='$FECHA1') AND (TBL_AREG_ASESOR_VTR.REG_DETALLE_2='VOZ') 
            group by  CON_CESTADO_BOT,TBL_AREG_ASESOR_VTR.REG_CJEFE_INMEDIATO"; 

            
           /*  $sql = "SELECT CON_CESTADO_BOT,count(CON_CSECPC_BOT)as usuarios,REG_CJEFE_INMEDIATO
            FROM TBL_ACONTROLLOG_BOT_VTR 
            JOIN TBL_AREG_ASESOR_VTR ON TBL_AREG_ASESOR_VTR.REG_CUSUARIO_ASESOR = TBL_ACONTROLLOG_BOT_VTR.CON_CSECPC_BOT 
            WHERE  CON_CESTADO_BOT='Inactivo' AND CON_DFECREG_BOT='$FECHA1' 
            group by REG_CJEFE_INMEDIATO, CON_CESTADO_BOT";
             */
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