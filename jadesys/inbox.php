<?php
ob_start();
session_start();
header("Content-Type: text/html;charset=utf-8");
require_once("global.config.php");
require_once("config.php");
require_once('sescheck.php'); // para la sesion

// para datos generales
require_once(C_P_CLASES."actions/a.msg.php");
$myData = NEW A_MSG("");
$subquery = " WHERE idusuario in (0,'".$_SESSION["ses_id"]."') ORDER BY regDate DESC";
$result = $myData->get_msgs($DBcon, $subquery);

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
          <h4 class="page-title">Mensajes</h4>
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
        <!-- Left sidebar -->
        <div class="col-md-12">
          <div class="white-box">
            <!-- row -->
            <div class="row">
              <div class="col-lg-2 col-md-3  col-sm-12 col-xs-12 inbox-panel">
                <div> <!--a href="#" class="btn btn-custom btn-block waves-effect waves-light">Compose</a-->
                  <div class="list-group mail-list m-t-20"> <a href="#" class="list-group-item active">Mensajes <span class="label label-rouded label-success pull-right">1</span></a> </div>
                  <h3 class="panel-title m-t-40 m-b-0">Labels</h3>
                  <hr class="m-t-5">
                  <div class="list-group b-0 mail-list"> <a href="#" class="list-group-item"><span class="fa fa-circle text-info m-r-10"></span>Nuevos</a> <a href="#" class="list-group-item"><span class="fa fa-circle text-warning m-r-10"></span>Leidos</a>  </div>
                </div>
              </div>
              <div class="col-lg-10 col-md-9 col-sm-12 col-xs-12 mail_listing">
                <div class="inbox-center">
                  <table class="table table-hover">
                    <thead>
                    <tr>
                      <th width="30"><div class="checkbox m-t-0 m-b-0 ">
                          <input id="checkbox0" type="checkbox" class="checkbox-toggle" value="check all">
                          <label for="checkbox0"></label>
                        </div></th>
                      <th colspan="4"> <div class="btn-group">


                        </div>
                        <div class="btn-group">
                          <button type="button" class="btn btn-default waves-effect waves-light  dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <i class="fa fa-refresh"></i> </button>
                        </div></th>
                      <th class="hidden-xs" width="100"><div class="btn-group pull-right">
                          <button type="button" class="btn btn-default waves-effect"><i class="fa fa-chevron-left"></i></button>
                          <button type="button" class="btn btn-default waves-effect"><i class="fa fa-chevron-right"></i></button>
                        </div></th>
                    </tr>
                    </thead>
                    <tbody>

                      <?php echo $result; ?>


                    </tbody>
                  </table>
                </div>
                <div class="row">
                  <div class="col-xs-7 m-t-20"> Showing 1 - 15 of 1 </div>
                  <div class="col-xs-5 m-t-20">
                    <div class="btn-group pull-right">
                      <button type="button" class="btn btn-default waves-effect"><i class="fa fa-chevron-left"></i></button>
                      <button type="button" class="btn btn-default waves-effect"><i class="fa fa-chevron-right"></i></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.row -->
          </div>
        </div>
      </div>
      <!-- /.row -->
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
<!-- Custom Theme JavaScript -->
<script src="market/ps_search.js"></script>
<!--Style Switcher -->
<script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
