<?php

    require 'modelo_grafico_desconectados.php';

    $MG = new Modelo_grafico();
    $consulta = $MG -> TraerDatosGraficos();
    echo json_encode($consulta);


?>