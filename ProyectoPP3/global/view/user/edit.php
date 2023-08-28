<?php
session_start();
include( '../php/dbconnection.php' );
// Validamos que exista una session y ademas que el cargo que exista sea igual a 1 (Administrador)
if ( !isset( $_SESSION[ 'cargo' ] ) || $_SESSION[ 'cargo' ] != 2 ) {
        header( 'location: ../../../index.php' );
}
?>
<?php
// Database Connection

if ( isset( $_POST[ 'submit' ] ) ) {
        $eid = $_GET[ 'editid' ];
        // Getting Post Values
        $nombre_producto = $_POST[ 'nombre' ];
        $precio = $_POST[ 'precio' ];
        $medida = $_POST[ 'medida' ];
        $cantidad_medida = $_POST[ 'cantidad_medida' ];
        $descripcion = $_POST[ 'descripcion' ];

        // Query for data updation
        $query = mysqli_query( $con, "UPDATE productos 
        SET nombre_producto='$nombre_producto', 
        valor='$precio', 
        cantidad_medida='$cantidad_medida', 
        medida='$medida',
        cantidad='$cantidad', 
        descripcion='$descripcion' 
        WHERE id_producto='$eid'" );

        if ( $query ) {
                echo "<script type='text/javascript'> document.location ='../user/inventario.php'; </script>";
        } else {
                echo "<script>alert('Algo ha ido mal. Vuelva a intentarlo');</script>";
        }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script> 
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<title>Administracion</title>
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
        <div class="container">
                <div class="row">
                        <div class="col-md-12">
                                <!-- Input addon -->
                                <div class="card card-info">
                                        <div class="card-header">
                                                <h3 class="card-title">Productos</h3>
                                        </div>
                                        <form  method="POST">
                                                <div class="card-body">
                                                        <?php
                                                        $eid = $_GET[ 'editid' ];
                                                        $ret = mysqli_query( $con, "select * from productos where id_producto='$eid'" );
                                                        while ( $row = mysqli_fetch_array( $ret ) ) {
                                                                ?>
                                                        <h2>Actualizar</h2>
                                                        <p class="hint-text">Actualice la informacion.</p>
                                                        <div class="input-group mb-3">
                                                                <div class="input-group-prepend"><span class="input-group-text">@</span></div>
                                                                <input type="text" autofocus="autofocus" required="required" class="form-control" placeholder="Nombre" name="nombre" value="<?php  echo $row['nombre_producto'];?>">
                                                        </div>
                                                        <div class="row">
                                                                <div class="col-lg-6">
                                                                        <div class="input-group">
                                                                                <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                                                                <input type="number" autofocus="autofocus" required="required" class="form-control" placeholder="Precio" min="0" step="0.01" name="precio" value="<?php  echo $row['valor'];?>">
                                                                                <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <div>
                                                                <div class="row">
                                                                        <div class="col-lg-6">
                                                                                <!-- select -->
                                                                                <div class="form-group">
                                                                                        <label>Medida</label>
                                                                                        <select class="form-control" name="medida" required="true">
                                                                                                <?php
                                                                                                // Realizamos la consulta para extraer los datos
                                                                                                $query = mysqli_query( $con, "SELECT * FROM unidades" );
                                                                                                while ( $valores = mysqli_fetch_array( $query ) ) {
                                                                                                        // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                                                                                        echo '<option value="' . $valores[ id ] . '">' . $valores[ unidades ] . '</option>';
                                                                                                }
                                                                                                ?>
                                                                                        </select>
                                                                                </div>
                                                                                <div class="input-group">
                                                                                        <div class="input-group-prepend"><span class="input-group-text">#</span></div>
                                                                                        <input name="cantidad_medida" type="number" autofocus="autofocus" required="required" class="form-control" placeholder="Cantidad" min="0" step="0.01" autocomplete="off" value="<?php echo isset($row['cantidad_medida']) ? $row['cantidad_medida'] : ''; ?>">
                                                                                </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                        <label>Descripción</label>
                                                                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="descripcion"><?php  echo $row['descripcion'];?>
</textarea>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                <p></p>
                                                        </div>
                                                        <?php
                                                        }
                                                        ?>
                                                        <div class="form-group">
                                                                <button type="submit" class="btn btn-primary btn-block" name="submit">Actualizar</button>
                                                        </div>
                                                </div>
                                        </form>
                                </div>
                        </div>
                </div>
        </div>
</div>
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
