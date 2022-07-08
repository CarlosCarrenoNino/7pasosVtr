<?php


include 'serv.php';
session_start();
$asesor = $_SESSION['usuario_red'];

if(isset($_POST['enviar'])){
    $OT = trim($_POST['OT']);
    $ciudad = trim($_POST['ciudad']);
    $carpeta = trim($_POST['carpeta']);
    $subcarpeta = trim($_POST['subcarpeta']);
    $tipificar = trim($_POST['tipificar']);
    $supervisor= trim($_POST['supervisor']);
    $fecha_inicial=trim($_POST['Fecha_Inicial']);
    $hora_inicial=trim($_POST['Hora_Inicial']);
    $hora_inactivo=trim($_POST['Hora_Inicial_Inactivo']);

    date_default_timezone_set('America/Bogota');

    $fechaHoy = date('Y-m-d');
    $horaHoy = date('H:i:s');

    $date1=strtotime($hora_inicial);
    $date2=strtotime($horaHoy);

    $TMO=round($date2-$date1);

    $EnviarSub2 = $subcarpeta;
    if($carpeta=='DESPACHO/TORRE' || $carpeta=='TAM' || $carpeta=='VTS'){
        $EnviarSub2 = $carpeta;
    }

    $date3=strtotime($hora_inicial);
    $date4=strtotime($hora_inactivo);

    $TMO_Inactivo=round($date3-$date4);

    $query= "INSERT INTO TBL_TIPIFICACION(TIP_CCUENTA, TIP_CGESTION,TIP_CHORA, TIP_CFECHA,
    TIP_CAGENTE, TIP_CSUPERVISOR, TIP_CSKILL, TIP_CSUBCARPETA, TIP_CCIUDAD, TMO, HORA_INICIAL, FECHA_INICIAL,
    TMO_INACTIVIDAD,HORA_INACTIVIDAD, detalle1)
    VALUES ('$OT', '$tipificar', '$horaHoy', '$fechaHoy', '$asesor', 
    '$supervisor', '$carpeta', '$subcarpeta', '$ciudad', '$TMO', '$hora_inicial', '$fecha_inicial',
    '$TMO_Inactivo','$hora_inactivo', '$EnviarSub2');";

  

    $resultado = mysqli_query($mysqli, $query);

    if(!$resultado){

       die("Query fallido");
    }

    header("location: cnd_asesor_validacion.php");  

    
    

}

?>