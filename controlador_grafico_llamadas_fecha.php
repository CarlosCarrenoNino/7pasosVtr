<?php
    $FECHA1 =  date('Y/m/d',strtotime($_POST['Consultar_fecha'])) ;

    require 'modelo_grafico_llamadas_fecha.php';

    $MG = new Modelo_grafico();
    $consulta = $MG -> TraerDatosGraficosLlamadas($FECHA1);
    echo json_encode($consulta);


?>