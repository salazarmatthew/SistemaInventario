<?php

$nombre = $_POST[ 'nombre'];
$precio = $_POST[ 'precio'  ];
$camedida = $_POST[ 'cantidad_medida' ];
$medida = $_POST[ 'medida' ];
$cantidad = $_POST[ 'cantidad' ];
$des = $_POST[ 'descripcion' ];

if ( empty( $nombre) || empty( $cantidad ) ) {

        echo 'error_1'; // Un campo esta vacio y es obligatorio

} else {

        if ( empty( $nombre ) == "" ) {

                # Incluimos la clase usuario
                require_once( '../../model/usuario.php' );

                # Creamos un objeto de la clase usuario
                $usuario = new Usuario();

                # Llamamos al metodo login para validar los datos en la base de datos
                $usuario->registroProducto( $nombre, $precio, $camedida, $medida, $cantidad, $des );


        } else {
                echo 'error_4';
        }


}


?>
