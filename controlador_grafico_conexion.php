<?php

    require 'modelo_grafico_conexion.php';

    $MG = new Modelo_grafico();
    $consulta = $MG -> TraerDatosGraficosConexion();
    echo json_encode($consulta);


?>