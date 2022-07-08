<?php

    require 'modelo_grafico_conexionXsupervisor_no_voz.php';

    $MG = new Modelo_grafico();
    $consulta = $MG -> TraerDatosGraficosConexionXsupervisor();
    echo json_encode($consulta);


?>