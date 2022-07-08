<?php

include('Conexion.php');

if(isset($_GET['CRE_NID'])){

    $id = $_GET['CRE_NID'];
    $query = "DELETE FROM TBL_RCREDENCIAL WHERE CRE_NID = $id";
    $result = sqlsrv_query($conn, $query);

    if(!$result){
        die( print_r( sqlsrv_errors(), true));
        die("Query Failed");
    }

    echo '<script type="text/javascript"> 
    alert("Usuario Eliminado Correctamente.");
    window.location.href="actualizar_eliminar_usuarios.php"
    </script>';
        
   
    /* header("location:actualizar_eliminar_usuarios.php"); */
   
}



?>