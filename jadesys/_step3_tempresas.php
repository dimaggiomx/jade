<?php
ob_start();
session_start();
header("Content-Type: text/html;charset=utf-8");
require_once("global.config.php");
require_once("config.php");
//require_once('../sescheck.php'); // para la sesion

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
  <title>JADE Capital - DESKTOP</title>
  <!-- Bootstrap Core CSS -->
<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- animation CSS -->
<link href="css/animate.css" rel="stylesheet">
<!-- Menu CSS -->
<link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
<!-- animation CSS -->
<link href="css/animate.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="css/style.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="css/customfvsd.css" rel="stylesheet">
<!-- color CSS -->
<link href="css/colors/blue.css" id="theme"  rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="fix-sidebar">
<!-- json response will be here -->
<div id="errorDiv" class="errorDiv" align="center"></div>
<!-- json response will be here -->
<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>
<div id="wrapper">
  <!-- Top Navigation -->
  <nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
      <div class="top-left-part"><a class="logo" href="index.html"><b><img src="../plugins/images/eliteadmin-logo.png" alt="home" /></b><span class="hidden-xs"><img src="../plugins/images/eliteadmin-text.png" alt="home" /></span></a></div>
      <ul class="nav navbar-top-links navbar-left hidden-xs">
        <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
        <li>
          <form role="search" class="app-search hidden-xs">
            <input type="text" placeholder="Search..." class="form-control">
            <a href=""><i class="fa fa-search"></i></a>
          </form>
        </li>
      </ul>
      <?php include 'd_top.php' ?>
    </div>
    <!-- /.navbar-header -->
    <!-- /.navbar-top-links -->
    <!-- /.navbar-static-side -->
  </nav>
  <!-- End Top Navigation -->
  <!-- Left navbar-header -->
  <div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
      <?php include 'd_left_menu.php' ?>
    </div>
  </div>
  <!-- Left navbar-header end -->
  <!-- Page Content -->
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h4 class="page-title">Form Layout</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Form Layout</li>
          </ol>
        </div>
        <!-- /.col-lg-12 -->
      </div>

      <!--.row-->
      <div class="row">
        <div class="col-md-12">
          
          <div class="panel panel-info">
            <div class="panel-heading"> Completar Registro</div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
              <div class="panel-body">
                  <form id="loginform" action="step3_tinversionistas.php" method="post">
              <div class="form-body">
                <h3 class="box-title">Datos</h3>
                <hr>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">Ventas Netas</label>
                      <input type="text" id="vn" name="vn" class="form-control" placeholder="Ventas Netas" required="">
                      <span class="help-block"> Total Sales </span> </div>
                  </div>
                  <!--/span-->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">Utilidad Neta</label>
                      <input type="text" id="un" name="un" class="form-control" placeholder="Utilidad Neta" required="">
                      <span class="help-block"> Utility. </span> </div>
                  </div>
                  <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">Utilidad Venta</label>
                      <input type="text" id="uv" name="uv" class="form-control" placeholder="Utilidad Venta" required="">
                      <span class="help-block"> Sales Utility </span> </div>
                  </div>
                  <!--/span-->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">Capital de Trabajo</label>
                      <input type="text" id="ct" name="ct" class="form-control" placeholder="Capital de Trabajo" required="">
                      <span class="help-block"> Work Capital </span>
                    </div>
                  </div>
                </div>
                <!--/row-->
                <!--/row-->
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">Indice de Liquidez</label>
                      <input type="text" id="il" name="il" class="form-control" placeholder="Indice de Liquidez" required="">
                      <span class="help-block"> Index </span> </div>
                  </div>
                  <!--/span-->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">Costo de Ventas</label>
                      <input type="text" id="cv" name="cv" class="form-control" placeholder="Costo de Ventas" required="">
                      <span class="help-block"> Sales Costs </span>
                    </div>
                  </div>
                </div>
                <!--/row-->
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">Utilidad Bruta</label>
                      <input type="text" id="ub" name="ub" class="form-control" placeholder="Utilidad Bruta" required="">
                      <span class="help-block"> Utilidad Bruta </span> </div>
                  </div>
                  <!--/span-->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">Depreciación</label>
                      <input type="text" id="dp" name="dp" class="form-control" placeholder="Depreciacion" required="">
                      <span class="help-block"> - Tip -  </span> </div>
                  </div>
                  <!--/span-->
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">Gastos de Operacion</label>
                      <input type="text" id="go" name="go" class="form-control" placeholder="Gastos de Operacion" required="">
                      <span class="help-block"> Operation expenses </span> </div>
                  </div>
                  <!--/span-->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">Utilidad de Operacion</label>
                      <input type="text" id="uo" name="uo" class="form-control" placeholder="Utilidad de Operacion" required="">
                      <span class="help-block"> Operation Utility </span> </div>
                  </div>
                  <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">Utilidad Neta Final</label>
                      <input type="text" id="unf" name="unf" class="form-control" placeholder="Utilidad Neta Final" required="">
                      <span class="help-block"> Final Utility </span> </div>
                  </div>
                  <!--/span-->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">Ventas Directas</label>
                      <input type="text" id="vd" name="vd" class="form-control" placeholder="Ventas Directas" required="">
                      <span class="help-block"> Direct Sales </span> </div>
                  </div>
                  <!--/span-->
                </div>
                <!--/row-->

              </div>
              <div class="form-actions">
                <button type="submit" class="btn btn-success" id="btn-signup" name="btn-signup"> <i class="fa fa-check"></i> Guardar</button>
                <button type="button" class="btn btn-default">Cancelar</button>
              </div>
            </form>
              </div>
            </div>
          </div>  
        </div>
      </div>
      <!--./row-->
    </div>
    <!-- /.container-fluid -->
    <?php include 'footer.php' ?>
  </div>
  <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<!-- jQuery -->
<script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>

<!--slimscroll JavaScript -->
<script src="js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="js/waves.js"></script>
<!-- Custom Theme JavaScript -->
<script src="tempresas/ps_step3.js"></script>
<script src="js/jasny-bootstrap.js"></script>
<!--Style Switcher -->
<script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
