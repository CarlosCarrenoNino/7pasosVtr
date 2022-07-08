<?php
    $FECHA1 =  date('Y/m/d',strtotime($_POST['Consultar_fecha'])) ;

    require 'modelo_grafico_conexion_fecha_no_voz.php';

    $MG = new Modelo_grafico();
    $consulta = $MG -> TraerDatosGraficosConexion($FECHA1);
    echo json_encode($consulta);


?>