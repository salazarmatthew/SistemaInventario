<?php
session_start();
include( '../php/dbconnection.php' );
// Validamos que exista una session y ademas que el cargo que exista sea igual a 1 (Administrador)
if ( !isset( $_SESSION[ 'cargo' ] ) || $_SESSION[ 'cargo' ] != 1 ) {
        header( 'location: ../../../index.php' );
}

?>

<!DOCTYPE html>
<html lang="en">
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
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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
<link href="../../plugins/bootstrap/js/bootstrap.min.js" rel="stylesheet" type="text/css">
<!-- Theme style -->
<link href="../../dist/css/adminlte.min.css" rel="stylesheet" type="text/css">
<!-- overlayScrollbars -->
<link href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css" rel="stylesheet" type="text/css">
<!-- Daterange picker -->
<link href="../../plugins/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css">
<!-- summernote -->
<link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.min.css">
<link rel="icon" href="../../dist/img/icons8-slack-96.png">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<?php  include("../cabecera.php");?>
<?php include("sidebar.php")?>
<div class="row">
        <div class="col-12">
                <div class="card">
                        <div class="card-header">
                                <h3 class="card-title">Tabla de Productos</h3>
                                <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 300px;">
                                                <div class="col-sm-12" align="right"><a href="bodega.php" class="btn btn-secondary"><i class="material-icons">&#xE147;</i><span>Ingreso producto</span></a></div>
                                </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                                <table class="table table-striped table-hover">
                                        <thead>
                                                <tr>
                                                        <th>#</th>
                                                        <th>Producto</th>
                                                        <th>Precio</th>
                                                        <th>Cantidad</th>
                                                        <th>Medidas</th>
                                                        <th>Descripcion</th>
                                                        <th>Fecha Ingreso</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                                <?php
                                                $ret = mysqli_query( $con, "SELECT p.*, u.unidades AS medida_producto FROM productos p INNER JOIN unidades u ON p.medida = u.id;" );
                                                $cnt = 1;
                                                $row_count = mysqli_num_rows( $ret );
                                                if ( $row_count > 0 ) {
                                                        while ( $row = mysqli_fetch_array( $ret ) ) {
                                                                $status_class = $row[ 'estado' ] == 0 ? 'registro-desactivado' : '';
                                                                ?>
                                                <tr class="<?php echo $status_class; ?>">
                                                        <td><?php echo $cnt; ?></td>
                                                        <td><?php echo $row['nombre_producto']; ?></td>
                                                        <td><?php echo $row['valor']; ?></td>
                                                        <td><?php echo $row['cantidad']; ?></td>
                                                        <td><?php echo $row['cantidad_medida'] . ' ' . $row['medida_producto']; ?></td>
                                                        <td><?php echo $row['descripcion']; ?></td>
                                                        <td><?php echo $row['fecha_ingreso']; ?></td>
                                                </tr>
                                                <?php
                                                $cnt = $cnt + 1;
                                                }
                                                }
                                                else {
                                                        ?>
                                                <tr>
                                                        <th style="text-align:center; color:red;" colspan="6">Ninguna Registro Encontrado</th>
                                                </tr>
                                                <?php
                                                }
                                                ?>
                                        </tbody>
                                </table>
                        </div>
                        <!-- /.card-body -->
                </div>
                <!-- /.card -->
        </div>
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
<script src="../../js/operaciones.js"></script>
</body>
