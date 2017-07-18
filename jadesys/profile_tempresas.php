<?php
ob_start();
session_start();
header("Content-Type: text/html;charset=utf-8");
require_once("global.config.php");
require_once("config.php");
require_once('sescheck.php'); // para la sesion

require_once('config/actions/a.regempresa.php');

$myData = NEW A_REG_EMP("");
$result = $myData->get_empresa_data($DBcon,$_SESSION['ses_id']);

$display1 = '';
$display2 = '';
$display3 = '';

if($result['status'] == 'success')
{
  $obj = $result['data'];
  $display1 = $obj['1'];
  $display2 = $obj['2'];
  $display3 = $obj['3'];
}else
{
  $display1 = $result['msg'];
  $display2 = $result['msg'];
  $display3 = $result['msg'];
}

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
<title>Jade Capital Flow Desktop</title>
<!-- Bootstrap Core CSS -->
<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- animation CSS -->
<link href="css/animate.css" rel="stylesheet">
<!-- Menu CSS -->
<link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
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
<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>
<div id="wrapper">
  <!-- Top Navigation -->
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
          <h4 class="page-title">Datos del Perfil</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li><a href="desktop.php">Escritorio</a></li>
            <!--li><a href="#">Ui Elements</a></li-->
            <li class="active"><?php echo $_SESSION["ses_tipo"]; ?></li>
          </ol>
        </div>
        <!-- /.col-lg-12 -->
      </div>
      <!-- .row -->
          <div class="row">
            <div class="col-md-12">
              <div class="white-box">


                <!-- Tabstyle start -->
                <h3 class="box-title m-b-0"><?php echo $_SESSION["ses_tipo"]; ?></h3>
                <code>Empresas</code><hr>
                <section>
                  <div class="sttabs tabs-style-bar">
                    <nav>
                      <ul>
                        <li><a href="#section-bar-1" class="sticon ti-user"><span>Datos Generales</span></a></li>
                        <li><a href="#section-bar-2" class="sticon ti-id-badge"><span>Datos de Oficina</span></a></li>
                        <li><a href="#section-bar-3" class="sticon ti-file"><span>Certificación</span></a></li>

                      </ul>
                    </nav>
                    <div class="content-wrap">
                      <section id="section-bar-1">
                        <div class="col-md-12">
                          <div class="white-box">
                            <h3 class="box-title ti-export"> Export</h3>
                            <div class="table-responsive">
                              <?php echo $display1; ?>
                            </div>
                          </div>
                        </div>
                      </section>
                      <section id="section-bar-2">
                        <div class="col-md-12">
                          <div class="white-box">
                            <h3 class="box-title ti-export"> Export</h3>
                            <div class="table-responsive">
                              <?php echo $display2; ?>
                            </div>
                          </div>
                        </div>
                      </section>
                      <section id="section-bar-3">
                        <div class="col-md-12">
                          <div class="white-box">
                            <h3 class="box-title ti-export"> Export</h3>
                            <div class="table-responsive">
                              <?php echo $display3; ?>
                            </div>
                          </div>
                        </div>
                      </section>
                    </div><!-- /content -->
                  </div><!-- /tabs -->
                </section>

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

<!--slimscroll JavaScript -->
<script src="js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="js/waves.js"></script>
<!-- Custom Theme JavaScript -->
<script src="js/custom.js"></script>
<script src="js/cbpFWTabs.js"></script>
<script type="text/javascript">
      (function() {

                [].slice.call( document.querySelectorAll( '.sttabs' ) ).forEach( function( el ) {
                    new CBPFWTabs( el );
                });

            })();
</script>
<!--Style Switcher -->
<script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
