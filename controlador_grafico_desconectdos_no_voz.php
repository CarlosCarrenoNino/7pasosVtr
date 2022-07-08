<?php

    require 'modelo_grafico_desconectados_no_voz.php';

    $MG = new Modelo_grafico();
    $consulta = $MG -> TraerDatosGraficos();
    echo json_encode($consulta);


?>