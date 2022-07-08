<?php

session_start();

require('Conexion.php');

date_default_timezone_set('America/Bogota');
$fechaHoy = date('Y/m/d');
$horaHoy = date('H:i:s');
$minutoHoy = date('i');



if(isset($_POST['enviar'])){

    $Nombre =($_POST['Nombre']);
    $Cedula =($_POST['Cedula']);
    $Usuario=($_POST['UsuarioRed']);
    $Password=($_POST['Contrasena']);
    $Operacion = ($_POST['Operacion']);
    $Cargo = ($_POST['Cargo']);
    $Jefe = ($_POST['JefeInme']);
    $Segmento =($_POST['Segmento']);
    $Cliente = ($_POST['Cliente']);
    $Acceso = ($_POST['Acceso']);
    $Estado = ($_POST['Estado']);
    $Registro_fecha = ($_POST['Fecha_registro']);
    $Registro_hora = ($_POST['Hora_registro']);
    $Registro_Upfecha = ($_POST['Update_fecha']);
    $Registro_Uphora = ($_POST['Update_hora']);

    
    

    $query="INSERT INTO TBL_RCREDENCIAL(CRE_CUSUARIO_CRM, CRE_CNOMBRE, CRE_CCEDULA, CRE_CCLIENTE, CRE_COPERACION, CRE_CCARGO,
    CRE_CJEFE_INMEDIATO, CRE_CPASSWORD1, CRE_CACCESO, CRE_CESTADO, CRE_CFECHA_REGISTRO, CRE_CHORA_REGISTRO, 
    CRE_CFECHA_UPDATE, CRE_CHORA_UPDATE, CRE_CDETALLE1) 
    VALUES('$Usuario','$Nombre', '$Cedula', '$Cliente', '$Operacion', '$Cargo', '$Jefe', '$Password',
    '$Acceso', '$Estado', '$Registro_fecha', '$Registro_hora', '$Registro_Upfecha', 
    '$Registro_Uphora', '$Segmento')";

    $resultado = sqlsrv_query($conn, $query);

    if(!$resultado){
        die( print_r( sqlsrv_errors(), true));
        die('Conexion Fallida');
    }
        
    
    echo '<script type="text/javascript"> 
    alert("Usuario Registrado Correctamente.");
    window.location.href="regisgros_usuarios.php"
    </script>';

    
   
    /* header("location:regisgros_usuarios.php");
 */



} 

/* $myparams['Nombre']=$_POST['Nombre'];
$myparams['Cedula']=$_POST['Cedula'];
$myparams['UsuarioRed']=$_POST['UsuarioRed'];
$myparams['Contrasena']=$_POST['Contrasena'];
$myparams['Operacion']=$_POST['Operacion'];
$myparams['Cargo']=$_POST['Cargo'];
$myparams['JefeInme']=$_POST['JefeInme'];
$myparams['Segmento']=$_POST['Segmento'];
$myparams['Cliente']=$_POST['Cliente'];
$myparams['Acceso']=$_POST['Acceso'];
$myparams['Estado']=$_POST['Estado'];
$myparams['Fecha_registro']=$_POST['Fecha_registro'];
$myparams['Hora_registro']=$_POST['Hora_registro'];


$procedure_params = array(

    array(&$myparams['Nombre'], SQLSRV_PARAM_IN),
    array(&$myparams['Cedula'], SQLSRV_PARAM_IN),
    array(&$myparams['UsuarioRed'], SQLSRV_PARAM_IN),
    array(&$myparams['Contrasena'], SQLSRV_PARAM_IN),
    array(&$myparams['Operacion'], SQLSRV_PARAM_IN),
    array(&$myparams['Cargo'], SQLSRV_PARAM_IN),
    array(&$myparams['JefeInme'], SQLSRV_PARAM_IN),
    array(&$myparams['Segmento'], SQLSRV_PARAM_IN),
    array(&$myparams['Cliente'], SQLSRV_PARAM_IN),
    array(&$myparams['Acceso'], SQLSRV_PARAM_IN),
    array(&$myparams['Estado'], SQLSRV_PARAM_IN),
    array(&$myparams['Fecha_registro'], SQLSRV_PARAM_IN),
    array(&$myparams['Hora_registro'], SQLSRV_PARAM_IN),
    


);

    $query= "INSERT INTO TBL_RCREDENCIAL(CRE_CUSUARIO_CRM, CRE_CNOMBRE, CRE_CCEDULA, CRE_CCLIENTE, CRE_COPERACION, CRE_CCARGO,
    CRE_CJEFE_INMEDIATO, CRE_CPASSWORD1, CRE_CACCESO, CRE_CESTADO, CRE_CFECHA_REGISTRO, CRE_CHORA_REGISTRO, CRE_CDETALLE1) 
    VALUES('UsuarioRed','Nombre', 'Cedula', 'Cliente', 'Operacion', 'Cargo', 'JefeInme', 'Contrasena',
    'Acceso', 'Estado', 'Fecha_registro', 'Hora_registro', 'Segmento')";

    $resultado = sqlsrv_query($conn, $query, $procedure_params);

    if(!$resultado){
        die( print_r( sqlsrv_errors(), true));
       die("Query fallido");
    } */


?>
