<?php

/*
  En ocasiones el usuario puede volver al login
  aun si ya existe una sesion iniciada, lo correcto
  es no mostrar otra ves el login sino redireccionarlo
  a su pagina principal mientras exista una sesion entonces
  creamos un archivo que controle el redireccionamiento
*/

session_start();

// isset verifica si existe una variable o eso creo xd
if ( isset( $_SESSION[ 'id' ] ) ) {
        header( 'location: global/controller/redirec.php' );
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>

<!-- Importamos los estilos de Bootstrap -->
<link href="global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<!-- Font Awesome: para los iconos -->
<link href="global/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<!-- Sweet Alert: alertas JavaScript presentables para el usuario (más bonitas que el alert) -->
<link href="global/css/sweetalert.css" rel="stylesheet" type="text/css">
<!-- Estilos personalizados: archivo personalizado 100% real no feik -->
<link href="global/css/style.css" rel="stylesheet" type="text/css">
<link href="global/plugins/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<!-- icheck bootstrap -->
<link href="global/plugins/icheck-bootstrap/icheck-bootstrap.min.css" rel="stylesheet" type="text/css">
<!-- Theme style -->
<link href="global/dist/css/adminlte.min.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="global/dist/img/icons8-slack-96.png">
</head>
<body class="hold-transition login-page">

<!--
      Las clases que utilizo en los divs son propias de Bootstrap
      si no tienes conocimiento de este framework puedes consultar la documentacion en
      https://v4-alpha.getbootstrap.com/getting-started/introduction/
    -->
<div class="login-box"> 
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
                <div class="card-header text-center"> <a href="" class="h1"><b>Admin</b>LTE</a> </div>
                <div class="card-body">
                        <p class="login-box-msg">Sign in to start your session</p>
                        <form action="" method="post">
                                <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="user" placeholder="Ingresa tu usuario">
                                        <div class="input-group-append">
                                                <div class="input-group-text"> <span class="fas fa-envelope"></span> </div>
                                        </div>
                                </div>
                                <div class="input-group mb-3">
                                        <input type="password" autocomplete="off" class="form-control" id="clave" placeholder="Ingresa tu Contraseña">
                                        <div class="input-group-append">
                                                <div class="input-group-text"> <span class="fas fa-lock"></span> </div>
                                        </div>
                                </div>
                                <div class="row">
                                        <div class="col-8">
                                                <div class="icheck-primary">
                                                        <input type="checkbox" id="remember">
                                                        <label for="remember"> Remember Me </label>
                                                </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-4">
                                                <button type="button" class="btn btn-primary btn-block" name="button" id="login">Ingresar</button>
                                        </div>
                                        <!-- /.col --> 
                                </div>
                        </form>

                        <!-- /.social-auth-links -->
                        

                </div>
                <!-- /.card-body --> 
        </div>
        <!-- /.card --> 
</div>

<!-- Formulario Login -->


<!-- / Final Formulario login --> 

<!-- Jquery --> 
<script src="global/plugins/jquery/jquery.js"></script> 
<!-- Bootstrap js --> 
<script src="global/plugins/bootstrap/js/bootstrap.min.js"></script> 
<!-- SweetAlert js --> 
<script src="global/js/sweetalert.min.js"></script> 
<!-- Js personalizado --> 
<script src="global/js/operaciones.js"></script> 
<!-- jQuery --> 
<script src="global/plugins/jquery/jquery.min.js"></script> 
<!-- Bootstrap 4 --> 
<script src="global/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> 
<!-- AdminLTE App --> 
<script src="global/dist/js/adminlte.min.js"></script>
</body>
</html>
