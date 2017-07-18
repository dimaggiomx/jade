<?php
ob_start();
session_start();
header("Content-Type: text/html;charset=utf-8");
require_once("global.config.php");
require_once("config.php");
require_once('sescheck.php'); // para la sesion

// para datos generales
require_once(C_P_CLASES."actions/a.general.php");
$myData = NEW A_REG_GEN("");
$result = $myData->check_status_record($DBcon,$_SESSION['ses_priv'],$_SESSION['ses_id']);

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
          <h4 class="page-title"><?php echo $result['URL']; ?></h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li><a href="desktop.php">Escritorio</a></li>
            <li class="active"><?php echo $_SESSION["ses_tipo"]; ?></li>
          </ol>
        </div>
        <!-- /.col-lg-12 -->
      </div>
      <!-- .row -->
      <!--div-- class="row">
        <div class="col-md-12">
          <div class="white-box">
            <div class="row">
              <div class="col-lg-3 col-sm-3 col-xs-12 text-center"> <small>Visit</small>
                <h2><i class="ti-arrow-up text-success"></i> 1064</h2>
                <div id="sparklinedash"></div>
              </div>
              <div class="col-lg-3 col-sm-3 col-xs-12 text-center"> <small>Total Page Views</small>
                <h2><i class="ti-arrow-up text-warning"></i> 5064</h2>
                <div id="sparklinedash2"></div>
              </div>
              <div class="col-lg-3 col-sm-3 col-xs-12 text-center"> <small>Unique Visitor</small>
                <h2><i class="ti-arrow-up text-info"></i> 664</h2>
                <div id="sparklinedash3"></div>
              </div>
              <div class="col-lg-3 col-sm-3 col-xs-12 text-center"> <small>Bounce Rate</small>
                <h2><i class="ti-arrow-down text-danger"></i> 50%</h2>
                <div id="sparklinedash4"></div>
              </div>
            </div>
            <ul class="list-inline text-center m-t-40">
              <li>
                <h5><i class="fa fa-circle m-r-5" style="color: #444b4c;"></i>Site A</h5>
              </li>
              <li>
                <h5><i class="fa fa-circle m-r-5" style="color: #fdc006;"></i>Site B</h5>
              </li>
              <li>
                <h5><i class="fa fa-circle m-r-5" style="color: #808f8f;"></i>Site C</h5>
              </li>
            </ul>
            <div id="morris-area-chart" style="height: 340px;"></div>
          </div>
        </div>
      </div-->
      <!-- /.row -->
      <!-- .row -->
      <div class="row">
        <div class="col-lg-6 col-sm-12 col-xs-12">
          <div class="row">
            <div class="col-lg-6 col-sm-6 col-xs-12">
              <div class="white-box">
                <h3 class="box-title">NUEVOS Clientes</h3>
                <ul class="list-inline two-part">
                  <li><i class="icon-people text-info"></i></li>
                  <li class="text-right"><span class="counter">02</span></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-12">
              <div class="white-box">
                <h3 class="box-title">NUEVOS Proyectos</h3>
                <ul class="list-inline two-part">
                  <li><i class="icon-folder text-purple"></i></li>
                  <li class="text-right"><span class="counter">02</span></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-12">
              <div class="white-box">
                <h3 class="box-title">Mis Inversiones</h3>
                <ul class="list-inline two-part">
                  <li><i class="icon-folder-alt text-danger"></i></li>
                  <li class="text-right"><span class="">0</span></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-12">
              <div class="white-box">
                <h3 class="box-title">NUEVOS Mensajes</h3>
                <ul class="list-inline two-part">
                  <li><i class="ti-wallet text-success"></i></li>
                  <li class="text-right"><span class="">0</span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-sm-12 col-xs-12">
          <div class="news-slide m-b-15">
            <div class="vcarousel slide">
              <!-- Carousel items -->
              <div class="carousel-inner">
                <div class="active item">
                  <div class="overlaybg"><img src="../plugins/images/news/slide1.jpg"/></div>
                  <div class="news-content"><span class="label label-danger label-rounded">Publicidad 1</span>
                    <h2>Aqui puede ir publicidad o algun banner</h2>
                    <a href="#">Leer Más</a></div>
                </div>
                <div class="item">
                  <div class="overlaybg"><img src="../plugins/images/news/slide2.png"/></div>
                  <div class="news-content"><span class="label label-primary label-rounded">Publicidad 2</span>
                    <h2>Aqui puede ir publicidad o algun banner 2</h2>
                    <a href="#">Leer Más</a></div>
                </div>
                <div class="item">
                  <div class="overlaybg"><img src="../plugins/images/news/slide3.jpg"/></div>
                  <div class="news-content"><span class="label label-success label-rounded">Publicidad 3</span>
                    <h2>Aqui puede ir publicidad o algun banner 3</h2>
                    <a href="#">Leer Más</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
      <!-- .row -->
      <!--div class="row">
        <div class="col-md-8 col-lg-9 col-sm-6 col-xs-12">
          <div class="white-box">
            <h3 class="box-title">SALES ANALYTICS</h3>
            <ul class="list-inline text-center">
              <li>
                <h5><i class="fa fa-circle m-r-5" style="color: #00bfc7;"></i>Site A View</h5>
              </li>
              <li>
                <h5><i class="fa fa-circle m-r-5" style="color: #fdc006;"></i>Site B View</h5>
              </li>
            </ul>
            <div id="morris-area-chart2" style="height: 370px;"></div>
          </div>
        </div>
        <div class="col-md-4 col-lg-3 col-sm-6 col-xs-12">
          <div  class="white-box">
            <h3 class="box-title">Total Sites Visit</h3>
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-6  m-t-30">
                <h1 class="text-warning">$678</h1>
                <p class="text-muted">APRIL 2016</p>
                <b>(150 Sales)</b> </div>
              <div class="col-md-6 col-sm-6 col-xs-6">
                <div id="sales1" class="text-center"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-lg-3 col-sm-6 col-xs-12">
          <div class="white-box">
            <h3 class="box-title">Sales Difference</h3>
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-6  m-t-30">
                <h1 class="text-info">$447</h1>
                <p class="text-muted">APRIL 2016</p>
                <b>(150 Sales)</b> </div>
              <div class="col-md-6 col-sm-6 col-xs-6">
                <div id="sales2" class="text-center"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
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
