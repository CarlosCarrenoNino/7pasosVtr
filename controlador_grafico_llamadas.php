<?php

    require 'modelo_grafico_llamadas.php';

    $MG = new Modelo_grafico();
    $consulta = $MG -> TraerDatosGraficosLlamadas();
    echo json_encode($consulta);


?>