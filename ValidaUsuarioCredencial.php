<?php
    session_start();
    $Usuario = $_POST["Usuario"];
    $Password = $_POST["Password"];
    include "Conexion.php";
    if($conn){
        $SELECT = "SELECT * FROM TBL_RCREDENCIAL WHERE CRE_CUSUARIO_CRM = '$Usuario' AND CRE_CESTADO = 'Activo'";
        
        $params = array();
        $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
        $ConsultaUsuario = sqlsrv_query($conn, $SELECT, $params, $options);
        if(sqlsrv_num_rows($ConsultaUsuario)>0){
            $row = sqlsrv_fetch_array($ConsultaUsuario);
            $sUsario = $row['CRE_CUSUARIO_CRM'];
            $sPassword = $row['CRE_CPASSWORD1'];
            $sPrivilegio = $row['CRE_CACCESO'];
            
            if($sPassword == $Password){
                $_SESSION["UsuarioIngreso"] = $sUsario;
                $_SESSION["PrivilegioUsuario"] = $sPrivilegio;
                switch($sPrivilegio){
                    case '1':
                        echo '<script> window.location="index.php"; </script>';
                        break;
                    case '22':
                        echo '<script> window.location="index.php"; </script>';
                        break;
                    case '23':
                            echo '<script> window.location="regisgros_usuarios.php"; </script>';
                        break;
                    case '2':
                        echo '<script> alert("No tiene permisos para ingresar.");</script>';
                        echo '<script> window.location="logout.php"; </script>';
                        break;
                }
            }else{
                echo '<script> alert("Validar nuevamente, contraseña incorrecta.");</script>';
                echo '<script> window.location="logout.php"; </script>';
            }
        }else{
            echo '<script> alert("Validar nuevamente, usuario incorrecto. ");</script>';
            echo '<script> window.location="logout.php"; </script>';
        }
    }else{
        echo '<script> window.location="logout.php"; </script>';
    }
//sqlsrv_close();
?>