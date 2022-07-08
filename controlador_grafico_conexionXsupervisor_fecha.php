<?php
    $FECHA1 =  date('Y/m/d',strtotime($_POST['Consultar_fecha'])) ;

    require 'modelo_grafico_conexionXsupervisor_fecha.php';

    $MG = new Modelo_grafico();
    $consulta = $MG -> TraerDatosGraficosConexionXsupervisor($FECHA1);
    echo json_encode($consulta);


?>