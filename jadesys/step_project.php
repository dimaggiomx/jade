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
<!-- Wizard CSS -->
<link href="../plugins/bower_components/jquery-wizard-master/css/wizard.css" rel="stylesheet">
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
          <h4 class="page-title">Registro de Proyectos</h4>
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
        <div class="col-sm-12">
          <div class="white-box">
            <h3 class="box-title m-b-0">Crear</h3>
            <p class="text-muted m-b-30 font-13"> La creación de un proyecto es un proceso indispensable previo a la obtención de recursos.</p>
            <div id="exampleBasic" class="wizard">
            <ul class="wizard-steps" role="tablist">
                <!--li class="active" role="tab">
                    <h4><span>1</span>Paso</h4>
                </li-->
                <li class="active" role="tab">
                    <h4><span>1</span>Paso</h4>
                </li>
                <li role="tab">
                    <h4><span>2</span>Paso</h4>
                </li>
            </ul>
            <div class="wizard-content">

                <!--div class="wizard-pane active" role="tabpanel">
                    En este proceso de registro las empresas describen el uso que darán a los recursos obtenidos. Es posible que la misma empresa registre más de un proyecto y cada proyecto puede crear una subasta. Los empresarios reciben un mensaje cada que un proyecto nuevo es registrado.
                </div-->
                <div class="wizard-pane" role="tabpanel">
                    <form id="loginform" action="step_project.php" method="post">
                    <div class="form-body">
                        <h3 class="box-title">Datos</h3>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Nombre</label>
                                    <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre de Proyecto" required="">
                                    <span class="help-block"> Identificacion Unica del proyecto </span> </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Actividad Económica</label>
                                    <input type="text" id="ae" name="ae" class="form-control" placeholder="Actividad economica" required="">
                                    <span class="help-block"> Ayuda descriptiva. </span> </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label>Descripción General</label>
                                    <input type="text" class="form-control" name="descripcion" id="descripcion" required="">
                                </div>
                            </div>
                        </div>

                    </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success" id="btn-signup" name="btn-signup"> <i class="fa fa-check"></i> Guardar</button>
                            <button type="button" class="btn btn-default">Cancelar</button>
                        </div>
                    </form>
                </div>
                <div class="wizard-pane" role="tabpanel">
                    <form id="videoform" action="step_project.php" method="post">
                        <div class="form-body">
                            <h3 class="box-title">Datos</h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Video</label>
                                        <input type="text" id="video" name="video" class="form-control" placeholder="Video" required="">
                                        <span class="help-block"> URL del video de Youtube </span> </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">

                                    <div class="col-md-6 col-md-12 col-sm-6"> <img class="img-responsive" alt="user" src="../plugins/images/big/img1.jpg">
                                        <div class="white-box">
                                            <div class="text-muted"><span class="m-r-10">May 16</span> <a class="text-muted m-l-10" href="#"><i class="fa fa-heart-o"></i> 2017</a></div>
                                            <h3 class="m-t-20 m-b-20">Guia para subir videos</h3>
                                            <p>Guia rapida para poder subir un video a Youtube e ingresarlo como parte de tu proyecto</p>
                                            <button class="btn btn-success btn-rounded waves-effect waves-light m-t-20">Leer mas</button>
                                        </div>
                                    </div>

                                </div>
                                <!--/span-->
                            </div>

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
<!-- Form Wizard JavaScript -->
<script src="../plugins/bower_components/jquery-wizard-master/dist/jquery-wizard.min.js"></script>
<!-- FormValidation -->
<link rel="stylesheet" href="../plugins/bower_components/jquery-wizard-master/libs/formvalidation/formValidation.min.css">
<!-- FormValidation plugin and the class supports validating Bootstrap form -->
<script src="../plugins/bower_components/jquery-wizard-master/libs/formvalidation/formValidation.min.js"></script>
<script src="../plugins/bower_components/jquery-wizard-master/libs/formvalidation/bootstrap.min.js"></script>
<!-- Custom Theme JavaScript -->
<script src="js/custom.js"></script>
<script type="text/javascript">
        (function(){
            $('#exampleBasic').wizard({
                onFinish: function(){
                    alert('finish');
                }
            });


        })();
</script>
<!--Style Switcher -->
<script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
