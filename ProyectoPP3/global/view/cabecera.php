<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light"> 
        <!-- Left navbar links -->
        <ul class="navbar-nav">
                <li class="nav-item"> <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a> </li>
        </ul>
        
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
                <?php
                $cargo = $_SESSION[ 'id' ];
                if ( $cargo == 1 ) {
                        $rutaImagen = "../../dist/img/user6-128x128.jpg";
                } elseif ( $cargo == 2 ) {
                        $rutaImagen = "../../dist/img/user5-128x128.jpg";
                }
                elseif ( $cargo == 3 ) {
                        $rutaImagen = "../../dist/img/user1-128x128.jpg";
                }
                ?>
                
                <!-- Navbar Search --> 
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown"> <a class="nav-link" data-toggle="dropdown" href="#"> <i class="far fa-bell"></i> <span class="badge badge-warning navbar-badge">15</span> </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right"> <span class="dropdown-item dropdown-header">15 Notifications</span>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item"> <i class="fas fa-envelope mr-2"></i> 4 new messages <span class="float-right text-muted text-sm">3 mins</span> </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item"> <i class="fas fa-users mr-2"></i> 8 friend requests <span class="float-right text-muted text-sm">12 hours</span> </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item"> <i class="fas fa-file mr-2"></i> 3 new reports <span class="float-right text-muted text-sm">2 days</span> </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a> </div>
                </li>
                <li class="nav-item dropdown user-menu"> <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <img src="<?php echo $rutaImagen; ?>" class="user-image img-circle elevation-2" alt="User Image"> <span class="d-none d-md-inline">
                        <?php
                        $eid = $_SESSION[ 'nombre' ];
                        echo strtoupper( $eid );
                        ?>
                        </span> </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                                <!-- User image -->
                                <li class="user-header bg-primary"> <img src="<?php echo $rutaImagen; ?>" class="img-circle elevation-2" alt="User Image">
                                        <p>
                                                <?php
                                                $eid = $_SESSION[ 'nombre' ];
                                                echo strtoupper( $eid );
                                                date_default_timezone_set( 'America/New_York' ); // Por ejemplo, 'America/New_York'

                                                // Obtiene la fecha y hora actual
                                                $fechaYHoraDeIngreso = date( 'Y-m-d H:i:s' ); // Formato: Año-Mes-Día Hora:Minutos:Segundos

                                                echo "<small> Ultima vez: " . $fechaYHoraDeIngreso;"</small>"
                                                ?>
                                </li>
                                <!-- Menu Body --> 
                                
                                <!-- Menu Footer-->
                                <li class="user-footer"> <a href="#" class="btn btn-default btn-flat">Profile</a> <a href="../../controller/cerrarSesion.php" class="btn btn-default btn-flat float-right">Sign out</a> </li>
                        </ul>
                </li>
        </ul>
</nav>
<!-- /.navbar --> 
