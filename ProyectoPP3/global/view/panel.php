<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Administracion</title>

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="../../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="../../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- JQVMap -->
<link rel="stylesheet" href="../../../plugins/jqvmap/jqvmap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="../../../dist/css/adminlte.min.css">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="../../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<!-- Daterange picker -->
<link rel="stylesheet" href="../../../plugins/daterangepicker/daterangepicker.css">
<!-- summernote -->
<link rel="stylesheet" href="../../../plugins/summernote/summernote-bs4.min.css">
<link rel="icon" href="../../../dist/img/icons8-slack-96.png">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
        <?php include("cabecera.php")?> 
     <?php include("sidebar.php")?> 
<div class="wrapper">    
            <!-- Main content -->
                <section class="content">
                        <div class="container-fluid"> 
                                <!-- Small boxes (Stat box) --> 
                                

                                <!-- Formulario Productos row -->
                                <div class="row">
                                        <div class="col-12">
                                                <div class="card card-info">
                                                        <div class="card-header">
                                                                <h3 class="card-title">Input Addon</h3>
                                                        </div>
                                                        <div class="card-body">
                                                                <div class="input-group mb-3">
                                                                        <div class="input-group-prepend"> <span class="input-group-text">@</span> </div>
                                                                        <input type="text" class="form-control" placeholder="Username">
                                                                </div>
                                                                <div class="input-group mb-3">
                                                                        <input type="text" class="form-control">
                                                                        <div class="input-group-append"> <span class="input-group-text">.00</span> </div>
                                                                </div>
                                                                <div class="input-group">
                                                                        <div class="input-group-prepend"> <span class="input-group-text">$</span> </div>
                                                                        <input type="text" class="form-control">
                                                                        <div class="input-group-append"> <span class="input-group-text">.00</span> </div>
                                                                </div>
                                                                <h4>With icons</h4>
                                                                <div class="input-group mb-3">
                                                                        <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-envelope"></i></span> </div>
                                                                        <input type="email" class="form-control" placeholder="Email">
                                                                </div>
                                                                <div class="input-group mb-3">
                                                                        <input type="text" class="form-control">
                                                                        <div class="input-group-append"> <span class="input-group-text"><i class="fas fa-check"></i></span> </div>
                                                                </div>
                                                                <div class="input-group">
                                                                        <div class="input-group-prepend"> <span class="input-group-text"> <i class="fas fa-dollar-sign"></i> </span> </div>
                                                                        <input type="text" class="form-control">
                                                                        <div class="input-group-append">
                                                                                <div class="input-group-text"><i class="fas fa-ambulance"></i></div>
                                                                        </div>
                                                                </div>
                                                                <h5 class="mt-4 mb-2">With checkbox and radio inputs</h5>
                                                                <div class="row">
                                                                        <div class="col-lg-6">
                                                                                <div class="input-group">
                                                                                        <div class="input-group-prepend"> <span class="input-group-text">
                                                                                                <input type="checkbox">
                                                                                                </span> </div>
                                                                                        <input type="text" class="form-control">
                                                                                </div>
                                                                                <!-- /input-group --> 
                                                                        </div>
                                                                        <!-- /.col-lg-6 -->
                                                                        <div class="col-lg-6">
                                                                                <div class="input-group">
                                                                                        <div class="input-group-prepend"> <span class="input-group-text">
                                                                                                <input type="radio">
                                                                                                </span> </div>
                                                                                        <input type="text" class="form-control">
                                                                                </div>
                                                                                <!-- /input-group --> 
                                                                        </div>
                                                                        <!-- /.col-lg-6 --> 
                                                                </div>
                                                                <!-- /.row --> 
                                                                
                                                                <!-- /input-group --> 
                                                                
                                                                <!-- /input-group --> 
                                                                
                                                                <!-- /input-group --> 
                                                        </div>
                                                        <!-- /.card-body -->
                                                        
                                                        <div class="card-footer">
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                                <!-- /.row (main row) --> 
                                <!-- /.row -->
                                <div class="row">
                                        <div class="col-12">
                                                <div class="card">
                                                        <div class="card-header">
                                                                <h3 class="card-title">Fixed Header Table</h3>
                                                                <div class="card-tools">
                                                                        <div class="input-group input-group-sm" style="width: 150px;">
                                                                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                                                                <div class="input-group-append">
                                                                                        <button type="submit" class="btn btn-default"> <i class="fas fa-search"></i> </button>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <!-- /.card-header -->
                                                        <div class="card-body table-responsive p-0" style="height: 300px;">
                                                                <table class="table table-head-fixed text-nowrap">
                                                                        <thead>
                                                                                <tr>
                                                                                        <th>ID</th>
                                                                                        <th>User</th>
                                                                                        <th>Date</th>
                                                                                        <th>Status</th>
                                                                                        <th>Reason</th>
                                                                                </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                                <tr>
                                                                                        <td>183</td>
                                                                                        <td>John Doe</td>
                                                                                        <td>11-7-2014</td>
                                                                                        <td><span class="tag tag-success">Approved</span></td>
                                                                                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                                                                </tr>
                                                                                <tr>
                                                                                        <td>219</td>
                                                                                        <td>Alexander Pierce</td>
                                                                                        <td>11-7-2014</td>
                                                                                        <td><span class="tag tag-warning">Pending</span></td>
                                                                                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                                                                </tr>
                                                                                <tr>
                                                                                        <td>657</td>
                                                                                        <td>Bob Doe</td>
                                                                                        <td>11-7-2014</td>
                                                                                        <td><span class="tag tag-primary">Approved</span></td>
                                                                                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                                                                </tr>
                                                                                <tr>
                                                                                        <td>175</td>
                                                                                        <td>Mike Doe</td>
                                                                                        <td>11-7-2014</td>
                                                                                        <td><span class="tag tag-danger">Denied</span></td>
                                                                                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                                                                </tr>
                                                                                <tr>
                                                                                        <td>134</td>
                                                                                        <td>Jim Doe</td>
                                                                                        <td>11-7-2014</td>
                                                                                        <td><span class="tag tag-success">Approved</span></td>
                                                                                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                                                                </tr>
                                                                                <tr>
                                                                                        <td>494</td>
                                                                                        <td>Victoria Doe</td>
                                                                                        <td>11-7-2014</td>
                                                                                        <td><span class="tag tag-warning">Pending</span></td>
                                                                                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                                                                </tr>
                                                                                <tr>
                                                                                        <td>832</td>
                                                                                        <td>Michael Doe</td>
                                                                                        <td>11-7-2014</td>
                                                                                        <td><span class="tag tag-primary">Approved</span></td>
                                                                                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                                                                </tr>
                                                                                <tr>
                                                                                        <td>982</td>
                                                                                        <td>Rocky Doe</td>
                                                                                        <td>11-7-2014</td>
                                                                                        <td><span class="tag tag-danger">Denied</span></td>
                                                                                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                                                                </tr>
                                                                        </tbody>
                                                                </table>
                                                        </div>
                                                        <!-- /.card-body --> 
                                                </div>
                                                <!-- /.card --> 
                                        </div>
                                </div>
                        </div>
                        <!-- /.container-fluid --> 
                </section>
                <!-- /.content --> 
        </div>
        <!-- /.content-wrapper -->
    <?php include("footer.php")?> 
</body>
</html>
