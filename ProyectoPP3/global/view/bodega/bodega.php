<?php
session_start();
include( '../php/dbconnection.php' );

if ( !isset( $_SESSION[ 'cargo' ] ) || $_SESSION[ 'cargo' ] != 1 ) {
        header( 'location: ../../../index.php' );
}

if ( isset( $_POST[ 'submit' ] ) ) {
        $eid = $_POST[ 'producto' ];
        $precio = $_POST[ 'precio' ];
        $cantidad = $_POST[ 'cantidad' ];
        $descripcion = $_POST[ 'descripcion' ];

        // Obtener el precio y la cantidad actuales de la base de datos
        $query = mysqli_query( $con, "SELECT valor, cantidad FROM productos WHERE id_producto='$eid'" );
        if ( $query && mysqli_num_rows( $query ) > 0 ) {
                $row = mysqli_fetch_assoc( $query );
                $precioActual = $row[ 'valor' ];
                $cantidadActual = $row[ 'cantidad' ];

                // Realizar la operación para calcular el nuevo precio
                // Por ejemplo, puedes multiplicar el precio actual por la nueva cantidad
                $nuevoPrecio = ( $precioActual + $precio ) / 2;
                $nuevacantidad = $cantidadActual + $cantidad;

                // Verificar si la descripción no está vacía antes de la actualización
                if ( !empty( $descripcion ) ) {
                        // Actualizar los valores en la base de datos
                        $updateQuery = mysqli_query( $con, "UPDATE productos 
                SET valor='$nuevoPrecio', 
                cantidad='$nuevacantidad',
                descripcion='$descripcion' 
                WHERE id_producto='$eid'" );

                        if ( $updateQuery ) {
                                echo "<script type='text/javascript'> document.location ='../user/inventario.php'; </script>";
                        } else {
                                echo "<script>alert('Algo ha ido mal. Vuelva a intentarlo');</script>";
                        }
                } else {
                        $updateQuery = mysqli_query( $con, "UPDATE productos 
                SET valor='$nuevoPrecio', 
                cantidad='$nuevacantidad'
                WHERE id_producto='$eid'" );
                        if ( $updateQuery ) {
                                echo "<script type='text/javascript'> document.location ='../user/inventario.php'; </script>";
                        } else {
                                echo "<script>alert('Algo ha ido mal. Vuelva a intentarlo');</script>";
                        }
                }
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
<?php include("sidebar.php")?>
<div class="wrapper">
        <div class="container">
                <div class="row">
                        <div class="col-md-12">
                                <div class="card card-info">
                                        <div class="card-header">
                                                <h3 class="card-title">Productos</h3>
                                        </div>
                                        <form method="POST">
                                                <div class="card-body">
                                                        <div class="form-group">
                                                                <label>Productos</label>
                                                                <select class="form-control" name="producto" required="true" id="productoSelect">
                                                                        <option value="0">Seleccione:</option>
                                                                        <?php
                                                                        // Realizamos la consulta para extraer los datos
                                                                        $query = mysqli_query( $con, "SELECT id_producto, nombre_producto FROM productos" );
                                                                        while ( $valores = mysqli_fetch_array( $query ) ) {
                                                                                echo '<option value="' . $valores[ 'id_producto' ] . '">' . $valores[ 'nombre_producto' ] . '</option>';
                                                                        }
                                                                        ?>
                                                                </select>
                                                        </div>
                                                        <h2>Actualizar</h2>
                                                        <p class="hint-text">Actualice la información.</p>
                                                        <div class="form-group">
                                                                <label>Precio</label>
                                                                <input type="number" autofocus="autofocus" required="required" class="form-control" placeholder="Precio Unitario" min="0" step="0.01" name="precio">
                                                        </div>
                                                        <div class="form-group">
                                                                <label>Cantidad</label>
                                                                <input name="cantidad" type="number" autofocus="autofocus" required="required" class="form-control" placeholder="Cantidad" min="0" step="0.01" autocomplete="off">
                                                        </div>
                                                        <div class="form-group">
                                                                <label>Descripción</label>
                                                                <textarea class="form-control" rows="3" placeholder="Enter ..." name="descripcion"></textarea>
                                                        </div>
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
