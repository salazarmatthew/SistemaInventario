<?php
// Databse Connection file
include( 'dbconnection.php' );

if ( isset( $_POST[ 'submit' ] ) ) {
        // Getting the post values
        $nombre_producto = $_POST[ 'nombre' ];
        $precio = $_POST[ 'preciop' ];
        $medida_producto = $_POST[ 'medida' ];
        $cantidad_producto = $_POST[ 'cantidad' ];
        $descripcion_producto = $_POST[ 'descripcion' ];

        // Generate a random number for 'codigo'
        $codigo = mt_rand( 1000, 9999 ); // Generate a random 4-digit number, you can adjust the range as per your requirement

        // Query for data insertion
        $query = mysqli_query( $con, "INSERT INTO productos (codigo, nombre_producto, precio, cantidad_producto, medida_producto, descripcion_producto) VALUES ('$codigo', '$nombre_producto', '$precio', '$cantidad_producto', '$medida_producto', '$descripcion_producto')" );

        if ( $query ) {
                echo "<script>alert('Ha insertado correctamente los datos');</script>";
                echo "<script type='text/javascript'> document.location ='../index.php'; </script>";
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
<link rel="stylesheet" type="text/css" href="../css/insert.css">
<title>PHP Crud Operation!!</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script> 
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="signup-form">
        <form  method="POST">
                <h2> Producto </h2>
                <p class="hint-text">Rellene el siguiente formulario.</p>
                <div class="form-group">
                        <div class="row">
                                <div class="col">
                                        <input type="text" class="form-control" name="nombre" placeholder="Producto" required="true">
                                </div>
                        </div>
                </div>
                <div class="form-group">
                        <input name="cantidad" type="number" required="true" class="form-control" placeholder="Ingrese la cantidad" min="0" step="any">
                </div>
                <div>
                        <p>
                                <select class="form-control" name="medida" required="true">
                                        <option value="0">Seleccione:</option>
                                        <?php
                                        // Realizamos la consulta para extraer los datos
                                        $query = mysqli_query( $con, "SELECT * FROM unidades" );
                                        while ( $valores = mysqli_fetch_array( $query ) ) {
                                                echo '<option value="' . $valores[ 'medida' ] . '">' . $valores[ 'medida' ] . '</option>';
                                        }
                                        ?>
                                </select>
                        </p>
                </div>
                <div class="form-group">
                        <input name="preciop" type="number" required="true" class="form-control" placeholder="Ingrese el precio" min="0.00" step="any">
                </div>
                <div class="form-group">
                        <textarea class="form-control" name="descripcion" placeholder="Descripcion" required="true"></textarea>
                </div>
                <div class="form-group">
                        <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Enviar</button>
                </div>
        </form>
        <div class="text-center">¡Vea los datos ya insertados! <a href="../index.php">Ver</a></div>
</div>
</body>
</html>