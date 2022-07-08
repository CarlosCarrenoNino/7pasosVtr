<?php
    $FECHA1 =  date('Y/m/d',strtotime($_POST['Consultar_fecha'])) ;

    require 'modelo_grafico_desconectados_fecha_no_voz.php';

    $MG = new Modelo_grafico();
    $consulta = $MG -> TraerDatosGraficosDesconectados($FECHA1);
    echo json_encode($consulta);


?>