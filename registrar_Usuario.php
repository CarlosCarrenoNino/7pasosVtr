<?php
date_default_timezone_set('America/Bogota');
$fechaHoy = date('d/m/Y');
$horaHoy = date('H');
$minutoHoy = date('i');
$HoraTotal = $horaHoy.':'.$minutoHoy;
?>


<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Registrar | BOT 7 Pasos</title>
        <link rel="icon" href="icono_vtr.ico" type="image/x-icon">
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-dark" background="vtr.png" >
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="card shadow-lg border-0 rounded-lg mt-5" style="right: -350px">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Registrar Usuario</h3></div>
                                    <div class="card-body">
                                        <form action="Enviar_registro_Usuario.php" method="POST">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input required class="form-control" id="nombre1"  name="nombre" type="text" placeholder="Nombre Completo"/>
                                                        <label for="nombre">Nombre Completo</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="cedula1" name="cedula" type="text" placeholder="Cedula" />
                                                        <label for="cedula">Cedula</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="usuario1" name="usuario" type="text" placeholder="Ingrese Usuario" />
                                                        <label for="Ingresar Usuario">Ingresar Usuario</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="password1" name="password" type="password" placeholder="Crear Contraseña" />
                                                        <label for="inputPassword">Crear Contraseña</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="operacion1" name="operacion" type="text" placeholder="Operacion" />
                                                        <label for="Operacion">Operacion</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="cargo1" name="cargo" type="text" placeholder="Cargo" />
                                                        <label for="Cargo">Cargo</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="jefe1" name="jefe" type="text" placeholder="Jefe Inmediato" />
                                                        <label for="Jefe">Jefe Inmediato</label> 
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="segmento1" name="segmento" type="text" placeholder="Segmento" />
                                                        <label for="Segmento">Segmento</label> 
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                <input type="submit" class="btn btn-danger btn-block form-control" id="Enviar1" name="enviar" value="Enviar"></a></div>
                                                </div>

                                            </div>

                                            <div>
                                                <input type="hidden" id="cliente1" name="cliente" value="VTR">
                                                <input type="hidden" id="acceso1"  name="acceso" value="22">
                                                <input type="hidden" id="estado1"  name="estado" value="Activo">
                                                <input type="hidden" id="fecha_registro1" name="fecha_registro" value="<?php echo $fechaHoy?>">
                                                <input type="hidden" id="hora_registro1" name="hora_registro" value="<?php echo $HoraTotal?>">
                                                <input type="hidden" id="update_fecha1" name="update_fecha" value="<?php echo $fechaHoy?>">
                                                <input type="hidden" id="update_hora1" name="update_hora" value="<?php echo $HoraTotal?>">

                                            </div>
                                            
                                            
                                        </form>
                                    <!-- <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.php">¿Tienes una Cuenta? Ir a login</a></div>
                                    </div> -->
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
