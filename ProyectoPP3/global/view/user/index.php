<?php
session_start();
include( '../php/dbconnection.php' );
// Validamos que exista una session y ademas que el cargo que exista sea igual a 1 (Administrador)
if ( !isset( $_SESSION[ 'cargo' ] ) || $_SESSION[ 'cargo' ] != 2 ) {
        header( 'location: ../../../index.php' );
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Administracion</title>
<!-- Importamos los estilos de Bootstrap --> 
<!-- Font Awesome: para los iconos -->
<link href="../../css/font-awesome.min.css" rel="stylesheet" type="text/css">
<!-- Sweet Alert: alertas JavaScript presentables para el usuario (más bonitas que el alert) -->
<link href="../../css/sweetalert.css" rel="stylesheet" type="text/css">
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link href="../../plugins/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" type="text/css">
<!-- iCheck -->
<link href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css" rel="stylesheet" type="text/css">
<!-- JQVMap -->
<link href="../../plugins/jqvmap/jqvmap.min.css" rel="stylesheet" type="text/css">
<!-- Theme style -->
<link href="../../dist/css/adminlte.min.css" rel="stylesheet" type="text/css">
<!-- overlayScrollbars -->
<link href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css" rel="stylesheet" type="text/css">
<!-- Daterange picker -->
<link href="../../plugins/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css">
<!-- summernote -->
<link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.min.css">
<link rel="icon" href="../../dist/img/icons8-slack-96.png">
<link href="../../css/style.css" rel="stylesheet" type="text/css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<?php include("../cabecera.php")?>
<?php include("../sidebar.php")?>
<div class="wrapper">
        <!-- Main content -->
        <div class="container">
                <div class="row">
                        <div class="col-md-12">
                                
                                <!-- Input addon -->
                                <div class="card card-info">
                                        <div class="card-header">
                                                <h3 class="card-title">Productos</h3>
                                        </div>
                                        <form id="formulario_producto">
                                                <div class="card-body">
                                                        <div class="input-group mb-3">
                                                                <div class="input-group-prepend"><span class="input-group-text">@</span></div>
                                                                <input type="text" autofocus="autofocus" required="required" class="form-control" placeholder="Nombre" name="nombre">
                                                        </div>
                                                        <div class="row">
                                                                <div class="col-lg-6">
                                                                        <div class="input-group">
                                                                                <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                                                                <input type="number" autofocus="autofocus" required="required" class="form-control" placeholder="Precio" min="0" step="0.01" name="precio">
                                                                                <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                                                        </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                        <div class="input-group">
                                                                                <div class="input-group-prepend"><span class="input-group-text">#</span></div>
                                                                                <input name="cantidad" type="number" autofocus="autofocus" required="required" class="form-control" placeholder="Cantidad Producto" min="0" step="0.01" autocomplete="off">
                                                                                <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <h4></h4>
                                                        <div class="row">
                                                                <div class="col-lg-6">
                                                                        
                                                                        <!-- select -->
                                                                        <div class="form-group">
                                                                                <label>Medida</label>
                                                                                <select class="form-control" name="medida" required="true">
                                                                                        <option value="0">Seleccione:</option>
                                                                                        <?php
                                                                                        // Realizamos la consulta para extraer los datos
                                                                                        $query = mysqli_query( $con, "SELECT * FROM unidades" );
                                                                                        while ( $valores = mysqli_fetch_array( $query ) ) {
                                                                                                echo '<option value="' . $valores[ 'id' ] . '">' . $valores[ 'unidades' ] . '</option>';
                                                                                        }
                                                                                        ?>
                                                                                </select>
                                                                        </div>
                                                                        <div class="input-group">
                                                                                <div class="input-group-prepend"><span class="input-group-text">#</span></div>
                                                                                <input name="cantidad_medida" type="number" autofocus="autofocus" required="required" class="form-control" placeholder="Cantidad" min="0" step="0.01" autocomplete="off">
                                                                        </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                                <label>Descripción</label>
                                                                                <textarea class="form-control" rows="3" placeholder="Enter ..." name="descripcion"></textarea>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <div class="row">
                                                                <div class="col-xs-8 col-xs-offset-2">
                                                                        <div class="spacing-2"></div>
                                                                        <button type="button" class="btn btn-primary btn-block" name="button" id="registro_producto">Registrar</button>
                                                                </div>
                                                        </div>
                                                </div>
                                        </form>
                                        <!-- /.card-body -->
                                </div>
                        </div>
                </div>
        </div>
        
        <!-- /.content -->
</div>

<!-- /.content-wrapper -->
<?php include("../footer.php")?>
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.js"></script>
<!-- Jquery -->
<!-- SweetAlert js -->
<script src="../../js/sweetalert.min.js"></script>
<!-- Js personalizado -->
<script src="../js/operaciones.js"></script>
</body>
</html>