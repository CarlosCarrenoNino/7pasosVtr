<?php
 require('Conexion.php');

 $id_super = $_POST['JefeInme'];

 $queryM = "SELECT REG_NID_SUPERVISOR FROM TBL_AREG_SUPERVISOR_VTR WHERE REG_CNOMBRE_SUPERVISOR='$id_super' ORDER BY REG_NID_SUPERVISOR ";
 $resultadoM = sqlsrv_query($conn, $queryM);
 $html= "<option value=''>Seleccione una opción...</option>";

 while($rowM = sqlsrv_fetch_array($resultadoM))
 {
     $html.= "<option value='".$rowM['REG_NID_SUPERVISOR']."'>".$rowM['REG_NID_SUPERVISOR']."</option>";
 }

 echo $html;

?>