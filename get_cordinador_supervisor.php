<?php
 require('Conexion.php');

 $id_super = $_POST['IdSupervisor'];

 $queryM = "SELECT REG_CJEFE_INMEDIATO FROM TBL_AREG_SUPERVISOR_VTR WHERE REG_NID_SUPERVISOR='$id_super' ORDER BY REG_NID_SUPERVISOR ";
 $resultadoM = sqlsrv_query($conn, $queryM);
 $html= "<option value=''>Seleccione una opción...</option>";

 while($rowM = sqlsrv_fetch_array($resultadoM))
 {
     $html.= "<option value='".$rowM['REG_CJEFE_INMEDIATO']."'>".$rowM['REG_CJEFE_INMEDIATO']."</option>";
 }

 echo $html;

?>

