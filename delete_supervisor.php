<?php

include('Conexion.php');

if(isset($_GET['REG_NID_SUPERVISOR'])){

    $id = $_GET['REG_NID_SUPERVISOR'];
    $query = "DELETE FROM TBL_AREG_SUPERVISOR_VTR WHERE REG_NID_SUPERVISOR = $id";
    $result = sqlsrv_query($conn, $query);

    if(!$result){
        die( print_r( sqlsrv_errors(), true));
        die("Query Failed");
    }

    echo '<script type="text/javascript"> 
    alert("Supervisor Eliminado Correctamente.");
    window.location.href="actualizar_eliminar_supervisor.php"
    </script>';
        
    /* header("location:actualizar_eliminar_supervisor.php"); */
   
}



?>