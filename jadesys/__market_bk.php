<?php
ob_start();
session_start();
header("Content-Type: text/html;charset=utf-8");
require_once("global.config.php");
require_once("config.php");
require_once('sescheck.php'); // para la sesion

// para consulta
require_once(C_P_CLASES."actions/a.market.php");
$myData = NEW A_MARKET("");
$result = $myData->get_market($DBcon);

//$response['status'] = 'success'; // could not register
//$response['msg'] = 'Se obtuvo la información';
//$response['data'] = $this->display_data_market($stmt, $total);


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
<title>Jade Capital Flow Desktop - Welcome</title>
<!-- Bootstrap Core CSS -->
<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Menu CSS -->
<link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
<!-- morris CSS -->
<link href="../plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
<!-- animation CSS -->
<link href="css/animate.css" rel="stylesheet">
<!-- Custom CSS -->
  <!-- Custom CSS -->
  <link href="css/customfvsd.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<!-- color CSS -->
<link href="css/colors/blue.css" id="theme"  rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<!-- Custom CSS -->
<link href="css/customfvsd.css" rel="stylesheet">
<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>
<div id="wrapper">
  <!-- Navigation -->
  <nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
      <div class="top-left-part"><a class="logo" href="desktop.php"><b><img src="../plugins/images/eliteadmin-logo.png" alt="home" /></b><span class="hidden-xs"><img src="../plugins/images/eliteadmin-text.png" alt="home" /></span></a></div>
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
  <!-- Left navbar-header -->
  <div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
      <!-- incluir el menu FVSD -->
      <?php include 'd_left_menu.php' ?>
    </div>
  </div>
  <!-- Left navbar-header end -->
  <!-- Page Content -->
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h4 class="page-title">Proyectos</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li><a href="index.html">Dashboard</a></li>
            <li class="active">Dashboard 3</li>
          </ol>
        </div>
        <!-- /.col-lg-12 -->
      </div>
      <!-- .row -->
      <div class="row">
        <div class="col-md-3 col-xs-12 col-sm-6"> <img class="img-responsive" alt="user" src="../plugins/images/big/img1.jpg">
          <div class="white-box">
            <div class="text-muted"><span class="m-r-10">May 16</span> <a class="text-muted m-l-10" href="#"><i class="fa fa-heart-o"></i> 38</a></div>
            <h3 class="m-t-20 m-b-20">Top 20 Models are on the ramp</h3>
            <p>Titudin venenatis ipsum ac feugiat. Vestibulum ullamcorper quam.</p>
            <button class="btn btn-success btn-rounded waves-effect waves-light m-t-20" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Read more</button>
          </div>
        </div>
        <div class="col-md-3 col-xs-12 col-sm-6"> <img class="img-responsive" alt="user" src="../plugins/images/big/img2.jpg">
          <div class="white-box">
            <div class="text-muted"><span class="m-r-10">May 16</span> <a class="text-muted m-l-10" href="#"><i class="fa fa-heart-o"></i> 38</a></div>
            <h3 class="m-t-20 m-b-20">Top 20 Models are on the ramp</h3>
            <p>Titudin venenatis ipsum ac feugiat. Vestibulum ullamcorper quam.</p>
            <button class="btn btn-success btn-rounded waves-effect waves-light m-t-20">Read more</button>
          </div>
        </div>
        <div class="col-md-3 col-xs-12 col-sm-6"> <img class="img-responsive" alt="user" src="../plugins/images/big/img3.jpg">
          <div class="white-box">
            <div class="text-muted"><span class="m-r-10">May 16</span> <a class="text-muted m-l-10" href="#"><i class="fa fa-heart-o"></i> 38</a></div>
            <h3 class="m-t-20 m-b-20">Top 20 Models are on the ramp</h3>
            <p>Titudin venenatis ipsum ac feugiat. Vestibulum ullamcorper quam.</p>
            <button class="btn btn-success btn-rounded waves-effect waves-light m-t-20">Read more</button>
          </div>
        </div>
        <div class="col-md-3 col-xs-12 col-sm-6"> <img class="img-responsive" alt="user" src="../plugins/images/big/img4.jpg">
          <div class="white-box">
            <div class="text-muted"><span class="m-r-10">May 16</span> <a class="text-muted m-l-10" href="#"><i class="fa fa-heart-o"></i> 38</a></div>
            <h3 class="m-t-20 m-b-20">Top 20 Models are on the ramp</h3>
            <p>Titudin venenatis ipsum ac feugiat. Vestibulum ullamcorper quam.</p>
            <button class="btn btn-success btn-rounded waves-effect waves-light m-t-20">Read more</button>
          </div>
        </div>
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-md-3 col-xs-12 col-sm-6"> <img class="img-responsive" alt="user" src="../plugins/images/big/img4.jpg">
          <div class="white-box">
            <div class="text-muted"><span class="m-r-10">May 16</span> <a class="text-muted m-l-10" href="#"><i class="fa fa-heart-o"></i> 38</a></div>
            <h3 class="m-t-20 m-b-20">Top 20 Models are on the ramp</h3>
            <p>Titudin venenatis ipsum ac feugiat. Vestibulum ullamcorper quam.</p>
            <button class="btn btn-success btn-rounded waves-effect waves-light m-t-20">Read more</button>
          </div>
        </div>
        <div class="col-md-3 col-xs-12 col-sm-6"> <img class="img-responsive" alt="user" src="../plugins/images/big/img4.jpg">
          <div class="white-box">
            <div class="text-muted"><span class="m-r-10">May 16</span> <a class="text-muted m-l-10" href="#"><i class="fa fa-heart-o"></i> 38</a></div>
            <h3 class="m-t-20 m-b-20">Top 20 Models are on the ramp</h3>
            <p>Titudin venenatis ipsum ac feugiat. Vestibulum ullamcorper quam.</p>
            <button class="btn btn-success btn-rounded waves-effect waves-light m-t-20">Read more</button>
          </div>
        </div>
        <div class="col-md-3 col-xs-12 col-sm-6"> <img class="img-responsive" alt="user" src="../plugins/images/big/img4.jpg">
          <div class="white-box">
            <div class="text-muted"><span class="m-r-10">May 16</span> <a class="text-muted m-l-10" href="#"><i class="fa fa-heart-o"></i> 38</a></div>
            <h3 class="m-t-20 m-b-20">Top 20 Models are on the ramp</h3>
            <p>Titudin venenatis ipsum ac feugiat. Vestibulum ullamcorper quam.</p>
            <button class="btn btn-success btn-rounded waves-effect waves-light m-t-20">Read more</button>
          </div>
        </div>
        <div class="col-md-3 col-xs-12 col-sm-6"> <img class="img-responsive" alt="user" src="../plugins/images/big/img4.jpg">
          <div class="white-box">
            <div class="text-muted"><span class="m-r-10">May 16</span> <a class="text-muted m-l-10" href="#"><i class="fa fa-heart-o"></i> 38</a></div>
            <h3 class="m-t-20 m-b-20">Top 20 Models are on the ramp</h3>
            <p>Titudin venenatis ipsum ac feugiat. Vestibulum ullamcorper quam.</p>
            <button class="btn btn-success btn-rounded waves-effect waves-light m-t-20">Read more</button>
          </div>
        </div>
      </div>
      <!-- /.row -->

        <div class="modal fade bs-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel1">Proyecto</h4>
              </div>
              <div class="modal-body">
                <iframe width="98%" height="315" src="https://www.youtube.com/embed/EoaPhxNubL0?list=RDEoaPhxNubL0?ecver=1" frameborder="0" allowfullscreen></iframe>
                <h4>EMPRESA</h4>
                <p>DESCRIPCION - ola esta seria una informacion que podria ir en esta seccion con varias partes, parrafos saltos de linea, etc. para ejemplificar como apareceria en la ventana modal que se activa cuando se le da clic aqui.</p>
                <div class="demo-tooltip">
                  <div class="tooltip top" role="tooltip">
                    <div class="tooltip-arrow"></div>
                    <div class="tooltip-inner"> Tipo </div>
                  </div>
                  <div class="tooltip top tooltip-primary" role="tooltip">
                    <div class="tooltip-arrow"></div>
                    <div class="tooltip-inner"> Fecha Inicio </div>
                  </div>
                  <div class="tooltip top tooltip-success" role="tooltip">
                    <div class="tooltip-arrow"></div>
                    <div class="tooltip-inner"> Fecha Fin </div>
                  </div>
                  <div class="tooltip top tooltip-warning" role="tooltip">
                    <div class="tooltip-arrow"></div>
                    <div class="tooltip-inner"> Estatis </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">PITCH</button>
              </div>
            </div>
          </div>
        </div>


      <!-- paginacion -->
      <h5  class="box-title">Disable & active state</h5>
      <ul class="pagination pagination-split">
        <li> <a href="#"><i class="fa fa-angle-left"></i></a> </li>
        <li  class="disabled"> <a href="#">1</a> </li>
        <li class="active"> <a href="#">2</a> </li>
        <li> <a href="#">3</a> </li>
        <li> <a href="#">4</a> </li>
        <li> <a href="#">5</a> </li>
        <li> <a href="#"><i class="fa fa-angle-right"></i></a> </li>
      </ul>

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
<!--Counter js -->
<script src="../plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
<script src="../plugins/bower_components/counterup/jquery.counterup.min.js"></script>
<!--slimscroll JavaScript -->
<script src="js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="js/waves.js"></script>
<!--Morris JavaScript -->
<script src="../plugins/bower_components/raphael/raphael-min.js"></script>
<script src="../plugins/bower_components/morrisjs/morris.js"></script>
<script src="../plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="../plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js"></script>
<!-- Custom Theme JavaScript -->
<script src="js/custom.js"></script>
<script src="js/dashboard3.js"></script>
<!--Style Switcher -->
<script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
