<?php

date_default_timezone_set('America/Bogota');
$fechaHoy = date('Y/m/d');
$horaHoy = date('H');
$minutoHoy = date('i:s');
$HoraTotal = $horaHoy.':'.$minutoHoy;

require ('Conexion.php');


$sql=("UPDATE TBL_ACONTROLLOG_BOT_VTR SET CON_CESTADO_BOT = 'Inactivo' WHERE DATEDIFF(minute, CONVERT(DATETIME, CON_DFECREG_BOT+' '+CON_CHORREG_BOT), CONVERT(DATETIME,SYSDATETIME())) >= 20 AND CON_CESTADO_BOT = 'Activo' and CON_DFECREG_BOT='$fechaHoy'");

$resultado=sqlsrv_query($conn,$sql) /* or die('Consulta fallida:'.sqlsrv_errors()) */;





?>