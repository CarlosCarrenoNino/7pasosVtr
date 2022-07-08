<?php

    require 'modelo_grafico_llamadas_no_voz.php';

    $MG = new Modelo_grafico();
    $consulta = $MG -> TraerDatosGraficosLlamadasNoVOZ();
    echo json_encode($consulta);


?>