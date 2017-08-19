<?php
ob_start();
session_start();
header("Content-Type: text/html;charset=utf-8");
require_once("global.config.php");
require_once("config.php");
require_once('sescheck.php'); // para la sesion


$idProyecto = $_GET["idProyecto"];

/*
// para datos del proyecto
require_once(C_P_CLASES."actions/a.proyecto.php");
$myData = NEW A_PROY("");

$filter = "idEmpresa = '".$_SESSION["ses_idEmp"]."'";
$filter .= " AND id NOT IN (SELECT idProyecto FROM tsubastas)";

$result = array();
$result = $myData->get_proyectos($DBcon,'id,nombre',$filter);



if($result['status'] == 'success')
{
    $stmt = $result['data'];
    $option = '';

    while ($row = $stmt->fetchObject()) {
       $option .= '<option value="'.$row->id.'">'.$row->nombre.'</option>';
    }

    $dispProy = '<select class="form-control" name="proyecto"  id="proyecto">
                 <option value="">Seleccione Proyecto...</option>'.$option.'</select>';
}
else
{
    $dispProy = '<a href="step_project.php" target="_self">No tiene proyectos registrados, favor de registrar uno aqui</a>';
}

//$dispProy = $result;
*/
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
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- Page plugins css -->
    <link href="../plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
    <!-- Color picker plugins css -->
    <link href="../plugins/bower_components/jquery-asColorPicker-master/css/asColorPicker.css" rel="stylesheet">
    <!-- Date picker plugins css -->
    <link href="../plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker plugins css -->
    <link href="../plugins/bower_components/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
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
                    <h4 class="page-title">Crear tu subasta</h4>
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
                        <h3 class="box-title m-b-0"><b>Crea tu subasta</b></h3>
                        <div class="row">
                            <form id="subform" action="step_subastas.php" method="post">
                                <div class="form-body">

                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <?php //echo $dispProy; ?>
                                            <div class="form-group">
                                                <label class="control-label">Proyecto</label>
                                                <input type="text" id="proyecto" name="proyecto" class="form-control" value="<?php echo $idProyecto; ?>" >
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-sm-6">
                                            <label class="col-sm-6">Tipo de Subasta</label>
                                            <select class="form-control" name="tipo"  id="tipo">
                                                <option value="">Seleccione Tipo de Subasta...</option>
                                                <option value="Capital">Capital</option>
                                                <option value="Deuda">Deuda</option>
                                            </select>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="example">
                                                <h5 class="box-title m-t-30">Fecha de Inicio y Fin de la subasta</h5>
                                                <input type="text" class="form-control input-daterange-timepicker" name="daterangesub" id="daterangesub" value="01/01/2017 1:30 PM - 01/01/2017 2:00 PM"/>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/row-->
                                </div>
                                <div class="form-actions">
                                    <br/>
                                    <button type="submit" class="btn btn-success" id="btn-sub" name="btn-sub"> <i class="fa fa-check"></i> Guardar</button>
                                </div>
                            </form>
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
<!-- Custom Theme JavaScript -->
<script src="js/custom.js"></script>
<script src="tsubastas/ps_step_subastas.js"></script>
<!-- Plugin JavaScript -->
<script src="../plugins/bower_components/moment/moment.js"></script>
<!-- Clock Plugin JavaScript -->
<script src="../plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.js"></script>
<!-- Color Picker Plugin JavaScript -->
<script src="../plugins/bower_components/jquery-asColorPicker-master/libs/jquery-asColor.js"></script>
<script src="../plugins/bower_components/jquery-asColorPicker-master/libs/jquery-asGradient.js"></script>
<script src="../plugins/bower_components/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js"></script>
<!-- Date Picker Plugin JavaScript -->
<script src="../plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<!-- Date range Plugin JavaScript -->
<script src="../plugins/bower_components/timepicker/bootstrap-timepicker.min.js"></script>
<script src="../plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script>
    // Clock pickers
    if (/mobile/i.test(navigator.userAgent)) {
        $('input').prop('readOnly', true);
    }

    // Date Picker
    jQuery('.mydatepicker, #datepicker').datepicker();
    jQuery('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true
    });

    jQuery('#date-range').datepicker({
        toggleActive: true
    });
    jQuery('#datepicker-inline').datepicker({

        todayHighlight: true
    });

    // Daterange picker


    $('.input-daterange-timepicker').daterangepicker({
        timePicker: true,
        format: 'MM/DD/YYYY hh:mm:ss A',
        timePickerIncrement: 5,
        timePicker12Hour: true,
        timePickerSeconds: false,
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse'
    });

</script>
<!--Style Switcher -->
<script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
