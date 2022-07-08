<?php

include('Conexion.php');

if(isset($_GET['REG_NID_ASESOR'])){

    $id = $_GET['REG_NID_ASESOR'];
    $query = "DELETE FROM TBL_AREG_ASESOR_VTR WHERE REG_NID_ASESOR = $id";
    $result = sqlsrv_query($conn, $query);

    if(!$result){
        die( print_r( sqlsrv_errors(), true));
        die("Query Failed");
    }

    echo '<script type="text/javascript"> 
    alert("Asesor Eliminado Correctamente.");
    window.location.href="actualizar_eliminar_asesor.php"
    </script>';
        
   
   /*  header("location:actualizar_eliminar_asesor.php"); */
   
}



?>