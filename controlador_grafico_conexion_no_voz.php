<?php

    require 'modelo_grafico_conexion_no_voz.php';

    $MG = new Modelo_grafico();
    $consulta = $MG -> TraerDatosGraficosConexionNoVoz();
    echo json_encode($consulta);


?>